<?php
header('Content-type: text/json; charset=utf-8');

include 'details.php';
include 'database.php';
include 'lookups.php';


$counts = array();

# build statement to get populations
$school = '';
$subject = '';
$course = '';

$jacs1 = '';
$jacs2 = '';
$jacs3 = '';

if  (array_key_exists('school', $_GET) ) { $school = $_GET['school']; }
if  (array_key_exists('subject', $_GET) ) { $subject = $_GET['subject']; }
if  (array_key_exists('course', $_GET) ) { $course = $_GET['course']; }

if  (array_key_exists('jacs1', $_GET) ) { $jacs1 = $_GET['jacs1']; }
if  (array_key_exists('jacs2', $_GET) ) { $jacs2 = $_GET['jacs2']; }
if  (array_key_exists('jacs3', $_GET) ) { $jacs3 = $_GET['jacs3']; }

if ( $school == '' or $school == 'all' ) { $school = '%'; }
if ( $subject == '' or $subject == 'all' ) { $subject = '%'; }
if ( $course == '' or $course == 'all' ) { $course = '%'; }

if ( $jacs1 == '' or $jacs1 == 'all' ) { $jacs1 = '%'; }
if ( $jacs2 == '' or $jacs2 == 'all' ) { $jacs2 = '%'; }
if ( $jacs3 == '' or $jacs3 == 'all' ) { $jacs3 = '%'; }

$filtertype = $_GET['filtertype'];

$surveykey = $_GET['surveyyears'];
#error_log("$surveykey\n");
$yearsToSample = $yearcombos[$surveykey];

foreach ( $whereclauses as $type => $clause ) {

	$counts[$type] = 0;

	foreach ( $yearsToSample as $yearcode ) {

        if ( $filtertype == 'school' ) {

            $statement = "SELECT HUSID FROM popdlhe$yearcode WHERE SCHOOL LIKE ? AND SUBJECT LIKE ? and COURSE LIKE ? AND ($clause)";
            if ( $yearcode == '1112' ) {
                $statement = str_replace('HOMEEU', 'HOMEEUOS', $statement);
            }         
            $yst = mysqli_prepare( $con, $statement );
#            error_log("$statement\n");
            mysqli_stmt_bind_param( $yst, 'sss', $school, $subject, $course );
            mysqli_stmt_execute( $yst );
            mysqli_stmt_store_result( $yst );
            $counts[$type] += mysqli_stmt_num_rows( $yst );

        } elseif ( $filtertype == 'jacs' ) {

            $statement = '';
            if ( $yearcode > '1011' ) {
                $statement = "SELECT distinct HUSID FROM popdlhe$yearcode WHERE XJACSLEV101_1 LIKE ? AND XJACSLEV201_1+0 LIKE ? AND XJACSLEV301_1+0 LIKE ? AND ($clause)";
                $statement = str_replace('HOMEEU', 'HOMEEUOS', $statement);
            } else {
                $statement = "SELECT distinct HUSID FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd WHERE LEV1 LIKE ? AND LEV2+0 LIKE ? AND LEV3+0 LIKE ? AND ($clause)";
            }        
            $counts['statements'][$yearcode][$type] = $statement;
            $yst = mysqli_prepare( $con, $statement );
 #           error_log("$statement\n");
            mysqli_stmt_bind_param( $yst, 'sss', $jacs1, $jacs2, $jacs3 );
            mysqli_stmt_execute( $yst );
            mysqli_stmt_store_result( $yst );
            $counts[$type] += mysqli_stmt_num_rows( $yst );

        }

    }

} 


$rv = json_encode($counts);

echo $rv;

?>