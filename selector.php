<?php include 'details.php'; ?>
<?php include 'database.php'; ?>
<?php include 'lookups.php'; ?>
<?php

# ok, so we need an array of schools which contains subarrays of departments and courses
# we will also need flat arrays of departments and courses to populate the initial pull down menus
$schools = array();
$subjects = array();
$courses = array();

$seenschools = array();
$seensubjects = array();

$yearsToSample = $yearcombos[$yearsbackmap[$surveyyears]];

// echo "<p>Value of surveyyears: '$surveyyears'</p>";
// echo "<p>Years combo array: </p>";
// print_r($yearsbackmap);
// echo "<p>Mapping of surveayyears to combo label: ".$yearsbackmap[$surveyyears]."</p>";
// echo "<p>Years to sample array:</p>";
// print_r($yearsToSample);

$schoolstatement = '';

foreach ( $yearsToSample as $yearcode ) {
    $schoolstatement .= "(select DISTINCT SCHOOL, count(SCHOOL) AS sum FROM popdlhe$yearcode WHERE SCHOOL <> '' AND SCHOOL IS NOT NULL GROUP BY SCHOOL) UNION ";
}

$schoolstatement = substr( $schoolstatement, 0, -6);
$schoolstatement .= "ORDER BY SCHOOL";





$schoolresult = mysqli_query( $con, $schoolstatement );


while ( $school = mysqli_fetch_object($schoolresult) ) {

    if (array_key_exists($school->SCHOOL, $schools)) {
        $schools[$school->SCHOOL]['sum'] += $school->sum;
    } else {
        $schools[$school->SCHOOL]['sum'] = $school->sum;
    }

    if ( $seenschools[$school->SCHOOL] == 1 ) { continue; }

    $subjectstatement = '';

    $escschool = mysqli_real_escape_string($con, $school->SCHOOL);

    foreach ($yearsToSample as $yearcode) {
        $subjectstatement .= "(select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe$yearcode WHERE SCHOOL = '$escschool' and SUBJECT <> '' and SUBJECT IS NOT NULL GROUP BY SUBJECT) UNION ";
    }

    $subjectstatement = substr( $subjectstatement, 0, -6);
    $subjectstatement .= "ORDER BY SUBJECT";

#    echo "<h2>$subjectstatement</h2>";

    $subjectresult = mysqli_query( $con, $subjectstatement);

    while ( $subject = mysqli_fetch_object($subjectresult) ) {

        if ( array_key_exists($subject->SUBJECT, $subjects) ) {
            $subjects[$subject->SUBJECT]['sum'] += $subject->sum;
            $schools[$school->SCHOOL]['subjects'][$subject->SUBJECT]['sum'] = $subject->sum;
        } else {
            $subjects[$subject->SUBJECT]['sum'] = $subject->sum;
            $schools[$school->SCHOOL]['subjects'][$subject->SUBJECT]['sum'] = $subject->sum;
        }

        if ( $seensubjects[$subject->SUBJECT] == 1 ) { continue; }

        $coursestatement = '';

        $escsubj = mysqli_real_escape_string($con, $subject->SUBJECT);

        foreach ($yearsToSample as $yearcode) {
            $coursestatement .= "(select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe$yearcode WHERE SCHOOL = '$escschool' and SUBJECT = '$escsubj' and COURSE <> '' and COURSE IS NOT NULL GROUP BY COURSE) UNION ";
        }

        $coursestatement = substr( $coursestatement, 0, -6);
        $coursestatement .= "ORDER BY COURSE";

#        echo "<h3>$coursestatement</h3>";

        $courseresult = mysqli_query( $con, $coursestatement );
#        if ( $courseresult === false) {
#            echo "<p>Statement is:<br />$coursestatement</p>";
#            echo "<p>Database error?<br />".mysqli_error($con)."</p>";
#        }
  
        while ( $course = mysqli_fetch_object($courseresult) ) {

            if ( array_key_exists($course->COURSE, $courses) ) {
                $courses[$course->COURSE]['sum'] += $course->sum;
                $schools[$school->SCHOOL]['subjects'][$subject->SUBJECT]['courses'][$course->COURSE] = $course->sum;
            } else {
                $courses[$course->COURSE]['sum'] = $course->sum;
                $schools[$school->SCHOOL]['subjects'][$subject->SUBJECT]['courses'][$course->COURSE] = $course->sum;
            }

        }

        $seensubjects[$subject->SUBJECT] = 1;

    }

    $seenschools[$school->SCHOOL] = 1;

}

ksort( $subjects );
ksort( $courses );

# now convert the arrays to json for use in the page javascript
$schoolsjs = json_encode( $schools );
$subjectsjs = json_encode( $subjects );
$coursesjs = json_encode( $courses );

# now we need to get a similar arrays for the JACS codes
$jacs1s = array();
$jacs2s = array();
$jacs3s = array();

if ($usejacs == 'yes') {

    $jacs1statement = '';

    foreach ( $yearsToSample as $yearcode ) {
        if ( $yearcode < '1112' ) {
            if ( $yearcode < '910') { continue; }
            $jacs1statement .= "(select DISTINCT LEV1, count(LEV1) AS sum FROM tqi$yearcode GROUP BY LEV1) UNION ";
        } else {
            $jacs1statement .= "(SELECT XJACSLEV101_1 as LEV1, COUNT(XJACSLEV101_1) as sum from popdlhe$yearcode GROUP BY LEV1) UNION ";
        }
        
    }

    $jacs1statement = substr( $jacs1statement, 0, -6);
    $jacs1statement .= "ORDER BY LEV1";

    #echo "<p>JACS1 statement: <br />$jacs1statement</p>";

    $jacs1result = mysqli_query( $con, $jacs1statement );

    while ( $lev1 = mysqli_fetch_object($jacs1result) ) {

    #    echo "<p>Found JACS1 code: '".$lev1->LEV1."'</p>";

        if ( array_key_exists($lev1->LEV1, $jacs1s) ) {
            $jacs1s[$lev1->LEV1]['sum'] += $lev1->sum;
            continue; # we can skip getting the JACS 2 and 3 codes as we've already done it
        } else {
            $jacs1s[$lev1->LEV1]['sum'] = $lev1->sum;
        }

        #$jacs1s[intval($lev1->LEV1)]['lev2s'] = array();

        $escj1 = mysqli_real_escape_string($con, $lev1->LEV1);

        $jacs2statement = '';

        foreach ( $yearsToSample as $yearcode ) {
            if ( $yearcode < '1112' ) {
                if ( $yearcode < '910') { continue; }
                $jacs2statement .= "(select DISTINCT LEV2, count(LEV2) AS sum FROM tqi$yearcode where LEV1 like '$escj1' GROUP BY LEV2+0) UNION ";
            } else {
                $jacs2statement .= "(select DISTINCT XJACSLEV201_1 as LEV2, count(XJACSLEV201_1) AS sum FROM popdlhe$yearcode where XJACSLEV101_1 like '$escj1' GROUP BY LEV2+0) UNION ";
            }
            
        }

        $jacs2statement = substr( $jacs2statement, 0, -6);
        $jacs2statement .= "ORDER BY LEV2+0";

    #    echo "<h3>JACS2 statement: <br />$jacs2statement</h3>";

        $jacs2result = mysqli_query( $con, $jacs2statement );

        while ( $lev2 = mysqli_fetch_object( $jacs2result ) ) {

    #        echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;Found JACS2 code: '".$lev2->LEV2."'</p>";

            if ( array_key_exists( intval($lev2->LEV2), $jacs2s ) ) {
                $jacs2s[intval($lev2->LEV2)] += $lev2->sum;
                $jacs1s[$lev1->LEV1]['lev2s'][intval($lev2->LEV2)]['sum'] += $lev2->sum;
                continue; # we can skip getting the JACS 3 codes as we've already done it
            } else {
                $jacs2s[intval($lev2->LEV2)] = $lev2->sum;
                $jacs1s[$lev1->LEV1]['lev2s'][intval($lev2->LEV2)]['sum'] = $lev2->sum;
            }

            $escj2 = mysqli_real_escape_string($con, intval($lev2->LEV2));

            $jacs3statement = '';

            foreach ( $yearsToSample as $yearcode ) {
                if ( $yearcode < '1112' ) {
                    if ( $yearcode < '910') { continue; }
                    $jacs3statement .= "(select DISTINCT LEV3, count(LEV3) AS sum FROM tqi$yearcode where LEV1 like '$escj1' and LEV2 like '$escj2' GROUP BY LEV3+0) UNION ";
                } else {
                    $jacs3statement .= "(select DISTINCT XJACSLEV301_1 as LEV3, count(XJACSLEV301_1) AS sum FROM popdlhe$yearcode where XJACSLEV101_1 like '$escj1' and XJACSLEV201_1 like '$escj2' GROUP BY LEV3+0) UNION ";
                }
                
            }

            $jacs3statement = substr( $jacs3statement, 0, -6);
            $jacs3statement .= "ORDER BY LEV3+0";

    #        echo "<h4>JACS3 statement: <br />$jacs3statement</h4>";

            $jacs3result = mysqli_query( $con, $jacs3statement );

            while ( $lev3 = mysqli_fetch_object( $jacs3result ) ) {

    #            echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Found JACS3 code: '".$lev3->LEV3."'</p>";

                if ( array_key_exists(intval($lev3->LEV3), $jacs3s) ) {
                    $jacs3s[intval($lev3->LEV3)] += $lev3->sum;
                    $jacs1s[$lev1->LEV1]['lev2s'][intval($lev2->LEV2)]['lev3s'][intval($lev3->LEV3)] += $lev3->sum;
                } else {
                    $jacs3s[intval($lev3->LEV3)] = $lev3->sum;
                    $jacs1s[$lev1->LEV1]['lev2s'][intval($lev2->LEV2)]['lev3s'][intval($lev3->LEV3)] = $lev3->sum;
                }

            }

        }

    }

    ksort( $jacs2s );
    ksort( $jacs3s );

}

# now convert the arrays to json for use in the page javascript
$jacs1js = json_encode( $jacs1s );
$jacs2js = json_encode( $jacs2s );
$jacs3js = json_encode( $jacs3s );

# and we'll also need the mapping of the jacs codes to the names
$jacs1namesjs = json_encode( $jacs1names );
$jacs2namesjs = json_encode( $jacs2names );
$jacs3namesjs = json_encode( $jacs3names );

# now we need to get the default counts for the survey population types for 
# use in the radio buttons in the popselecter div
$counts = array();

# first of all determine the years we are sureveying
$yearkey = "";
if ( $surveyyears > 1 ) {
    $surveykey = "s$surveyyears";
} else {
    $surveykey = "s1112";
}

$yearsToSample = $yearcombos[$surveykey];

# then cycle through the list of population types generating a where clause for each
foreach ( $whereclauses as $counter => $clause ) {

    $yearstatements = array();

    # build the UNION statement for all years being surveyed
    foreach ( $yearsToSample as $yearcode ) {
        $yst = "SELECT HUSID FROM popdlhe$yearcode WHERE $clause";
        if ( $yearcode > '1011' ) {
            $yst = str_replace('HOMEEU', 'HOMEEUOS', $yst);
        }
        $yearstatements[] = $yst;
    }

    # now we have the full statement, make the query and insert the results into the counts array
    $fullSurveyStatement = implode(" UNION ALL ", $yearstatements);
#    echo "<p>$fullSurveyStatement</p>";
    $fullSurveyResult = mysqli_query( $con, $fullSurveyStatement );
    $counts[$counter] = mysqli_num_rows( $fullSurveyResult );

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
        <title>Select sample - GEMS</title>
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

<?php

#echo "<p>$report</p>";

# first get which category of statistic we're looking at
$cat = '';
if (!isset($_GET['cat'])) { 
    $cat = 'empcirc';  # default to employment circumstances
} else {
    if ( array_key_exists($_GET['cat'], $selectables) ) {
        $cat = $_GET['cat']; # get the category from URL params if it's valid
    } else {
        $cat = 'empcirc'; # if it's not a category from our list then default to empcirc
    }
}

$jacsallow = '';
$jacshider = '';

if ($usejacs != 'yes') { $jacsallow = 'disabled="disabled"'; $jacshider = 'style="display: none" '; }

# then build the form
echo <<<HEREDOC
<h2>$selectables[$cat] for ...</h2>
<form method="post" action="$cat.php" id="selecterform">
<p>Filter by: <br />
<input type="radio" name="filtertype" id="schoolfilter" value="school" checked="checked" /> <label for="schoolfilter">$option1 / $option2 / $option3</label> <br />
<input type="radio" name="filtertype" id="jacsfilter" value="jacs" $jacsallow $jacshider/> <label for="jacsfilter" $jacshider>JACS code</label> </p>
<div id="schoolselecter" class="selecter">
<label for="school">$option1 </label>
<select name="school" id="school" class="filtrigger">
<option value="all">All $option1s</option>

HEREDOC;

foreach ( $schools as $schoolname => $schoolinfo ) {
    echo "<option value='$schoolname'>$schoolname</option>\n";
}

echo <<<HEREDOC
</select>
<br />
<br />
<label for="subject">$option2 </label> 
<select name="subject" id="subject" class="filtrigger">
<option value="all">All $option2s</option>

HEREDOC;

foreach ( $subjects as $subjectname => $subjectinfo ) {
    echo "<option value='$subjectname'>$subjectname</option>\n";
}

echo <<<HEREDOC
</select>
<br />
<br />
<label for="course">$option3 </label> 
<select name="course" id="course" class="filtrigger">
<option value="all">All $option3s</option>
HEREDOC;

foreach ( $courses as $coursename => $courseinfo ) {
    echo "<option value='$coursename'>$coursename</option>\n";
}

echo <<<HEREDOC
</select>
</div><!-- end schoolselecter -->
<div id="jacsselecter" class="selecter">
<label for="jacs1">JACS1</label>
<select name="jacs1" id="jacs1" class="filtrigger">
<option value="all">All graduates</option>
HEREDOC;

foreach ( $jacs1s as $jacs1val => $jacs1info ) {
    echo "<option value='$jacs1val'>$jacs1names[$jacs1val]</option>\n";
}

echo <<<HEREDOC
</select>
<br />
<br />
<label for="jacs2">JACS2</label>
<select name="jacs2" id="jacs2" class="filtrigger">
<option value="all">All graduates</option>
HEREDOC;

foreach ( $jacs2s as $jacs2val => $jacs2info ) {
    echo "<option value='$jacs2val'>$jacs2names[$jacs2val]</option>\n";
}

echo <<<HEREDOC
</select>
<br />
<br />
<label for="jacs3">JACS3</label>
<select name="jacs3" id="jacs3" class="filtrigger">
<option value="all">All graduates</option>
HEREDOC;

foreach ( $jacs3s as $jacs3val => $jacs3info ) {
    echo "<option value='$jacs3val'>$jacs3names[$jacs3val]</option>\n";
}

echo <<<HEREDOC
</select>
</div><!-- end jacsselecter -->
<div class="selecter">
<label for="yearselector">Survey </label> 
<select name="yearselector" id="yearselector" class="filtrigger">
HEREDOC;

if ( $surveyyears > 4 ) { echo "<option value='s5'>Last five years</option>\n"; }
if ( $surveyyears > 3 ) { echo "<option value='s4'>Last four years</option>\n"; }
if ( $surveyyears > 2 ) { echo "<option value='s3'>Last three years</option>\n"; }
if ( $surveyyears > 1 ) { echo "<option value='s2'>Last two years</option>\n"; }
if ( $surveyyears > 0 ) { echo "<option value='s1112'>2011/12 survey</option>\n"; }
if ( $surveyyears > 1 ) { echo "<option value='s1011'>2010/11 survey</option>\n"; }
if ( $surveyyears > 2 ) { echo "<option value='s910'>2009/10 survey</option>\n"; }
if ( $surveyyears > 3 ) { echo "<option value='s89'>2008/09 survey</option>\n"; }
if ( $surveyyears > 4 ) { echo "<option value='s78'>2007/08 survey</option>\n"; }


echo <<<HEREDOC
</select>
</div>
<div id="popselecter">
<label for="fulltime"><input type="radio" name="FTorPT" id="fulltime" value="Full-time" /> Full-time (<span id="fulltimedisplay">$counts[fulltime]</span>)</label>
<label for="parttime"><input type="radio" name="FTorPT" id="parttime" value="Part-time" /> Part-time (<span id="parttimedisplay">$counts[parttime]</span>)</label>
<label for="ftptall"><input type="radio" name="FTorPT" id="ftptall" value="All" checked="checked" /> All (<span id="ftptalldisplay">$counts[all]</span>)</label>
<hr />
<label for="undergrad"><input type="radio" name="UGorPG" id="undergrad" value="Undergraduate" /> Undergraduate (<span id="undergraddisplay">$counts[undergrad]</span>)</label>
<label for="postgrad"><input type="radio" name="UGorPG" id="postgrad" value="Postgraduate" /> Postgraduate (<span id="postgraddisplay">$counts[postgrad]</span>)</label>
<label for="ugpgall"><input type="radio" name="UGorPG" id="ugpgall" value="All" checked="checked" /> All (<span id="ugpgalldisplay">$counts[all]</span>)</label>
<hr />
<label for="otherug"><input type="radio" name="level" id="otherug" value="Other Undergraduate" /> Other Undergrad. (<span id="otherugdisplay">$counts[otherug]</span>)</label>
<label for="firstdeg"><input type="radio" name="level" id="firstdeg" value="First degree" /> First degree (<span id="firstdegdisplay">$counts[firstdeg]</span>)</label>
<label for="pgtaught"><input type="radio" name="level" id="pgtaught" value="Postgraduate taught" /> Postgrad. taught (<span id="pgtaughtdisplay">$counts[pgtaught]</span>)</label>
<label for="pgresearch"><input type="radio" name="level" id="pgresearch" value="Postgraduate research" /> Postgrad. research (<span id="pgresearchdisplay">$counts[pgresearch]</span>)</label>
<label for="levelall" class="short"><input type="radio" name="level" id="levelall" value="All" checked="checked" /> All (<span id="levelalldisplay">$counts[all]</span>)</label>
<hr />
<label for="home"><input type="radio" name="homeeu" id="home" value="Home" /> Home (<span id="homedisplay">$counts[home]</span>)</label>
<label for="eu"><input type="radio" name="homeeu" id="eu" value="EU" /> EU (<span id="eudisplay">$counts[eu]</span>)</label> 
HEREDOC;

if ( $counts['otherint'] > 0 ) {
    echo <<<HEREDOC
<label for="euhome"><input type="radio" name="homeeu" id="homeeu" value="Home and EU" /> Home and EU (<span id="homeeudisplay">$counts[homeeu]</span>)</label>
<label for="otherint"><input type="radio" name="homeeu" id="otherint" value="Other international" /> Other international (<span id="otherintdisplay">$counts[otherint]</span>)</label> 
HEREDOC;
}

echo <<<HEREDOC
<label for="homeeuall" class="short"><input type="radio" name="homeeu" id="homeeuall" value="All" checked="checked" /> All (<span id="homeeualldisplay">$counts[all]</span>)</label>
</div><!-- end popselecter -->
HEREDOC;

if ( $cat == 'jobdetails' || $cat == 'salary' || $cat == 'location' || $cat == 'size' || $cat == 'contract' || $cat == 'relevance' || $cat == 'soc' ) {

    echo <<<HEREDOC
<div id='advanceselecter' class='selecter clearfix'>
<p>Additional options</p>
<select name="emptypes" class="adv1">
HEREDOC;

    foreach ( $empwheres['emptypes'] as $value=> $details ) {
        echo <<<HEREDOC
<option value="$value">$details[label]</option>
HEREDOC;
    }

    echo <<<HEREDOC
</select>
<select name="emplevels" class="adv2">
HEREDOC;

    foreach ( $empwheres['emplevels'] as $value=> $details ) {
        echo <<<HEREDOC
<option value="$value">$details[label]</option>
HEREDOC;
    }

    echo <<<HEREDOC
</select>
<br style="clear:both" />
<br />
<select name="contracts" id="contracts" class="adv1"
HEREDOC;

    if ($cat == 'salary') {
        echo " disabled='disabled'";
    }

    echo ">";
    
    if ($cat != 'contract') {
        foreach ( $empwheres['contracts'] as $value=> $details ) {
            echo <<<HEREDOC
    <option value="$value">$details[label]</option>
HEREDOC;
        }
    } else {
        echo <<<HEREDOC
<option value="all">All contract types</option>
HEREDOC;
    }

    echo <<<HEREDOC
</select>
<select name="qualuses" class="adv2">
HEREDOC;

    if ($cat != 'relevance') {
        foreach ( $empwheres['qualuses'] as $value=> $details ) {
            echo <<<HEREDOC
    <option value="$value">$details[label]</option>
HEREDOC;
        }
    } else {
        echo <<<HEREDOC
<option value="all">All qualification uses</option>
HEREDOC;
    }

    echo <<<HEREDOC
</select>
<br style="clear:both" />
<br />
<select name="industries" class="adv1">
HEREDOC;

    foreach ( $empwheres['industries'] as $value=> $details ) {
        echo <<<HEREDOC
<option value="$value">$details[label]</option>
HEREDOC;
    }

    echo <<<HEREDOC
</select>
<select name="orgsizes" class="adv2">
HEREDOC;

    foreach ( $empwheres['orgsizes'] as $value=> $details ) {
        echo <<<HEREDOC
<option value="$value">$details[label]</option>
HEREDOC;
    }

    echo <<<HEREDOC
</select>
<br style="clear:both" />
<br />
<select name="socs" class="adv1">
HEREDOC;

    foreach ( $empwheres['socs'] as $value=> $details ) {
        echo <<<HEREDOC
<option value="$value">$details[label]</option>
HEREDOC;
    }

    echo <<<HEREDOC
</select>
<br style="clear:both" /> &nbsp;
</div><!-- end advanceselecter -->
HEREDOC;

}

?>


<br />
<br />
<input type="submit" value="Submit" id="submitbutton">
</form>

<p><a href="index.php">Back to main page</a></p>

<?php include 'footer.php' ?>


        <?php include 'scripts.inc'; ?>

        <script type="text/javascript" src="js/selector.js"></script>

        <script type="text/javascript"><!--

        var option1 = "<?php echo $option1; ?>";
        var option1s = "<?php echo $option1s; ?>";
        var option2 = "<?php echo $option2; ?>";
        var option2s = "<?php echo $option2s; ?>";
        var option3 = "<?php echo $option3; ?>";
        var option3s = "<?php echo $option3s; ?>";

        var schools = <?php echo $schoolsjs; ?>;

        var subjects = <?php echo $subjectsjs; ?>;

        var courses = <?php echo $coursesjs; ?>;

        var jacs1s = <?php echo $jacs1js; ?>;

        var jacs2s = <?php echo $jacs2js; ?>;

        var jacs3s = <?php echo $jacs3js; ?>;

        var jacs1names = <?php echo $jacs1namesjs; ?>;

        var jacs2names = <?php echo $jacs2namesjs; ?>;

        var jacs3names = <?php echo $jacs3namesjs; ?>;



        //--></script>

        <?php include 'analytics.php'; ?>
    </body>
</html>
