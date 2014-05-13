<?php

date_default_timezone_set('Europe/London');







/*

$dbserver='mysql01.nottingham.ac.uk';

$dbuser='mszadm_admin';

$dbpassword='Tae6naes';

$dbname="uczgcw_career_development";

*/

$dbserver='mysql01.nottingham.ac.uk';

$dbuser='uczgcw_career';

$dbpassword='G33Loopw2vvv87q';

$dbname="uczgcw_career_development";



/*$dbserver='dev.webapps.nottingham.ac.uk';

$dbuser='mszadm';

$dbpassword='balzog3e45+';

$dbname="uczgcw_career_development_gems5";

*/

$con = mysqli_connect($dbserver, $dbuser, $dbpassword, $dbname);



if (mysqli_connect_errno( $con )) {

    echo "Can't connect to database: ".mysqli_connect_error();

}



