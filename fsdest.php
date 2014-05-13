<?php include 'details.php'; ?>
<?php include 'database.php'; ?>
<?php include 'lookups.php'; ?>

<?php

# first things first, get all the form parameters so that we can work out our
# sample population

$params = array();
$allowedparams = array('filtertype', 'school', 'subject', 'course', 'jacs1', 'jacs2', 'jacs3', 'yearselector', 'FTorPT', 'UGorPG', 'level', 'homeeu');
$filterparams = array('school', 'subject', 'course', 'jacs1', 'jacs2', 'jacs3');
$popparams = array('FTorPT', 'UGorPG', 'level', 'homeeu');

?>
<?php include 'querybuilder.php'; # next stage build the basic query strings ?>
<?php 
# now get the population and responsdent counts for each year
$yearsToSample = $yearcombos[$params['yearselector']];

# intialise variables to store the data
$report = '';
$qualcounts = array();
$qualnows = array();
$cohort = 0;

# now unwind $jobtitles into profsoct code and titles
$profsocts = array();
foreach ( $jobtitles as $soc => $socdetails ) {
    foreach ( $socdetails['subset'] as $subsoc => $subsocdetails ) {
        foreach ( $subsocdetails['subset'] as $title => $code ) {
            $profsocts[$code] = $title;
        }
    }
}


foreach ( $yearsToSample as $yearcode ) {

    # strings to hold the statement text
    $popstm = '';
    $respstm = '';

    # strings to hold the parameters for binding
    $p1 = '';
    $ps = '';
    $p3 = '';

    if ($yearcode > '1011') {
        $whereclause = str_replace('XQMODE01', "popdlhe$yearcode.XQMODE01", $whereclause);
        $whereclause = str_replace('HOMEEU', 'HOMEEUOS', $whereclause);
    }

    if ( $params['filtertype'] == 'school' ) {

        $newwhereclause = str_replace('course', "popdlhe$yearcode.course", $whereclause);

        $basestm = "SELECT HUSID FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $newwhereclause";
        if ( $yearcode < '1112' ) {
            $coursestm = "SELECT HUSID, TYPEQUAL, PROFSOCT, INSTPROV, courses$yearcode.COURSE FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa LEFT JOIN courses$yearcode on courses$yearcode.HUSIDc = popdlhe$yearcode.HUSID $newwhereclause";
        } else {
            $coursestm = "SELECT HUSID, TYPEQUAL, PROFSOCT, INSTPROV, COURSENAME FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $newwhereclause";
        }
        $p1 = $params['school'];
        $p2 = $params['subject'];
        $p3 = $params['course'];

    } elseif ( $params['filtertype'] == 'jacs' ) {

        $j1 = $params['jacs1'];
        $j2 = $params['jacs2'];
        $j3 = $params['jacs3'];

        # modify the jacs code if it's a legacy code
        if ( $yearcode == '78' or $yearcode == '89' ) {

            if ($j1 != '%') { $j1 = $legacyjacs1map[$j1]; }
            if ($j2 != '%') { $j2 = $legacyjacs2map[$j2]; }
            if ($j3 != '%') { $j3 = $legacyjacs3map[$j3]; }
        }

        if ( $yearcode < '1112' ) {
            $basestm = "SELECT distinct(HUSID) FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $newwhereclause";
            $coursestm = "SELECT distinct(HUSID), TYPEQUAL, PROFSOCT, INSTPROV, courses$yearcode.COURSE FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa LEFT JOIN courses$yearcode on courses$yearcode.HUSIDc = popdlhe$yearcode.HUSID $newwhereclause";
        } else {
            $newwhereclause = str_replace('LEV1', 'XJACSLEV101_1', $newwhereclause);
            $newwhereclause = str_replace('LEV2', 'XJACSLEV201_1', $newwhereclause);
            $newwhereclause = str_replace('LEV3', 'XJACSLEV301_1', $newwhereclause);

            $basestm = "SELECT distinct(HUSID) FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $newwhereclause";
            $coursestm = "SELECT distinct(HUSID), TYPEQUAL, PROFSOCT, INSTPROV, COURSENAME FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $newwhereclause";
        }
        $p1 = $j1;
        $p2 = $j2;
        $p3 = $j3;

    }

    # now prform the queries

    # first total population count
    $pst = mysqli_prepare( $con, $basestm );
 #   echo "<p>$basestm</p>";
    mysqli_stmt_bind_param( $pst, 'sss', $p1, $p2, $p3 );
    mysqli_stmt_execute( $pst );
    mysqli_stmt_store_result( $pst );
    $qualcounts[$yearcode]['pop'] = 0;
#    $qualcounts[$yearcode]['pop'] = mysqli_stmt_num_rows( $pst );

    # 11/12 has different field names
    if ($yearcode > '1011') {
        $coursestm = str_replace('INSTPROV', 'UCNAME', $coursestm);
        $coursestm = str_replace('PROFSOCT', 'SOCDLHE2010', $coursestm);
    }

    foreach ( $qualtypes as $code => $qualdetails ) {
        $empstm = $coursestm." AND ( ".$qualdetails['sql']." )";

#        if ( $yearcode == '910') {
#            echo "<p>$empstm</p>";
#        }
#        echo "<p>$empstm</p>";
        $est = mysqli_prepare( $con, $empstm );
        mysqli_stmt_bind_param( $est, 'sss', $p1, $p2, $p3 );
        mysqli_stmt_execute( $est );
        mysqli_stmt_store_result( $est );
        $qualcounts[$yearcode][$code] = mysqli_stmt_num_rows( $est );
        $qualcounts[$yearcode]['pop'] += mysqli_stmt_num_rows( $est );
#        echo "<p>$yearcode: $code: ".mysqli_stmt_num_rows( $est )."</p>";
        $cohort += mysqli_stmt_num_rows( $est );

        mysqli_stmt_bind_result($est, $husid, $typequal, $profsoct, $instprov, $course);

        while ( mysqli_stmt_fetch( $est ) ) {
            if ( $course == '' ) {
                if ( ($profsoct == '10' || $profsoct == '20' || $profsoct == 'XXXXX') && $yearcode < '1112') {
                    $course = 'Not stated';
                } else {
                    $course = $profsocts[$profsoct];
                }
            }
            if ($yearcode < '1112') {
                if ( array_key_exists($instprov, $feinsts) ) {
                    $institution = $feinsts[$instprov+0];
                } else {
                    $institution = "Not stated";
                }                
            } else {
                if ( $instprov == '') {
                    $institution = 'Not stated';
                } else {
                    $institution = $instprov;
                }
            }
            
            $qualnows[$yearcode][$code][] = array( 'course' => $course, 'institution' => $institution );
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
        <title>Further study destinations - GEMS</title>
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

<h2>Further study destinations for the graduates you selected</h2>

<?php include 'table.php'; ?>

<br />
<br />

<?php

if ($cohort >= $minsize) {

?>


<table>
    <tr><th rowspan='2'>Publication Categories</th>

<?php

$row1 = '';
$row2 = '';

foreach ( $yearsToSample as $yearcode ) {
    $row1 .= "<td colspan='2'>".$yearcodemap[$yearcode]." survey</td>";
    $row2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
}

echo "$row1</tr>$row2</tr>";

foreach ($qualtypes as $code => $qualdetails) {

    echo "<tr><td class='tablerowtoggle' id='qual$code'>".$qualdetails['label']."</td>";
    foreach ($yearsToSample as $yearcode) {
        $qcount = $qualcounts[$yearcode][$code];
        $qperc = number_format( ($qualcounts[$yearcode][$code]/$qualcounts[$yearcode]['pop']) * 100, 1);
        echo "<td>$qcount</td><td>$qperc%</td>";
    }
    echo "</tr>";
    echo "<tr class='subsect subsqual$code'><td></td>";
    foreach ($yearsToSample as $yearcode) {
        echo "<td colspan='2'><table class='invis small'><tr><th>Course</th><th>Institution</th></tr>";
        foreach ( $qualnows[$yearcode][$code] as $qualnow ) {
            echo "<tr><td>".$qualnow['course']."</td><td>".$qualnow['institution']."</td></tr>";
        }
        echo "</table></td>";
    }
    echo "</tr>";

}

?>

</table>

<?php

} else {
    echo "<p><strong>There are too few graduates ($cohort) in your chosen population, please go back and re-select.</strong></p>";
}

?>


<p><a href="index.php">Back to main page</a></p>

<?php include 'footer.php' ?>

        <?php include 'scripts.inc'; ?>

        <?php include 'analytics.php'; ?>
    </body>
</html>
