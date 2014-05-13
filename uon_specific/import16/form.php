<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("details.php"); ?>
<title><?php echo $title ?></title>
<link href="css/inside.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico" >
<script type="text/javascript">
function submitform1(){document.forms["form1"].submit();}
</script>
</head>
<body class="body">

<div id="container">
  <div id="header">
   <?php echo $header ?>
  <img src="images/gemslogo.gif" alt="Gems Logo" width="195" height="71" align="right" />
  <br />

<?php $id=$_GET["id"];


?>

<div id="title">
  <p class="sectionheader" style="display:inline">

<?php

if ($id=="employment") echo " Employment Circumstances for...</p>";
elseif ($id=="jobtitle") echo " Job Titles for...</p>";
elseif ($id=="graduateness") echo " Graduate-level of employment for...</p>";
elseif ($id=="contract") echo " Get contract types for...</p>";
elseif ($id=="salary") echo " Get average salary data for...</p>";
elseif ($id=="employers") echo " Get employer names for...</p>";
elseif ($id=="industry") echo " Industry of employment for...</p>";
elseif ($id=="locations") echo " Employment locations for...</p>";
elseif ($id=="companysize") echo " Company sizes for...</p>";
elseif ($id=="qualrel") echo " Relevance of qualification for...</p>";
elseif ($id=="furtherstudy") echo " Further study destinations for...</p>";
elseif ($id=="subjectarea") echo " Vocation of further study for...</p>";
elseif ($id=="institution") echo " Names of further study institutions for...</p>";
elseif ($id=="funding") echo " Funding of further study for...</p>";
else echo "";

echo "</div>
</div><br />";

include("database.php");
$e=$_POST["school"]; $f=$_POST["subject"]; $g=$_POST["courses"];
$h=$_POST["lev1"]; $i=$_POST["lev2"]; $j=$_POST["lev3"];
$surveya=$_POST["surveya"]; $surveyb=$_POST["surveyb"];
$eprev=$_POST["schoolprev"]; $fprev=$_POST["subjectprev"]; $gprev=$_POST["coursesprev"];
$hprev=$_POST["lev1prev"]; $iprev=$_POST["lev2prev"]; $jprev=$_POST["lev3prev"];

if ($e=="") $e="%";
if ($f=="") $f="%";
if ($g=="") $g="%";
if ($h=="") $h="%";
if ($i=="") $i="%";
if ($j=="") $j="%";

if ($eprev=="") $eprev="%";
if ($fprev=="") $fprev="%";
if ($gprev=="") $gprev="%";
if ($hprev=="") $hprev="%";
if ($iprev=="") $iprev="%";
if ($jprev=="") $jprev="%";

if ($h!=$hprev || $i!=$iprev || $j!=$jprev) $e="%";
if ($h!=$hprev || $i!=$iprev || $j!=$jprev) $f="%";
if ($h!=$hprev || $i!=$iprev || $j!=$jprev) $g="%";

if (($e!=$eprev && $e!="%") || ($f!=$fprev && $f!="%") || ($g!=$gprev && $g!="%")) $h="%";
if (($e!=$eprev && $e!="%") || ($f!=$fprev && $f!="%") || ($g!=$gprev && $g!="%")) $i="%";
if (($e!=$eprev && $e!="%") || ($f!=$fprev && $f!="%") || ($g!=$gprev && $g!="%")) $j="%";

if ($e!=$eprev) $f="%";
if ($e!=$eprev) $g="%";

if ($h!=$hprev) $i="%";
if ($h!=$hprev) $j="%";

if ($e=="%" && $f=="%" && $g=="%" && ($h!="%" || $i!="%" || $j!="%")) $surveya="%";
if ($h=="%" && $i=="%" && $j=="%" && ($e!="%" || $f!="%" || $g!="%")) $surveyb="%";

if ($surveya=="%") $survey=$surveyb;
elseif ($surveyb=="%") $survey=$surveya;
else $survey="%";

if ($surveya=="" && $numberofyears!="four") $surveya='1';
if ($surveyb=="" && $numberofyears!="four") $surveyb='1';

echo "<div>
<div id='tableone' style='width:450px; float:left; border-width:2px; margin-top:11px; margin-bottom:11px; border-style: solid; border-color: #736F6E; border-radius:10px; -moz-border-radius:10px;'>
<table><tr><td>
<p class='body'>$option1</p></td><td>";

//---------------------------------------First drop-down menu---------------------------------------

echo "<form name='input' action='form.php?id=" . $id . "' method='post'>";
echo "<input type='hidden' name='schoolprev' value='$e'/><input type='hidden' name='subjectprev' value='$f'/><input type='hidden' name='courseprev' value='$g'/><input type='hidden' name='lev1prev' value='$h'/><input type='hidden' name='lev2prev' value='$i'/><input type='hidden' name='lev3prev' value='$j'/>";

echo "<select name='school' style='max-width:365px; font-size:0.8em;'"; ?>onchange="this.form.submit();" <?php echo "><option class='text' value='%'>All $option1s</option>";

$mysqlschool="(select DISTINCT SCHOOL, count(SCHOOL) AS sum FROM popdlhe78 WHERE SCHOOL <> '' GROUP BY SCHOOL) UNION (select DISTINCT SCHOOL, count(SCHOOL) AS sum FROM popdlhe89 WHERE SCHOOL <> '' GROUP BY SCHOOL) UNION (select DISTINCT SCHOOL, count(SCHOOL) AS sum FROM popdlhe910 WHERE SCHOOL <> '' GROUP BY SCHOOL) UNION (select DISTINCT SCHOOL, count(SCHOOL) AS sum FROM popdlhe1011 WHERE SCHOOL <> '' GROUP BY SCHOOL) ORDER by SCHOOL";
$resultschool = mysql_query($mysqlschool);

while($school=mysql_fetch_array($resultschool))
{
if ($residuea==$school[SCHOOL]) $schoolsum=$schoolsum+$school[sum];
else $schoolsum='0';
$s=$school[SCHOOL];
if ($e==$s && ($school[sum]>$minimum || $schoolsum>$minimum) && $residuea!=$school[SCHOOL]) echo "<option value='$s' selected='selected'>" . $s . "</option>";
elseif (($school[sum]>$minimum || $schoolsum>$minimum) && $residuea!=$school[SCHOOL]) echo "<option value='$s'>" . $s . "</option>";
else echo "";
$residuea=$school[SCHOOL];
$schoolsum=$school[sum];
}

echo "</select></td></tr>";

//---------------------------------------Second drop-down menu---------------------------------------

echo "<tr><td>
<p class='body'>$option2</td><td>";

echo "<select name='subject' style='max-width:365px; font-size:0.8em;'"; ?>onchange="this.form.submit();" <?php echo "><option class='text' value='%'>All $option2s</option>";

$mysqlsubject="(select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe78 WHERE SCHOOL LIKE '".$e."' and SUBJECT <> '' GROUP BY SUBJECT) UNION (select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe89 WHERE SCHOOL LIKE '".$e."' and SUBJECT <> '' GROUP BY SUBJECT) UNION (select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe910 WHERE SCHOOL LIKE '".$e."' and SUBJECT <> '' GROUP BY SUBJECT) UNION (select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe1011 WHERE SCHOOL LIKE '".$e."' and SUBJECT <> '' GROUP BY SUBJECT) ORDER BY SUBJECT";
$resultsubject = mysql_query($mysqlsubject);

while($subject=mysql_fetch_array($resultsubject))
{
if ($residueb==$subject[SUBJECT]) $subjectsum=$subjectsum+$subject[sum];
else $subjectsum='0';
$u=$subject[SUBJECT];
if ($f==$u && ($subject[sum]>$minimum || $subjectsum>$minimum) && $residueb!=$subject[SUBJECT]) echo "<option value='$u' selected='selected'>" . $u . "</option>";
elseif (($subject[sum]>$minimum || $subjectsum>$minimum) && $residueb!=$subject[SUBJECT]) echo "<option value='$u'>" . $u . "</option>";
else echo "";
$residueb=$subject[SUBJECT];
$subjectsum=$subject[sum];
}

echo "</select></td></tr>";

//---------------------------------------Third drop-down menu---------------------------------------

echo "<tr><td>
<p class='body'>$option3</td><td>";

echo "<select name='courses' style='max-width:365px; font-size:0.8em;'"; ?>onchange="this.form.submit();" <?php echo "><option class='text' value='%'>All $option3s</option>";

$mysqlcourse="(select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe78 WHERE SCHOOL LIKE '".$e."' and SUBJECT LIKE '".$f."' and COURSE <> '' GROUP BY COURSE) UNION (select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe89 WHERE SCHOOL LIKE '".$e."' and SUBJECT LIKE '".$f."' and COURSE <> '' GROUP BY COURSE) UNION (select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe910 WHERE SCHOOL LIKE '".$e."' and SUBJECT LIKE '".$f."' and COURSE <> '' GROUP BY COURSE) UNION (select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe1011 WHERE SCHOOL LIKE '".$e."' and SUBJECT LIKE '".$f."' and COURSE <> '' GROUP BY COURSE) ORDER BY COURSE";
$resultcourse = mysql_query($mysqlcourse);
echo $g;
while($course=mysql_fetch_array($resultcourse))
{
if ($residuec==$course[COURSE]) $coursesum=$coursesum+$course[sum];
else $coursesum='0';
$x=$course[COURSE];
if ($g==$x && ($course[sum]>$minimum || $coursesum>$minimum) && $residuec!=$course[COURSE]) echo "<option value='$x' selected='selected'>" . $x . "</option>";
elseif (($course[sum]>$minimum || $coursesum>$minimum) && $residuec!=$course[COURSE]) echo "<option value='$x'>" . $x . "</option>";
else echo "";
$residuec=$course[COURSE];
$coursesum=$course[sum];
}
echo "</select></td></tr>";

//---------------------------------------Fourth drop-down menu---------------------------------------

echo "<tr><td>
<p class='body'>Survey</td><td>";
if ($numberofyears=="four") {
echo "<select name='surveya' style='max-width:365px; font-size:0.8em;'"; ?>onchange="this.form.submit();" <?php echo "><option class='text' value='%'>Last four years</option>";

if ($surveya=='1') echo "<option value='1' selected='selected'>Last three years</option>";
else echo "<option value='1'>Last three years</option>";
if ($surveya=='2') echo "<option value='2' selected='selected'>Last two years</option>";
else echo "<option value='2'>Last two years</option>";
if ($surveya=='3') echo "<option value='3' selected='selected'>2010/11 Survey</option>";
else echo "<option value='3'>2010/11 Survey</option>";
if ($surveya=='4') echo "<option value='4' selected='selected'>2009/10 Survey</option>";
else echo "<option value='4'>2009/10 Survey</option>";
if ($surveya=='5') echo "<option value='5' selected='selected'>2008/09 Survey</option>";
else echo "<option value='5'>2008/09 Survey</option>";
if ($surveya=='6') echo "<option value='6' selected='selected'>2007/08 Survey</option>";
else echo "<option value='6'>2007/08 Survey</option>";
}
else {
echo "<select name='surveya' style='max-width:365px; font-size:0.8em;'"; ?>onchange="this.form.submit();" <?php echo ">";

if ($surveya=='1') echo "<option value='1' selected='selected'>Last three years</option>";
else echo "<option value='1'>Last three years</option>";
if ($surveya=='2') echo "<option value='2' selected='selected'>Last two years</option>";
else echo "<option value='2'>Last two years</option>";
if ($surveya=='3') echo "<option value='3' selected='selected'>2010/11 Survey</option>";
else echo "<option value='3'>2010/11 Survey</option>";
if ($surveya=='4') echo "<option value='4' selected='selected'>2009/10 Survey</option>";
else echo "<option value='4'>2009/10 Survey</option>";
if ($surveya=='5') echo "<option value='5' selected='selected'>2008/09 Survey</option>";
else echo "<option value='5'>2008/09 Survey</option>";
}
echo "</select></td></tr></table></div>";

if ($jacschoice=="on") {
echo "<div id='tableor' style='width:35px; float:left;'><br /><br /><br /><br />&nbsp;Or</div>";
echo "<div id='tabletwo' style='width:350px; float:left; border-width:2px; margin-top:11px; margin-bottom:11px; border-style: solid; border-color: #736F6E; border-radius:10px; -moz-border-radius:10px;'>";

//---------------------------------------First JACS drop-down menu---------------------------------------

echo "<table><tr><td>
<p class='body'>JACS1</td><td>";

echo "<select name='lev1' style='font-size:0.8em;'"; ?>onchange="this.form.submit();" <?php echo "><option class='text' value='%'>All graduates</option>";

$mysqllev1="(select DISTINCT LEV1, count(LEV1) AS sum FROM tqi910 GROUP BY LEV1) UNION (select DISTINCT LEV1, count(LEV1) AS sum FROM tqi1011 GROUP BY LEV1) ORDER by LEV1";
$resultlev1 = mysql_query($mysqllev1);

while($lev1=mysql_fetch_array($resultlev1))
{
if ($residuea==$level1[LEV1]) $lev1sum=$lev1sum+$lev1[sum];
else $lev1sum='0';
if ($lev1[LEV1]=="1") $level1="Medicine and Dentistry";
elseif ($lev1[LEV1]=="2") $level1="Subjects allied to Medicine";
elseif ($lev1[LEV1]=="3") $level1="Biological Sciences";
elseif ($lev1[LEV1]=="4") $level1="Veterinary Sciences";
elseif ($lev1[LEV1]=="5") $level1="Agriculture and related subjects";
elseif ($lev1[LEV1]=="6") $level1="Physical Sciences";
elseif ($lev1[LEV1]=="7") $level1="Mathematical Sciences";
elseif ($lev1[LEV1]=="8") $level1="Computer Science";
elseif ($lev1[LEV1]=="9") $level1="Engineering and Technology";
elseif ($lev1[LEV1]=="A") $level1="Architecture, Building and Planning";
elseif ($lev1[LEV1]=="B") $level1="Social Studies";
elseif ($lev1[LEV1]=="C") $level1="Law";
elseif ($lev1[LEV1]=="D") $level1="Business and Administrative studies";
elseif ($lev1[LEV1]=="E") $level1="Mass Communications and Documentation";
elseif ($lev1[LEV1]=="F") $level1="Languages";
elseif ($lev1[LEV1]=="G") $level1="Historical and Philosophical studies";
elseif ($lev1[LEV1]=="H") $level1="Creative Arts and Design";
elseif ($lev1[LEV1]=="I") $level1="Education";
elseif ($lev1[LEV1]=="J") $level1="Combined";
elseif ($lev1[LEV1]=="K") $level1="Initial Teacher Training";
elseif ($lev1[LEV1]=="L") $level1="Geographical Studies";
else $level1="";

$s=$lev1[LEV1];
if ($h==$s && ($lev1[sum]>$minimum || $lev1sum>$minimum) && $residuea!=$lev1[LEV1]) echo "<option value='$s' selected='selected'>" . $level1 . "</option>";
elseif (($lev1[sum]>$minimum || $lev1sum>$minimum) && $residuea!=$lev1[LEV1]) echo "<option value='$s'>" . $level1 . "</option>";
else echo "";
$residuea=$lev1[LEV1];
$lev1sum=$lev1[sum];
}

echo "</select></td></tr>";

//---------------------------------------Second JACS drop-down menu---------------------------------------

echo "<tr><td>
<p class='body'>JACS2</td><td>";


echo "<select name='lev2' style='font-size:0.8em;'"; ?>onchange="this.form.submit();" <?php echo "><option class='text' value='%'>All graduates</option>";

$mysqllev2="(select DISTINCT LEV2, count(LEV2) AS sum FROM tqi910 where LEV1 like '".$h."' GROUP BY LEV2) UNION (select DISTINCT LEV2, count(LEV2) AS sum FROM tqi1011 where LEV1 like '".$h."' GROUP BY LEV2) ORDER by (LEV2+0)";
$resultlev2 = mysql_query($mysqllev2);

while($lev2=mysql_fetch_array($resultlev2))
{
if ($residueb==$lev2[LEV2]) $lev2sum=$lev2sum+$lev2[sum];
else $lev2sum='0';
if ($lev2[LEV2]=="1") $level2="Medicine and Dentistry";
elseif ($lev2[LEV2]=="2") $level2="Medical Science and Pharmacy";
elseif ($lev2[LEV2]=="3") $level2="Nursing";
elseif ($lev2[LEV2]=="4") $level2="Other subjects allied to Medicine";
elseif ($lev2[LEV2]=="5") $level2="Biology and related Sciences";
elseif ($lev2[LEV2]=="6") $level2="Sports Science";
elseif ($lev2[LEV2]=="7") $level2="Psychology";
elseif ($lev2[LEV2]=="8") $level2="Veterinary Sciences";
elseif ($lev2[LEV2]=="9") $level2="Agriculture and related subjects";
elseif ($lev2[LEV2]=="10") $level2="Physical Science";
elseif ($lev2[LEV2]=="11") $level2="Physical Geography and Environmental Science";
elseif ($lev2[LEV2]=="12") $level2="Mathematical Sciences";
elseif ($lev2[LEV2]=="13") $level2="Computer Science";
elseif ($lev2[LEV2]=="14") $level2="Mechanically-based Engineering";
elseif ($lev2[LEV2]=="15") $level2="Electronic and Electrical Engineering";
elseif ($lev2[LEV2]=="16") $level2="Civil, Chemical and other Engineering";
elseif ($lev2[LEV2]=="17") $level2="Technology";
elseif ($lev2[LEV2]=="18") $level2="Architecture, Building and Planning";
elseif ($lev2[LEV2]=="19") $level2="Economics";
elseif ($lev2[LEV2]=="20") $level2="Politics";
elseif ($lev2[LEV2]=="21") $level2="Sociology, Social Policy and Anthropology";
elseif ($lev2[LEV2]=="22") $level2="Social Work";
elseif ($lev2[LEV2]=="23") $level2="Human and Social Geography";
elseif ($lev2[LEV2]=="24") $level2="Law";
elseif ($lev2[LEV2]=="25") $level2="Business";
elseif ($lev2[LEV2]=="26") $level2="Management";
elseif ($lev2[LEV2]=="27") $level2="Finance and Accounting";
elseif ($lev2[LEV2]=="28") $level2="Tourism, Transport and Travel";
elseif ($lev2[LEV2]=="29") $level2="Media Studies";
elseif ($lev2[LEV2]=="30") $level2="Communications and Information studies";
elseif ($lev2[LEV2]=="31") $level2="English-based studies";
elseif ($lev2[LEV2]=="32") $level2="European Languages and Area studies";
elseif ($lev2[LEV2]=="33") $level2="Other languages and Area studies";
elseif ($lev2[LEV2]=="34") $level2="History and Archeology";
elseif ($lev2[LEV2]=="35") $level2="Philosphy, Theology and Religious studies";
elseif ($lev2[LEV2]=="36") $level2="Art and Design";
elseif ($lev2[LEV2]=="37") $level2="Performing Arts";
elseif ($lev2[LEV2]=="38") $level2="Other Creative Arts";
elseif ($lev2[LEV2]=="39") $level2="Teacher Training";
elseif ($lev2[LEV2]=="40") $level2="Education studies";
elseif ($lev2[LEV2]=="41") $level2="Combined";
elseif ($lev2[LEV2]=="42") $level2="Initial Teacher Training";
else $level2="";

$t=$lev2[LEV2];
if ($i==$t && ($lev2[sum]>$minimum || $lev2sum>$minimum) && $residueb!=$lev2[LEV2]) echo "<option value='$t' selected='selected'>" . $level2 . "</option>";
elseif (($lev2[sum]>$minimum || $lev2sum>$minimum) && $residueb!=$lev2[LEV2]) echo "<option value='$t'>" . $level2 . "</option>";
else echo "";
$residueb=$lev2[LEV2];
$lev2sum=$lev2[sum];
}

echo "</select></td></tr>";

//---------------------------------------Third JACS drop-down menu---------------------------------------

echo "<tr><td>
<p class='body'>JACS3</td><td>";


echo "<select name='lev3' style='font-size:0.8em;'"; ?>onchange="this.form.submit();" <?php echo "><option class='text' value='%'>All graduates</option>";


$mysqllev3="(select DISTINCT LEV3, count(LEV3) AS sum FROM tqi910 where LEV1 like '".$h."' and LEV2 like '".$i."' GROUP BY LEV3) UNION (select DISTINCT LEV3, count(LEV3) AS sum FROM tqi1011 where LEV1 like '".$h."' and LEV2 like '".$i."' GROUP BY LEV3) ORDER by (LEV3+0)";
$resultlev3 = mysql_query($mysqllev3);

while($lev3=mysql_fetch_array($resultlev3))
{
if ($residuec==$lev3[LEV3]) $lev3sum=$lev3sum+$lev3[sum];
else $lev3sum='0';
if ($lev3[LEV3]=="1") $level3="Medicine";
elseif ($lev3[LEV3]=="2") $level3="Dentistry";
elseif ($lev3[LEV3]=="3") $level3="Anatomy, Physiology and Pathology";
elseif ($lev3[LEV3]=="4") $level3="Pharmacology, Toxicology and Pharmacy";
elseif ($lev3[LEV3]=="5") $level3="Nursing";
elseif ($lev3[LEV3]=="6") $level3="Complementary Medicine";
elseif ($lev3[LEV3]=="7") $level3="Nutrition";
elseif ($lev3[LEV3]=="8") $level3="Ophthalmics";
elseif ($lev3[LEV3]=="9") $level3="Aural and Oral Sciences";
elseif ($lev3[LEV3]=="10") $level3="Medical Technology";
elseif ($lev3[LEV3]=="11") $level3="Others in Subjects allied to Medicine";
elseif ($lev3[LEV3]=="12") $level3="Biology";
elseif ($lev3[LEV3]=="13") $level3="Zoology";
elseif ($lev3[LEV3]=="14") $level3="Genetics";
elseif ($lev3[LEV3]=="15") $level3="Microbiology";
elseif ($lev3[LEV3]=="16") $level3="Molecular Biology, Biophysics and Biochemistry";
elseif ($lev3[LEV3]=="17") $level3="Others in Biological Sciences";
elseif ($lev3[LEV3]=="18") $level3="Sports Science";
elseif ($lev3[LEV3]=="19") $level3="Psychology";
elseif ($lev3[LEV3]=="20") $level3="Veterinary Sciences";
elseif ($lev3[LEV3]=="21") $level3="Animal Science";
elseif ($lev3[LEV3]=="22") $level3="Forestry";
elseif ($lev3[LEV3]=="23") $level3="Food and Beverage studies";
elseif ($lev3[LEV3]=="24") $level3="Agriculture and related subjects";
elseif ($lev3[LEV3]=="25") $level3="Chemistry";
elseif ($lev3[LEV3]=="26") $level3="Physics and Astronomy";
elseif ($lev3[LEV3]=="27") $level3="Forensic and Archeological Science";
elseif ($lev3[LEV3]=="28") $level3="Geology";
elseif ($lev3[LEV3]=="29") $level3="Ocean Sciences";
elseif ($lev3[LEV3]=="30") $level3="Others in Physical Sciences";
elseif ($lev3[LEV3]=="31") $level3="Physical Geography and Environmental Science";
elseif ($lev3[LEV3]=="32") $level3="Mathematics and Statistics";
elseif ($lev3[LEV3]=="33") $level3="Operational Research";
elseif ($lev3[LEV3]=="34") $level3="Others in Mathematical and Computer Sciences";
elseif ($lev3[LEV3]=="35") $level3="Computer Science";
elseif ($lev3[LEV3]=="36") $level3="General Engineering";
elseif ($lev3[LEV3]=="37") $level3="Mechanical, Production and Manufacturing Engineering";
elseif ($lev3[LEV3]=="38") $level3="Aerospace Engineering";
elseif ($lev3[LEV3]=="39") $level3="Naval Architecture";
elseif ($lev3[LEV3]=="40") $level3="Electronic and Electrical Engineering";
elseif ($lev3[LEV3]=="41") $level3="Civil Engineering";
elseif ($lev3[LEV3]=="42") $level3="Chemical, Process and Energy Engineering";
elseif ($lev3[LEV3]=="43") $level3="Others in Engineering";
elseif ($lev3[LEV3]=="44") $level3="Materials and Minerals Technology";
elseif ($lev3[LEV3]=="45") $level3="Maritime Technology";
elseif ($lev3[LEV3]=="46") $level3="Others in Technology";
elseif ($lev3[LEV3]=="47") $level3="Architecture";
elseif ($lev3[LEV3]=="48") $level3="Building";
elseif ($lev3[LEV3]=="49") $level3="Landscape Design";
elseif ($lev3[LEV3]=="50") $level3="Planning (Urban, Rural and Regional)";
elseif ($lev3[LEV3]=="51") $level3="Others in Architecture, Building and Planning";
elseif ($lev3[LEV3]=="52") $level3="Economics";
elseif ($lev3[LEV3]=="53") $level3="Politics";
elseif ($lev3[LEV3]=="54") $level3="Sociology";
elseif ($lev3[LEV3]=="55") $level3="Social Policy";
elseif ($lev3[LEV3]=="56") $level3="Anthropology";
elseif ($lev3[LEV3]=="57") $level3="Others in Social studies";
elseif ($lev3[LEV3]=="58") $level3="Social Work";
elseif ($lev3[LEV3]=="59") $level3="Human and Social Geography";
elseif ($lev3[LEV3]=="60") $level3="Law";
elseif ($lev3[LEV3]=="61") $level3="Business studies";
elseif ($lev3[LEV3]=="62") $level3="Marketing";
elseif ($lev3[LEV3]=="63") $level3="Management studies";
elseif ($lev3[LEV3]=="64") $level3="Human Resource Management";
elseif ($lev3[LEV3]=="65") $level3="Finance";
elseif ($lev3[LEV3]=="66") $level3="Accounting";
elseif ($lev3[LEV3]=="67") $level3="Tourism, Transport and Travel";
elseif ($lev3[LEV3]=="68") $level3="Others in Business and Administrative studies";
elseif ($lev3[LEV3]=="69") $level3="Media studies";
elseif ($lev3[LEV3]=="70") $level3="Information Services";
elseif ($lev3[LEV3]=="71") $level3="Publicity studies";
elseif ($lev3[LEV3]=="72") $level3="Publishing";
elseif ($lev3[LEV3]=="73") $level3="Journalism";
elseif ($lev3[LEV3]=="74") $level3="Others in Mass Communications and Documentation";
elseif ($lev3[LEV3]=="75") $level3="English studies";
elseif ($lev3[LEV3]=="76") $level3="American and Australasian studies";
elseif ($lev3[LEV3]=="77") $level3="Celtic studies";
elseif ($lev3[LEV3]=="78") $level3="Classics";
elseif ($lev3[LEV3]=="79") $level3="French studies";
elseif ($lev3[LEV3]=="80") $level3="German and Scandinavian studies";
elseif ($lev3[LEV3]=="81") $level3="Italian studies";
elseif ($lev3[LEV3]=="82") $level3="Iberian studies";
elseif ($lev3[LEV3]=="83") $level3="Others in European Languages and Area studies";
elseif ($lev3[LEV3]=="84") $level3="Linguistics";
elseif ($lev3[LEV3]=="85") $level3="Comparative Literary studies";
elseif ($lev3[LEV3]=="86") $level3="Others in Liguistics, Classics and related";
elseif ($lev3[LEV3]=="87") $level3="Asian studies";
elseif ($lev3[LEV3]=="88") $level3="African and Modern Middle Eastern studies";
elseif ($lev3[LEV3]=="89") $level3="Others in eastern, Asian and African Languages";
elseif ($lev3[LEV3]=="90") $level3="History";
elseif ($lev3[LEV3]=="91") $level3="Archeology";
elseif ($lev3[LEV3]=="92") $level3="Others in Historical and Philosophical studies";
elseif ($lev3[LEV3]=="93") $level3="Philosophy";
elseif ($lev3[LEV3]=="94") $level3="Theology and Religious studies";
elseif ($lev3[LEV3]=="95") $level3="Fine Art";
elseif ($lev3[LEV3]=="96") $level3="Design studies";
elseif ($lev3[LEV3]=="97") $level3="Music";
elseif ($lev3[LEV3]=="98") $level3="Drama";
elseif ($lev3[LEV3]=="99") $level3="Dance";
elseif ($lev3[LEV3]=="100") $level3="Cinematics and Photography";
elseif ($lev3[LEV3]=="101") $level3="Imaginative Writing";
elseif ($lev3[LEV3]=="102") $level3="Others in Creative Arts and Design";
elseif ($lev3[LEV3]=="103") $level3="Teacher Training";
elseif ($lev3[LEV3]=="104") $level3="Research and Study Skills in Education";
elseif ($lev3[LEV3]=="105") $level3="Academic studies in Education";
elseif ($lev3[LEV3]=="106") $level3="Others in Education";
elseif ($lev3[LEV3]=="107") $level3="Initial Teacher Training";
elseif ($lev3[LEV3]=="108") $level3="Combined";
else $level3="";

$u=$lev3[LEV3];
if ($j==$u && ($lev3[sum]>$minimum || $lev3sum>$minimum) && $residuec!=$lev3[LEV3]) echo "<option value='$u' selected='selected'>" . $level3 . "</option>";
elseif (($lev3[sum]>$minimum || $lev3sum>$minimum) && $residuec!=$lev3[LEV3]) echo "<option value='$u'>" . $level3 . "</option>";
else echo "";
$residuec=$lev3[LEV3];
$lev3sum=$lev3[sum];
}
echo "</select></td></tr>";

//---------------------------------------Fourth JACS drop-down menu (year)---------------------------------------

echo "<tr><td>
<p class='body'>Survey</td><td>";
if ($numberofyears=="four") {
echo "<select name='surveyb' style='max-width:365px; font-size:0.8em;'"; ?>onchange="this.form.submit();" <?php echo "><option class='text' value='%'>Last four years</option>";

if ($surveyb=='1') echo "<option value='1' selected='selected'>Last three years</option>";
else echo "<option value='1'>Last three years</option>";
if ($surveyb=='2') echo "<option value='2' selected='selected'>Last two years</option>";
else echo "<option value='2'>Last two years</option>";
if ($surveyb=='3') echo "<option value='3' selected='selected'>2010/11 Survey</option>";
else echo "<option value='3'>2010/11 Survey</option>";
if ($surveyb=='4') echo "<option value='4' selected='selected'>2009/10 Survey</option>";
else echo "<option value='4'>2009/10 Survey</option>";
if ($surveyb=='5') echo "<option value='5' selected='selected'>2008/09 Survey</option>";
else echo "<option value='5'>2008/09 Survey</option>";
if ($surveyb=='6') echo "<option value='6' selected='selected'>2007/08 Survey</option>";
else echo "<option value='6'>2007/08 Survey</option>";
}
else {
echo "<select name='surveyb' style='max-width:365px; font-size:0.8em;'"; ?>onchange="this.form.submit();" <?php echo ">";

if ($surveyb=='1') echo "<option value='1' selected='selected'>Last three years</option>";
else echo "<option value='1'>Last three years</option>";
if ($surveyb=='2') echo "<option value='2' selected='selected'>Last two years</option>";
else echo "<option value='2'>Last two years</option>";
if ($surveyb=='3') echo "<option value='3' selected='selected'>2010/11 Survey</option>";
else echo "<option value='3'>2010/11 Survey</option>";
if ($surveyb=='4') echo "<option value='4' selected='selected'>2009/10 Survey</option>";
else echo "<option value='4'>2009/10 Survey</option>";
if ($surveyb=='5') echo "<option value='5' selected='selected'>2008/09 Survey</option>";
else echo "<option value='5'>2008/09 Survey</option>";
}
echo "</select></td></tr>

</table>";
}
//---------------------------------------MySQL for radio button brackets---------------------------------------

if ($h!="%" || $i!="%" || $j!="%") {
if ($survey=='1') {
$mysqlhomeeu="SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe89 inner join tqi89 on popdlhe89.HUSID = tqi89.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."' UNION ALL SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe910 inner join tqi910 on popdlhe910.HUSID = tqi910.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."' UNION ALL SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe1011 inner join tqi1011 on popdlhe1011.HUSID = tqi1011.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."'";
}
elseif ($survey=='2') {
$mysqlhomeeu="SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe910 inner join tqi910 on popdlhe910.HUSID = tqi910.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."' UNION ALL SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe1011 inner join tqi1011 on popdlhe1011.HUSID = tqi1011.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."'";
}
elseif ($survey=='3') {
$mysqlhomeeu="SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe1011 inner join tqi1011 on popdlhe1011.HUSID = tqi1011.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."'";
}
elseif ($survey=='4') {
$mysqlhomeeu="SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe910 inner join tqi910 on popdlhe910.HUSID = tqi910.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."'";
}
elseif ($survey=='5') {
$mysqlhomeeu="SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe89 inner join tqi89 on popdlhe89.HUSID = tqi89.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."'";
}
elseif ($survey=='6') {
$mysqlhomeeu="SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe78 inner join tqi78 on popdlhe78.HUSID = tqi78.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."'";
}
else {
$mysqlhomeeu="SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe78 inner join tqi78 on popdlhe78.HUSID = tqi78.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."' UNION ALL SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe89 inner join tqi89 on popdlhe89.HUSID = tqi89.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."' UNION ALL SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe910 inner join tqi910 on popdlhe910.HUSID = tqi910.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."' UNION ALL SELECT distinct HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe1011 inner join tqi1011 on popdlhe1011.HUSID = tqi1011.HUSIDd WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' AND LEV1 LIKE '".$h."' AND LEV2 LIKE '".$i."' AND LEV3 LIKE '".$j."'";
}
}
//Some students (very few) do not appear in the tqi5 file and so the tqi tables should only be accessed if a JACS code is selected by the user
else {
if ($survey=='1') {
$mysqlhomeeu="SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe89 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' UNION ALL SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe910 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' UNION ALL SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe1011 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."'";
}
elseif ($survey=='2') {
$mysqlhomeeu="SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe910 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' UNION ALL SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe1011 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."'";
}
elseif ($survey=='3') {
$mysqlhomeeu="SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe1011 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."'";
}
elseif ($survey=='4') {
$mysqlhomeeu="SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe910 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."'";
}
elseif ($survey=='5') {
$mysqlhomeeu="SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe89 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."'";
}
elseif ($survey=='6') {
$mysqlhomeeu="SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe78 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."'";
}
else {
$mysqlhomeeu="SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe78 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' UNION ALL SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe89 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' UNION ALL SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe910 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."' UNION ALL SELECT HUSID, HOMEEU, XQMODE01, QUAL1 FROM popdlhe1011 WHERE SCHOOL LIKE '".$e."' AND SUBJECT LIKE '".$f."' AND COURSE LIKE '".$g."'";
}
}
$resulthomeeu = mysql_query($mysqlhomeeu);

$counthomeeu1=0; $counthomeeu2=0; $counthomeeu3=0; $counthomeeu4=0;
$countqual1=0; $countqual2=0; $countqual3=0; $countqual4=0; $countqual5=0; $countqual6=0;
$countxqmode1=0; $countxqmode2=0;

while($fetch=mysql_fetch_array($resulthomeeu))
{
$hus=$fetch["HUSID"];
$homeeu=$fetch["HOMEEU"];
$xqmode01=$fetch["XQMODE01"];
$qual=$fetch["QUAL1"];

if ($homeeu=='1') $counthomeeu1=$counthomeeu1+1;
elseif ($homeeu=='2') $counthomeeu2=$counthomeeu2+1; elseif ($homeeu=='3') $counthomeeu3=$counthomeeu3+1;
else "";
if ($xqmode01=='1') $countxqmode1=$countxqmode1+1;
elseif ($xqmode01=='2') $countxqmode2=$countxqmode2+1;
else "";
if ($qual=="H41") $countqual1=$countqual1+1;
elseif ($qual=="H60") $countqual1=$countqual1+1; elseif ($qual=="H61") $countqual1=$countqual1+1;
elseif ($qual=="H71") $countqual1=$countqual1+1; elseif ($qual=="H80") $countqual1=$countqual1+1;
elseif ($qual=="H88") $countqual1=$countqual1+1; elseif ($qual=="I60") $countqual1=$countqual1+1;
elseif ($qual=="I61") $countqual1=$countqual1+1; elseif ($qual=="J10") $countqual1=$countqual1+1;
elseif ($qual=="J16") $countqual1=$countqual1+1; elseif ($qual=="J20") $countqual1=$countqual1+1;
elseif ($qual=="J26") $countqual1=$countqual1+1; elseif ($qual=="J30") $countqual1=$countqual1+1;
elseif ($qual=="C20") $countqual1=$countqual1+1; elseif ($qual=="C30") $countqual1=$countqual1+1;
elseif ($qual=="M22") $countqual1=$countqual1+1; elseif ($qual=="H00") $countqual1=$countqual1+1;
elseif ($qual=="H11") $countqual1=$countqual1+1; elseif ($qual=="H16") $countqual1=$countqual1+1;
elseif ($qual=="H18") $countqual1=$countqual1+1; elseif ($qual=="H22") $countqual1=$countqual1+1;
elseif ($qual=="H23") $countqual1=$countqual1+1; elseif ($qual=="H50") $countqual1=$countqual1+1;
elseif ($qual=="I00") $countqual1=$countqual1+1; elseif ($qual=="I11") $countqual1=$countqual1+1;
elseif ($qual=="I16") $countqual1=$countqual1+1;
else "";

if ($qual=="D00") $countqual2=$countqual2+1;
elseif ($qual=="D01") $countqual2=$countqual2+1; elseif ($qual=="E00") $countqual2=$countqual2+1;
elseif ($qual=="L00") $countqual2=$countqual2+1; elseif ($qual=="L80") $countqual2=$countqual2+1;
elseif ($qual=="M00") $countqual2=$countqual2+1; elseif ($qual=="M01") $countqual2=$countqual2+1;
elseif ($qual=="M10") $countqual2=$countqual2+1; elseif ($qual=="M11") $countqual2=$countqual2+1;
elseif ($qual=="M16") $countqual2=$countqual2+1; elseif ($qual=="M41") $countqual2=$countqual2+1;
elseif ($qual=="M50") $countqual2=$countqual2+1; elseif ($qual=="M71") $countqual2=$countqual2+1;
elseif ($qual=="M80") $countqual2=$countqual2+1; elseif ($qual=="M86") $countqual2=$countqual2+1;
elseif ($qual=="M88") $countqual2=$countqual2+1;
else "";

if ($qual=="H41") $countqual3=$countqual3+1;
elseif ($qual=="H60") $countqual3=$countqual3+1; elseif ($qual=="H61") $countqual3=$countqual3+1;
elseif ($qual=="H71") $countqual3=$countqual3+1; elseif ($qual=="H80") $countqual3=$countqual3+1;
elseif ($qual=="H88") $countqual3=$countqual3+1; elseif ($qual=="I60") $countqual3=$countqual3+1;
elseif ($qual=="I61") $countqual3=$countqual3+1; elseif ($qual=="J10") $countqual3=$countqual3+1;
elseif ($qual=="J16") $countqual3=$countqual3+1; elseif ($qual=="J20") $countqual3=$countqual3+1;
elseif ($qual=="J26") $countqual3=$countqual3+1; elseif ($qual=="J30") $countqual3=$countqual3+1;
elseif ($qual=="C20") $countqual3=$countqual3+1; elseif ($qual=="C30") $countqual3=$countqual3+1;
else "";

if ($qual=="I16") $countqual4=$countqual4+1;
elseif ($qual=="M22") $countqual4=$countqual4+1; elseif ($qual=="H00") $countqual4=$countqual4+1;
elseif ($qual=="H11") $countqual4=$countqual4+1; elseif ($qual=="H16") $countqual4=$countqual4+1;
elseif ($qual=="H18") $countqual4=$countqual4+1; elseif ($qual=="H22") $countqual4=$countqual4+1;
elseif ($qual=="H23") $countqual4=$countqual4+1; elseif ($qual=="H50") $countqual4=$countqual4+1;
elseif ($qual=="I00") $countqual4=$countqual4+1; elseif ($qual=="I11") $countqual4=$countqual4+1;
else "";

if ($qual=="M88") $countqual5=$countqual5+1;
elseif ($qual=="M00") $countqual5=$countqual5+1; elseif ($qual=="M01") $countqual5=$countqual5+1;
elseif ($qual=="M10") $countqual5=$countqual5+1; elseif ($qual=="M11") $countqual5=$countqual5+1;
elseif ($qual=="M16") $countqual5=$countqual5+1; elseif ($qual=="M41") $countqual5=$countqual5+1;
elseif ($qual=="M50") $countqual5=$countqual5+1; elseif ($qual=="M71") $countqual5=$countqual5+1;
elseif ($qual=="M80") $countqual5=$countqual5+1; elseif ($qual=="M86") $countqual5=$countqual5+1;
else "";

if ($qual=="D00") $countqual6=$countqual6+1;
elseif ($qual=="D01") $countqual6=$countqual6+1; elseif ($qual=="E00") $countqual6=$countqual6+1;
elseif ($qual=="L00") $countqual6=$countqual6+1; elseif ($qual=="L80") $countqual6=$countqual6+1;
else "";


}

$countxqmode3 = $countxqmode1 + $countxqmode2;

$mysqlhomeeu5="SELECT XQMODE01 FROM popdlhe78 WHERE HOMEEU = '3' UNION ALL SELECT XQMODE01 FROM popdlhe89 WHERE HOMEEU = '3' UNION ALL SELECT XQMODE01 FROM popdlhe910 WHERE HOMEEU = '3' UNION ALL SELECT XQMODE01 FROM popdlhe1011 WHERE HOMEEU = '3'";
$resulthomeeu5 = mysql_query($mysqlhomeeu5);
$counthomeeu5 = mysql_num_rows($resulthomeeu5);
$counthomeeu3 = $counthomeeu1 + $counthomeeu2 + $counthomeeu4 + $counthomeeu5;
$counthomeeu6=$counthomeeu1+$counthomeeu2;

//---------------------------------------Radio buttons start---------------------------------------

echo "</div></form><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><div id='tablethree' style='width:840px; border-width:2px; margin-top:11px; margin-bottom:11px; border-style: solid; border-color: #736F6E; border-radius:10px; -moz-border-radius:10px;'>";

echo "<form name='input' action='".$id.".php' method='post'>";

//---------------------------------------FT/PT buttons---------------------------------------

echo "<table><tr><td style='font-size:4px'>&nbsp;</td></tr>";

if ($countxqmode1>$minimum) $disxqmode1=""; else $disxqmode1="disabled='disabled'";
if ($countxqmode2>$minimum) $disxqmode2=""; else $disxqmode2="disabled='disabled'";
$selxqmode1=""; $selxqmode2=""; $selxqmodeall=""; 
if ($countxqmode1=='0') $selxqmode2="checked='checked'";
elseif ($countxqmode2=='0') $selxqmode1="checked='checked'";
else $selxqmodeall="checked='checked'";

echo "<tr><td><input type='radio' name='ftpt' value='1' $disxqmode1 $selxqmode1 /> Full-Time ($countxqmode1)</td><td>";
echo "<input type='radio' name='ftpt' value='2' $disxqmode2 $selxqmode2 /> Part-Time ($countxqmode2)</td>";
echo "<td colspan='3'><input type='radio' $selxqmodeall name='ftpt' value='%' /> All ($countxqmode3)</td></tr>";

echo "<tr><td colspan='5'><hr /></td></tr><tr>";

//---------------------------------------UG/PG buttons--------------------------------------

if ($countqual1>$minimum) $disqual1=""; else $disqual1="disabled='disabled'";
if ($countqual2>$minimum) $disqual2=""; else $disqual2="disabled='disabled'";
$selqual1=""; $selqual2=""; $selqualall=""; 
if ($countqual1=='0') $selqual2="checked='checked'";
elseif ($countqual2=='0') $selqual1="checked='checked'";
else $selqualall="checked='checked'";

echo "<tr><td><input type='radio' name='levela' value='1' $disqual1 $selqual1 /> All Undergraduate ($countqual1)</td><td>";
echo "<input type='radio' name='levela' value='2' $disqual2 $selqual2 /> All Postgraduate ($countqual2)&nbsp;&nbsp;</td>";
echo "<td colspan='3'><input type='radio' $selqualall name='levela' value='%' /> All ($countxqmode3)</td></tr>";

echo "<tr><td colspan='5'><hr /></td></tr><tr>";

//---------------------------------------UG/PG Type buttons--------------------------------------

if ($countqual3>$minimum) $disqual3=""; else $disqual3="disabled='disabled'";
if ($countqual4>$minimum) $disqual4=""; else $disqual4="disabled='disabled'";
if ($countqual5>$minimum) $disqual5=""; else $disqual5="disabled='disabled'";
if ($countqual6>$minimum) $disqual6=""; else $disqual6="disabled='disabled'";
$selqual3=""; $selqual4=""; $selqual5=""; $selqual6=""; $selqualall=""; 
if ($countqual4=='0' && $countqual5=='0' && $countqual6=='0') $selqual3="checked='checked'";
elseif ($countqual3=='0' && $countqual5=='0' && $countqual6=='0') $selqual4="checked='checked'";
elseif ($countqual3=='0' && $countqual4=='0' && $countqual6=='0') $selqual5="checked='checked'";
elseif ($countqual3=='0' && $countqual4=='0' && $countqual5=='0') $selqual6="checked='checked'";
else $selqualall="checked='checked'";

if ($otherundergrad=="on") echo "<td><input type='radio' name='level' value='1' $disqual3 $selqual3 /> Other Undergraduate ($countqual3)&nbsp;&nbsp;</td>";
echo "<td><input type='radio' name='level' value='2' $disqual4 $selqual4 /> First Degree ($countqual4)&nbsp;&nbsp;&nbsp;&nbsp;</td>";
echo "<td><input type='radio' name='level' value='5' $disqual5 $selqual5 /> Postgrad Taught ($countqual5)&nbsp;&nbsp;</td>";
echo "<td><input type='radio' name='level' value='6' $disqual6 $selqual6 /> Postgrad Research ($countqual6)&nbsp;&nbsp;</td>";
echo "<td><input type='radio' $selqualall  name='level' value='%' /> All ($countxqmode3)</td></tr>";

echo "<td colspan='5'><hr /></td></tr><tr><td>";

//---------------------------------------HOME/EU Radio buttons--------------------------------------

if ($counthomeeu1>$minimum) $dishomeeu1=""; else $dishomeeu1="disabled='disabled'";
if ($counthomeeu2>$minimum) $dishomeeu2=""; else $dishomeeu2="disabled='disabled'";
if ($counthomeeu3>$minimum) $dishomeeu3=""; else $dishomeeu3="disabled='disabled'";
if ($counthomeeu5>$minimum) $dishomeeu4=""; else $dishomeeu4="disabled='disabled'";

echo "<tr><td><input type='radio' name='homeeu' value='1' $dishomeeu1 /> Home ($counthomeeu1)</td>";
echo "<td><input type='radio' name='homeeu' value='2' $dishomeeu2 /> EU ($counthomeeu2)</td>";
if ($counthomeeu5>'0') {
echo "<td><input type='radio' name='homeeu' value='3' $dishomeeu3 /> Home & EU ($counthomeeu6)</td>";
echo "<td><input type='radio' name='homeeu' value='4' $dishomeeu4 /> International ($counthomeeu5)</td>";
}
echo "<td><input type='radio' checked='checked' name='homeeu' value='%' /> All ($counthomeeu3)</td></tr>";
if ($surveya=="") $surveya="%";
if ($surveyb=="") $surveyb="%";

echo "<input type='hidden' name='school' value='$e' /><input type='hidden' name='subject' value='$f' />";
echo "<input type='hidden' name='courses' value='$g' /><input type='hidden' name='surveya' value='$surveya' /><input type='hidden' name='lev1' value='$h' /><input type='hidden' name='lev2' value='$i' />";
echo "<input type='hidden' name='lev3' value='$j' /><input type='hidden' name='surveyb' value='$surveyb' /><input type='hidden' name='pageid' value='$id' /></td></tr><tr><td colspan='5'><hr /></td></tr><tr><td colspan='6'><p class='small'>*Number in (brackets) is the number of graduates in the survey population over the last three years</p></td></tr></table>";



if ($id=="employers" || $id=="salary" || $id=="locations" || $id=="companysize" || $id=="contract" || $id=="qualrel" || $id=="graduateness" || $id=="jobtitle") 
{


echo "</div><div id='tablethree' style='width:840px; border-width:2px; margin-top:18px; margin-bottom:11px; border-style: solid; border-color: #736F6E; border-radius:10px; -moz-border-radius:10px;'>";
echo "<table>
<tr><td colspan='2'>&nbsp;&nbsp;Additional Options - for advanced users</td></tr>
<tr><td colspan='5' style='font-size:8px;'>&nbsp;</td></tr><tr><td style='width:20px;'>&nbsp;</td><td>";
if ($id=="salary") echo "<select name='pubgrid' style='width:440px' disabled='disabled'>";
else echo "<select name='pubgrid' style='width:440px'>";
echo "<option value='%' selected='selected'>All Employment types</option>
<option value='1'>Full-time paid employment only</option>
<option value='2'>Part-time paid employment</option>
<option value='3'>Working unpaid</option>
<option value='4'>Self-employment</option>
<option value='5'>All full-time paid employment (inc. self-employed)</option>
</select>
</td><td style='width:20px'>&nbsp;</td><td>";
if ($id=="graduateness") echo "<select name='grad' style='width:230px' disabled='disabled'>";
else echo "<select name='grad' style='width:230px'>";
echo "<option value='%' selected='selected'>All Employment levels</option>
<option value='1'>Graduate-level employment</option>
<option value='2'>Non-graduate-level employment</option>
</select>
<tr><td colspan='5'>&nbsp;</td></tr><td style='width:20px'>&nbsp;</td><td>";
if ($id=="contract") echo "<select name='duration' style='width:440px' disabled='disabled'>";
else echo "<select name='duration' style='width:440px'>";
echo "<option value='%' selected='selected'>All Contract types</option>
<option value='1'>Permanent or open-ended contract</option>
<option value='2'>Fixed term contract: 12 months or longer</option>
<option value='3'>Fixed term contract: shorter than 12 months</option>
<option value='4'>Self-employed/Freelance</option>
<option value='5'>Temporarily, through an agency</option>
<option value='6'>Temporarily, other than through an agency</option>
</select>
</td><td style='width:20px'>&nbsp;</td><td>";
if ($id=="qualrel") echo "<select name='qualreq' style='width:230px' disabled='disabled'>";
else echo "<select name='qualreq' style='width:230px'>";
echo "<option value='%' selected='selected'>All Qualification uses</option>
<option value='5'>Qualification - Formal requirement</option>
<option value='3'>Qualification - Advantage</option>
<option value='4'>Qualification - not an advantage</option>
</select>
<tr><td colspan='5'>&nbsp;</td></tr><td style='width:20px'>&nbsp;</td><td>
<select name='sic' style='width:440px'>
<option value='%' selected='selected'>All Industries</option>
<option value='A'>Agriculture, forestry and fishing</option>
<option value='B'>Mining and quarrying</option>
<option value='C'>Manufacturing</option>
<option value='D'>Electricity, gas, steam and air conditioning supply</option>
<option value='E'>Water supply, sewerage, waste management and remediation activities</option>
<option value='F'>Construction</option>
<option value='G'>Wholesale and retail trade; repair of motor vehicles and motor cycles</option>
<option value='I'>Accommodation and food service activities</option>
<option value='H'>Transport and storage</option>
<option value='J'>Information and communication</option>
<option value='K'>Financial and insurance activities</option>
<option value='L'>Real estate activities</option>
<option value='M'>Professional, scientific and technical activities</option>
<option value='N'>Administrative and support service activities</option>
<option value='O'>Public Administration and defence; compulsary social security</option>
<option value='P'>Education</option>
<option value='Q'>Human health and social work activities</option>
<option value='R'>Arts, entertainment and recreation</option>
<option value='S'>Other service activities</option>
<option value='T'>Activities of households as employers</option>
<option value='U'>Activities of extraterritorial organisations</option>
</select>
</td><td style='width:20px'>&nbsp;</td><td>
<select name='empsize' style='width:230px'>
<option value='%' selected='selected'>All Organisation sizes</option>
<option value='1'>Small company (1-49 employees)</option>
<option value='2'>Medium-sized Employer</option>
<option value='3'>Large company (250+ employees)</option>
</select>
</td></tr>
<tr><td colspan='2'>&nbsp;</td></tr><tr><td style='width:20px'>&nbsp;</td><td>
<select name='soc' style='width:440px'>
<option value='%' selected='selected'>All Occupational classifications</option>
<option value='1'>Managerial and Administrative</option>
<option value='2'>Professional Occupations</option>
<option value='3'>Associate Professional and Technical Occupations</option>
<option value='4'>Clerical and Secretarial Occupations</option>
<option value='5'>Craft and Related Occupations</option>
<option value='6'>Personal and Protective Service Occupations</option>
<option value='7'>Sales Occupations</option>
<option value='8'>Plant and Machine Operatives</option>
<option value='9'>Elementary Occupations</option>
</select>
</td><td style='width:20px'>&nbsp;</td><td>";
if ($id=="graduateness") echo "<select name='eandp' style='width:230px' disabled='disabled'>";
else echo "<select name='eandp' style='width:230px'>";
echo "<option value='%' selected='selected'>All Elias and Purcell levels</option>
<option value='1'>Traditional Graduate Occupations</option>
<option value='2'>Modern Graduate Occupations</option>
<option value='3'>New Graduate Occupations</option>
<option value='4'>Niche Graduate Occupations</option>
<option value='5'>Non-graduate Occupations</option>
</select>
</td></tr><tr><td>&nbsp;</td></tr>";

echo "</table></div>";
}

else {


echo "</table>
<br /></div>";
}
echo "<br />
<input class='button4' type='submit' value='Submit' />
</form><br /><br /><br />
<a class='one' href='index.php'>Take me back to the main page</a>
<br /><br />";

echo "
  <div id='footer'>$footer</div>
</body>
</html>";
?>
