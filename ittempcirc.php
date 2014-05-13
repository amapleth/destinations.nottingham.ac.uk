<?php include 'details.php'; ?>
<?php include 'database.php'; ?>
<?php include 'lookups.php'; ?>

<?php 

# intialise variables to store the data
$report = '';
$popcounts = array();
$circcounts = array();
$stypecounts = array();
$slevcounts = array();
$scotcounts = array();

# now get the population and responsdent counts for each year
$yearsToSample = $yearcombos['s4'];
$tcvar = '';

foreach ( $yearsToSample as $yearcode ) {

    if ($yearcode > '1011') {
        $tcvar = 'EMPLDTEACH';
    } else {
        $tcvar = 'TCHEMP';
    }

    $basestm = "SELECT DISTINCT(HUSID) FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa WHERE popdlhe$yearcode.TTCID <> '0' AND $tcvar <> 'X'";

    # now prform the queries

    # first total population count
    $pst = mysqli_prepare( $con, $basestm );
    mysqli_stmt_execute( $pst );
    mysqli_stmt_store_result( $pst );
    $popcounts[$yearcode] = mysqli_stmt_num_rows( $pst );

    $circcounts[$yearcode]['total'] = 0;

    $stats = array();

    if ( $yearcode > '1011' ) {
        $stats = $statuses1112;
    } else {
        $stats = $statuses;
    }


    foreach ($stats as $label => $sql) {
        $statusstm = "$basestm AND ($sql)";
        $cst = mysqli_prepare( $con, $statusstm );
#        mysqli_stmt_bind_param( $cst, 's', $status );
        mysqli_stmt_execute( $cst );
        mysqli_stmt_store_result( $cst );
        $circcounts[$yearcode][$label] = mysqli_stmt_num_rows( $cst );
        $circcounts[$yearcode]['total'] += mysqli_stmt_num_rows( $cst );

    }

    $stypecounts[$yearcode]['total'] = 0;

    foreach ($schtypes as $type => $label) {
        $statusstm = '';
        if ($yearcode < '1112') {
            $statusstm = "$basestm AND TEACHSCT = ?";
        } else {
            $statusstm = "$basestm AND TEACHFUND = ?";            
        }
        $cst = mysqli_prepare( $con, $statusstm );
        mysqli_stmt_bind_param( $cst, 's', $type );
        mysqli_stmt_execute( $cst );
        mysqli_stmt_store_result( $cst );
        $stypecounts[$yearcode][$type] = mysqli_stmt_num_rows( $cst );
        $stypecounts[$yearcode]['total'] += mysqli_stmt_num_rows( $cst );

    }

    $slevcounts[$yearcode]['total'] = 0;

    foreach ($schlevs as $lev => $label) {
        $statusstm = "$basestm AND TEACHPHS = ?";
        $cst = mysqli_prepare( $con, $statusstm );
        mysqli_stmt_bind_param( $cst, 's', $lev );
        mysqli_stmt_execute( $cst );
        mysqli_stmt_store_result( $cst );
        $slevcounts[$yearcode][$lev] = mysqli_stmt_num_rows( $cst );
        $slevcounts[$yearcode]['total'] += mysqli_stmt_num_rows( $cst );

    }

    $scotcounts[$yearcode] = 0;    
    if ( $yearcode > '1011' ) {
        $scotst = mysqli_prepare( $con, $basestm." AND GTCSTIS = '1'");
#        mysqli_stmt_bind_param( $cst, 's', $lev );
        mysqli_stmt_execute( $cst );
        mysqli_stmt_store_result( $cst );
        $scotcounts[$yearcode] = mysqli_stmt_num_rows( $scotst );
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
        <title>ITTC Graduates status - GEMS</title>
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

<h2>ITTC Graduates status six months after graduation ...</h2>

<table>
    <tr>
        <th rowspan='2'>Teaching status</th>

<?php

$row1 = '';
$row2 = '';

foreach ($yearsToSample as $yearcode) {
    $row1 .= "<td colspan='2'>".$yearcodemap[$yearcode]." survey</td>";
    $row2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
}

echo "$row1</tr><tr>$row2</tr>";

foreach ($statuses as $label => $sql) {
    echo "<tr><td>$label</td>";
    foreach ($yearsToSample as $yearcode) {
        $scount = $circcounts[$yearcode][$label];
        $sperc = number_format( ($scount/$circcounts[$yearcode]['total']) * 100, 1 );
        echo "<td>$scount</td><td>$sperc%</td>";
    }
    echo "</tr>";
}

?>

</table>

<br />
<br />

<table>
    <tr>
        <th rowspan='2'>Type of School</th>

<?php

$row1 = '';
$row2 = '';

foreach ($yearsToSample as $yearcode) {
    $row1 .= "<td colspan='2'>".$yearcodemap[$yearcode]." survey</td>";
    $row2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
}

echo "$row1</tr><tr>$row2</tr>";

foreach ($schtypes as $type => $label) {
    echo "<tr><td>$label</td>";
    foreach ($yearsToSample as $yearcode) {

        $scount = $stypecounts[$yearcode][$type];
        $sperc = number_format( ($scount/$stypecounts[$yearcode]['total']) * 100, 1 );
        echo "<td>$scount</td><td>$sperc%</td>";

    }
    echo "</tr>";
}

?>

</table>

<br />
<br />

<table>
    <tr>
        <th rowspan='2'>Level of School</th>

<?php


$row1 = '';
$row2 = '';

foreach ($yearsToSample as $yearcode) {
    $row1 .= "<td colspan='2'>".$yearcodemap[$yearcode]." survey</td>";
    $row2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
}

echo "$row1</tr><tr>$row2</tr>";

foreach ($schlevs as $lev => $label) {
    echo "<tr><td>$label</td>";
    foreach ($yearsToSample as $yearcode) {
        $scount = $slevcounts[$yearcode][$lev];
        $sperc = number_format( ($scount/$slevcounts[$yearcode]['total']) * 100, 1 );
        echo "<td>$scount</td><td>$sperc%</td>";
    }
    echo "</tr>";
}



?>

</table>
<br />
<br />
<table>
    <tr>
        <td rowspan='2'class='blank'></td>

<?php

$row1 = '';
$row2 = '';

foreach ($yearsToSample as $yearcode) {
    $row1 .= "<td colspan='2'>".$yearcodemap[$yearcode]." survey</td>";
    $row2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
}

echo "$row1</tr><tr>$row2</tr>";

echo "<tr><th>Employed through GTC Scotland Teacher Induction Scheme</th>";
foreach ($yearsToSample as $yearcode) {
    if ( $yearcode < '1112' ) {
        echo "<td colspan='2'>No data</td>";
    } else {
        $scount = $scotcounts[$yearcode];
        $sperc = number_format( ($scount/$popcounts[$yearcode]) * 100, 1 );
        echo "<td>$scount</td><td>$sperc%</td>";
    }
}
echo "</tr>";



?>

</table>

<p><a href="index.php">Back to main page</a></p>

<?php include 'footer.php' ?>

        <?php include 'scripts.inc'; ?>

        <?php include 'analytics.php'; ?>

    </body>

</html>
