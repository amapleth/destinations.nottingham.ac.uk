<?php include 'details.php'; ?>
<?php include 'database.php'; ?>
<?php include 'lookups.php'; ?>

<?php

# intialise variables to store the data
$report = '';
$empcounts = array();
$empnames = array();
$siccounts = array();

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
    $empcounts[$yearcode] = array();
}

$cohort = 0;
$jobtitles = array();
$siccounts = array();

foreach ( $yearsToSample as $yearcode ) {

    # strings to hold the statement text
    $popstm = '';       # to get total cohort count
    $empcountstm = '';  # to get employer name and counts
    $jobtitlestm = '';  # to create hash of employer names => job titles
    $sicstm = '';       # to collect counts of each SIC

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

        $popstm = "SELECT HUSID FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
        $empcountstm = "SELECT DISTINCT (EMPNAME), COUNT(EMPNAME) as empcount FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2 GROUP BY EMPNAME";
        $jobtitlestm = "SELECT JOBTITLE, EMPNAME FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
        $sicstm = "SELECT HUSID, SIC2007 FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
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
            $popstm = "SELECT distinct HUSID FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd $whereclause2";
            $empcountstm = "SELECT DISTINCT(EMPNAME), COUNT(EMPNAME) as empcount FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2 GROUP BY EMPNAME";
            $jobtitlestm = "SELECT JOBTITLE, EMPNAME FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa  $whereclause2";
            $sicstm = "SELECT distinct HUSID, SIC2007 FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
        } else {
            $whereclause2 = str_replace('LEV1', 'XJACSLEV101_1', $whereclause2);
            $whereclause2 = str_replace('LEV2', 'XJACSLEV201_1', $whereclause2);
            $whereclause2 = str_replace('LEV3', 'XJACSLEV301_1', $whereclause2);
            $popstm = "SELECT distinct HUSID FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
            $empcountstm = "SELECT DISTINCT(EMPNAME), COUNT(EMPNAME) as empcount FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2 GROUP BY EMPNAME";
            $jobtitlestm = "SELECT JOBTITLE, EMPNAME FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
            $sicstm = "SELECT distinct HUSID, SIC2007 FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2";
        }
        $p1 = $j1;
        $p2 = $j2;
        $p3 = $j3;

    }


    # now prform the queries

    # first total population count
    $pst = mysqli_prepare( $con, $popstm );
#    echo "<p>$popstm</p>";
    mysqli_stmt_bind_param( $pst, 'sss', $p1, $p2, $p3 );
    mysqli_stmt_execute( $pst );
    mysqli_stmt_store_result( $pst );
    $cohort += mysqli_stmt_num_rows( $pst );

    # now list of employers with count
    $empst = mysqli_prepare( $con, $empcountstm );
#    echo "<p>$empcountstm <br /> $p1<br /> $p2<br /> $p3</p></p>";
    mysqli_stmt_bind_param( $empst, 'sss', $p1, $p2, $p3 );
    mysqli_stmt_execute( $empst );
    mysqli_stmt_store_result( $empst );
    mysqli_stmt_bind_result( $empst, $empname, $empcount );

    while ( mysqli_stmt_fetch( $empst ) ) {
        if ( $empname == 'XXXX' || $empname == '' ) { continue; }
        $empcounts[$yearcode][$empname] = $empcount;
        $empnames[$empname] = 1;
    }

    # now get jobtitles for each employers
    $jobtst = mysqli_prepare( $con, $jobtitlestm );
#    echo "<p>$jobtitlestm <br /> $p1<br /> $p2<br /> $p3</p>";
    mysqli_stmt_bind_param( $jobtst, 'sss', $p1, $p2, $p3 );
    mysqli_stmt_execute( $jobtst );
    mysqli_stmt_bind_result( $jobtst, $jobtitle, $empname );

    while ( mysqli_stmt_fetch( $jobtst ) ) {

        if ( $jobtitle == 'XXXX' ) { continue; }

        $jobtitles['all'][$jobtitle]++;

#        echo "<p>found for $empname : $jobtitle</p>";

        if ( array_key_exists($empname, $jobtitles)  && ( $jobtitles[$empname] != '' )  ) {
           $jobtitles[$empname] .= ", $jobtitle";
        } else if ( $jobtitle != '' ) {
            $jobtitles[$empname] = "$jobtitle";
        }

    }

    # initialise the total count for the SICs
    $siccounts[$yearcode]['total'] = 0;


    # now get the counts for the industrial classifications
    $sics = $empwheres['industries'];
    foreach ( $sics as $sic => $sicdetails ) {

        if ( $sic == 'all' ) { continue; }

        $istm = $sicstm." AND (".$sicdetails['sql'].")";
#        echo "<p>$istm<br />$p1 <br />$p2 <br />$p3</p>";
        $sicst = mysqli_prepare( $con, $istm );
        mysqli_stmt_bind_param( $sicst, 'sss', $p1, $p2, $p3 );
        mysqli_stmt_execute( $sicst );
        mysqli_stmt_store_result( $sicst );
        $siccount = mysqli_stmt_num_rows( $sicst );

        $siccounts[$yearcode][$sic]['count'] = $siccount;
        $siccounts[$yearcode]['total'] += $siccount;

        foreach ( $sicdetails['subinds'] as $subsic => $subsicdetails ) {
            $subistm = $sicstm." AND (".$subsicdetails['sql'].")";
            $subsicst = mysqli_prepare( $con, $subistm );
            mysqli_stmt_bind_param( $subsicst, 'sss', $p1, $p2, $p3 );
            mysqli_stmt_execute( $subsicst );
            mysqli_stmt_store_result( $subsicst );
            $subsiccount = mysqli_stmt_num_rows( $subsicst );
            $siccounts[$yearcode][$sic]['subsics'][$subsic]['count'] = $subsiccount;
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
        <title>Job details - GEMS</title>
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

<h2>Employer names for the graduates you selected</h2>

<?php include 'table.php'; ?>

<?php 

if ( $cohort >= $minsize ) {

    echo "<p><span id='emptabletoggle' class='vistoggle'>Hide/show employer name table</span>";

    if ($jobslink != 'no') {
        echo " | <span id='jobtitletoggle' class='vistoggle'>Show/hide job titles</span>";
    }

    echo "</p><div id='emptablediv'><table id='emptable'><tr><th>Employer</th>";

    foreach ( $yearsToSample as $yearcode ) {
        echo "<th>".$yearcodemap[$yearcode]."</th>";
    }

    if ( $jobslink != 'no' ) { 
        echo "<th class='jtdisp'>Job title</th>"; 
    }

    echo "</tr>";

    ksort($empnames);

    foreach ( $empnames as $empname => $flag ) {

        echo "<tr><td>$empname</td>";

        foreach ( $yearsToSample as $yearcode ) {
            $yearemps = $empcounts[$yearcode];
            if ( array_key_exists($empname, $yearemps) ) {
                echo "<td>".$empcounts[$yearcode][$empname]."</td>";
            } else {
                echo "<td></td>";
            }
        }

        if ( $jobslink != 'no' ) { 
            if ( array_key_exists($empname, $jobtitles) ) {
                echo "<td class='jtdisp'>$jobtitles[$empname]</td>"; 
            } else {
                echo "<td class='jtdisp'></td>";
            }
        }

        echo "</tr>\n";

    }

    echo "</table>";

    #if ( $cohort > 199 ) { echo "<p class='small'>Job titles have been suppressed as there are more than 200 in this cohort.</p>"; }

    echo "</div><!-- end emptablediv -->";

    if ( $jobslink == 'no' ) {

        echo "<h3>List of job titles for the graduates you selected</h3><ul>";

        $jts = $jobtitles['all'];

        ksort($jts);

        foreach ( $jts as $jt => $jtcount ) {

            if ( $jt == '' ) { continue; }

            echo "<li>$jt</li>";
        }


        echo "</ul>";
        
    }



    echo <<<HEREDOC
<table>
<tr>
    <th rowspan="2">Standard Industrial Classification</th>
HEREDOC;

    $headrow1 = '';
    $headrow2 = '<tr>';

    foreach ( $yearsToSample as $yearcode ) {
        $headrow1 .= "<th colspan='2'>".$yearcodemap[$yearcode]." survey</th>";
        $headrow2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
    }

    echo "$headrow1</tr>\n$headrow2</tr>";

    # now loop through the SICs and subSICs and make them into a nice table with accordions.
    $sics = $empwheres['industries'];
    foreach ( $sics as $sic => $sicdetails ) {

        if ( $sic == 'all' ) { continue; }

        echo "<tr><td id='$sic' class='tablerowtoggle'>".$sicdetails['label']."</td>";

        foreach ( $yearsToSample as $yearcode ) {

            $siccount = $siccounts[$yearcode][$sic]['count'];
            if ( $siccounts[$yearcode]['total'] > 0 ) {
                $sicpercent = number_format( ($siccount / $siccounts[$yearcode]['total']) * 100, 1 );
            } else {
                $sicpercent = '0';
            } 
            
            echo "<td>$siccount</td><td>$sicpercent%</td>";

        }

        echo "</tr>";

        foreach ($sicdetails['subinds'] as $subsic => $subsicdetails ) {

            echo "<tr class='subsect subs$sic'><td class='subindent'>".$subsicdetails['label']."</td>";
            
           foreach ( $yearsToSample as $yearcode ) {
                $subsiccount = $siccounts[$yearcode][$sic]['subsics'][$subsic]['count'];
                if ( $siccounts[$yearcode]['total'] > 0 ) {
                    $subsicpercent = number_format( ($subsiccount / $siccounts[$yearcode]['total']) * 100, 1 );
                } else {
                    $subsicpercent = '0';
                } 
                echo "<td>$subsiccount</td><td>$subsicpercent%</td>";

            }

            echo "</tr>\n\n";

        }




    }

    echo "<tr><td>Total</td>";
    foreach ( $yearsToSample as $yearcode ) {
        echo "<td colspan='2'>".$siccounts[$yearcode]['total']."</td>";
    }
    echo "</tr></table>";

} else {
    echo "<p><strong>There are too few graduates in your chosen population, please go back and re-select.</strong></p>";
}

#print_r( $siccounts ); 

?>

<div id='pleasewait'>
    <p>Please wait</p>
</div>

<p><a href="index.php">Back to main page</a></p>

<?php include 'footer.php' ?>

        <?php include 'scripts.inc'; ?>

        <script type="text/javascript">

        $(document).ready( function() {

            $(".vistoggles").show();

            $("#emptabletoggle").click( function() {
               $("#emptablediv").slideToggle(400);
            });

            $("#jobtitletoggle").click( function() {

                $("#pleasewait").show( function() {
                    $("#pleasewait").fadeOut(400);
                    $(".jtdisp").toggleClass('jtdisphid');

                });

            });

        });      

        </script>

       <?php include 'analytics.php'; ?>
    </body>
</html>
