
<?php


ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
session_start();



//exit;
/*if(isset($_SESSION['_user_data']['id'])){
    $user = 'LOGOUT:'.$_SESSION['_user_data']['forename']. '  '.$_SESSION['_user_data']['surname'];
    echo "<a href='uon_specific/auth/logout.php'>".$user."</a>";
}else{
    header('location: uon_specific/auth/login.php');
}
*/
if ($_SESSION == null){

}


// Import UON Internal Header/Footer Assets
class internalUonAssets {
    public static function getContent($url)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
                                          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                          $output = curl_exec($ch);
                                          curl_close($ch);

                                          return $output;
                           }

    // Header call
    public static function getHeader()
    {
        return self::getContent("http://www.nottingham.ac.uk/common/assets/uon-app-header.html");
    }

    // Footer call
    public static function getFooter()
    {
        return self::getContent("http://www.nottingham.ac.uk/common/assets/uon-app-footer.html");
    }
}


#Matthew Jones:- the JACS one can be fixed by adding the line
#$usejacs = 'yes';
#to your details.php file
$usejacs = 'yes';

# Put your careers service contact details here
$address = 'Careers and Employability Service, Portland Building Level D West, University Park, Nottingham, NG7 2RD';
$telephone = '+44 (0)115 951 3680';
$email = 'careers-team@nottingham.ac.uk';

# Google analytics ID 
# e.g. $GAcode = UA-XXXXXXXX-X
$GAcode = 0;

# how many years back does your data go? (max: 5, min: 1)
$surveyyears = 5;

# Give the names used to denote the various oranisational levels (and their plurals) at your institution
$option1 = "School";
$option1s = "Schools";
$option2 = "Subject";
$option2s = "Subjects";
$option3 = "Course";
$option3s = "Courses";

# give the HESA INSTID code for your university here
$university = 155;

# give the real name of your institution here
# IMPORTANT - you MUST make sure that this is the exact name used for your institution in the UCNAME
# field of your extract file for 11/12 and later in order for the retention stats to work correctly
$uniname = 'University of Nottingham';

# database connection details

# database sevrver hostname
$dbserver = '';

# username for database
$dbuser = '';

# password for database
$dbpassword = '';

# name of database
$dbname = '';


?>