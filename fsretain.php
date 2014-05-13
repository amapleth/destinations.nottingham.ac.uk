<?php include 'details.php'; ?>
<?php include 'database.php'; ?>
<?php include 'lookups.php'; ?>
<?php

$retsubject = 'All';
if ( array_key_exists('retsubject', $_POST) ) {
    $retsubject = htmlentities( $_POST['retsubject'] );
}

$yearsToSample = $yearcombos['s4'];
$retcounts = array();
$cohorts = array();
foreach ( $yearsToSample as $yearcode ) {
    $cohorts[$yearcode]['total'] = 0;
    $cohorts[$yearcode]['retained'] = 0;
}
$qualnows = array();
$cohort = 0;

foreach ( $yearsToSample as $yearcode ) {

    $basestm = "SELECT TYPEQUAL FROM extract$yearcode INNER JOIN popdlhe$yearcode ON popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa WHERE ( ".$retcodes[$retsubject]['sql']." ) AND TYPEQUAL <> 'XX'";
    $coursestm = "SELECT INSTPROV, COURSE FROM extract$yearcode INNER JOIN popdlhe$yearcode ON popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa WHERE ( ".$retcodes[$retsubject]['sql']." )";

   # then the populations for each qual type
    foreach ($qualtypes as $code => $qtdetails) {
        $qualst = "$basestm AND (".$qtdetails['sql']." )";
        if ($yearcode > '1011') {
            $qualst = str_replace('INSTPROV', 'UCNAME', $qualst);
            $qualst = str_replace('COURSE ', 'COURSENAME ', $qualst);
            $qualst = str_replace('PROFSOCT', 'SOCDLHE2010', $qualst );
        }
        $pst = mysqli_prepare( $con, $qualst );
        mysqli_stmt_execute( $pst );
        mysqli_stmt_store_result( $pst );
        $retcounts[$yearcode][$code]['total'] = mysqli_stmt_num_rows( $pst );
        $cohorts[$yearcode]['total'] += mysqli_stmt_num_rows( $pst );
        $cohort += mysqli_stmt_num_rows( $pst );

        $retst = "$basestm AND (".$qtdetails['sql']." ) AND INSTPROV = ? ";
        $uni = $university;
        if ($yearcode > '1011') {
            $uni = $uniname;
            $retst = str_replace('INSTPROV', 'UCNAME', $retst);
            $retst = str_replace('COURSE ', 'COURSENAME ', $retst);
            $retst = str_replace('PROFSOCT', 'SOCDLHE2010', $retst );
       }
#        echo "<p>$retst</p>";
        $rst = mysqli_prepare( $con, $retst );
        mysqli_stmt_bind_param( $rst, 's', $uni );
        mysqli_stmt_execute( $rst );
        mysqli_stmt_store_result( $rst );
        $retcounts[$yearcode][$code]['retained'] = mysqli_stmt_num_rows( $rst );
        $cohorts[$yearcode]['retained'] += mysqli_stmt_num_rows( $rst );

        $cstmt = "$coursestm AND (".$qtdetails['sql'].")";
        if ($yearcode > '1011') {
            $cstmt = str_replace('INSTPROV', 'UCNAME', $cstmt);
            $cstmt = str_replace('COURSE ', 'COURSENAME ', $cstmt);
            $cstmt = str_replace('PROFSOCT', 'SOCDLHE2010', $cstmt );
        }
#        echo "<p>$cstmt</p>";
        $cst = mysqli_prepare( $con, $cstmt );
        mysqli_stmt_execute( $cst );
        mysqli_stmt_store_result( $cst );
        mysqli_stmt_bind_result( $cst, $institution, $course );

        while ( mysqli_stmt_fetch( $cst ) ) {
            $qualnows[$yearcode][$code][] = array( 'institution' => $institution, 'course' => $course );
        }
      

    }


}

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Retention of graduates</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <?php include 'styles.inc'; ?>

       <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

<div class='rootcontainer'>

<?php include 'header.php' ?>

<h2>Retention of graduates that have gone on to study...</h2>

<table>
    <tr><td class='blank'><th>Selected Group</th></tr>
    <tr><th>Subject</th><td><?php echo $retcodes[$retsubject]['label']; ?></td></tr>
</table>

<br />
<br />

<?php

if ($cohort >= $minsize) {

?>


<table>
    <tr><th rowspan='2'>Nature of Study</th>

<?php

$row1 = '';
$row2 = '';

foreach ( $yearsToSample as $yearcode ) {
    $row1 .= "<td colspan='2'>".$yearcodemap[$yearcode]." survey</td>";
    $row2 .= "<td class='small'>Number</td><td class='small'>Retention</td>";
}

echo "$row1</tr>$row2</tr>";

foreach ( $qualtypes as $code => $qualdetails ) {
    echo "<tr><td class='tablerowtoggle' id='qual$code'>".$qualdetails['label']."</td>";
    foreach ($yearsToSample as $yearcode) {
        $rcount = $retcounts[$yearcode][$code]['retained'];
        $rtotal = $retcounts[$yearcode][$code]['total'];
        if ( $rtotal > 0 ) {
            $rperc = number_format( ($rcount/$rtotal) * 100, 1);
        } else {
            $rperc = 0;
        }
        echo "<td>$rtotal</td><td>$rperc%</td>";
    }
    echo "</tr>";
    echo "<tr class='subsect subsqual$code'><td></td>";
    foreach ($yearsToSample as $yearcode) {
        echo "<td colspan='2'><table class='invis small'><tr><th>Course</th><th>Institution</th></tr>";
        foreach ( $qualnows[$yearcode][$code] as $qualnow ) {
            if ( $qualnow['course'] == 'XXXX' || $qualnow['institution'] == 'XXXX' ) { continue; }
            echo "<tr><td>".$qualnow['course']."</td>";
            if ($yearcode <'1112') {
                echo "<td>".$feinsts[$qualnow['institution']]."</td></tr>";
            } else {
                echo "<td>".$qualnow['institution']."</td></tr>";
            }
        }
        echo "</table></td>";
    }
    echo "</tr>";

}

echo "<tr><td>Total</td>";
foreach ($yearsToSample as $yearcode) {
    $totperc = number_format( ($cohorts[$yearcode]['retained']/$cohorts[$yearcode]['total']) * 100, 1 );
    echo "<td>".$cohorts[$yearcode]['total']."</td><td>$totperc%</td>";
}
echo "</tr>";


?>

</table>

<?php

} else {
    echo "<p><strong>There are too few graduates in your chosen population, please go back and re-select.</strong></p>";
}

?>



<p><a href="index.php">Back to main page</a></p>

<?php include 'footer.php' ?>

        <?php include 'scripts.inc'; ?>

        <?php include 'analytics.php'; ?>
    </body>
</html>
