<?php include 'details.php'; ?>
<?php include 'database.php'; ?>
<?php include 'lookups.php'; ?>
<?php

# intialise variables to store the data
$empsizecounts = array();
$cohorts = array();
$empsizes = array();

# first things first, get all the form parameters so that we can work out our
# sample population

$params = array();
$allowedparams = array('filtertype', 'school', 'subject', 'course', 'jacs1', 'jacs2', 'jacs3', 'yearselector', 'FTorPT', 'UGorPG', 'level', 'homeeu', 'emptypes', 'emplevels', 'contracts', 'qualuses', 'industries', 'orgsizes', 'socs');
$filterparams = array('school', 'subject', 'course', 'jacs1', 'jacs2', 'jacs3');
$popparams = array('FTorPT', 'UGorPG', 'level', 'homeeu');


?>
<?php include 'querybuilder.php'; # next stage build the basic query strings ?>
<?php include 'empquerybuilder.php'; # add advanced options for employer queries ?>
<?php

# now get the population and responsdent counts for each year
$yearsToSample = $yearcombos[$params['yearselector']];


foreach ( $yearsToSample as $yearcode ) {

    # strings to hold the statement text
    $empsizestm = '';
    if ( $yearcode < '1112') {
        $empsizes = $empwheres['orgsizes']; 
    } else {
        $empsizes = $empwheres['orgsizes1112']; 
    }
    

    # strings to hold the parameters for binding
    $p1 = '';
    $ps = '';
    $p3 = '';

    $whereclause2 = $whereclause.getempclause($yearcode, $empparams, $params, $empwheres);

    if ($yearcode > '1011') {
        $whereclause2 = str_replace('XQMODE01', "popdlhe$yearcode.XQMODE01", $whereclause2);
        $whereclause2 = str_replace('HOMEEU', 'HOMEEUOS', $whereclause2);
        $whereclause2 = str_replace('SOCDLHE', 'SOCDLHE2010', $whereclause2);
    }

    $whereclause2 .= " AND EMPSIZE <> 'X'";

    if ( $yearcode > '1011' ) {
        $whereclause2 = str_replace('EMPSIZE', 'ZNOEMPBAND', $whereclause2);
    }


    if ( $params['filtertype'] == 'school' ) {

#        $popstm = "SELECT HUSID FROM popdlhe$yearcode $whereclause";
        $empsizestm = "SELECT HUSID FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
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
            $empsizestm = "SELECT DISTINCT(HUSID) FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
        } else {
            $whereclause2 = str_replace('LEV1', 'XJACSLEV101_1', $whereclause2);
            $whereclause2 = str_replace('LEV2', 'XJACSLEV201_1', $whereclause2);
            $whereclause2 = str_replace('LEV3', 'XJACSLEV301_1', $whereclause2);

            $empsizestm = "SELECT HUSID FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
        }
#        $popstm = "SELECT distinct HUSID FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd $whereclause";
        $p1 = $j1;
        $p2 = $j2;
        $p3 = $j3;

    }

    # now prform the queries

    # first total population count
    $pst = mysqli_prepare( $con, $empsizestm );
#    echo "<p>$empsizestm</p>";
    mysqli_stmt_bind_param( $pst, 'sss', $p1, $p2, $p3 );
    mysqli_stmt_execute( $pst );
    mysqli_stmt_store_result( $pst );
    $cohorts[$yearcode] = mysqli_stmt_num_rows( $pst );

    # now get the counts for each employer size
    foreach ( $empsizes as $size => $sizedetails ) {

        $esstm = $empsizestm." AND (".$sizedetails['sql'].")";

        $estm = mysqli_prepare( $con, $esstm );
        mysqli_stmt_bind_param( $estm, 'sss', $p1, $p2, $p3 );
        mysqli_stmt_execute( $estm );
        mysqli_stmt_store_result( $estm );
        $empsizecounts[$yearcode][$size] = mysqli_stmt_num_rows( $estm );

        # now for 11/12 and later add the more granular bands
        if ( $yearcode > '1011' && array_key_exists('subset', $sizedetails) ) {
            foreach ($sizedetails['subset'] as $label => $sql) {
                $esstm2 = $empsizestm." AND ( $sql )";
                $estm2 = mysqli_prepare( $con, $esstm2 );
                mysqli_stmt_bind_param( $estm2, 'sss', $p1, $p2, $p3 );
                mysqli_stmt_execute( $estm2 );
                mysqli_stmt_store_result( $estm2 );
                $empsizecounts[$yearcode][$label] = mysqli_stmt_num_rows( $estm2 );
            }
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
        <title>Company sizes - GEMS</title>
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

<h2>Company sizes for the graduates you selected</h2>

<?php include 'table.php'; ?>

<br />
<br />

<table>
    <tr><th rowspan='2'>Company size</th>

<?php

$row1 = '';
$row2 = '';

foreach ( $yearsToSample as $yearcode ) {
    $row1 .= "<td colspan='2'>".$yearcodemap[$yearcode]." survey</td>";
    $row2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
}

echo "$row1</tr>$row2</tr>";


foreach ( $empwheres['orgsizes1112'] as $size => $sizedetails ) {

    if ( $size == 'all' ) { continue; }

    $tdattrs = '';
    if (in_array('1112', $yearsToSample) && array_key_exists('subset', $sizedetails)) { $tdattrs = " id='$size' class='tablerowtoggle'"; }

    echo "<tr><td$tdattrs>".$sizedetails['label']."</td>";

    foreach  ( $yearsToSample as $yearcode ) {
        $sizeperc = number_format( ($empsizecounts[$yearcode][$size] / $cohorts[$yearcode]) * 100, 1 );
        echo "<td>".$empsizecounts[$yearcode][$size]."</td><td>$sizeperc%</td>";
   }

    echo "</tr>";

    if (in_array('1112', $yearsToSample)) {
        if (array_key_exists('subset', $sizedetails)) {
            foreach ( $sizedetails['subset'] as $label => $sql ) {
                 echo "<tr class='subsect subs$size'><td>$label</td>";
                foreach ($yearsToSample as $yearcode) {
                    if ($yearcode < '1112') {
                        echo "<td colspan='2'>No data</td>";
                    } else {
                        $sizeperc = number_format( ($empsizecounts[$yearcode][$label] / $cohorts[$yearcode]) * 100, 1 );
                        echo "<td>".$empsizecounts[$yearcode][$label]."</td><td>$sizeperc%</td>";
                    }
                }
                echo "</tr>";
            }
        }
    }
}

$totalrow = "<tr><td>Total</td>";
foreach  ( $yearsToSample as $yearcode ) {
    $totalrow .= "<td colspan='2'>".$empsizecounts[$yearcode]['all']."</td>";
}
echo "$totalrow</tr>";

?>

</table>

<p><a href="index.php">Back to main page</a></p>

<?php include 'footer.php' ?>

        <?php include 'scripts.inc'; ?>

        <?php include 'analytics.php'; ?>
    </body>
</html>
