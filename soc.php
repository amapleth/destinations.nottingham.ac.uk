<?php include 'details.php'; ?>
<?php include 'database.php'; ?>
<?php include 'lookups.php'; ?>
<?php

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

# intialise variables to store the data
$report = '';
$dlhecounts = array();
$cohorts = array();
$jtcounts = array();
$empnames = array();

#$whereclause .= " AND SOCDLHE <> 'X'";
$sdvar = '';

foreach ( $yearsToSample as $yearcode ) {

    # strings to hold the statement text
    $socdlhe = '';          # to get contract types
    if ($yearcode > '1011') {
        $sdvar = 'SOCDLHE2010';
    } else {
        $sdvar = 'SOCDLHE';
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

    if ( $params['filtertype'] == 'school' ) {

        $socdlhe = "SELECT $sdvar, JOBTITLE, EMPNAME FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2 AND $sdvar <> 'X'";
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
            $socdlhe = "SELECT DISTINCT(HUSID), $sdvar, JOBTITLE, EMPNAME FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2 AND $sdvar <> 'X'";
        } else {
            $whereclause2 = str_replace('LEV1', 'XJACSLEV101_1', $whereclause2);
            $whereclause2 = str_replace('LEV2', 'XJACSLEV201_1', $whereclause2);
            $whereclause2 = str_replace('LEV3', 'XJACSLEV301_1', $whereclause2);

            $socdlhe = "SELECT DISTINCT(HUSID), $sdvar, JOBTITLE, EMPNAME FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2 AND $sdvar <> 'X'";

        }
        
        $p1 = $j1;
        $p2 = $j2;
        $p3 = $j3;

    }

    # first total population count
    $pst = mysqli_prepare( $con, $socdlhe );
#    echo "<p>$socdlhe</p>";
    mysqli_stmt_bind_param( $pst, 'sss', $p1, $p2, $p3 );
    mysqli_stmt_execute( $pst );
    mysqli_stmt_store_result( $pst );
#    $cohorts[$yearcode] = mysqli_stmt_num_rows( $pst );
    $cohorts[$yearcode] = 0;

    # now get the counts for SOCs
    foreach ( $jobtitles as $soc => $socdetails ) {

        $cstm = $socdlhe." AND ( LEFT($sdvar, 1)='".$socdetails['code']."')";
        $cst = mysqli_prepare( $con, $cstm );
        mysqli_stmt_bind_param( $cst, 'sss', $p1, $p2, $p3 );
        mysqli_stmt_execute( $cst );
        mysqli_stmt_store_result( $cst );
        $dlhecounts[$yearcode][$soc]['count'] = mysqli_stmt_num_rows( $cst );
        $cohorts[$yearcode] += mysqli_stmt_num_rows( $cst );


        foreach ( $socdetails['subset'] as $subsoc => $subdetails ) {
            $substm = $socdlhe." AND ( LEFT($sdvar, 3)='".$subdetails['code']."')";
            $sst = mysqli_prepare( $con, $substm );
            mysqli_stmt_bind_param( $sst, 'sss', $p1, $p2, $p3 );
            mysqli_stmt_execute( $sst );
            mysqli_stmt_store_result( $sst );
            $dlhecounts[$yearcode][$soc]['subset'][$subsoc]['count'] = mysqli_stmt_num_rows( $sst );

            foreach ( $subdetails['subset'] as $subsubsoc => $subsubdetails ) {
#                print_r( $subsubdetails );
                $subsubstm = $socdlhe." AND ( LEFT($sdvar, 5)='".$subsubdetails."')";
                $ssst = mysqli_prepare( $con, $subsubstm );
                mysqli_stmt_bind_param( $ssst, 'sss', $p1, $p2, $p3 );
                mysqli_stmt_execute( $ssst );
                mysqli_stmt_store_result( $ssst );
                $dlhecounts[$yearcode][$soc]['subset'][$subsoc]['subset'][$subsubsoc]['count'] = mysqli_stmt_num_rows( $ssst );

                mysqli_stmt_bind_result( $ssst, $dlhecode, $jobtitle, $empname );
                $dlhecounts[$yearcode][$soc]['subset'][$subsoc]['subset'][$subsubsoc]['jobtitles'] = array();
                $jtcounts[$subsubsoc] = array();

                while ( mysqli_stmt_fetch( $ssst ) ) {
                    if ( $empname != 'XXXX' ) {
                        $empnames[$subsubsoc][$empname] = 1;
                    }
                    $jtarray = $dlhecounts[$yearcode][$soc]['subset'][$subsoc]['subset'][$subsubsoc]['jobtitles'];
                    if ( array_key_exists($jobtitle, $jtarray) ) {
                        $dlhecounts[$yearcode][$soc]['subset'][$subsoc]['subset'][$subsubsoc]['jobtitles'][$jobtitle]++;
                    } else {
                        $dlhecounts[$yearcode][$soc]['subset'][$subsoc]['subset'][$subsubsoc]['jobtitles'][$jobtitle] = 1;
                    }
                    if ( array_key_exists($jobtitle, $jtcounts[$subsubsoc]) ) {
                        $jtcounts[$subsubsoc][$jobtitle]++;
                    } else {
                        $jtcounts[$subsubsoc][$jobtitle] = 1;
                    }
                }

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
        <title>Occupational categories - GEMS</title>
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

<h2>Occupational categories for the graduates you selected</h2>

<?php include 'table.php'; ?>

<br />
<br />

<table>
    <tr><th rowspan='2'>Occupational Catergory</th>

<?php

$row1 = '';
$row2 = '';
$row3 = '';

$empnametable = <<<HEREDOC
<table><tr><th>Occupational areas</th>
HEREDOC;

foreach ( $yearsToSample as $yearcode ) {
    $row1 .= "<td colspan='2'>".$yearcodemap[$yearcode]." survey</td>";
    $row2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
    $row3 .= "<th>".$yearcodemap[$yearcode]." survey</th>";
}

echo "$row1</tr>$row2</tr>";
$empnametable .= "$row3<th>Employers</th></tr>";

foreach ( $jobtitles as $soc => $socdetails ) {
    $socid = substr($socdetails['code'], 0, 1);
    echo "<tr><td class='tablerowtoggle' id='cat$socid'>$soc</td>";
    foreach ($yearsToSample as $yearcode) {
        $soccount = $dlhecounts[$yearcode][$soc]['count'];
        $socperc = number_format( ( $dlhecounts[$yearcode][$soc]['count'] / $cohorts[$yearcode] ) * 100, 1);
        echo "<td id='subs$socid'>$soccount</td><td>$socperc%</td>";
    }
    echo "</tr>";
    foreach ( $socdetails['subset'] as $subsoc => $subdetails ) {
        $subid =  substr($subdetails['code'], 0, 3);
        echo "<tr class='subsect subscat$socid'><td class='tablerowtoggle subindent' id='cat$subid'>$subsoc</td>";
        foreach ($yearsToSample as $yearcode) {
            $subcount = $dlhecounts[$yearcode][$soc]['subset'][$subsoc]['count'];
            echo "<td>$subcount</td><td></td>";
        }
        echo "</tr>";
        foreach ($subdetails['subset'] as $subsubsoc => $code) {
            echo "<tr class='subsubsect subscat$subid'><td class='tablerowtoggle subsubindent' id='cat$code'>$subsubsoc</td>";
            $empnametable .= "<tr><td>$subsubsoc</td>";
            foreach ($yearsToSample as $yearcode) {
                $subsubcount = $dlhecounts[$yearcode][$soc]['subset'][$subsoc]['subset'][$subsubsoc]['count'];
                echo "<td>$subsubcount</td><td></td>";
                $empnametable .=  "<td>$subsubcount</td>";
            }
            $empnamelist = '';
            if ( array_key_exists($subsubsoc, $empnames) ) {
                $empnamelist = implode( ', ', array_keys($empnames[$subsubsoc]) );               
            }
            $empnametable .= "<td>$empnamelist</td></tr>";
            echo "</tr>";
            foreach ( $jtcounts[$subsubsoc] as $jobtitle => $count ) {
                echo "<tr class='subscat$code subsubsubsect'><td class='subsubsubindent'>$jobtitle</td>";
                foreach ($yearsToSample as $yearcode) {
                    $jtcount = 0;
                    $jtarr = $dlhecounts[$yearcode][$soc]['subset'][$subsoc]['subset'][$subsubsoc]['jobtitles'];
                    if (array_key_exists($jobtitle, $jtarr)) {
                        $jtcount = $jtarr[$jobtitle];
                    }
                    echo "<td>$jtcount</td><td></td>";
                }
                echo "</tr>";
            }
        }
    }

}

echo "<tr><td>Total</td>";

foreach ($yearsToSample as $yearcode) {
    echo "<td colspan='2'>".$cohorts[$yearcode]."</td>";
}

echo <<<HEREDOC
</tr></table>
$empnametable
</table>
HEREDOC;


?>




<p><a href="index.php">Back to main page</a></p>

<?php include 'footer.php' ?>

        <?php include 'scripts.inc'; ?>

        <?php include 'analytics.php'; ?>
    </body>
</html>
