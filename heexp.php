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

# intialise variables to store the data
$expcounts = array();
$cohort = 0;

# now get the population and responsdent counts for each year
$yearsToSample = $yearcombos[$params['yearselector']];

foreach ( $yearsToSample as $yearcode ) {

    # strings to hold the statement text
    $popstm = '';           # to get total FTE cohort size
    $contstm = '';          # to get contract types

    # strings to hold the parameters for binding
    $p1 = '';
    $ps = '';
    $p3 = '';

    if ($yearcode > '1011') {
        $whereclause = str_replace('XQMODE01', "popdlhe$yearcode.XQMODE01", $whereclause);
        $whereclause = str_replace('HOMEEU', 'HOMEEUOS', $whereclause);
    }

    
    if ( $params['filtertype'] == 'school' ) {

        $basestm = "SELECT HUSID FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause";
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
            $basestm = "SELECT DISTINCT(HUSID) FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause";
        } else {
            $whereclause = str_replace('LEV1', 'XJACSLEV101_1', $whereclause);
            $whereclause = str_replace('LEV2', 'XJACSLEV201_1', $whereclause);
            $whereclause = str_replace('LEV3', 'XJACSLEV301_1', $whereclause);

            $basestm = "SELECT DISTINCT(HUSID) FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause";
        }
        $p1 = $j1;
        $p2 = $j2;
        $p3 = $j3;

    }

    if ($yearcode > '1011') {

        # first total population count
        $pst = mysqli_prepare( $con, $basestm );
        mysqli_stmt_bind_param( $pst, 'sss', $p1, $p2, $p3 );
        mysqli_stmt_execute( $pst );
        mysqli_stmt_store_result( $pst );
#        $cohorts[$yearcode] = mysqli_stmt_num_rows( $pst );


        $crits = array('HEBUSNEXP', 'HEWORKEXP', 'HESTUDYEXP');
        foreach ( $crits as $crit ) {
            $cohorts[$yearcode][$crit] = 0;
            foreach ($experiences as $code => $label) {
                $exst = mysqli_prepare( $con, $basestm." AND $crit = '$code'");
                mysqli_stmt_bind_param( $exst, 'sss', $p1, $p2, $p3 );
                mysqli_stmt_execute( $exst );
                mysqli_stmt_store_result( $exst );
                $expcounts[$yearcode][$crit][$code] = mysqli_stmt_num_rows( $exst );
                $cohorts[$yearcode][$crit] += mysqli_stmt_num_rows( $exst );
                $cohort += mysqli_stmt_num_rows( $exst );
            }
        }

      }


   

}


?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Overall higher education experience</title>
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

<h2>Overall higher education experience</h2>

<br />
<br />

<?php

if ($cohort >= $minsize) {

?>



<table>
    <tr><th rowspan='2'>Prepare for employment?</th>

<?php

$row1 = '';
$row2 = '';

foreach ( $yearsToSample as $yearcode ) {

    if ( $yearcode < '1112' ) { continue; } 

    $row1 .= "<td colspan='2'>".$yearcodemap[$yearcode]." survey</td>";
    $row2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
}

echo "$row1</tr>$row2</tr>";

foreach ( $experiences as $code => $label ) {

    echo "<tr><td>".$label."</td>";

    foreach  ( $yearsToSample as $yearcode ) {

        if ( $yearcode < '1112') { continue; } 
            
        $contperc = number_format( ($expcounts[$yearcode]['HEWORKEXP'][$code] / $cohorts[$yearcode]['HEWORKEXP']) * 100, 1 );
        echo "<td>".$expcounts[$yearcode]['HEWORKEXP'][$code]."</td><td>$contperc%</td>";
        
   }

    echo "</tr>";
}

$totalrow = "<tr><td>Total</td>";
foreach  ( $yearsToSample as $yearcode ) {

    if ( $yearcode < '1112') { continue; } 

    $totalrow .= "<td colspan='2'>".$cohorts[$yearcode]['HEWORKEXP']."</td>";

}
echo "$totalrow</tr>";

?>

</table>
<br />
<br />

<table>
    <tr><th rowspan='2'>Prepare for further study?</th>

<?php

$row1 = '';
$row2 = '';

foreach ( $yearsToSample as $yearcode ) {

    if ( $yearcode < '1112') { continue; } 

    $row1 .= "<td colspan='2'>".$yearcodemap[$yearcode]." survey</td>";
    $row2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
}

echo "$row1</tr>$row2</tr>";

foreach ( $experiences as $code => $label ) {

    echo "<tr><td>".$label."</td>";

    foreach  ( $yearsToSample as $yearcode ) {
        
        if ( $yearcode < '1112') { continue; } 

        $contperc = number_format( ($expcounts[$yearcode]['HESTUDYEXP'][$code] / $cohorts[$yearcode]['HESTUDYEXP']) * 100, 1 );
        echo "<td>".$expcounts[$yearcode]['HESTUDYEXP'][$code]."</td><td>$contperc%</td>";

   }

    echo "</tr>";
}

$totalrow = "<tr><td>Total</td>";
foreach  ( $yearsToSample as $yearcode ) {

    if ( $yearcode < '1112') { continue; } 

    $totalrow .= "<td colspan='2'>".$cohorts[$yearcode]['HESTUDYEXP']."</td>";

}
echo "$totalrow</tr>";

?>

</table>
<br />
<br />

<table>
    <tr><th rowspan='2'>Prepare for being self-employed/freelance?</th>

<?php

$row1 = '';
$row2 = '';

foreach ( $yearsToSample as $yearcode ) {

    if ( $yearcode < '1112') { continue; } 

    $row1 .= "<td colspan='2'>".$yearcodemap[$yearcode]." survey</td>";
    $row2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
}

echo "$row1</tr>$row2</tr>";

foreach ( $experiences as $code => $label ) {

    echo "<tr><td>".$label."</td>";

    foreach  ( $yearsToSample as $yearcode ) {
        if ( $yearcode < '1112') { continue; }         
        $contperc = number_format( ($expcounts[$yearcode]['HEBUSNEXP'][$code] / $cohorts[$yearcode]['HEBUSNEXP']) * 100, 1 );
        echo "<td>".$expcounts[$yearcode]['HEBUSNEXP'][$code]."</td><td>$contperc%</td>";
   }

    echo "</tr>";
}

$totalrow = "<tr><td>Total</td>";
foreach  ( $yearsToSample as $yearcode ) {
    if ( $yearcode < '1112') { continue; } 
    $totalrow .= "<td colspan='2'>".$cohorts[$yearcode]['HEBUSNEXP']."</td>";
}
echo "$totalrow</tr>";

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
