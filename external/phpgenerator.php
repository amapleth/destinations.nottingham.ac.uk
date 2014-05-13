<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php

include("../details.php");

$a=$_POST["noyears"];
$b=$_POST["nostuds"];
$c=$_POST["salary"];
$d=$_POST["jobtitle"];
$e=$_POST["employer"];
$f=$_POST["linkej"];
$g=$_POST["locs1"];
$h=$_POST["locs2"];
$k=$_POST["school"];
$l=$_POST["course"];

echo "This is the php code which has been generated from your choices and will be needed for the external version of GEMS.  Please copy ALL of the text below the horizontal line all the way to the bottom of the page and paste it into a text-based editor such as notepad or dreamweaver.  Please then save this file as graduate.php and press the 'Next Page' button to start generating the place holder content.<form name='form' action='domgenerator.php' method='post'><input type='hidden' name='noyears' value='$a' /><input type='hidden' name='nostuds' value='$b' /><input type='hidden' name='salary' value='$c' /><input type='hidden' name='jobtitle' value='$d' /><input type='hidden' name='employer' value='$e' /><input type='hidden' name='linkej' value='$f' /><input type='hidden' name='locs1' value='$g' /><input type='hidden' name='locs2' value='$h' /><input type='hidden' name='school' value='$k' /><input type='hidden' name='course' value='$l' /><input class='red' type='submit' value='Next Page -->' /><br /><hr />";

include("../database.php");

echo htmlentities('<style type="text/css">');
echo "<br />";
echo htmlentities('h1 {font-family:arial;}');
echo "<br />";
echo htmlentities('h2 {font-family:arial;}');
echo "<br />";
echo htmlentities('td {font-family:arial;');
echo "<br />";
echo htmlentities('font-size:12px;}');
echo "<br />";
echo htmlentities('th {font-family:arial;');
echo "<br />";
echo htmlentities('font-size:12px;}');
echo "<br />";
echo htmlentities('select {font-family:arial;');
echo "<br />";
echo htmlentities('font-size:12px;}');
echo "<br />";
echo htmlentities('p {margin-left:10px;');
echo "<br />";
echo htmlentities('font-family:arial;}');
echo "<br />";
echo htmlentities('#course {width:310px; }');
echo "<br />";
echo htmlentities('#course option { width:300px; }');
echo "<br />";
echo htmlentities('</style>');
echo "<br />";
echo htmlentities('<script type="text/javascript" src="selectcourse.js"><!----></script>');
echo "<br />";
echo htmlentities('<h1>What ' . $uniname . ' graduates do after graduation</h1>');
echo "<br />";
echo htmlentities('<p>Finding out what our graduates have gone on to do after leaving is very important to the ' . $name . ' and to the University. Recent graduates are contacted to take part in the national Destinations of Leavers from Higher Education (DLHE) Survey which all universities take part in.</p>');
echo "<br />";
echo htmlentities('<p>The information gained from this survey, is of key importance to the University in that it informs the League Tables and therefore affects our standing in those. It also provides data to our current and potential students about career paths of past graduates from their courses and it provides academics with employability figures for their courses.</p>
<p>We collect this information in November-March of each year, approximately six months after graduation, and we encourage all graduates to tell us what they are doing in terms of employment or further study. We aim to celebrate the University`s successes through the achievements of our graduates but also continue to support those (for up to 3 years) who continue to need the support of the ' . $name . '.</p>');
echo "<br />";
echo htmlentities('<p>Please use the links below to view the latest destinations figures for the University from the ');
if ($a=='1') echo htmlentities('2010/2011 graduate DLHE survey. The results have been broken down to each Academic');
elseif ($a=='2') echo htmlentities('2009/2010 & 2010/2011 graduate DLHE surveys. The results have been broken down to each Academic');
else echo htmlentities('2008/2099, 2009/2010 & 2010/2011 graduate DLHE surveys. The results have been broken down to each Academic');
if ($k=='1' && $l=='1') echo htmlentities (' ' . $option1 . ' and individual ' . $option2 . ', as well as information about our graduate impact on the labour market.</p>');
elseif ($k=='1' && $l=='2') echo htmlentities (' ' . $option1 . ' and individual ' . $option3 . ', as well as information about our graduate impact on the labour market.</p>');
else echo htmlentities (' ' . $option2 . ' and individual ' . $option3 . ', as well as information about our graduate impact on the labour market.</p>');
echo "<br />";
echo htmlentities('<h2>Message to all finalists</h2>');
echo "<br />";
echo htmlentities('<p>The Destination of Leavers Survey is carried out every year by all universities, asking their own graduates what they are doing six months after graduation.&nbsp; The Higher Education Statistics Agency specify a target of an 80% response rate so it is very important that we can contact you, please ensure that the university has your correct contact details. The survey only takes a couple of minutes to complete.&nbsp;</p>');
echo "<br />";
if ($a=='1') echo htmlentities('<h2>Graduate statistics 2010/2011&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="gemslogo.gif" width="150" align="middle" /></h2>');
elseif ($a=='2') echo htmlentities('<h2>Graduate statistics 2009/2010 & 2010/2011 (Aggregated data)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="gemslogo.gif" width="150" align="middle" /></h2>');
else echo htmlentities('<h2>Graduate statistics 2008/2009, 2009/2010 & 2010/2011 (Aggregated data)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="gemslogo.gif" width="150" align="middle" /></h2>');
echo "<br />";
echo htmlentities('<form action="">
    <table>
        <tr>');
if ($k=='1') $high="SCHOOL";
else $high="SUBJECT";

if ($a=='1') $sqlschool="select distinct ".$high.", count(".$high.") AS sum from popdlhe1011 where ".$high." <> '' group by ".$high." order by ".$high."";
if ($a=='2') $sqlschool="(select distinct ".$high.", count(".$high.") AS sum from popdlhe910 where ".$high." <> '' group by ".$high.") UNION (select distinct ".$high.", count(".$high.") AS sum from popdlhe1011 where ".$high." <> '' group by ".$high.") order by ".$high."";
if ($a=='3') $sqlschool="(select distinct ".$high.", count(".$high.") AS sum from popdlhe89 where ".$high." <> '' group by ".$high.") UNION (select distinct ".$high.", count(".$high.") AS sum from popdlhe910 where ".$high." <> '' group by ".$high.") UNION (select distinct ".$high.", count(".$high.") AS sum from popdlhe1011 where ".$high." <> '' group by ".$high.") order by ".$high."";
$sqlschool=mysql_query($sqlschool);
while ($row=mysql_fetch_array($sqlschool))
{
if ($k=='1') $school=$row['SCHOOL'];
else $school=$row['SUBJECT'];
$sum=$row['sum'];
switch ($school)
{
case $school!=$school2:
$school2=$school;
$schoola=str_replace("&","and",$school);
if ($a=='2') $union=") UNION ALL (select EMPCIR, MODSTUDY from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$high." like '".$school."'";
elseif ($a=='3') $union=") UNION ALL (select EMPCIR, MODSTUDY from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$high." like '".$school."') UNION ALL (select EMPCIR, MODSTUDY from extract89 inner join popdlhe89 on extract89.HUSIDa = popdlhe89.HUSID where ".$high." like '".$school."'";
else $union="";
$joinp="(select EMPCIR, MODSTUDY from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$high." like '".$school."'".$union.")";
$resultp = mysql_query($joinp);
$ap=0; $bp=0; $cp=0; $dp=0; $ep=0; $fp=0; $gp=0; $op=0; $xp=0; $total=0;

while($row = mysql_fetch_array($resultp))
 {
 if (($mod=='3' && ($emp=='1' || $emp=='3'))) $ap=$ap+1;
elseif ($emp=='2' && $mod=='3') $bp=$bp+1;
elseif ($emp=='15' && $mod=='3') $cp=$cp+1;
elseif (($mod=='1' || $mod=='2') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $dp=$dp+1;
elseif (($mod=='1' && ($emp=='17' || $emp=='11' || $emp=='12' || $emp=='13' || $emp=='14')) || ($mod=='2' && ($emp=='17' || $emp=='13' || $emp=='14'))) $ep=$ep+1;
elseif (($mod=='2' || $mod=='3') && ($emp=='11' || $emp=='12')) $fp=$fp+1;
elseif ($emp=='16' || $emp=='10' || ($emp=='17' && $mod=='3')) $gp=$gp+1;
elseif ($mod=='3' && ($emp=='13' || $emp=='14')) $op=$op+1;
else $xp=$xp+1;
}
$total=$ap+$bp+$cp+$dp+$ep+$fp+$gp+$op+$xp;

if ($total>$b) {

echo "<br />";
echo htmlentities('<td>'.$schoola.'</td><td><select name="course" id="course" onchange="showcourse(this.value)"><option value="0">--Select a Course-- </option> <option value="'.$schoola.'"> Whole School </option>');
echo "<br />";
if ($l=='1') $low="SUBJECT";
else $low="COURSE";

if ($a=='1') $sqlcourse="select distinct ".$low.", count(".$low.") AS sum from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$low." <> '' and ".$high." = '".$school."' group by ".$low." order by ".$low."";
if ($a=='2') $sqlcourse="(select distinct ".$low.", count(".$low.") AS sum from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." <> '' and ".$high." = '".$school."' group by ".$low.") UNION (select distinct ".$low.", count(".$low.") AS sum from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$low." <> '' and ".$high." = '".$school."' group by ".$low.") order by ".$low."";
if ($a=='3') $sqlcourse="(select distinct ".$low.", count(".$low.") AS sum from extract89 inner join popdlhe89 on extract89.HUSIDa = popdlhe89.HUSID where ".$low." <> '' and ".$high." = '".$school."' group by ".$low.") UNION (select distinct ".$low.", count(".$low.") AS sum from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." <> '' and ".$high." = '".$school."' group by ".$low.") UNION (select distinct ".$low.", count(".$low.") AS sum from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$low." <> '' and ".$high." = '".$school."' group by ".$low.") order by ".$low."";
$sqlcourse=mysql_query($sqlcourse);

while ($row=mysql_fetch_array($sqlcourse))
{
if ($l=='1') $course=$row['SUBJECT'];
else $course=$row['COURSE'];
$sum=$row['sum'];
switch ($course)
{
case $course!=$course2:
$course2=$course;
$coursea=str_replace("&","and",$course);
if ($a=='2') $union=") UNION ALL (select EMPCIR, MODSTUDY from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." like '".$course."'";
elseif ($a=='3') $union=") UNION ALL (select EMPCIR, MODSTUDY from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." like '".$course."') UNION ALL (select EMPCIR, MODSTUDY from extract89 inner join popdlhe89 on extract89.HUSIDa = popdlhe89.HUSID where ".$low." like '".$course."'";
else $union="";
$joina="(select EMPCIR, MODSTUDY from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$low." like '".$course."'".$union.")";
$resulta = mysql_query($joina);
$ap=0; $bp=0; $cp=0; $dp=0; $ep=0; $fp=0; $gp=0; $op=0; $xp=0; $total=0;

while($row = mysql_fetch_array($resulta))
 {
 if (($mod=='3' && ($emp=='1' || $emp=='3'))) $ap=$ap+1;
elseif ($emp=='2' && $mod=='3') $bp=$bp+1;
elseif ($emp=='15' && $mod=='3') $cp=$cp+1;
elseif (($mod=='1' || $mod=='2') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $dp=$dp+1;
elseif (($mod=='1' && ($emp=='17' || $emp=='11' || $emp=='12' || $emp=='13' || $emp=='14')) || ($mod=='2' && ($emp=='17' || $emp=='13' || $emp=='14'))) $ep=$ep+1;
elseif (($mod=='2' || $mod=='3') && ($emp=='11' || $emp=='12')) $fp=$fp+1;
elseif ($emp=='16' || $emp=='10' || ($emp=='17' && $mod=='3')) $gp=$gp+1;
elseif ($mod=='3' && ($emp=='13' || $emp=='14')) $op=$op+1;
else $xp=$xp+1;
}
$totala=$ap+$bp+$cp+$dp+$ep+$fp+$gp+$op+$xp;

if ($totala>$b) {

echo htmlentities('<option value="'.$coursea.'"> '.$coursea.' </option>');
echo "<br />";
}

break;
default:
echo "";
}
}
echo htmlentities("</select></td></tr><tr>");
echo "<br />";
}

break;
default:
echo "";
}

}
echo htmlentities('</table><br /><div id="results"><strong>Destinations info will be listed here...</strong></div></form>');

?>




<body>
</body>
</html>
