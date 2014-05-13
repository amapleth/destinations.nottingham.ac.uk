<?php include 'details.php'; ?>
<?php include 'database.php'; ?>
<?php include 'lookups.php'; ?>

<?php

# intialise variables to store the data
$report = '';
$popcounts = array();
$schoolcounts = array();
$subcounts = array();
$coursecounts = array();
$totalknown = array();

$diaghusids = array();

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



foreach ( $yearsToSample as $yearcode ) {

    $totalknown[$yearcode] = 0;

    # strings to hold the statement text
    $popstm = '';
    $respstm = '';
    $fullpopstm = '';
    $fullrespstm = '';

    # strings to hold the parameters for binding
    $p1 = '';
    $ps = '';
    $p3 = '';

    if ($yearcode > '1011') {
        $whereclause = str_replace('XQMODE01', "popdlhe$yearcode.XQMODE01", $whereclause);
        $whereclause = str_replace('HOMEEU', 'HOMEEUOS', $whereclause);
    }

    if ( $params['filtertype'] == 'school' ) {

        $popstm = "SELECT HUSID FROM popdlhe$yearcode $whereclause";
        $fullpopstm = "SELECT HUSID FROM popdlhe$yearcode $whereclause";
        $respstm = "SELECT HUSID FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause";
        $fullrespstm = "SELECT HUSID FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause";
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
            $popstm = "SELECT distinct HUSID FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd $whereclause";
            $fullpopstm = "SELECT distinct HUSID FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd $whereclause";
            $respstm = "SELECT distinct HUSID FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause";
            $fullrespstm = "SELECT distinct HUSID FROM popdlhe$yearcode INNER JOIN tqi$yearcode on popdlhe$yearcode.HUSID = tqi$yearcode.HUSIDd INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause";
        } else {
            $whereclause = str_replace('LEV1', 'XJACSLEV101_1', $whereclause);
            $whereclause = str_replace('LEV2', 'XJACSLEV201_1', $whereclause);
            $whereclause = str_replace('LEV3', 'XJACSLEV301_1', $whereclause);

            $popstm = "SELECT distinct HUSID FROM popdlhe$yearcode $whereclause";
            $respstm = "SELECT distinct HUSID FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause";
            $fullpopstm = "SELECT distinct HUSID FROM popdlhe$yearcode $whereclause";
            $fullrespstm = "SELECT distinct HUSID FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa $whereclause";
        }
        $p1 = $j1;
        $p2 = $j2;
        $p3 = $j3;

    }

    # now prform the queries

    # first total population count
    $pst = mysqli_prepare( $con, $popstm );
#    echo "<!-- $popstm -->\n\n";
    mysqli_stmt_bind_param( $pst, 'sss', $p1, $p2, $p3 );
    mysqli_stmt_execute( $pst );
    mysqli_stmt_store_result( $pst );
    $popcounts[$yearcode]['pop'] = mysqli_stmt_num_rows( $pst );

    # then total respondants
    $rst = mysqli_prepare( $con, $respstm );
#    echo "<p>$respstm<br />$p1<br />$p2<br />$p3 </p>\n\n";
    mysqli_stmt_bind_param( $rst, 'sss', $p1, $p2, $p3 );
    mysqli_stmt_execute( $rst );
    mysqli_stmt_store_result( $rst );
    $popcounts[$yearcode]['resp'] = mysqli_stmt_num_rows( $rst );

    $ec = array();

    if ( $yearcode < '1112' ) {
        $ec = $empcircs;
    } else {
        $ec = $empcircs1112;
    }

    foreach ( $ec as $emc => $modifier ) {
        $empstm = $respstm." AND ( ".$modifier." )";
        $est = mysqli_prepare( $con, $empstm ); 
        // if ( $yearcode == '1112' ) {
        //     echo "<p>$emc<br />$empstm</p>";      
        // }
#        echo "<p>$emc<br />$empstm<br />$p1<br />$p2<br />$p3</p>";
        mysqli_stmt_bind_param( $est, 'sss', $p1, $p2, $p3 );
        mysqli_stmt_execute( $est );
        mysqli_stmt_store_result( $est );
        $popcounts[$yearcode][$emc] = mysqli_stmt_num_rows( $est );
        if ($emc == 'refusal') { continue; }
        $totalknown[$yearcode] += $popcounts[$yearcode][$emc];
    }

    $popcounts[$yearcode]['pos'] = $popcounts[$yearcode]['ftemp']+$popcounts[$yearcode]['ptemp']+$popcounts[$yearcode]['workstudy']+$popcounts[$yearcode]['study'];

    $pc = array();

    if ( $yearcode < '1112' ) {
        $pc = $prospclauses;
    } else {
        $pc = $prospclauses1112;
    }

    foreach ( $pc as $prosp => $clause ) {
        $prospstm = $respstm." AND ( ".$clause." )";

        if ( $yearcode > '1011' ) {
            $prospstm = str_replace('SOCDLHE', 'SOCDLHE2010', $prospstm);
#             echo "<p>$prosp <br />$prospstm</p>";
        }


        // if ( $yearcode == '1112' ) {
        //     echo "<p>$prosp <br />$prospstm</p>";
        // }

        
        
        $prost = mysqli_prepare( $con, $prospstm );
        mysqli_stmt_bind_param( $prost, 'sss', $p1, $p2, $p3 );
        mysqli_stmt_execute( $prost );
        mysqli_stmt_store_result( $prost );
        $popcounts[$yearcode][$prosp] = mysqli_stmt_num_rows( $prost );

        // if ( $yearcode == '1112' ) {
        //     echo "<p>$prosp<br />$prospstm</p>";
        // }

        // if ( $yearcode == '1112' && $prosp == 'negemp' ) {

        //     echo "<p>$prospstm</p>";

        //     // echo "<p>$prosp count is : ".mysqli_stmt_num_rows( $prost )."</p>";
        //     mysqli_stmt_bind_result( $prost, $prosphusid, $prospsocdlhe, $prosptypequal, $prospmimpact );

        //     echo "<table><tr><th>HUSID</th><th>SOCDLHE</th><th>TYPEQUAL</th><th>MIMPACT</th></tr>";

        //     while ( mysqli_stmt_fetch( $prost ) ) {
        //         echo "<tr><td>$prosphusid</td><td>$prospsocdlhe</td><td>$prosptypequal</td><td>$prospmimpact</p></tr>";
        //     }

        //     echo "</table>";

        // }


        mysqli_stmt_bind_result($prost, $husid);

        while ( mysqli_stmt_fetch( $prost ) ) {
            $diaghusids[$yearcode][$prosp][] = $husid;
        }

#        if ( $yearcode > '1011' ) {
#            echo "<p>$prosp results: ".$popcounts[$yearcode][$prosp]."</p>";
#        }


    }

    $popcounts[$yearcode]['gradprosppos'] = $popcounts[$yearcode]['posemp']+$popcounts[$yearcode]['posstudy'];
    $popcounts[$yearcode]['gradprospneg'] = $popcounts[$yearcode]['negemp']+$popcounts[$yearcode]['negstudy'];#+$popcounts[$yearcode]['noemp'];

    // if ( $yearcode == '1112' ) {
    //     echo "<p>Positive graduate prospects = positive employment (".$popcounts[$yearcode]['posemp'].") + positive study (".$popcounts[$yearcode]['posstudy'].") : ".$popcounts[$yearcode]['gradprosppos']."</p>";
    //     echo "<p>Negative graduate prospects = negative employment (".$popcounts[$yearcode]['negemp'].") + negative study (".$popcounts[$yearcode]['negstudy'].") : ".$popcounts[$yearcode]['gradprospneg']."</p>";
    //     echo "<p>Graduate prospects percentage = postitive prospects / ( positive prospects + negative prospects )</p>";
    //     echo "<p>".$popcounts[$yearcode]['gradprosppos']." / (".$popcounts[$yearcode]['gradprosppos']." + ".$popcounts[$yearcode]['gradprospneg'].")</p>";
    //     $totesamoush = $popcounts[$yearcode]['gradprosppos']+$popcounts[$yearcode]['gradprospneg'];
    //     echo "<p>".$popcounts[$yearcode]['gradprosppos']." / $totesamoush</p>";
    //     $unrounded = $popcounts[$yearcode]['gradprosppos'] / $totesamoush;
    //     echo "<p>$unrounded</p>";
    //     echo "<p>Convertng to percentage and rounding</p>";
    //     $finalval = number_format( ( $unrounded * 100 ), 1 );
    //     echo "<p>$finalval%</p>";
    // }


    if ( $params['filtertype'] == 'school' && $params['school'] != '%' ) {

        # generate the comparison counts for all the schools
        # first get the list of schools
        $schoolresult = mysqli_query($con, "SELECT DISTINCT(SCHOOL) as school FROM popdlhe$yearcode ORDER BY SCHOOL");

        $wild = '%';

        while ( $schoolhit = mysqli_fetch_array( $schoolresult ) ) {
            $school = $schoolhit[0];

            if ($school == '') { continue; }

            

            # total respondants
            $srst = mysqli_prepare( $con, $fullrespstm );
            mysqli_stmt_bind_param( $srst, 'sss', $school, $wild, $wild );

            // if ( $yearcode > '1011' ) {
            //     echo "<p>$school Respondents : <br />$fullrespstm</p>";
            // }

            mysqli_stmt_execute( $srst );
            mysqli_stmt_store_result( $srst );
            $schoolcounts[$school][$yearcode]['resp'] = mysqli_stmt_num_rows( $srst );

            // if (mysqli_error($con)) {
            //     echo "<p>SQL error:<br /> ".mysqli_error($con)."</p>";
            // }

            foreach ( $ec as $emc => $modifier ) {
                $empstm = $fullrespstm." AND ( ".$modifier." )";
               $est = mysqli_prepare( $con, $empstm );
                // if ( $yearcode > '1011' ) {
                //     echo "<p>$school $emc : <br />$empstm</p>";
                // }
#                echo "<p>$school Emp: $empstm</p>";
                mysqli_stmt_bind_param( $est, 'sss', $school, $wild, $wild );
                mysqli_stmt_execute( $est );

                // if (mysqli_error($con)) {
                //     echo "<p>SQL error:<br /> ".mysqli_error($con)."</p>";
                // }

                
                mysqli_stmt_store_result( $est );
                $schoolcounts[$school][$yearcode][$emc] = mysqli_stmt_num_rows( $est );
            }

            foreach ( $pc as $prosp => $clause ) {
                $prospstm = $fullrespstm." AND ( ".$clause." )";

                if ( $yearcode > '1011' ) {
                    $prospstm = str_replace('SOCDLHE', 'SOCDLHE2010', $prospstm);

                }
#                echo "<p>Prosp: $prospstm</p>";
                $prost = mysqli_prepare( $con, $prospstm );
                mysqli_stmt_bind_param( $prost, 'sss', $school, $wild, $wild );
                mysqli_stmt_execute( $prost );
                mysqli_stmt_store_result( $prost );
                $schoolcounts[$school][$yearcode][$prosp] = mysqli_stmt_num_rows( $prost );

            }


            $schoolcounts[$school][$yearcode]['gradprosppos'] = $schoolcounts[$school][$yearcode]['posemp']+$schoolcounts[$school][$yearcode]['posstudy'];
            $schoolcounts[$school][$yearcode]['gradprospneg'] = $schoolcounts[$school][$yearcode]['negemp']+$schoolcounts[$school][$yearcode]['negstudy'];
            $schoolcounts[$school][$yearcode]['pos'] = $schoolcounts[$school][$yearcode]['ftemp']+$schoolcounts[$school][$yearcode]['ptemp']+$schoolcounts[$school][$yearcode]['workstudy']+$schoolcounts[$school][$yearcode]['study'];


        }

        if ( $params['subject'] != '%' ) {

            # get the other subjects in the school for a comparison table
            $subst = mysqli_prepare($con, "SELECT DISTINCT(SUBJECT) as subject FROM popdlhe$yearcode WHERE SCHOOL = ? ORDER BY SUBJECT");
            mysqli_stmt_bind_param( $subst, 's', $params['school']);
            mysqli_stmt_execute( $subst );
            mysqli_stmt_store_result( $subst );
            mysqli_stmt_bind_result( $subst, $subject );

            while ( mysqli_stmt_fetch( $subst ) ) {

                if ( $subject == '' ) { continue; }


                # total respondants
                $srst = mysqli_prepare( $con, $fullrespstm );
                mysqli_stmt_bind_param( $srst, 'sss', $params['school'], $subject, $wild );
                mysqli_stmt_execute( $srst );
                mysqli_stmt_store_result( $srst );
#                echo "<p>$fullrespstm<br />$school<br />$subject</p>";
                $subcounts[$subject][$yearcode]['resp'] = mysqli_stmt_num_rows( $srst );


                foreach ( $ec as $emc => $modifier ) {
                    $empstm = $fullrespstm." AND ( ".$modifier." )";
                    $est = mysqli_prepare( $con, $empstm );
    #                echo "<p>Emp: $empstm</p>";
                    mysqli_stmt_bind_param( $est, 'sss', $params['school'], $subject, $wild );
                    mysqli_stmt_execute( $est );
                    mysqli_stmt_store_result( $est );
                    $subcounts[$subject][$yearcode][$emc] = mysqli_stmt_num_rows( $est );
                }

                foreach ( $pc as $prosp => $clause ) {
                    $prospstm = $fullrespstm." AND ( ".$clause." )";

                    if ( $yearcode > '1011' ) {
                        $prospstm = str_replace('SOCDLHE', 'SOCDLHE2010', $prospstm);

                    }
                    $prost = mysqli_prepare( $con, $prospstm );
                    mysqli_stmt_bind_param( $prost, 'sss', $params['school'], $subject, $wild );
                    mysqli_stmt_execute( $prost );
                    mysqli_stmt_store_result( $prost );
                    $subcounts[$subject][$yearcode][$prosp] = mysqli_stmt_num_rows( $prost );

                }


                $subcounts[$subject][$yearcode]['gradprosppos'] = $subcounts[$subject][$yearcode]['posemp']+$subcounts[$subject][$yearcode]['posstudy'];
                $subcounts[$subject][$yearcode]['gradprospneg'] = $subcounts[$subject][$yearcode]['negemp']+$subcounts[$subject][$yearcode]['negstudy'];
                $subcounts[$subject][$yearcode]['pos'] = $subcounts[$subject][$yearcode]['ftemp']+$subcounts[$subject][$yearcode]['ptemp']+$subcounts[$subject][$yearcode]['workstudy']+$subcounts[$subject][$yearcode]['study'];

            }


            if ( $params['course'] != '%' ) {


                # get the other courses in the subject for a comparison table
                $coust = mysqli_prepare($con, "SELECT DISTINCT(COURSE) as course FROM popdlhe$yearcode WHERE SCHOOL = ? AND SUBJECT = ? ORDER BY COURSE");
                mysqli_stmt_bind_param( $coust, 'ss', $params['school'], $params['subject']);
                mysqli_stmt_execute( $coust );
                mysqli_stmt_store_result( $coust );
                mysqli_stmt_bind_result( $coust, $course );

                while ( mysqli_stmt_fetch( $coust ) ) {

                    if ( $course == '' ) { continue; }


                    # total respondants
                    $srst = mysqli_prepare( $con, $fullrespstm );
                    mysqli_stmt_bind_param( $srst, 'sss', $params['school'], $params['subject'], $course );
                    mysqli_stmt_execute( $srst );
                    mysqli_stmt_store_result( $srst );
                    $coursecounts[$course][$yearcode]['resp'] = mysqli_stmt_num_rows( $srst );


                    foreach ( $ec as $emc => $modifier ) {
                        $empstm = $fullrespstm." AND ( ".$modifier." )";
                        $est = mysqli_prepare( $con, $empstm );
#                        echo "<p>Emp: $empstm</p>";
                        mysqli_stmt_bind_param( $est, 'sss', $params['school'], $params['subject'], $course );
                        mysqli_stmt_execute( $est );
                        mysqli_stmt_store_result( $est );
                        $coursecounts[$course][$yearcode][$emc] = mysqli_stmt_num_rows( $est );
                    }

                    foreach ( $pc as $prosp => $clause ) {
                        $prospstm = $fullrespstm." AND ( ".$clause." )";

                        if ( $yearcode > '1011' ) {
                            $prospstm = str_replace('SOCDLHE', 'SOCDLHE2010', $prospstm);

                        }
        #                echo "<p>Prosp: $prospstm</p>";
                        $prost = mysqli_prepare( $con, $prospstm );
                        mysqli_stmt_bind_param( $prost, 'sss', $params['school'], $params['subject'], $course );
                        mysqli_stmt_execute( $prost );
                        mysqli_stmt_store_result( $prost );
                        $coursecounts[$course][$yearcode][$prosp] = mysqli_stmt_num_rows( $prost );

                    }


                    $coursecounts[$course][$yearcode]['gradprosppos'] = $coursecounts[$course][$yearcode]['posemp']+$coursecounts[$course][$yearcode]['posstudy'];
                    $coursecounts[$course][$yearcode]['gradprospneg'] = $coursecounts[$course][$yearcode]['negemp']+$coursecounts[$course][$yearcode]['negstudy'];
                    $coursecounts[$course][$yearcode]['pos'] = $coursecounts[$course][$yearcode]['ftemp']+$coursecounts[$course][$yearcode]['ptemp']+$coursecounts[$course][$yearcode]['workstudy']+$coursecounts[$course][$yearcode]['study'];

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
        <title>Employment circustances - GEMS</title>
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

<h2>Employment circumstances for the graduates you selected</h2>

<?php include 'table.php'; ?>


<?php 

$totalpop = 0;

foreach ( $yearsToSample as $yearcode ) {
    $totalpop += $popcounts[$yearcode]['pop'];
}

if ( $totalpop >= $minsize ) {

?>



<br />
<table>
    <tr><th>Survey</th><th>Population</th><th>Respondents</th><th>Response rate</th><th>Positive outcomes (PO)</th><th>Graduate prospects (GP)</th></tr>
<?php

foreach ( $yearsToSample as $yearcode ) {

    $pop = $popcounts[$yearcode]['pop'];
    $resp = $popcounts[$yearcode]['resp'];
    $pcresp = number_format( ($popcounts[$yearcode]['resp'] / $popcounts[$yearcode]['pop']) * 100, 1 );
    $pospc = number_format( (($popcounts[$yearcode]['pos'] / ($popcounts[$yearcode]['pos']+$popcounts[$yearcode]['noemp']) ) * 100 ), 1 );
    $prosppc = number_format( ( ( $popcounts[$yearcode]['gradprosppos'] / ($popcounts[$yearcode]['gradprosppos']+$popcounts[$yearcode]['gradprospneg']) ) * 100 ), 1 );

    $diagpos = $popcounts[$yearcode]['gradprosppos'];
    $diagneg = $popcounts[$yearcode]['gradprospneg'];
    $diagworkpos = $popcounts[$yearcode]['posemp'];
    $diagstudypos = $popcounts[$yearcode]['posstudy'];
    $diagworkneg = $popcounts[$yearcode]['negemp'];
    $diagstudyneg = $popcounts[$yearcode]['negstudy'];

    echo <<<HEREDOC
    <tr><td>$yearcodemap[$yearcode]</td><td>$pop</td><td>$resp</td><td>$pcresp%</td><td>$pospc%</td><td>$prosppc%</td></tr>
HEREDOC;

}

?>
</table>

<p class="small"><strong>Positive Outcomes</strong>: The proportion of graduates who were available for employment and had secured employment or further study.<br />
<strong>Graduate Prospects</strong>: The proportion of graduates who were available for employment and had secured graduate-level employment or graduate-level further study. </p>

<?php

// echo "<p>Here are the HUSIDs for negative employment 8/9:</p><ul>";

// $posemphusids89 = $diaghusids['89']['negemp'];

// foreach ( $posemphusids89 as $hus ) {
//     echo "<li>$hus</li>";
// }

// echo "</ul>";

?>

<table>
    <tr><th rowspan="2">Current activitie(s)</td>

<?php

$yearrow1 = '';
$yearrow2 = '<tr>';
$emprows = array();


foreach ( $empcirclabels as $emc => $label ) {
    $emprows[$emc] = "<td>$label</td>";
}

foreach ( $yearsToSample as $yearcode ) {


    $yearrow1 .= "<th colspan='2'>".$yearcodemap[$yearcode]." Survey</th>";
    $yearrow2 .= "<td class='small'>Number</td><td class='small'>Percentage</td>";
    foreach ( $empcirclabels as $emc => $label ) {
        $emcnum = $popcounts[$yearcode][$emc];
        $emcperc = number_format( (($popcounts[$yearcode][$emc] / ($popcounts[$yearcode]['pos']+$popcounts[$yearcode]['noemp']+$popcounts[$yearcode]['noavail']+$popcounts[$yearcode]['other']) ) * 100 ), 1 );
        if ( $emc == 'refusal' ) { continue; }
        $emprows[$emc] .= "<td>$emcnum</td><td>$emcperc%<br /></td>";
    }

    $emprows['refusal'] .= "<td>".$popcounts[$yearcode]['refusal']."</td><td></td>"; 
    
}

$yearrow1 .= "</tr>";
$yearrow2 .= "</tr>";
echo $yearrow1.$yearrow2;
foreach ( $empcirclabels as $emc => $label ) {
    $emprows[$emc] .= "</tr>";
    if ( $emc == 'refusal' ) { continue; }
    echo $emprows[$emc];
}

echo "<tr><th>Total known destinations</th>";

foreach ( $yearsToSample as $yearcode ) {
    echo "<td>$totalknown[$yearcode]</td><td></td>";
}

echo "</tr>";
echo $emprows['refusal'];

?>
</table>

<?php 

if ( $params['filtertype'] == 'school' && $params['school'] != '%' ) {

    # we need to write comaprison tables
    echo <<<HEREDOC
<br />
<h3>Comparison groups (all graduates)</h3>
<table><tr><th rowspan='2'>$option1</th>
HEREDOC;

    $yearrow1 = '';
    $yearrow2 = '<tr>';

    foreach ($yearsToSample as $yearcode) {
        $yearrow1 .= "<th colspan='3'>".$yearcodemap[$yearcode]." Survey</th>";
        $yearrow2 .= "<td class='small'>No</td><td class='small'>PO</td><td class='small'>GP</td>";
    }

    $yearrow1 .= "</tr>";
    $yearrow2 .= "</tr>";
    echo $yearrow1.$yearrow2;

    foreach ( $schoolcounts as $school => $schooldetails ) {

        if ( $school != $params['school'] && $params['subject'] != '%' ) { continue; }

        echo "<tr><td>$school</td>";
        foreach ($yearsToSample as $yearcode) {
            if ( array_key_exists($yearcode, $schooldetails) ) {
                $PO = number_format( (($schooldetails[$yearcode]['pos'] / ($schooldetails[$yearcode]['pos']+$schooldetails[$yearcode]['noemp']) ) * 100 ), 1 );
                $GP = number_format( ( ( $schooldetails[$yearcode]['gradprosppos'] / ($schooldetails[$yearcode]['gradprosppos']+$schooldetails[$yearcode]['gradprospneg']) ) * 100 ), 1 );
                echo "<td>".$schooldetails[$yearcode]['resp']."</td><td>$PO%</td><td>$GP%</td>";
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
                        $PO = number_format( (($subdetails[$yearcode]['pos'] / ($subdetails[$yearcode]['pos']+$subdetails[$yearcode]['noemp']) ) * 100 ), 1 );
                        $GP = number_format( ( ( $subdetails[$yearcode]['gradprosppos'] / ($subdetails[$yearcode]['gradprosppos']+$subdetails[$yearcode]['gradprospneg']) ) * 100 ), 1 );
                        echo "<td>".$subdetails[$yearcode]['resp']."</td><td>$PO%</td><td>$GP%</td>";
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

            $yearrow1 = '';
            $yearrow2 = '<tr>';

            foreach ($yearsToSample as $yearccode) {
                $yearrow1 .= "<th colspan='3'>".$yearcodemap[$yearcode]." Survey</th>";
                $yearrow2 .= "<td class='small'>No</td><td class='small'>PO</td><td class='small'>GP</td>";
            }

            $yearrow1 .= "</tr>";
            $yearrow2 .= "</tr>";
            echo $yearrow1.$yearrow2;

            foreach ( $coursecounts as $course => $coursedetails ) {


                echo "<tr><td>$course</td>";
                foreach ($yearsToSample as $yearcode) {
                    if ( array_key_exists($yearcode, $coursedetails) ) {
                        $PO = number_format( (($coursedetails[$yearcode]['pos'] / ($coursedetails[$yearcode]['pos']+$coursedetails[$yearcode]['noemp']) ) * 100 ), 1 );
                        $GP = number_format( ( ( $coursedetails[$yearcode]['gradprosppos'] / ($coursedetails[$yearcode]['gradprosppos']+$coursedetails[$yearcode]['gradprospneg']) ) * 100 ), 1 );
                        echo "<td>".$coursedetails[$yearcode]['resp']."</td><td>$PO%</td><td>$GP%</td>";
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
