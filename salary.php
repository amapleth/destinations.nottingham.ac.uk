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
$allowedparams = array('filtertype', 'school', 'subject', 'course', 'jacs1', 'jacs2', 'jacs3', 'yearselector', 'FTorPT', 'UGorPG', 'level', 'homeeu', 'emptypes', 'emplevels', 'qualuses', 'industries', 'orgsizes', 'socs');
$filterparams = array('school', 'subject', 'course', 'jacs1', 'jacs2', 'jacs3');
$popparams = array('FTorPT', 'UGorPG', 'level', 'homeeu');

?>
<?php include 'querybuilder.php'; # next stage build the basic query strings ?>
<?php include 'empquerybuilder.php'; # add advanced options for employer queries ?>
<?php

# now get the population and responsdent counts for each year
$yearsToSample = $yearcombos[$params['yearselector']];

$salcounts = array();
$cohorts = array();
$schoolcounts = array();
$subcounts = array();
$coursecounts = array();
$cohort = 0;

foreach ( $yearsToSample as $yearcode ) {

    # strings to hold the statement text
    $popstm = '';           # to get total FTE cohort size
    $salstm = '';           # to get salary numbers
    $salarysum = 0;         # to tot up all salaries in order to caluclate the mean
    $salarray = array();    #to hold list of salaries to calulate the median

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

    $cohwhere = '';
    $salwhere = '';

    if ($yearcode < '1112' ) {
        $cohwhere = " AND (EMPCIR = '1' OR EMPCIR = '01')";
        $salwhere = " AND SALARY <> 'XXXXXX' AND SALARY > 0 AND (EMPCIR = '1' OR EMPCIR = '01')";
    } else {
        $cohwhere = " AND (ALLACT1 = '1' OR ALLACT2 = '1' OR ALLACT3 = '1' OR ALLACT4 = '1' OR ALLACT5 = '1' OR ALLACT6 = '1' OR ALLACT7 = '1' OR ALLACT8 = '1')";
        $salwhere = " AND SALARY <> 'XXXXXX' AND SALARY > 0 AND (ALLACT1 = '1' OR ALLACT2 = '1' OR ALLACT3 = '1' OR ALLACT4 = '1' OR ALLACT5 = '1' OR ALLACT6 = '1' OR ALLACT7 = '1' OR ALLACT8 = '1')";
    }

    if ( $params['filtertype'] == 'school' ) {

        $popstm = "SELECT SALARY FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2 $cohwhere";
        $salstm = "SELECT SALARY FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2 $salwhere";
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
            $popstm = "SELECT SALARY FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2 $cohwhere";
            $salstm = "SELECT SALARY FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2 $salwhere";
        } else {
            $whereclause2 = str_replace('LEV1', 'XJACSLEV101_1', $whereclause2);
            $whereclause2 = str_replace('LEV2', 'XJACSLEV201_1', $whereclause2);
            $whereclause2 = str_replace('LEV3', 'XJACSLEV301_1', $whereclause2);
 
            $popstm = "SELECT SALARY FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2 $cohwhere";
            $salstm = "SELECT SALARY FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause2 $salwhere";
        }
        $p1 = $j1;
        $p2 = $j2;
        $p3 = $j3;

    }

#    echo "<p>$popstm</p>";

    # now prform the queries

    # first total population count
    $pst = mysqli_prepare( $con, $popstm );
#    echo "<p>$popstm</p>";
    mysqli_stmt_bind_param( $pst, 'sss', $p1, $p2, $p3 );
    mysqli_stmt_execute( $pst );
    mysqli_stmt_store_result( $pst );
    $cohorts[$yearcode] = mysqli_stmt_num_rows( $pst );
    $cohort += mysqli_stmt_num_rows( $pst );

    # now get the number who gave a salary
    $salstmord =  $salstm." ORDER BY (SALARY+0)";
#    echo "<p>$yearcode:<br />$salstmord<br />$p1<br />$p2<br />$p3</p>";
    $sst = mysqli_prepare( $con, $salstmord );
    mysqli_stmt_bind_param( $sst, 'sss', $p1, $p2, $p3 );
    mysqli_stmt_execute( $sst );
    mysqli_stmt_store_result( $sst );
    $salcounts[$yearcode]['total'] = mysqli_stmt_num_rows( $sst );

    # and then cycle through the salaries
    mysqli_stmt_bind_result( $sst, $salary );
    while ( mysqli_stmt_fetch( $sst ) ) {
        $salarysum += $salary;
        array_push( $salarray, $salary );
     }

    # get the mean salary
    $salcounts[$yearcode]['sum'] = $salarysum;
    $salcounts[$yearcode]['mean'] = number_format( round( $salarysum / $salcounts[$yearcode]['total'], -2) );

    $salcounts[$yearcode]['array'] = $salarray;

    // echo "<p>Salaries for $yearcode</p>";
    // print_r( $salarray );

    // echo "<p>Number of salaries stated for $yearcode: ".$salcounts[$yearcode]['total']." - ";

    # get the median salary
    if ( $salcounts[$yearcode]['total'] % 2 == 1 ) {

        // echo " odd</p>";

        # odd number of salaries so just take the central value from $salarray
        $i = ( (count($salarray) / 2) + 0.5 ) - 1;
        // echo "<p>Getting value of salary $i in array: ".number_format( $salarray[$i], -2)."</p>";
        $salcounts[$yearcode]['median'] = number_format( $salarray[$i], -2);
 
    } else {

        // echo " even!</p>";

        # even number of salaries so split the difference between the two central values
        $j = count($salarray) / 2;
        $i = $j-1;
        // echo "<p>Getting difference between salary $i (".$salarray[$i].") and salary $j (".$salarray[$j].") in array: ".number_format( ( $salarray[$i] + $salarray[$j] ) / 2, -2)."</p>";
        $salcounts[$yearcode]['median'] = number_format( ( $salarray[$i] + $salarray[$j] ) / 2, -2); 

    }


    # now get the counts for each salary band
    foreach ( $salarybands as $band => $bounds ) {

        $bandst = $salstm." AND ( SALARY >= ".$bounds['low']." AND SALARY < ".$bounds['high']." )";
        $bst = mysqli_prepare($con, $bandst );
        mysqli_stmt_bind_param( $bst, 'sss', $p1, $p2, $p3 );
        mysqli_stmt_execute( $bst );
        mysqli_stmt_store_result( $bst );
        $salcounts[$yearcode][$band] = mysqli_stmt_num_rows( $bst );

    }

    if ( $params['filtertype'] == 'school' && $params['school'] != '%' ) {

        # generate the comparison counts for all the schools
        # first get the list of schools
        $schoolresult = mysqli_query($con, "SELECT DISTINCT(SCHOOL) as school FROM popdlhe$yearcode ORDER BY SCHOOL");


        while ( $schoolhit = mysqli_fetch_array( $schoolresult ) ) {
            $school = $schoolhit[0];

            $salsum = 0;
            $salarray2 = array();

            if ($school == '') { continue; }

            # now get the number who gave a salary
            $salstmord =  $salstm." ORDER BY (SALARY+0)";
#            echo "<p>$salstmord</p>";
            $sst = mysqli_prepare( $con, $salstmord );
            mysqli_stmt_bind_param( $sst, 'sss', $school, $p2, $p3 );
            mysqli_stmt_execute( $sst );
            mysqli_stmt_store_result( $sst );
            $schoolcounts[$school][$yearcode]['total'] = mysqli_stmt_num_rows( $sst );

            # and then cycle through the salaries
            mysqli_stmt_bind_result( $sst, $salary );
            while ( mysqli_stmt_fetch( $sst ) ) {
                $salsum += $salary;
                array_push( $salarray2, $salary );
             }

            # get the mean salary
            $schoolcounts[$school][$yearcode]['sum'] = $salsum;
            $schoolcounts[$school][$yearcode]['mean'] = number_format( round( $salsum / $schoolcounts[$school][$yearcode]['total'], -2) );

            $schoolcounts[$school][$yearcode]['array'] = $salarray2;

            # get the median salary
            if ( $schoolcounts[$school][$yearcode]['total'] % 2 == 1 ) {

                # odd numbewr of salaries so just take the central value from $salarray2
                $i = ( (count($salarray2) / 2) + 0.5 ) -1;
                $schoolcounts[$school][$yearcode]['median'] = number_format( $salarray2[$i], -2);

            } else {

                # even number of salaries so split the difference between the two central values
                $j = count($salarray2) / 2;
                $i = $j-1;
                $schoolcounts[$school][$yearcode]['median'] = number_format( ( $salarray2[$i] + $salarray2[$j] ) / 2, -2); 

             }
             

        }

        if ( $params['subject'] != '%' ) {

            # get the other subjects in the school for a comparison table
            $subst = mysqli_prepare($con, "SELECT DISTINCT(SUBJECT) as subject FROM popdlhe$yearcode WHERE SCHOOL = ? ORDER BY SUBJECT");
            mysqli_stmt_bind_param( $subst, 's', $params['school']);
            mysqli_stmt_execute( $subst );
            mysqli_stmt_store_result( $subst );
            mysqli_stmt_bind_result( $subst, $subject );

            while ( mysqli_stmt_fetch( $subst ) ) {

                $salsum2 = 0;
                $salarray3 = array();

                if ( $subject == '' ) { continue; }

                # now get the number who gave a salary
                $salstmord = $salstm." ORDER BY (SALARY+0)";
#                echo "<p>$salstmord<br />$school<br />$subject<br />$p3</p>";
                $sst = mysqli_prepare( $con, $salstmord );
                mysqli_stmt_bind_param( $sst, 'sss', $params['school'], $subject, $p3 );
                mysqli_stmt_execute( $sst );
                mysqli_stmt_store_result( $sst );
                $subcounts[$subject][$yearcode]['total'] = mysqli_stmt_num_rows( $sst );
#                echo "<p>".$params['school']." / $subject / $yearcode ".mysqli_stmt_num_rows( $sst )."</p>";

                # and then cycle through the salaries
                mysqli_stmt_bind_result( $sst, $salary );
                while ( mysqli_stmt_fetch( $sst ) ) {
                    $salsum2 += $salary;
                    array_push( $salarray3, $salary );
                 }

                # get the mean salary
                $subcounts[$subject][$yearcode]['sum'] = $salsum2;
                $subcounts[$subject][$yearcode]['mean'] = number_format( round( $salsum2 / $subcounts[$subject][$yearcode]['total'], -2) );

                $subcounts[$subject][$yearcode]['array'] = $salarray3;

                # get the median salary
                if ( $subcounts[$subject][$yearcode]['total'] % 2 == 1 ) {

                    # odd numbewr of salaries so just take the central value from $salarray3
                    $i2 = ( (count($salarray3) / 2) + 0.5 ) - 1;
                    $subcounts[$subject][$yearcode]['median'] = number_format( $salarray3[$i2], -2);

                } else {

                    # even number of salaries so split the difference between the two central values
                    $j2 = count($salarray3) / 2;
                    $i2 = $j2-1;
                    $subcounts[$subject][$yearcode]['median'] = number_format( ( $salarray3[$i2] + $salarray3[$j2] ) / 2, -2); 

                }
                

            }


            if ( $params['course'] != '%' ) {


                # get the other courses in the subject for a comparison table
                $coust = mysqli_prepare($con, "SELECT DISTINCT(COURSE) as course FROM popdlhe$yearcode WHERE SCHOOL = ? AND SUBJECT = ? ORDER BY COURSE");
                mysqli_stmt_bind_param( $coust, 'ss', $params['school'], $params['subject']);
                mysqli_stmt_execute( $coust );
                mysqli_stmt_store_result( $coust );
                mysqli_stmt_bind_result( $coust, $course );

                while ( mysqli_stmt_fetch( $coust ) ) {

                    $salsum3 = 0;
                    $salarray4= array();

                    if ( $course == '' ) { continue; }

                    # now get the number who gave a salary
                    $salstmord =  $salstm." ORDER BY (SALARY+0)";
                    $sst = mysqli_prepare( $con, $salstmord );
                    mysqli_stmt_bind_param( $sst, 'sss', $params['school'], $params['subject'], $course );
                    mysqli_stmt_execute( $sst );
                    mysqli_stmt_store_result( $sst );
                    $coursecounts[$course][$yearcode]['total'] = mysqli_stmt_num_rows( $sst );

                    # and then cycle through the salaries
                    mysqli_stmt_bind_result( $sst, $salary );
                    while ( mysqli_stmt_fetch( $sst ) ) {
                        $salsum3 += $salary;
                        array_push( $salarray4, $salary );
                        // if ( $course == 'MSc in Finance (full-time)' ) {
                        //     echo "<p>$course / $yearcode / $salary</p>";
                        // }

                     }

                    # get the mean salary
                    $coursecounts[$course][$yearcode]['sum'] = $salsum3;
                    $coursecounts[$course][$yearcode]['mean'] = number_format( round( $salsum3 / $coursecounts[$course][$yearcode]['total'], -2) );

                    $coursecounts[$course][$yearcode]['array'] = $salarray4;

                    # get the median salary
                    if ( $coursecounts[$course][$yearcode]['total'] % 2 == 1 ) {

                        # odd numbewr of salaries so just take the central value from $salarray4
                        $i3 = ( (count($salarray4) / 2) + 0.5 ) - 1;
                        $coursecounts[$course][$yearcode]['median'] = number_format( $salarray4[$i3], -2);

                    } else {

                        # even number of salaries so split the difference between the two central values
                        $j3 = count($salarray4) / 2;
                        $i3 = $j3-1;
                        $coursecounts[$course][$yearcode]['median'] = number_format( ( $salarray4[$i3] + $salarray4[$j3] ) / 2, -2); 

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
        <title>Salary</title>
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

<h2>Salary for the graduates you selected (Full Time Employment only)</h2>

<?php include 'table.php'; ?>

<br />
<br />

<?php

if ($cohort >= $minsize ) {

?>

<table>
    <tr><th>Survey</th><th>Number in FT employment</th><th>Number elected to state salary</th><th>Mean salary</th><th>Median salary</th></tr>

<?php

foreach ( $yearsToSample as $yearcode ) {
    echo "<td>".$yearcodemap[$yearcode]."</td><td>".$cohorts[$yearcode]."</td><td>".$salcounts[$yearcode]['total']."</td><td>&pound;".$salcounts[$yearcode]['mean']."</td><td>&pound;".$salcounts[$yearcode]['median']."</td></tr>";
}

?>


</table>

<h3>Further breakdown</h3>

<table>
    <tr>
        <th>Survey</th>

<?php

foreach ( $salarybands as $band => $bounds ) {
    $upper = $bounds['high'] - 1;
    if ( $band == 'k' ) { $upper = 'and higher'; }
    echo "<th>&pound;".$bounds['low'];
    if ( $band == 'k' ) { 
        echo ' and higher'; 
    } else {
        echo " - &pound;$upper</th>";
    }
}

foreach ( $yearsToSample as $yearcode ) {

    echo "<tr><td>".$yearcodemap[$yearcode]."</td>";

    foreach ( $salarybands as $band => $bounds ) {
        echo "<td>".$salcounts[$yearcode][$band]."</td>";
    }

    echo "</tr>";

}

?>

    </tr>

</table>

<?php 

if ( $params['filtertype'] == 'school' && $params['school'] != '%' ) {
    # we need to write comaprison tables
    echo <<<HEREDOC
<br />
<table><tr><th rowspan='2'>Comparison groups (all graduates)</th>
HEREDOC;

    $yearrow1 = '';
    $yearrow2 = '<tr>';

    foreach ($yearsToSample as $yearcode) {
        $yearrow1 .= "<th colspan='3'>".$yearcodemap[$yearcode]." Survey</th>";
        $yearrow2 .= "<td class='small'>No</td><td class='small'>Mean</td><td class='small'>Median</td>";
    }

    $yearrow1 .= "</tr>";
    $yearrow2 .= "</tr>";
    echo $yearrow1.$yearrow2;

    foreach ( $schoolcounts as $school => $schooldetails ) {

        if ( $school != $params['school'] && $params['subject'] != '%' ) { continue; }

        echo "<tr><td>$school</td>";

        foreach ($yearsToSample as $yearcode) {

            if ( array_key_exists($yearcode, $schooldetails) ) {
                echo "<td>".$schooldetails[$yearcode]['total']."</td><td>&pound;".$schooldetails[$yearcode]['mean']."</td><td>&pound;".$schooldetails[$yearcode]['median']."</td>";
            } else {
                echo "<td>No data</td><td>No data</td><td>No data</td>";
            }

        }

        echo "</tr>";

    }

    echo "</table>";

    if ( $params['subject'] != '%' ) {

#        print_r($subcounts);

        # we need to write comaprison tables
        echo <<<HEREDOC
<br />
<table><tr><th rowspan='2'>$option2</th>
HEREDOC;


        echo $yearrow1.$yearrow2;

        foreach ( $subcounts as $sub => $subdetails ) {

            if ( $sub != $params['subject'] && $params['course'] != '%' ) { continue; }

                echo "<tr><td>$sub</td>";

                foreach ($yearsToSample as $yearcode) {

                    if ( array_key_exists($yearcode, $subdetails) ) {
                        echo "<td>".$subdetails[$yearcode]['total']."</td><td>&pound;".$subdetails[$yearcode]['mean']."</td><td>&pound;".$subdetails[$yearcode]['median']."</td>";
                    } else {
                        echo "<td>No data</td><td>No data</td><td>No data</td>";
                    }

                }

                echo "</tr>";
        }

        echo "</table>";

        if ( $params['course'] != '%' ) {

#            print_r($coursecounts);

             # we need to write comaprison tables
            echo <<<HEREDOC
<br />
<table><tr><th rowspan='2'>$option3</th>
HEREDOC;

            // $yearrow1 = '';
            // $yearrow2 = '<tr>';

            // foreach ($yearsToSample as $yearccode) {
            //     $yearrow1 .= "<th colspan='3'>".$yearcodemap[$yearcode]." Survey</th>";
            //     $yearrow2 .= "<td class='small'>No</td><td class='small'>PO</td><td class='small'>GP</td>";
            // }

            $yearrow1 .= "</tr>";
            $yearrow2 .= "</tr>";
            echo $yearrow1.$yearrow2;

            foreach ( $coursecounts as $course => $coursedetails ) {


                echo "<tr><td>$course</td>";

                foreach ($yearsToSample as $yearcode) {

                    if ( array_key_exists($yearcode, $coursedetails) ) {
                        echo "<td>".$coursedetails[$yearcode]['total']."</td><td>&pound;".$coursedetails[$yearcode]['mean']."</td><td>&pound;".$coursedetails[$yearcode]['median']."</td>";
                    } else {
                        echo "<td>No data</td><td>No data</td><td>No data</td>";
                    }

                }

                echo "</tr>";
            
            }

            echo "</table>";
           
        }

    }

}

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
