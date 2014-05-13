<?php include 'details.php'; ?>
<?php include 'database.php'; ?>
<?php include 'lookups.php'; ?>
<?php

# intialise variables to store the data
$report = '';
$contcounts = array();
$cohorts = array();


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
    $popstm = '';           # to get total FTE cohort size
    $contstm = '';          # to get contract types

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

    if ( $params['filtertype'] == 'school' ) {

        $constm = "SELECT HUSID FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
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
            $constm = "SELECT DISTINCT(HUSID) FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
        } else {
            $whereclause2 = str_replace('LEV1', 'XJACSLEV101_1', $whereclause2);
            $whereclause2 = str_replace('LEV2', 'XJACSLEV201_1', $whereclause2);
            $whereclause2 = str_replace('LEV3', 'XJACSLEV301_1', $whereclause2);

            $constm = "SELECT DISTINCT(HUSID) FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
        }
        $p1 = $j1;
        $p2 = $j2;
        $p3 = $j3;

    }

    if ($yearcode < '1112') {
        $contracts = $empwheres['contracts'];
        $constm .= " AND DURATION <> 'X'";
    } else {
        $contracts = $empwheres['contracts1112'];
        $constm .= " AND EMPBASIS <> 'X' AND EMPBASIS != ''";
    }
    # now prform the queries

    # first total population count
    $pst = mysqli_prepare( $con, $constm );
#    echo "<p>$constm</p>";
    mysqli_stmt_bind_param( $pst, 'sss', $p1, $p2, $p3 );
    mysqli_stmt_execute( $pst );
    mysqli_stmt_store_result( $pst );
#    $cohorts[$yearcode] = 0;
    $cohorts[$yearcode] = mysqli_stmt_num_rows( $pst );

    # now get the counts for each employer size
    foreach ( $contracts as $contract => $contractdetails ) {

        $cstm = $constm." AND (".$contractdetails['sql'].")";
        $cst = mysqli_prepare( $con, $cstm );
#        if ($yearcode > '1011') {
#            echo "<p>".$contractdetails['label']." : $cstm</p>";
#        }
        mysqli_stmt_bind_param( $cst, 'sss', $p1, $p2, $p3 );
        mysqli_stmt_execute( $cst );
        mysqli_stmt_store_result( $cst );
        $contcounts[$yearcode][$contract] = mysqli_stmt_num_rows( $cst );
#        $cohorts[$yearcode] += mysqli_stmt_num_rows( $cst );

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
        <title>Contract types - GEMS</title>
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

<h2>Contract types for the graduates you selected</h2>

<?php include 'table.php'; ?>

<br />
<br />

<table>
    <tr><th rowspan='2'>Contract type</th>

<?php

$row1 = '';
$row2 = '';

foreach ( $yearsToSample as $yearcode ) {
    $row1 .= "<td colspan='2'>".$yearcodemap[$yearcode]." survey</td>";
    $row2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
}

echo "$row1</tr>$row2</tr>";

if ($yearcode < '1112') {
    $cts = $empwheres['contracts'];
} else {
    $cts = $empwheres['contracts1112'];
}


foreach ( $cts as $contract => $contractdetails ) {

    if ( $contract == 'all' ) { continue; }

    echo "<tr><td>".$contractdetails['label']."</td>";

    foreach  ( $yearsToSample as $yearcode ) {
        if (( $yearcode < '1112' && ($contract == 'ownbus' || $contract == 'voluntary' || $contract == 'internship' || $contract == 'portfolio') )) {
            echo "<td colspan='2'>N/A</td>";
        } elseif (( $yearcode > '1011' && ($contract == 'tempagency' || $contract == 'tempnoagency') )){
            echo "<td colspan='2'>N/A</td>";
#        } elseif ( $contract == 'unknown' ) { 
#            echo "<td colspan='2'>".$contcounts[$yearcode][$contract]."</td>";
        } else {
            $contperc = number_format( ($contcounts[$yearcode][$contract] / $cohorts[$yearcode]) * 100, 1 );
            echo "<td>".$contcounts[$yearcode][$contract]."</td><td>$contperc%</td>";
        }
   }

    echo "</tr>";
}

$totalrow = "<tr><td>Total</td>";
foreach  ( $yearsToSample as $yearcode ) {
    $totalrow .= "<td colspan='2'>".$contcounts[$yearcode]['all']."</td>";
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
