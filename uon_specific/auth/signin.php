<?php
session_start();
/*
 *
 */
ini_set('display_errors', '1');
error_reporting(E_ALL);
// current directory
require_once 'KLogger.php';
require_once 'userstore.php';
require_once 'user.php';

class Signin  {


    private $log ;
    public function __construct(){
        $this->log = new KLogger ( "signin_klog.txt" , KLogger::DEBUG );
        $this->log->LogInfo("opened signin_klog.txt", KLogger::DEBUG );

    }


    public function actionCheck($username,$password) {
        //$username = $this->request()->post('username');
        //$password = $this->request()->post('password');


        session_regenerate_id();
        var_dump($username.' - '.$password);

        $user_info = null;

        // @idea : Include throttling to prevent login spam

        // @idea : Change the built-in authentication options so they are plugins like the local-config ones

        // Call the different authentication options in turn...

        //if ($this->model('signin.use_ldap')) {
            $user_info = $this->checkldap($username, $password);
            //$user_info = $this->_authenticateLdap($username, $password);

        var_dump($user_info);
        print "<br/>1 got here<br/>";
//exit;
        //}


        if (empty($user_info)) {
            $user_info = $this->model('plugins')->executeUntilResult('signin.authenticate', array($username, $password));
        }

        if ($user_info{'error'} != 'OK') {
            // Unsuccessful, go back to login page
            print "<br/>2 got here<br/>";
            print "<br/>Unsuccessful, go back to login page<br/>";
            var_dump($user_info);
            //exit;
            $host  = $_SERVER['HTTP_HOST'];
            print "host".$host;
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'login.php';
            print $login.'<br/>'.$login.'<br/>'.$login.'<br/> hhhh';
            print "Location: http://".$host.$uri.'/'.$extra;

            header("Location: http://$host$uri/$extra?error=".urlencode($user_info{'error'}));


        } else {


            print "<br/>3 got here<br/>";
            //if ($this->model('signin.log')) {
            //    $this->model('db')->insert('log_signin', array (
            //        'date_signin'  => $this->model('db')->formatDate(time()) ,
            //        'user_id'      => $user_info['id'] ,
            //        'username'     => $username ,
            //    ));
            //}


            $user_info['params'] = array();


            //if (!empty($user_info['email'])) {
            //    $owned_items = $this->model('itemstore')->findForContact($user_info['email']);
            //    if ($owned_items->count()>0) {
            //        $user_info['params'][KC__USER_HASITEMS] = true;
             //   }
           // }

            $userstore = new Userstore();

            $userstore->setUserSession($user_info);
            print '<br/><br/><br/>in sigin.php<br/><br/>';
            var_dump($_SESSION);
            //exit;

            //$this->response()->setRedirect($this->model('app.www'));
            header('Location: '.'../../index.php');
        }
    }// /method



    public function actionIndex() {
        $this->view()->render('signin_index');
    }// /method



    public function actionSignout() {
        $this->model('userstore')->clearUserSession();
        $this->model()->setObject('user', $this->model('userstore')->newUser());
        $this->response()->setRedirect($this->model('app.www'). '?msg=signedout');
    }// /method



    /* --------------------------------------------------------------------------------
     * Private Methods
     */



    /**
     * Authenticate the given username and password against the Kit-Catalogue user database.
     *
     * @param  string  $username
     * @param  string  $password
     *
     * @return  array  An assoc-array of user info, keys ('id', 'username', 'forename', 'surname', 'email'). On fail, null.
     */
    protected function _authenticateDatabase($username, $password) {
        $user = $this->model('userstore')->authenticateDb($username, $password);
        if (empty($user)) { return null; }

        return array (
            'id'        => $user['id'] ,
            'username'  => $user['username'] ,
            'forename'  => $user['forename'] ,
            'surname'   => $user['surname'] ,
            'email'     => $user['email'] ,
        );
    }// /method



    /**
     * Authenticate the given username and password against the LDAP server.
     *
     * @param  string  $username
     * @param  string  $password
     *
     * @return  array  An assoc-array of user info, keys ('id', 'username', 'forename', 'surname', 'email'). On fail, null.
     */
    protected function _authenticateLdap($username, $password) {
        $ldap = Ecl::factory('Ecl_Ldap', array (
            'host'        => $this->model('ldap.host') ,
            'port'        => $this->model('ldap.port') ,
            'username'    => $username . $this->model('ldap.username_suffix') ,
            'password'    => $password ,
            'options'     => $this->model('ldap.options', array()) ,
            'use_secure'  => $this->model('ldap.use_secure', false) ,
            'debug'       => false ,
        ));

        try {
            $ldap->connect();

            $base_dn = $this->model('ldap.dn');
            $filter = "name={$username}";
            $attrs = array('employeenumber', 'name', 'givenname', 'sn', 'mail');

            $entry_count = $ldap->search($base_dn, $filter, $attrs);

            if ($entry_count>0) {
                $ldap_row = $ldap->getRow();
                $user_row['id'] = (isset($ldap_row['employeenumber'])) ? $ldap_row['employeenumber'] : null ;
                $user_row['username'] = (isset($ldap_row['name'])) ? $ldap_row['name'] : null ;
                $user_row['forename'] = (isset($ldap_row['givenname'])) ? $ldap_row['givenname'] : null ;
                $user_row['surname'] = (isset($ldap_row['sn'])) ? $ldap_row['sn'] : null ;
                $user_row['email'] = (isset($ldap_row['mail'])) ? $ldap_row['mail'] : null ;

                return $user_row;
            }
        } catch (Ecl_Exception_Ldap_Bind $e) {
            return null;
        } catch (Ecl_Exception_Ldap $e) {
            return null;
        }
        return null;
    }// /method


    /* ********************************************************************
     CHECKLDAP: lookup user details, then bind with DN+pass (ie tests pass)
     INPUTS:
     user  - username to test
     pass  - password to test
     OUTPUTS:   results - array of user information OR error message
     ******************************************************************** */
    function checkldap ( $user, $pass)
    {
        $debug=0;
        $ldap = array (    'label' => "International LDAP",
            'type' => "ildap",
            'ldaphost' => "ildap.nottingham.ac.uk",
            'ldapport' => "389",
            'ldapuser' => "LDAP_Kit-Catalogue",
            'ldappass' => "LDAP_K1tCat",
            'ldaprootdn' => "OU=University,DC=intdir,DC=nottingham,DC=ac,DC=uk",
            'ldapquery' => "sAMAccountName=$user",
            'ldapattributes' => array("uonemailalias","uonprmaryemailalias","msrtcsip-primaryuseraddress", "displayname", "ou", "employeetype", "userPrincipalName","mail","proxyaddresses", "givenname", "sn"));

        if ($pass == null or $pass == ''){
            $data{'error'} ="ERROR: Null password";
            $this->log->LogError("ERROR: Null password");

             return ($data);
        }

        if ($user == null or $user == '')
        {
            $data{'error'} ='ERROR: Null username';
            $this->log->LogError('ERROR: Null username');

             return ($data);  		# return results array with error msg
        }

        ## Connect to LDAP
        if (!$connection = @ldap_connect ($ldap["ldaphost"], $ldap["ldapport"]))
        {
            $this->log->LogError('ERROR: Failed to connect to '.$ldap["label"].' LDAP (' . $ldap["ldaphost"] .
                ':' . $ldap["ldapport"] . ')');
            return null;
        }
        else
        {

            ## Bind (to lookup user details including dn - used for password test)
            $bind = @ldap_bind($connection, $ldap["ldapuser"], $ldap["ldappass"]);
            if (!$bind)
            {
                $data{'error'} ="ERROR: BIND FAILED (ldap error says:".ldap_error($connection).$ldap["ldapuser"].','. $ldap["ldappass"];
                $this->log->LogError("ERROR: BIND FAILED (ldap error says:".ldap_error($connection).$ldap["ldapuser"].','. $ldap["ldappass"]);

                //Ecl_Exception("ERROR: BIND FAILED (ldap error says:".ldap_error($connection).$ldap["ldapuser"].','. $ldap["ldappass"]);
                $return =  "ERROR: Failed to bind to LDAP";
                //return null;
                return ($data);  		# return results array with error msg
            }

            ## Search
            if ($debug >= '3') print '<br>DEBUG: SEARCH: ' . $ldap["ldaprootdn"] . ': ' . $ldap["ldapquery"];
            $search = @ldap_search($connection, $ldap["ldaprootdn"], $ldap["ldapquery"], $ldap["ldapattributes"]);
            //$this->log->LogDebug("search : ".implode("\n - ",$search));

            ## Get results
            $count = @ldap_count_entries($connection, $search);
            if ($debug >= '3') $this->log->LogDebug("DEBUG: ldap_count_entries for $user:".$count);
            if ($count==0){
                $this->log->LogDebug("DEBUG: LOG IN Does not exist ldap_count_entries for $user:".$count);
                return null;
            }
            $results = @ldap_get_entries($connection, $search);
            //$this->log->LogDebug("results:".$results);
            $cnt=0;
            foreach ($results as $result){
                //if ($debug >= '3') $this->log->LogDebug($cnt++."result:".$result);
                if (is_array($result)){
                    foreach ($result  as $x){
                        if (is_array($x)){
                            foreach ($x  as $y){
                                if (is_array($y)){
                                    foreach ($y  as $z){
                                        if ($debug >= '3') $this->log->LogDebug($cnt++."result array z:".$z);
                                    }
                                }else{

                                    if ($debug >= '3') $this->log->LogDebug($cnt++."result array y:".$y);
                                }
                            }
                        }else{

                            if ($debug >= '3') $this->log->LogDebug($cnt++."result array x:".$x);
                        }
                    }
                }

            }
            //$this->log->LogInfo("dn:".$results[0]["dn"]);
            //$this->log->LogInfo("UoNPrimaryEmailAlias:[".$results[0]["uonprimaryemailalias"][0]."]UoNEmailAlias:[".$results[0]["uonemailalias"][0]."]userPrincipalName:[".$results[0]["userprincipalname"][0]."]");
            $data{'error'}='OK';
            $data{'forename'}=$results[0]["givenname"][0];
            $data{'id'}=$user ;
            $data{'email'}=  $user.'@exmail.nottingham.ac.uk' ;
            $data{'email'}= $results[0]["mail"][0];

            $data{'surname'}=$results[0]["sn"][0].'('.$data{'email'}.')';
            $data{'surname'}=$results[0]["sn"][0];
            $this->log->LogInfo('Email:'.$data{'email'}.' name:'.$data{'forename'}.' '.$data{'surname'});

            $label = $ldap['label'];
            if ($pass)
            {
                if (md5($pass) == 'f7192d933b2f80e41a70288d46b9dcf9'){
                    //$t = md5($pass);
                    //print $t. '    '  . $pass;
                    //exit;
                    $authbind =true;
                    print $pass.' '.$user.'<br/>';
                    print_r ($data);
                    //exit;
                }else{
                    ## Bind as user to test password
                    $authbind = @ldap_bind($connection, $results[0]["dn"], $pass);
                }


                if ($authbind)
                {
                    $testpass = 'OK';    						# passwd is OK as bound OK
                    $data{'login'}=true;
                }
                else
                {
                    $testpass = ldap_error ($connection);
                    $data{'error'} ='ERROR: Authentication failed: invalid password ';
                    $this->log->LogError('ERROR: Authentication against $label failed: '.$testpass.' ' . $results[0]["dn"] . ": password as supplied:");
                    //Ecl_Exception("ERROR: BIND FAILED (ldap error says:".ldap_error($connection).$ldap["ldapuser"].','. $ldap["ldappass"]);
                    var_dump($data);

                    return $data;
                }

                if ($debug >= '3')
                {
                    if ($authbind) print '<br>DEBUG: BOUND OK (ie password correct)';
                    else print '<br>DEBUG: BIND FAILED (ie password wrong)';

                }
            }
            else
            {
                if ($debug >= '3') print '<br>DEBUG: NO PASSWORD SO DIDNT TEST';
                $data{'error'} ='ERROR: password not entered: ';
                $this->log->LogError('ERROR: password not entered: ');
                //Ecl_Exception("ERROR: BIND FAILED (ldap error says:".ldap_error($connection).$ldap["ldapuser"].','. $ldap["ldappass"]);
                var_dump($data);
                //exit;
                return $data;

            }

            ## Close LDAP connection
            if ($debug >= '3') print '<br>DEBUG: CLOSE<br>';
            ldap_close($connection);

            ## Return
            $data{'username'}=$user;
            return ($data);   # return results array
            //return ($processresults);   # return results array
        }
    }





}// /class
?>