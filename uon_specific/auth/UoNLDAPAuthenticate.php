<?php
session_start();
//require_once('/usr/local/web/p5auth/IAuthenticate.php');
//require_once('/usr/local/web/p5auth/lib/Authenticate.php');
//require_once('/usr/local/web/p5auth/lib/ldapconfig.inc.php');
require_once('IAuthenticate.php');
require_once('Authenticate.php');
require_once('ldapconfig.inc.php');




/**
 * @abstract a class to integrate with the LDAP server
 * @author Shaun Hare
 *
 */
class UoNLDAPAuthenticate extends Authenticate implements IAuthenticate  
{
	private $user; 
	private $sharedKey="uonauthenticate";
	private $domain=".nottingham.ac.uk"; 
	public $accessToken; 
	
	/**
	 * @abstract client - used to verifiy the calling client 
	 */
	public function __construct()
	{
		
		
		
	}
	
	public  function client()
	{
		$args = func_get_args(); 
		
		$this->accessToken=session_id();
		
		$authToken = $this->_getToken($this->accessToken);
		
		
		if($this->_isValidToken($this->sharedKey,$authToken,"session")==false)
		{
			exit("Unable to authenticate client - contact web technologies team");
		}
		
		
		setcookie("_uonA", $authToken, time()+3600, "/", ".nottingham.ac.uk", 1);
		$this->accessToken=$authToken; 
		return $authToken;
		
		
	}
	/**
	 * Check to see if valid token
	 * @param $sharedSecret
	 * @param $authToken
	 * @param $validationMethod
	 */
	private function _isValidToken($sharedSecret,$authToken,$validationMethod)
	{
		
		$validToken=false; 
		
		$decryptedString=$this->decrypt($authToken);
			
		$credentials=unserialize($decryptedString);
		
		switch($validationMethod)
		{
			
			case "session":
				{
					
					if($credentials["sessionId"]===session_id())
					{
						$validToken=true;
					}
					break;
				}
			case "cookie":
				{
					if($authToken===$_COOKIE["_uonA"])
					{
						$validToken=true;
					}
					break;
				}
			default:
				{
				if($credentials[$validationMethod]===$validationMethod)
					{
						$validToken=true;
					}
					break;
				}
		}
		
		return $validToken;
	}
	
	/**
	 * get the token created for the user on the server
	 */
	private function _getToken($sessionId)
	{
		
		//Used to verify client - so accept a sessionID and use shared key to encrypt 
		
		
			$data= array("sessionId"=>$sessionId,"returnUrl"=>$_SERVER["HTTP_HOST"]); 
			$url="https://www.nottingham.ac.uk/p5auth/auth_server.php";
			
		
		    // create a new curl resource
		    $ch = curl_init();
		 
		 	
		 	
		    // set URL to download
		    curl_setopt($ch, CURLOPT_URL,$url);
		 
		  
		 
		 
		    // remove header? 0 = yes, 1 = no
		    curl_setopt($ch, CURLOPT_HEADER,0);
		 
		    // should curl return or print the data? true = return, false = print
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   
		    curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			//curl_setopt($ch, CURLOPT_PROXY,"mainproxy.nottingham.ac.uk");
		    //curl_setopt($ch,CURLOPT_PROXYPORT,8080);
curl_setopt($ch,CURLOPT_SSLVERSION,3);
			curl_setopt($ch,CURLOPT_CAINFO,"/usr/local/apache2/conf/ssl.crt/gs_root.pem");
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
		    // download the given URL, and return output
		    $output = curl_exec($ch);
			$headers = curl_getinfo($ch);
		    //exit(var_dump(array("headers"=>$headers,"body"=>$output)));
		    // close the curl resource, and free system resources
		    curl_close($ch);

		    
		    // print output
		    return $output;	
		
	
	}
	
	/**
	 * 
	 */
	public function forceAuthentication()
	{
		$args =func_get_args(); 
		
		
		if(!isset($_POST['access_token']))
		{
			//present a form
			echo "<label for=\"username\">Username</label><input type=\"text\" name=\"username\" id=\"username\" />";
			echo "<label for=\"password\">Password</label><input type=\"password\" name=\"password\" id=\"password\">";
			echo "<input type=\"hidden\" class=\"hidden\" name=\"access_token\" value=\"".$this->accessToken."\"/>";
			
		}
		else
		{
			if(is_array($args))
			{
				$returnUrl= $_GET['returnurl']; 
				
				
				$username= filter_input(INPUT_POST,'username' ,FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>parent::$userRegEx)));
	        	$password= strlen((string) $_POST['password']) > 6;
	 		
	        	$storedToken=unserialize($this->decrypt($_COOKIE["_uonA"])); 
			 	$returnUrl="http://".$storedToken["callback"].$returnUrl;
			 		
		 		//form submitted and valid input
			 	if($username && $password)
			 	{
			 		
			 		
			 		
			 		if($this->_isValidToken($this->sharedKey,$_POST["access_token"],"cookie"))
			 		{
			 		$config=new Config($_POST["username"]); 
			 		//check against ldap
			 		$authResults=parent::checkLdap($username,$_POST["password"],$config); 
			 		if(is_array($authResults)){
				 		if (empty($authResults['error']))
				 		{
							$this->user['name']=$authResults["Name"];
							$this->user['roles']=$authResults['roles'];
							header("location:".$returnUrl."?auth=".urlencode(base64_encode($this->encrypt(serialize($this->user)))));
							
						}
				 		else
				 		{
				 			
				 			header("location:".$returnUrl."?access=false&reason=".$authResults['error']); 
				 		}
			 		}
			 		else
			 		{
			 			header("location:".$returnUrl."?access=false&reason=service"); 
			 		}
			 		
				  }
				  else
				  {
				  	header("location:".$returnUrl."?access=false&reason=token"); 
				  }
				  
			   }
			   else
			   {
			   		header("location:".$returnUrl."?access=false&reason=credentials"); 
			   }
			   
			}		
		}
	}
	
	/**
	 * @abstract get a users display name 
	 * @returns string user
	 */
	public function getUser()
	{
		
		return $this->user['name'];
	}
	

	public function setToken()
	{
				$args=func_get_args(); 
	
	
				$sessionId=$args[0]; 
			
				$encrypted_data=$this->encrypt($sessionId);
				
				
			    $encoded_64=base64_encode($encrypted_data);
			     
			   
			   
			   
			   return $encoded_64;
				
		
	
	}
	
	
	
	public function decrypt($authToken)
	{
		$decoded_64=base64_decode($authToken); 
		$mcryptModule = mcrypt_module_open (MCRYPT_TripleDES, "", MCRYPT_MODE_ECB, "");
		$iv = mcrypt_create_iv (mcrypt_enc_get_iv_size ($mcryptModule), MCRYPT_RAND);
		mcrypt_generic_init($mcryptModule,$this->sharedKey,$iv);
		$decryptedString=mdecrypt_generic($mcryptModule, $decoded_64); 
		mcrypt_generic_deinit($mcryptModule);
		mcrypt_module_close($mcryptModule);
		
		return $decryptedString;
	}
	
	public function encrypt($dataToEncrypt)
	{
		$mcryptModule = mcrypt_module_open (MCRYPT_TripleDES, "", MCRYPT_MODE_ECB, "");
				$iv = mcrypt_create_iv (mcrypt_enc_get_iv_size ($mcryptModule), MCRYPT_RAND);
				mcrypt_generic_init($mcryptModule,$this->sharedKey,$iv);
				$encrypted_data = mcrypt_generic($mcryptModule, $dataToEncrypt);  
				mcrypt_generic_deinit($mcryptModule);
			    mcrypt_module_close($mcryptModule);
			    
		return $encrypted_data; 
	}
}
