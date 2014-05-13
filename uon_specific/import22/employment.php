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
  <?php echo $header;
  $a=$_POST["school"]; $b=$_POST["subject"]; $c=$_POST["courses"];
$da=$_POST["surveya"];
$db=$_POST["surveyb"];
if ($da!="%") $d=$da;
elseif ($db!="%") $d=$db;
else $d="%";
$e=$_POST["ftpt"]; $f=$_POST["levela"]; $g=$_POST["level"]; $h=$_POST["homeeu"];
$lev1=$_POST["lev1"];
if ($lev1=="") $lev1="%";
$lev2=$_POST["lev2"];
if ($lev2=="") $lev2="%";
$lev3=$_POST["lev3"];
if ($lev3=="") $lev3="%";
$pageid=$_POST["pageid"];
include("query.php");
echo " JACS1 code post query.php = $lev1b";
include("database.php");
if ($lev1!="%" || $lev2!="%" || $lev3!="%") $jacs="yes";
else $jacs="no";
  
   ?>
  <img src="images/gemslogo.gif" alt="Gems Logo" width="195" height="71" align="right" />
  <br />
  
  <p class='bold'> Employment Circumstances for the graduates you selected...</p>

   <br /><br />
<br />


</div>
<div id="mainContent">

<?php


switch ($jacs)
{
case no:
if ($d=="%" || $d=='6') $smallra=mysql_num_rows(mysql_query("select XQMODE01 from popdlhe78 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' and SCHOOL like '".$school."'"));
else $smallra=='0';
if ($d=="%" || $d=='1' || $d=='5') $smallrb=mysql_num_rows(mysql_query("select XQMODE01 from popdlhe89 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' and SCHOOL like '".$school."'"));
else $smallrb=='0';
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') $smallrc=mysql_num_rows(mysql_query("select XQMODE01 from popdlhe910 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' and SCHOOL like '".$school."'"));
else $smallrc=='0';
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') $smallrd=mysql_num_rows(mysql_query("select XQMODE01 from popdlhe1011 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' and SCHOOL like '".$school."'"));
else $smallrd=='0';
break;
case yes:
if ($d=="%" || $d=='6') $smallra=mysql_num_rows(mysql_query("select distinct HUSID from popdlhe78 inner join tqi78 on HUSID = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' and SCHOOL like '".$school."' and LEV1 like '".$lev1b."' and LEV2 like '".$lev2b."' and LEV3 like '".$lev3b."'"));
else $smallra=='0';
if ($d=="%" || $d=='1' || $d=='5') $smallrb=mysql_num_rows(mysql_query("select distinct HUSID from popdlhe89 inner join tqi89 on HUSID = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' and SCHOOL like '".$school."' and LEV1 like '".$lev1b."' and LEV2 like '".$lev2b."' and LEV3 like '".$lev3b."'"));
else $smallrb=='0';
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') $smallrc=mysql_num_rows(mysql_query("select distinct HUSID from popdlhe910 inner join tqi910 on HUSID = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' and SCHOOL like '".$school."' and LEV1 like '".$lev1."' and LEV2 like '".$lev2."' and LEV3 like '".$lev3."'"));
else $smallrc=='0';
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') $smallrd=mysql_num_rows(mysql_query("select distinct HUSID from popdlhe1011 inner join tqi1011 on HUSID = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' and SCHOOL like '".$school."' and LEV1 like '".$lev1."' and LEV2 like '".$lev2."' and LEV3 like '".$lev3."'"));
else $smallrd=='0';
break;
default:
echo "";
}
$smallr=$smallra+$smallrb+$smallrc+$smallrd;

include("table.php");

echo "</table>";
echo " JACS1 code post table.php = $lev1b <br />";

if ($smallr>$minimum) {

switch ($jacs)
{
case no:

$joinpd="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' and SCHOOL like '".$school."')";
$resultpd = mysql_query($joinpd);
$countsd = mysql_num_rows($resultpd);
$joinpc="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' and SCHOOL like '".$school."')";
$resultpc = mysql_query($joinpc);
$countsc = mysql_num_rows($resultpc);
$joinpb="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract89 inner join popdlhe89 on extract89.HUSIDa = popdlhe89.HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' and SCHOOL like '".$school."')";
$resultpb = mysql_query($joinpb);
$countsb = mysql_num_rows($resultpb);
$joinpa="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract78 inner join popdlhe78 on extract78.HUSIDa = popdlhe78.HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' and SCHOOL like '".$school."')";
$resultpa = mysql_query($joinpa);
$countsa = mysql_num_rows($resultpa);

$apa=0; $bpa=0; $cpa=0; $spa=0; $epa=0; $fpa=0; $gpa=0; $opa=0; $xpa=0;
$apb=0; $bpb=0; $cpb=0; $spb=0; $epb=0; $fpb=0; $gpb=0; $opb=0; $xpb=0;
$apc=0; $bpc=0; $cpc=0; $spc=0; $epc=0; $fpc=0; $gpc=0; $opc=0; $xpc=0;
$apd=0; $bpd=0; $cpd=0; $spd=0; $epd=0; $fpd=0; $gpd=0; $opd=0; $xpd=0;
$socdlhepaa=0; $socdlhenaa=0; $socdlhepba=0; $socdlhenba=0;
$socdlhepab=0; $socdlhenab=0; $socdlhepbb=0; $socdlhenbb=0;
$socdlhepac=0; $socdlhenac=0; $socdlhepbc=0; $socdlhenbc=0;
$socdlhepad=0; $socdlhenad=0; $socdlhepbd=0; $socdlhenbd=0;
while($row = mysql_fetch_array($resultpa))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apa=$apa+1;
elseif ($pub=='B') $bpa=$bpa+1;
elseif ($pub=='C') $cpa=$cpa+1;
elseif ($pub=='E') $epa=$epa+1;
elseif ($pub=='G') $gpa=$gpa+1;
elseif ($pub=='S') $spa=$spa+1;
elseif ($pub=='F') $fpa=$fpa+1;
elseif ($pub=='O') $opa=$opa+1;
elseif ($pub=='X') $xpa=$xpa+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypa1=$ypa1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypa2=$ypa2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypa3=$ypa3+1;
else $zpa=$zpa+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepaa=$socdlhepaa+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenaa=$socdlhenaa+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepba=$socdlhepba+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenba=$socdlhenba+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpb))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apb=$apb+1;
elseif ($pub=='B') $bpb=$bpb+1;
elseif ($pub=='C') $cpb=$cpb+1;
elseif ($pub=='E') $epb=$epb+1;
elseif ($pub=='G') $gpb=$gpb+1;
elseif ($pub=='S') $spb=$spb+1;
elseif ($pub=='F') $fpb=$fpb+1;
elseif ($pub=='O') $opb=$opb+1;
elseif ($pub=='X') $xpb=$xpb+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypb1=$ypb1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypb2=$ypb2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypb3=$ypb3+1;
else $zpb=$zpb+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepab=$socdlhepab+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenab=$socdlhenab+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbb=$socdlhepbb+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbb=$socdlhenbb+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpc))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apc=$apc+1;
elseif ($pub=='B') $bpc=$bpc+1;
elseif ($pub=='C') $cpc=$cpc+1;
elseif ($pub=='E') $epc=$epc+1;
elseif ($pub=='G') $gpc=$gpc+1;
elseif ($pub=='S') $spc=$spc+1;
elseif ($pub=='F') $fpc=$fpc+1;
elseif ($pub=='O') $opc=$opc+1;
elseif ($pub=='X') $xpc=$xpc+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypc1=$ypc1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypc2=$ypc2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypc3=$ypc3+1;
else $zpc=$zpc+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepac=$socdlhepac+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenac=$socdlhenac+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbc=$socdlhepbc+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbc=$socdlhenbc+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpd))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apd=$apd+1;
elseif ($pub=='B') $bpd=$bpd+1;
elseif ($pub=='C') $cpd=$cpd+1;
elseif ($pub=='E') $epd=$epd+1;
elseif ($pub=='G') $gpd=$gpd+1;
elseif ($pub=='S') $spd=$spd+1;
elseif ($pub=='F') $fpd=$fpd+1;
elseif ($pub=='O') $opd=$opd+1;
elseif ($pub=='X') $xpd=$xpd+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypd1=$ypd1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypd2=$ypd2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypd3=$ypd3+1;
else $zpd=$zpd+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepad=$socdlhepad+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenad=$socdlhenad+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbd=$socdlhepbd+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbd=$socdlhenbd+1;
else $socres=$socres+1;
}

$positivea = $apa + $bpa + $cpa + $epa + $spa;
$positive3a = $positivea + $fpa;
$positive2a = number_format((($positivea / $positive3a) * 100),1);

$positiveb = $apb + $bpb + $cpb + $epb + $spb;
$positive3b = $positiveb + $fpb;
$positive2b = number_format((($positiveb / $positive3b) * 100),1);

$positivec = $apc + $bpc + $cpc + $epc + $spc;
$positive3c = $positivec + $fpc;
$positive2c = number_format((($positivec / $positive3c) * 100),1);

$positived = $apd + $bpd + $cpd + $epd + $spd;
$positive3d = $positived + $fpd;
$positive2d = number_format((($positived / $positive3d) * 100),1);

$socdlhepa = $socdlhepaa + $socdlhepba;
$socdlhena = $socdlhenaa + $socdlhenba;
$socdlhea = number_format((($socdlhepa / ($socdlhepa + $socdlhena)) * 100),1);

$socdlhepb = $socdlhepab + $socdlhepbb;
$socdlhenb = $socdlhenab + $socdlhenbb;
$socdlheb = number_format((($socdlhepb / ($socdlhepb + $socdlhenb)) * 100),1);

$socdlhepc = $socdlhepac + $socdlhepbc;
$socdlhenc = $socdlhenac + $socdlhenbc;
$socdlhec = number_format((($socdlhepc / ($socdlhepc + $socdlhenc)) * 100),1);

$socdlhepd = $socdlhepad + $socdlhepbd;
$socdlhend = $socdlhenad + $socdlhenbd;
$socdlhed = number_format((($socdlhepd / ($socdlhepd + $socdlhend)) * 100),1);

echo "<br /><table border='1'><tr><th>Survey</th><th>Survey Population</th><th>Respondents</th><th>Response Rate</th><th>Positive Outcomes (PO)</th><th>Graduate Prospects (GP)</th></tr>";
$percentar = number_format((( $countsa / $smallra ) * 100 ),1);
$percentbr = number_format((( $countsb / $smallrb ) * 100 ),1);
$percentcr = number_format((( $countsc / $smallrc ) * 100 ),1);
$percentdr = number_format((( $countsd / $smallrd ) * 100 ),1);
if ($d=="%" || $d=='6') {
if ($smallra>0) echo "<tr><th>2007/08</th><td>$smallra</td><td>$countsa</td><td>$percentar%</td><td>$positive2a%</td><td>$socdlhea%</td></tr>";
else echo "<tr><th>2007/08</th><td>$smallra</td><td>$countsa</td><td>N/A</td><td>N/A</td><td>N/A</td></tr>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($smallrb>0) echo "<tr><th>2008/09</th><td>$smallrb</td><td>$countsb</td><td>$percentbr%</td><td>$positive2b%</td><td>$socdlheb%</td></tr>";
else echo "<tr><th>2008/09</th><td>$smallrb</td><td>$countsb</td><td>N/A</td><td>N/A</td><td>N/A</td></tr>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($smallrc>0) echo "<tr><th>2009/10</th><td>$smallrc</td><td>$countsc</td><td>$percentcr%</td><td>$positive2c%</td><td>$socdlhec%</td></tr>";
else echo "<tr><th>2009/10</th><td>$smallrc</td><td>$countsc</td><td>N/A</td><td>N/A</td><td>N/A</td></tr>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($smallrd>0) echo "<tr><th>2010/11</th><td>$smallrd</td><td>$countsd</td><td>$percentdr%</td><td>$positive2d%</td><td>$socdlhed%</td></tr>";
else echo "<tr><th>2010/11</th><td>$smallrd</td><td>$countsd</td><td>N/A</td><td>N/A</td><td>N/A</td></tr>";
}
echo "</table>";

echo "<br /><p class='small'>Positive Outcomes: The proportion of graduates who were available for employment that had secured employment or further study.</p><br /><p class='small'>Graduate Prospects: The proportion of graduates who were available for employment that had secured graduate-level employment or graduate-level further study. </p><br />";

$percentpa = $apa + $bpa + $cpa + $dpa + $epa + $fpa + $gpa + $opa + $spa;
$percentapa = (number_format((( $apa / $percentpa ) * 100 ),1));
$percentbpa = (number_format((( $bpa / $percentpa ) * 100 ),1));
$percentcpa = (number_format((( $cpa / $percentpa ) * 100 ),1));
$percentspa = (number_format((( $spa / $percentpa ) * 100 ),1));
$percentepa = (number_format((( $epa / $percentpa ) * 100 ),1));
$percentfpa = (number_format((( $fpa / $percentpa ) * 100 ),1));
$percentgpa = (number_format((( $gpa / $percentpa ) * 100 ),1));
$percentopa = (number_format((( $opa / $percentpa ) * 100 ),1));

$percentpb = $apb + $bpb + $cpb + $dpb + $epb + $fpb + $gpb + $opb + $spb;
$percentapb = (number_format((( $apb / $percentpb ) * 100 ),1));
$percentbpb = (number_format((( $bpb / $percentpb ) * 100 ),1));
$percentcpb = (number_format((( $cpb / $percentpb ) * 100 ),1));
$percentspb = (number_format((( $spb / $percentpb ) * 100 ),1));
$percentepb = (number_format((( $epb / $percentpb ) * 100 ),1));
$percentfpb = (number_format((( $fpb / $percentpb ) * 100 ),1));
$percentgpb = (number_format((( $gpb / $percentpb ) * 100 ),1));
$percentopb = (number_format((( $opb / $percentpb ) * 100 ),1));

$percentpc = $apc + $bpc + $cpc + $dpc + $epc + $fpc + $gpc + $opc + $spc;
$percentapc = (number_format((( $apc / $percentpc ) * 100 ),1));
$percentbpc = (number_format((( $bpc / $percentpc ) * 100 ),1));
$percentcpc = (number_format((( $cpc / $percentpc ) * 100 ),1));
$percentspc = (number_format((( $spc / $percentpc ) * 100 ),1));
$percentepc = (number_format((( $epc / $percentpc ) * 100 ),1));
$percentfpc = (number_format((( $fpc / $percentpc ) * 100 ),1));
$percentgpc = (number_format((( $gpc / $percentpc ) * 100 ),1));
$percentopc = (number_format((( $opc / $percentpc ) * 100 ),1));

$percentpd = $apd + $bpd + $cpd + $dpd + $epd + $fpd + $gpd + $opd + $spd;
$percentapd = (number_format((( $apd / $percentpd ) * 100 ),1));
$percentbpd = (number_format((( $bpd / $percentpd ) * 100 ),1));
$percentcpd = (number_format((( $cpd / $percentpd ) * 100 ),1));
$percentspd = (number_format((( $spd / $percentpd ) * 100 ),1));
$percentepd = (number_format((( $epd / $percentpd ) * 100 ),1));
$percentfpd = (number_format((( $fpd / $percentpd ) * 100 ),1));
$percentgpd = (number_format((( $gpd / $percentpd ) * 100 ),1));
$percentopd = (number_format((( $opd / $percentpd ) * 100 ),1));

echo "<br /><table border='1'><tr><th rowspan='2'>Publication Categories</th>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><th colspan='2'>2007/08 Survey</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><th colspan='2'>2008/09 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><th colspan='2'>2009/10 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><th colspan='2'>2010/11 Survey</th>";
echo "</tr>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><th style='font-size:10px'>&nbsp;Number&nbsp;</th><th style='font-size:10px'>&nbsp;Percentage&nbsp;</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><th style='font-size:10px'>&nbsp;Number&nbsp;</th><th style='font-size:10px'>&nbsp;Percentage&nbsp;</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><th style='font-size:10px'>&nbsp;Number&nbsp;</th><th style='font-size:10px'>&nbsp;Percentage&nbsp;</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><th style='font-size:10px'>&nbsp;Number&nbsp;</th><th style='font-size:10px'>&nbsp;Percentage&nbsp;</th>";
echo "</tr><tr><td>In full-time paid work (inc. self-employment)&nbsp;&nbsp;</td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$apa</td><td class='value'>" . $percentapa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$apb</td><td class='value'>" . $percentapb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$apc</td><td class='value'>" . $percentapc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$apd</td><td class='value'>" . $percentapd . "%</td>";
echo "</tr><tr><td>In part-time paid work </td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$bpa</td><td class='value'>" . $percentbpa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$bpb</td><td class='value'>" . $percentbpb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$bpc</td><td class='value'>" . $percentbpc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$bpd</td><td class='value'>" . $percentbpd . "%</td>";
echo "</tr><tr><td>In voluntary/unpaid work </td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$cpa</td><td class='value'>" . $percentcpa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$cpb</td><td class='value'>" . $percentcpb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$cpc</td><td class='value'>" . $percentcpc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$cpd</td><td class='value'>" . $percentcpd . "%</td>";
echo "</tr><tr><td>In further study </td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$epa</td><td class='value'>" . $percentepa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$epb</td><td class='value'>" . $percentepb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$epc</td><td class='value'>" . $percentepc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$epd</td><td class='value'>" . $percentepd . "%</td>";
echo "</tr><tr><td>Not available for employment (inc. gap year)</td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$gpa</td><td class='value'>" . $percentgpa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$gpb</td><td class='value'>" . $percentgpb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$gpc</td><td class='value'>" . $percentgpc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$gpd</td><td class='value'>" . $percentgpd . "%</td>";
echo "</tr><tr><td>Due to start work</td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$spa</td><td class='value'>" . $percentspa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$spb</td><td class='value'>" . $percentspb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$spc</td><td class='value'>" . $percentspc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$spd</td><td class='value'>" . $percentspd . "%</td>";
echo "</tr><tr><td>Assumed unemployed</td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$fpa</td><td class='value'>" . $percentfpa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$fpb</td><td class='value'>" . $percentfpb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$fpc</td><td class='value'>" . $percentfpc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$fpd</td><td class='value'>" . $percentfpd . "%</td>";
echo "</tr><tr><td>Other</td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$opa</td><td class='value'>" . $percentopa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$opb</td><td class='value'>" . $percentopb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$opc</td><td class='value'>" . $percentopc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$opd</td><td class='value'>" . $percentopd . "%</td>";
echo "</tr><tr><th>Total Known Destinations</th>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$percentpa</td><td>&nbsp;</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$percentpb</td><td>&nbsp;</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$percentpc</td><td>&nbsp;</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$percentpd</td><td>&nbsp;</td>";
echo "</tr><tr><td class='value'>Declined</td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$xpa</td><td></td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$xpb</td><td></td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$xpc</td><td></td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$xpd</td><td></td>";
echo "</tr></table>";

echo "<br /><table border='1'><tr><th>No Information obtained</th>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><th>2007/08 Survey</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><th>2008/09 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><th>2009/10 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><th>2010/11 Survey</th>";
echo "</tr><tr><td>Home graduates&nbsp;&nbsp;</td>";
if ($d=="%" || $d=='6') {
if ($h=='%' || $h=='1' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypa1</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($h=='%' || $h=='1' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypb1</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($h=='%' || $h=='1' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypc1</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($h=='%' || $h=='1' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypd1</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
echo "</tr><tr><td>EU graduates&nbsp;&nbsp;</td>";
if ($d=="%" || $d=='6') {
if ($h=='%' || $h=='2' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypa2</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($h=='%' || $h=='2' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypb2</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($h=='%' || $h=='2' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypc2</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($h=='%' || $h=='2' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypd2</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
echo "</tr><tr><td>International graduates&nbsp;&nbsp;</td>";
if ($d=="%" || $d=='6') {
if ($h=='%' || $h=='4') echo "<td class='no'></td><td>&nbsp;$ypa3</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($h=='%' || $h=='4') echo "<td class='no'></td><td>&nbsp;$ypb3</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($h=='%' || $h=='4') echo "<td class='no'></td><td>&nbsp;$ypc3</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($h=='%' || $h=='4') echo "<td class='no'></td><td>&nbsp;$ypd3</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
echo "</tr></table>";


if ($school!='%' || $subject!='%' || $course!='%') echo "<p class='positive'>Comparison groups";

if ($e=='%' && $f=='%' && $g=='%' && $h=='%' && ($school!='%' || $subject!='%' || $course!='%')) {
echo " (all graduates)</p>";
}
elseif ($e!='%' && $f=='%' && $g=='%' && $h=='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($e=='1') echo " (full-time graduates)</p>";
else echo " (part-time graduates)</p>";
}

elseif ($e=='%' && $f=='%' && $g!='%' && $h=='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($g=='1') echo " (other undergraduate degree graduates)</p>";
elseif ($g=='2') echo " (first degree graduates)</p>";
elseif ($g=='3') echo " (postgrad taught graduates)</p>";
else echo " (postgrad research graduates)</p>";
}
elseif ($e=='%' && $f!='%' && $g=='%' && $h=='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($f=='1') echo " (undergraduate degree graduates)</p>";
else echo " (postgraduate degee graduates)</p>";
}
elseif ($e=='%' && $f=='%' && $g=='%' && $h!='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($h=='1') echo " (UK graduates)</p>";
elseif ($h=='3') echo " (Home & EU graduates)</p>";
elseif ($h=='4') echo " (International graduates)</p>";
else echo " (EU graduates)</p>";
}
elseif ($e!='%' && $f!='%' && $g=='%' && $h=='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($e=='1') echo " (full-time, ";
else echo " (part-time, ";
if ($f=='1') echo "undergraduate degree graduates)</p>";
else echo "postgraduate degree graduates)</p>";
}
elseif ($e=='%' && $f!='%' && $g!='%' && $h=='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($g=='1') echo " (other undergraduate degree graduates)</p>";
elseif ($g=='2') echo " (first degree graduates)</p>";
elseif ($g=='3') echo " (postgrad taught graduates)</p>";
else echo " (postgrad research graduates)</p>";
}
elseif ($e=='%' && $f!='%' && $g=='%' && $h!='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($f=='1') echo " (undergraduate degree, ";
else echo " (postgraduate degree, ";
if ($h=='1') echo "UK graduates)</p>";
elseif ($h=='3') echo "Home & EU graduates)</p>";
elseif ($h=='4') echo "International graduates)</p>";
else echo "EU graduates)</p>";
}
elseif ($e!='%' && $f=='%' && $g!='%' && $h=='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($e=='1') echo " (full-time, ";
else echo " (part-time, ";
if ($g=='1') echo "other undergraduate degree graduates)</p>";
elseif ($g=='2') echo "first degree graduates)</p>";
elseif ($g=='3') echo "postgrad taught graduates)</p>";
else echo "postgrad research graduates)</p>";
}
elseif ($e!='%' && $f=='%' && $g=='%' && $h!='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($e=='1') echo " (full-time, ";
else echo " (part-time, ";
if ($h=='1') echo "UK graduates)</p>";
elseif ($h=='3') echo "Home & EU graduates)</p>";
elseif ($h=='4') echo "International graduates)</p>";
else echo "EU graduates)</p>";
}
elseif ($e=='%' && $f=='%' && $g!='%' && $h!='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($g=='1') echo " (other undergraduate degree, ";
elseif ($g=='2') echo " (first degree, ";
elseif ($g=='3') echo " (postgrad taught, ";
else echo " (postgrad research, ";
if ($h=='1') echo "UK graduates)</p>";
elseif ($h=='3') echo "Home & EU graduates)</p>";
elseif ($h=='4') echo "International graduates)</p>";
else echo "EU graduates)</p>";
}
elseif ($e!='%' && $f!='%' && $g!='%' && $h=='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($e=='1') echo " (full-time, ";
else echo " (part-time, ";
if ($g=='1') echo "other undergraduate degree graduates)</p>";
elseif ($g=='2') echo "first degree graduates)</p>";
elseif ($g=='3') echo "postgrad taught graduates)</p>";
else echo "postgrad research graduates)</p>";
}
elseif ($e!='%' && $f=='%' && $g!='%' && $h!='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($e=='1') echo " (full-time, ";
else echo " (part-time, ";
if ($g=='1') echo "other undergraduate degree, ";
elseif ($g=='2') echo "first degree, ";
elseif ($g=='3') echo "postgrad taught, ";
else echo "postgrad research, ";
if ($h=='1') echo "UK graduates)</p>";
elseif ($h=='3') echo "Home & EU graduates)</p>";
elseif ($h=='4') echo "International graduates)</p>";
else echo "EU graduates)</p>";
}
elseif ($e=='%' && $f!='%' && $g!='%' && $h!='%' && ($school!='%' || $subject!='%' || $course!='%')) {
if ($g=='1') echo " (other undergraduate degree, ";
elseif ($g=='2') echo " (first degree, ";
elseif ($g=='3') echo " (postgrad taught, ";
else echo " (postgrad research, ";
if ($h=='1') echo "UK graduates)</p>";
elseif ($h=='3') echo "Home & EU graduates)</p>";
elseif ($h=='4') echo "International graduates)</p>";
else echo "EU graduates)</p>";
}
else {
if ($e=='1' && ($school!='%' || $subject!='%' || $course!='%')) echo " (full-time, ";
elseif  ($school!='%' || $subject!='%' || $course!='%') echo " (part-time, ";
else echo "";
if ($g=='1' && ($school!='%' || $subject!='%' || $course!='%')) echo "other undergraduate degree, ";
elseif ($g=='2' && ($school!='%' || $subject!='%' || $course!='%')) echo "first degree, ";
elseif ($school!='%' || $subject!='%' || $course!='%') echo "postgraduate degree, ";
else echo "";
if ($h=='1' && ($school!='%' || $subject!='%' || $course!='%')) echo "UK graduates)</p>";
elseif ($h=='3' && ($school!='%' || $subject!='%' || $course!='%')) echo "Home & EU graduates)</p>";
elseif ($h=='4' && ($school!='%' || $subject!='%' || $course!='%')) echo "International graduates)</p>";
elseif ($school!='%' || $subject!='%' || $course!='%') echo "EU graduates)</p>";
else echo "";
}

if (($school=='%' && $subject=='%' && $course!='%') || ($school!='%' && $subject!='%' && $course=='%') || ($school!='%' && $subject=='%' && $course!='%') || ($school=='%' && $subject!='%' && $course!='%') || ($school!='%' && $subject!='%' && $course!='%')) {

echo "<table border='1'><tr><th rowspan='2'>$option1</th>";
if ($d=="%" || $d=='6') echo "<th colspan='3'>2007/08 Survey</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th colspan='3'>2008/09 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th colspan='3'>2009/10 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th colspan='3'>2010/11 Survey</th>";
echo "</tr>";
if ($d=="%" || $d=='6') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th>No</th><th>PO</th><th>GP</th>";
echo "</tr><tr>";
$es="select SCHOOL from popdlhe1011 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' LIMIT 1";
$et = mysql_query($es);
$ex = mysql_num_rows($et);

if ($ex=='0') {
$es="select SCHOOL from popdlhe910 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' LIMIT 1";
$et = mysql_query($es);
$ex = mysql_num_rows($et);
}

if ($ex=='0') {
$es="select SCHOOL from popdlhe89 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' LIMIT 1";
$et = mysql_query($es);
$ex = mysql_num_rows($et);
}

if ($ex=='0') {
$es="select SCHOOL from popdlhe78 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SUBJECT like '".$subject."' LIMIT 1";
$et = mysql_query($es);
$ex = mysql_num_rows($et);
}

while($row = mysql_fetch_array($et))
 {
 $schoola=$row["SCHOOL"];
}

$joinpd="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract1011 inner join popdlhe1011 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SCHOOL like '".$schoola."')";
$resultpd = mysql_query($joinpd);
$countsd = mysql_num_rows($resultpd);
$joinpc="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract910 inner join popdlhe910 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SCHOOL like '".$schoola."')";
$resultpc = mysql_query($joinpc);
$countsc = mysql_num_rows($resultpc);
$joinpb="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract89 inner join popdlhe89 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SCHOOL like '".$schoola."')";
$resultpb = mysql_query($joinpb);
$countsb = mysql_num_rows($resultpb);
$joinpa="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract78 inner join popdlhe78 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SCHOOL like '".$schoola."')";
$resultpa = mysql_query($joinpa);
$countsa = mysql_num_rows($resultpa);

$apa=0; $bpa=0; $cpa=0; $spa=0; $epa=0; $fpa=0; $gpa=0; $opa=0; $xpa=0;
$apb=0; $bpb=0; $cpb=0; $spb=0; $epb=0; $fpb=0; $gpb=0; $opb=0; $xpb=0;
$apc=0; $bpc=0; $cpc=0; $spc=0; $epc=0; $fpc=0; $gpc=0; $opc=0; $xpc=0;
$apd=0; $bpd=0; $cpd=0; $spd=0; $epd=0; $fpd=0; $gpd=0; $opd=0; $xpd=0;
$socdlhepaa=0; $socdlhenaa=0; $socdlhepba=0; $socdlhenba=0;
$socdlhepab=0; $socdlhenab=0; $socdlhepbb=0; $socdlhenbb=0;
$socdlhepac=0; $socdlhenac=0; $socdlhepbc=0; $socdlhenbc=0;
$socdlhepad=0; $socdlhenad=0; $socdlhepbd=0; $socdlhenbd=0;
while($row = mysql_fetch_array($resultpa))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apa=$apa+1;
elseif ($pub=='B') $bpa=$bpa+1;
elseif ($pub=='C') $cpa=$cpa+1;
elseif ($pub=='E') $epa=$epa+1;
elseif ($pub=='G') $gpa=$gpa+1;
elseif ($pub=='S') $spa=$spa+1;
elseif ($pub=='F') $fpa=$fpa+1;
elseif ($pub=='O') $opa=$opa+1;
elseif ($pub=='X') $xpa=$xpa+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypa1=$ypa1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypa2=$ypa2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypa3=$ypa3+1;
else $zpa=$zpa+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepaa=$socdlhepaa+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenaa=$socdlhenaa+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepba=$socdlhepba+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenba=$socdlhenba+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpb))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apb=$apb+1;
elseif ($pub=='B') $bpb=$bpb+1;
elseif ($pub=='C') $cpb=$cpb+1;
elseif ($pub=='E') $epb=$epb+1;
elseif ($pub=='G') $gpb=$gpb+1;
elseif ($pub=='S') $spb=$spb+1;
elseif ($pub=='F') $fpb=$fpb+1;
elseif ($pub=='O') $opb=$opb+1;
elseif ($pub=='X') $xpb=$xpb+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypb1=$ypb1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypb2=$ypb2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypb3=$ypb3+1;
else $zpb=$zpb+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepab=$socdlhepab+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenab=$socdlhenab+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbb=$socdlhepbb+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbb=$socdlhenbb+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpc))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apc=$apc+1;
elseif ($pub=='B') $bpc=$bpc+1;
elseif ($pub=='C') $cpc=$cpc+1;
elseif ($pub=='E') $epc=$epc+1;
elseif ($pub=='G') $gpc=$gpc+1;
elseif ($pub=='S') $spc=$spc+1;
elseif ($pub=='F') $fpc=$fpc+1;
elseif ($pub=='O') $opc=$opc+1;
elseif ($pub=='X') $xpc=$xpc+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypc1=$ypc1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypc2=$ypc2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypc3=$ypc3+1;
else $zpc=$zpc+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepac=$socdlhepac+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenac=$socdlhenac+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbc=$socdlhepbc+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbc=$socdlhenbc+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpd))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apd=$apd+1;
elseif ($pub=='B') $bpd=$bpd+1;
elseif ($pub=='C') $cpd=$cpd+1;
elseif ($pub=='E') $epd=$epd+1;
elseif ($pub=='G') $gpd=$gpd+1;
elseif ($pub=='S') $spd=$spd+1;
elseif ($pub=='F') $fpd=$fpd+1;
elseif ($pub=='O') $opd=$opd+1;
elseif ($pub=='X') $xpd=$xpd+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypd1=$ypd1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypd2=$ypd2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypd3=$ypd3+1;
else $zpd=$zpd+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepad=$socdlhepad+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenad=$socdlhenad+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbd=$socdlhepbd+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbd=$socdlhenbd+1;
else $socres=$socres+1;
}

$positivea = $apa + $bpa + $cpa + $spa + $epa;
$positive3a = $positivea + $fpa;
$positive2a = number_format((($positivea / $positive3a) * 100),1);

$positiveb = $apb + $bpb + $cpb + $spb + $epb;
$positive3b = $positiveb + $fpb;
$positive2b = number_format((($positiveb / $positive3b) * 100),1);

$positivec = $apc + $bpc + $cpc + $spc + $epc;
$positive3c = $positivec + $fpc;
$positive2c = number_format((($positivec / $positive3c) * 100),1);

$positived = $apd + $bpd + $cpd + $spd + $epd;
$positive3d = $positived + $fpd;
$positive2d = number_format((($positived / $positive3d) * 100),1);

$socdlhepa = $socdlhepaa + $socdlhepba;
$socdlhena = $socdlhenaa + $socdlhenba;
$socdlhea = number_format((($socdlhepa / ($socdlhepa + $socdlhena)) * 100),1);

$socdlhepb = $socdlhepab + $socdlhepbb;
$socdlhenb = $socdlhenab + $socdlhenbb;
$socdlheb = number_format((($socdlhepb / ($socdlhepb + $socdlhenb)) * 100),1);

$socdlhepc = $socdlhepac + $socdlhepbc;
$socdlhenc = $socdlhenac + $socdlhenbc;
$socdlhec = number_format((($socdlhepc / ($socdlhepc + $socdlhenc)) * 100),1);

$socdlhepd = $socdlhepad + $socdlhepbd;
$socdlhend = $socdlhenad + $socdlhenbd;
$socdlhed = number_format((($socdlhepd / ($socdlhepd + $socdlhend)) * 100),1);

echo "<td>$schoola</td>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsa</td><td>$positive2a%</td><td>$socdlhea%</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsb</td><td>$positive2b%</td><td>$socdlheb%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsc</td><td>$positive2c%</td><td>$socdlhec%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsd</td><td>$positive2d%</td><td>$socdlhed%</td>";
}
echo "</tr></table><br/>";
}

elseif ($school!='%' && $subject=='%') {
$es="(select DISTINCT SCHOOL, count(SCHOOL) AS sum FROM popdlhe78 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SCHOOL <> '' GROUP BY SCHOOL) UNION (select DISTINCT SCHOOL, count(SCHOOL) AS sum FROM popdlhe89 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SCHOOL <> '' GROUP BY SCHOOL) UNION (select DISTINCT SCHOOL, count(SCHOOL) AS sum FROM popdlhe910 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SCHOOL <> '' GROUP BY SCHOOL) UNION (select DISTINCT SCHOOL, count(SCHOOL) AS sum FROM popdlhe1011 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SCHOOL <> '' GROUP BY SCHOOL) ORDER by SCHOOL";
$et = mysql_query($es);
$ex = mysql_num_rows($et);
while($row = mysql_fetch_array($et))
 {
 if ($residuea==$row[SCHOOL]) $esum=$esum+$row[sum];
else $esum='0';
$s=$row[SCHOOL];
if (($row[sum]>$minimum || $esum>$minimum) && $residuea!=$row[SCHOOL]) $arrschool[]=$s;
$residuea=$row[SCHOOL];
$esum=$row[sum];
}

echo "<table border='1'><tr><th rowspan='2'>$option1</th>";
if ($d=="%" || $d=='6') echo "<th colspan='3'>2007/08 Survey</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th colspan='3'>2008/09 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th colspan='3'>2009/10 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th colspan='3'>2010/11 Survey</th>";
echo "</tr>";
if ($d=="%" || $d=='6') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th>No</th><th>PO</th><th>GP</th>";
echo "</tr><tr>";
foreach ($arrschool as $arr)
{
$joinpd="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract1011 inner join popdlhe1011 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SCHOOL like '".$arr."')";
$resultpd = mysql_query($joinpd);
$countsd = mysql_num_rows($resultpd);
$joinpc="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract910 inner join popdlhe910 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SCHOOL like '".$arr."')";
$resultpc = mysql_query($joinpc);
$countsc = mysql_num_rows($resultpc);
$joinpb="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract89 inner join popdlhe89 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SCHOOL like '".$arr."')";
$resultpb = mysql_query($joinpb);
$countsb = mysql_num_rows($resultpb);
$joinpa="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract78 inner join popdlhe78 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SCHOOL like '".$arr."')";
$resultpa = mysql_query($joinpa);
$countsa = mysql_num_rows($resultpa);

$apa=0; $bpa=0; $cpa=0; $spa=0; $epa=0; $fpa=0; $gpa=0; $opa=0; $xpa=0;
$apb=0; $bpb=0; $cpb=0; $spb=0; $epb=0; $fpb=0; $gpb=0; $opb=0; $xpb=0;
$apc=0; $bpc=0; $cpc=0; $spc=0; $epc=0; $fpc=0; $gpc=0; $opc=0; $xpc=0;
$apd=0; $bpd=0; $cpd=0; $spd=0; $epd=0; $fpd=0; $gpd=0; $opd=0; $xpd=0;
$socdlhepaa=0; $socdlhenaa=0; $socdlhepba=0; $socdlhenba=0;
$socdlhepab=0; $socdlhenab=0; $socdlhepbb=0; $socdlhenbb=0;
$socdlhepac=0; $socdlhenac=0; $socdlhepbc=0; $socdlhenbc=0;
$socdlhepad=0; $socdlhenad=0; $socdlhepbd=0; $socdlhenbd=0;
while($row = mysql_fetch_array($resultpa))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apa=$apa+1;
elseif ($pub=='B') $bpa=$bpa+1;
elseif ($pub=='C') $cpa=$cpa+1;
elseif ($pub=='E') $epa=$epa+1;
elseif ($pub=='G') $gpa=$gpa+1;
elseif ($pub=='S') $spa=$spa+1;
elseif ($pub=='F') $fpa=$fpa+1;
elseif ($pub=='O') $opa=$opa+1;
elseif ($pub=='X') $xpa=$xpa+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypa1=$ypa1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypa2=$ypa2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypa3=$ypa3+1;
else $zpa=$zpa+1;


if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepaa=$socdlhepaa+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenaa=$socdlhenaa+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepba=$socdlhepba+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenba=$socdlhenba+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpb))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apb=$apb+1;
elseif ($pub=='B') $bpb=$bpb+1;
elseif ($pub=='C') $cpb=$cpb+1;
elseif ($pub=='E') $epb=$epb+1;
elseif ($pub=='G') $gpb=$gpb+1;
elseif ($pub=='S') $spb=$spb+1;
elseif ($pub=='F') $fpb=$fpb+1;
elseif ($pub=='O') $opb=$opb+1;
elseif ($pub=='X') $xpb=$xpb+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypb1=$ypb1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypb2=$ypb2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypb3=$ypb3+1;
else $zpb=$zpb+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepab=$socdlhepab+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenab=$socdlhenab+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbb=$socdlhepbb+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbb=$socdlhenbb+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpc))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apc=$apc+1;
elseif ($pub=='B') $bpc=$bpc+1;
elseif ($pub=='C') $cpc=$cpc+1;
elseif ($pub=='E') $epc=$epc+1;
elseif ($pub=='G') $gpc=$gpc+1;
elseif ($pub=='S') $spc=$spc+1;
elseif ($pub=='F') $fpc=$fpc+1;
elseif ($pub=='O') $opc=$opc+1;
elseif ($pub=='X') $xpc=$xpc+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypc1=$ypc1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypc2=$ypc2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypc3=$ypc3+1;
else $zpc=$zpc+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepac=$socdlhepac+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenac=$socdlhenac+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbc=$socdlhepbc+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbc=$socdlhenbc+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpd))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apd=$apd+1;
elseif ($pub=='B') $bpd=$bpd+1;
elseif ($pub=='C') $cpd=$cpd+1;
elseif ($pub=='E') $epd=$epd+1;
elseif ($pub=='G') $gpd=$gpd+1;
elseif ($pub=='S') $spd=$spd+1;
elseif ($pub=='F') $fpd=$fpd+1;
elseif ($pub=='O') $opd=$opd+1;
elseif ($pub=='X') $xpd=$xpd+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypd1=$ypd1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypd2=$ypd2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypd3=$ypd3+1;
else $zpd=$zpd+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepad=$socdlhepad+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenad=$socdlhenad+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbd=$socdlhepbd+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbd=$socdlhenbd+1;
else $socres=$socres+1;
}

$positivea = $apa + $bpa + $cpa + $spa + $epa;
$positive3a = $positivea + $fpa;
$positive2a = number_format((($positivea / $positive3a) * 100),1);

$positiveb = $apb + $bpb + $cpb + $spb + $epb;
$positive3b = $positiveb + $fpb;
$positive2b = number_format((($positiveb / $positive3b) * 100),1);

$positivec = $apc + $bpc + $cpc + $spc + $epc;
$positive3c = $positivec + $fpc;
$positive2c = number_format((($positivec / $positive3c) * 100),1);

$positived = $apd + $bpd + $cpd + $spd + $epd;
$positive3d = $positived + $fpd;
$positive2d = number_format((($positived / $positive3d) * 100),1);

$socdlhepa = $socdlhepaa + $socdlhepba;
$socdlhena = $socdlhenaa + $socdlhenba;
$socdlhea = number_format((($socdlhepa / ($socdlhepa + $socdlhena)) * 100),1);

$socdlhepb = $socdlhepab + $socdlhepbb;
$socdlhenb = $socdlhenab + $socdlhenbb;
$socdlheb = number_format((($socdlhepb / ($socdlhepb + $socdlhenb)) * 100),1);

$socdlhepc = $socdlhepac + $socdlhepbc;
$socdlhenc = $socdlhenac + $socdlhenbc;
$socdlhec = number_format((($socdlhepc / ($socdlhepc + $socdlhenc)) * 100),1);

$socdlhepd = $socdlhepad + $socdlhepbd;
$socdlhend = $socdlhenad + $socdlhenbd;
$socdlhed = number_format((($socdlhepd / ($socdlhepd + $socdlhend)) * 100),1);

if ($arr!=$a) {
echo "<td>$arr</td>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsa</td><td>$positive2a%</td><td>$socdlhea%</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsb</td><td>$positive2b%</td><td>$socdlheb%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsc</td><td>$positive2c%</td><td>$socdlhec%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsd</td><td>$positive2d%</td><td>$socdlhed%</td>";
}
echo "</tr>";
}

else {
echo "<th align='left'>$arr</td>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<th align='left'>0</td><th align='left'>-</td><th align='left'>-</td>";
else echo "<th align='left'>$countsa</td><th align='left'>$positive2a%</td><th align='left'>$socdlhea%</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<th align='left'>0</td><th align='left'>-</td><th align='left'>-</td>";
else echo "<th align='left'>$countsb</td><th align='left'>$positive2b%</td><th align='left'>$socdlheb%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<th align='left'>0</td><th align='left'>-</td><th align='left'>-</td>";
else echo "<th align='left'>$countsc</td><th align='left'>$positive2c%</td><th align='left'>$socdlhec%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<th align='left'>0</td><th align='left'>-</td><th align='left'>-</td>";
else echo "<th align='left'>$countsd</td><th align='left'>$positive2d%</td><th align='left'>$socdlhed%</td>";
}
echo "</tr>";
}
}

echo "</table><br/>";
}
else {
echo "";
}

if ((($school!='%' && $subject!='%') || ($school=='%' && $subject!='%') || ($school=='%' && $subject=='%')) && $course!='%') {
$subjects="select SUBJECT from popdlhe1011 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SCHOOL like '".$school."' LIMIT 1";
$subjectt = mysql_query($subjects);
$subjectx = mysql_num_rows($subjectt);

if ($subjectx=='0') {
$subjects="select SUBJECT from popdlhe910 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SCHOOL like '".$school."' LIMIT 1";
$subjectt = mysql_query($subjects);
$subjectx = mysql_num_rows($subjectt);
}

if ($subjectx=='0') {
$subjects="select SUBJECT from popdlhe89 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SCHOOL like '".$school."' LIMIT 1";
$subjectt = mysql_query($subjects);
$subjectx = mysql_num_rows($subjectt);
}

if ($subjectx=='0') {
$subjects="select SUBJECT from popdlhe78 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SCHOOL like '".$school."' LIMIT 1";
$subjectt = mysql_query($subjects);
$subjectx = mysql_num_rows($subjectt);
}

while($row = mysql_fetch_array($subjectt))
 {
 $subjecta=$row["SUBJECT"];
}

$joinpd="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract1011 inner join popdlhe1011 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT like '".$subjecta."')";
$resultpd = mysql_query($joinpd);
$countsd = mysql_num_rows($resultpd);
$joinpc="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract910 inner join popdlhe910 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT like '".$subjecta."')";
$resultpc = mysql_query($joinpc);
$countsc = mysql_num_rows($resultpc);
$joinpb="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract89 inner join popdlhe89 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT like '".$subjecta."')";
$resultpb = mysql_query($joinpb);
$countsb = mysql_num_rows($resultpb);
$joinpa="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract78 inner join popdlhe78 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT like '".$subjecta."')";
$resultpa = mysql_query($joinpa);
$countsa = mysql_num_rows($resultpa);

$apa=0; $bpa=0; $cpa=0; $spa=0; $epa=0; $fpa=0; $gpa=0; $opa=0; $xpa=0;
$apb=0; $bpb=0; $cpb=0; $spb=0; $epb=0; $fpb=0; $gpb=0; $opb=0; $xpb=0;
$apc=0; $bpc=0; $cpc=0; $spc=0; $epc=0; $fpc=0; $gpc=0; $opc=0; $xpc=0;
$apd=0; $bpd=0; $cpd=0; $spd=0; $epd=0; $fpd=0; $gpd=0; $opd=0; $xpd=0;
$socdlhepaa=0; $socdlhenaa=0; $socdlhepba=0; $socdlhenba=0;
$socdlhepab=0; $socdlhenab=0; $socdlhepbb=0; $socdlhenbb=0;
$socdlhepac=0; $socdlhenac=0; $socdlhepbc=0; $socdlhenbc=0;
$socdlhepad=0; $socdlhenad=0; $socdlhepbd=0; $socdlhenbd=0;
while($row = mysql_fetch_array($resultpa))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apa=$apa+1;
elseif ($pub=='B') $bpa=$bpa+1;
elseif ($pub=='C') $cpa=$cpa+1;
elseif ($pub=='E') $epa=$epa+1;
elseif ($pub=='G') $gpa=$gpa+1;
elseif ($pub=='S') $spa=$spa+1;
elseif ($pub=='F') $fpa=$fpa+1;
elseif ($pub=='O') $opa=$opa+1;
elseif ($pub=='X') $xpa=$xpa+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypa1=$ypa1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypa2=$ypa2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypa3=$ypa3+1;
else $zpa=$zpa+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepaa=$socdlhepaa+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenaa=$socdlhenaa+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepba=$socdlhepba+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenba=$socdlhenba+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpb))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apb=$apb+1;
elseif ($pub=='B') $bpb=$bpb+1;
elseif ($pub=='C') $cpb=$cpb+1;
elseif ($pub=='E') $epb=$epb+1;
elseif ($pub=='G') $gpb=$gpb+1;
elseif ($pub=='S') $spb=$spb+1;
elseif ($pub=='F') $fpb=$fpb+1;
elseif ($pub=='O') $opb=$opb+1;
elseif ($pub=='X') $xpb=$xpb+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypb1=$ypb1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypb2=$ypb2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypb3=$ypb3+1;
else $zpb=$zpb+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepab=$socdlhepab+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenab=$socdlhenab+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbb=$socdlhepbb+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbb=$socdlhenbb+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpc))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apc=$apc+1;
elseif ($pub=='B') $bpc=$bpc+1;
elseif ($pub=='C') $cpc=$cpc+1;
elseif ($pub=='E') $epc=$epc+1;
elseif ($pub=='G') $gpc=$gpc+1;
elseif ($pub=='S') $spc=$spc+1;
elseif ($pub=='F') $fpc=$fpc+1;
elseif ($pub=='O') $opc=$opc+1;
elseif ($pub=='X') $xpc=$xpc+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypc1=$ypc1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypc2=$ypc2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypc3=$ypc3+1;
else $zpc=$zpc+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepac=$socdlhepac+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenac=$socdlhenac+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbc=$socdlhepbc+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbc=$socdlhenbc+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpd))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apd=$apd+1;
elseif ($pub=='B') $bpd=$bpd+1;
elseif ($pub=='C') $cpd=$cpd+1;
elseif ($pub=='E') $epd=$epd+1;
elseif ($pub=='G') $gpd=$gpd+1;
elseif ($pub=='S') $spd=$spd+1;
elseif ($pub=='F') $fpd=$fpd+1;
elseif ($pub=='O') $opd=$opd+1;
elseif ($pub=='X') $xpd=$xpd+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypd1=$ypd1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypd2=$ypd2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypd3=$ypd3+1;
else $zpd=$zpd+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepad=$socdlhepad+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenad=$socdlhenad+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbd=$socdlhepbd+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbd=$socdlhenbd+1;
else $socres=$socres+1;
}

$positivea = $apa + $bpa + $cpa + $spa + $epa;
$positive3a = $positivea + $fpa;
$positive2a = number_format((($positivea / $positive3a) * 100),1);

$positiveb = $apb + $bpb + $cpb + $spb + $epb;
$positive3b = $positiveb + $fpb;
$positive2b = number_format((($positiveb / $positive3b) * 100),1);

$positivec = $apc + $bpc + $cpc + $spc + $epc;
$positive3c = $positivec + $fpc;
$positive2c = number_format((($positivec / $positive3c) * 100),1);

$positived = $apd + $bpd + $cpd + $spd + $epd;
$positive3d = $positived + $fpd;
$positive2d = number_format((($positived / $positive3d) * 100),1);

$socdlhepa = $socdlhepaa + $socdlhepba;
$socdlhena = $socdlhenaa + $socdlhenba;
$socdlhea = number_format((($socdlhepa / ($socdlhepa + $socdlhena)) * 100),1);

$socdlhepb = $socdlhepab + $socdlhepbb;
$socdlhenb = $socdlhenab + $socdlhenbb;
$socdlheb = number_format((($socdlhepb / ($socdlhepb + $socdlhenb)) * 100),1);

$socdlhepc = $socdlhepac + $socdlhepbc;
$socdlhenc = $socdlhenac + $socdlhenbc;
$socdlhec = number_format((($socdlhepc / ($socdlhepc + $socdlhenc)) * 100),1);

$socdlhepd = $socdlhepad + $socdlhepbd;
$socdlhend = $socdlhenad + $socdlhenbd;
$socdlhed = number_format((($socdlhepd / ($socdlhepd + $socdlhend)) * 100),1);

echo "<table border='1'><tr><th rowspan='2'>$option2</th>";
if ($d=="%" || $d=='6') echo "<th colspan='3'>2007/08 Survey</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th colspan='3'>2008/09 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th colspan='3'>2009/10 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th colspan='3'>2010/11 Survey</th>";
echo "</tr>";
if ($d=="%" || $d=='6') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th>No</th><th>PO</th><th>GP</th>";
echo "</tr><tr>";

echo "<td>$subjecta</td>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsa</td><td>$positive2a%</td><td>$socdlhea%</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsb</td><td>$positive2b%</td><td>$socdlheb%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsc</td><td>$positive2c%</td><td>$socdlhec%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsd</td><td>$positive2d%</td><td>$socdlhed%</td>";
}
echo "</tr></table><br/>";
}

elseif ($school!='%' && $subject!='%' && $course=='%') {
$subjects="(select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe78 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT <> '' and SCHOOL = '".$school."' GROUP BY SUBJECT) UNION (select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe89 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT <> '' and SCHOOL = '".$school."' GROUP BY SUBJECT) UNION (select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe910 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT <> '' and SCHOOL = '".$school."' GROUP BY SUBJECT) UNION (select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe1011 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT <> '' and SCHOOL = '".$school."' GROUP BY SUBJECT) ORDER by SUBJECT";
$subjectt = mysql_query($subjects);
$subjectx = mysql_num_rows($subjectt);
while($subjecta = mysql_fetch_array($subjectt))
 {
 if ($residuea==$subjecta[SUBJECT]) $subjectsum=$subjectsum+$subjecta[sum];
else $subjectsum='0';
$s=$subjecta[SUBJECT];
if (($subjecta[sum]>$minimum || $subjectsum>$minimum) && $residuea!=$subjecta[SUBJECT]) $arrsubject[]=$s;
$residuea=$subjecta[SUBJECT];
$subjectsum=$subjecta[sum];
}

echo "<table border='1'><tr><th rowspan='2'>$option2</th>";
if ($d=="%" || $d=='6') echo "<th colspan='3'>2007/08 Survey</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th colspan='3'>2008/09 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th colspan='3'>2009/10 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th colspan='3'>2010/11 Survey</th>";
echo "</tr>";
if ($d=="%" || $d=='6') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th>No</th><th>PO</th><th>GP</th>";
echo "</tr><tr>";
foreach ($arrsubject as $arr)
{
$joinpd="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract1011 inner join popdlhe1011 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT like '".$arr."')";
$resultpd = mysql_query($joinpd);
$countsd = mysql_num_rows($resultpd);
$joinpc="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract910 inner join popdlhe910 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT like '".$arr."')";
$resultpc = mysql_query($joinpc);
$countsc = mysql_num_rows($resultpc);
$joinpb="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract89 inner join popdlhe89 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT like '".$arr."')";
$resultpb = mysql_query($joinpb);
$countsb = mysql_num_rows($resultpb);
$joinpa="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract78 inner join popdlhe78 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT like '".$arr."')";
$resultpa = mysql_query($joinpa);
$countsa = mysql_num_rows($resultpa);

$apa=0; $bpa=0; $cpa=0; $spa=0; $epa=0; $fpa=0; $gpa=0; $opa=0; $xpa=0;
$apb=0; $bpb=0; $cpb=0; $spb=0; $epb=0; $fpb=0; $gpb=0; $opb=0; $xpb=0;
$apc=0; $bpc=0; $cpc=0; $spc=0; $epc=0; $fpc=0; $gpc=0; $opc=0; $xpc=0;
$apd=0; $bpd=0; $cpd=0; $spd=0; $epd=0; $fpd=0; $gpd=0; $opd=0; $xpd=0;
$socdlhepaa=0; $socdlhenaa=0; $socdlhepba=0; $socdlhenba=0;
$socdlhepab=0; $socdlhenab=0; $socdlhepbb=0; $socdlhenbb=0;
$socdlhepac=0; $socdlhenac=0; $socdlhepbc=0; $socdlhenbc=0;
$socdlhepad=0; $socdlhenad=0; $socdlhepbd=0; $socdlhenbd=0;
while($row = mysql_fetch_array($resultpa))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apa=$apa+1;
elseif ($pub=='B') $bpa=$bpa+1;
elseif ($pub=='C') $cpa=$cpa+1;
elseif ($pub=='E') $epa=$epa+1;
elseif ($pub=='G') $gpa=$gpa+1;
elseif ($pub=='S') $spa=$spa+1;
elseif ($pub=='F') $fpa=$fpa+1;
elseif ($pub=='O') $opa=$opa+1;
elseif ($pub=='X') $xpa=$xpa+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypa1=$ypa1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypa2=$ypa2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypa3=$ypa3+1;
else $zpa=$zpa+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepaa=$socdlhepaa+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenaa=$socdlhenaa+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepba=$socdlhepba+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenba=$socdlhenba+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpb))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apb=$apb+1;
elseif ($pub=='B') $bpb=$bpb+1;
elseif ($pub=='C') $cpb=$cpb+1;
elseif ($pub=='E') $epb=$epb+1;
elseif ($pub=='G') $gpb=$gpb+1;
elseif ($pub=='S') $spb=$spb+1;
elseif ($pub=='F') $fpb=$fpb+1;
elseif ($pub=='O') $opb=$opb+1;
elseif ($pub=='X') $xpb=$xpb+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypb1=$ypb1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypb2=$ypb2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypb3=$ypb3+1;
else $zpb=$zpb+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepab=$socdlhepab+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenab=$socdlhenab+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbb=$socdlhepbb+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbb=$socdlhenbb+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpc))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apc=$apc+1;
elseif ($pub=='B') $bpc=$bpc+1;
elseif ($pub=='C') $cpc=$cpc+1;
elseif ($pub=='E') $epc=$epc+1;
elseif ($pub=='G') $gpc=$gpc+1;
elseif ($pub=='S') $spc=$spc+1;
elseif ($pub=='F') $fpc=$fpc+1;
elseif ($pub=='O') $opc=$opc+1;
elseif ($pub=='X') $xpc=$xpc+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypc1=$ypc1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypc2=$ypc2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypc3=$ypc3+1;
else $zpc=$zpc+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepac=$socdlhepac+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenac=$socdlhenac+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbc=$socdlhepbc+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbc=$socdlhenbc+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpd))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apd=$apd+1;
elseif ($pub=='B') $bpd=$bpd+1;
elseif ($pub=='C') $cpd=$cpd+1;
elseif ($pub=='E') $epd=$epd+1;
elseif ($pub=='G') $gpd=$gpd+1;
elseif ($pub=='S') $spd=$spd+1;
elseif ($pub=='F') $fpd=$fpd+1;
elseif ($pub=='O') $opd=$opd+1;
elseif ($pub=='X') $xpd=$xpd+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypd1=$ypd1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypd2=$ypd2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypd3=$ypd3+1;
else $zpd=$zpd+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepad=$socdlhepad+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenad=$socdlhenad+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbd=$socdlhepbd+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbd=$socdlhenbd+1;
else $socres=$socres+1;
}

$positivea = $apa + $bpa + $cpa + $spa + $epa;
$positive3a = $positivea + $fpa;
$positive2a = number_format((($positivea / $positive3a) * 100),1);

$positiveb = $apb + $bpb + $cpb + $spb + $epb;
$positive3b = $positiveb + $fpb;
$positive2b = number_format((($positiveb / $positive3b) * 100),1);

$positivec = $apc + $bpc + $cpc + $spc + $epc;
$positive3c = $positivec + $fpc;
$positive2c = number_format((($positivec / $positive3c) * 100),1);

$positived = $apd + $bpd + $cpd + $spd + $epd;
$positive3d = $positived + $fpd;
$positive2d = number_format((($positived / $positive3d) * 100),1);

$socdlhepa = $socdlhepaa + $socdlhepba;
$socdlhena = $socdlhenaa + $socdlhenba;
$socdlhea = number_format((($socdlhepa / ($socdlhepa + $socdlhena)) * 100),1);

$socdlhepb = $socdlhepab + $socdlhepbb;
$socdlhenb = $socdlhenab + $socdlhenbb;
$socdlheb = number_format((($socdlhepb / ($socdlhepb + $socdlhenb)) * 100),1);

$socdlhepc = $socdlhepac + $socdlhepbc;
$socdlhenc = $socdlhenac + $socdlhenbc;
$socdlhec = number_format((($socdlhepc / ($socdlhepc + $socdlhenc)) * 100),1);

$socdlhepd = $socdlhepad + $socdlhepbd;
$socdlhend = $socdlhenad + $socdlhenbd;
$socdlhed = number_format((($socdlhepd / ($socdlhepd + $socdlhend)) * 100),1);
if ($arr!=$b) {
echo "<td>$arr</td>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsa</td><td>$positive2a%</td><td>$socdlhea%</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsb</td><td>$positive2b%</td><td>$socdlheb%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsc</td><td>$positive2c%</td><td>$socdlhec%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsd</td><td>$positive2d%</td><td>$socdlhed%</td>";
}
echo "</tr>";
}
else {
echo "<th align='left'>$arr</th>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsa</th><th align='left'>$positive2a%</th><th align='left'>$socdlhea%</th>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsb</th><th align='left'>$positive2b%</th><th align='left'>$socdlheb%</th>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsc</th><th align='left'>$positive2c%</th><th align='left'>$socdlhec%</th>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsd</th><th align='left'>$positive2d%</th><th align='left'>$socdlhed%</th>";
}
echo "</tr>";
}
}
echo "</table><br/>";
}

elseif ($school=='%' && $subject!='%' && $course=='%') {
$subjects="(select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe78 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT <> '' GROUP BY SUBJECT) UNION (select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe89 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT <> '' GROUP BY SUBJECT) UNION (select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe910 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT <> '' GROUP BY SUBJECT) UNION (select DISTINCT SUBJECT, count(SUBJECT) AS sum FROM popdlhe1011 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT <> '' GROUP BY SUBJECT) ORDER by SUBJECT";
$subjectt = mysql_query($subjects);
$subjectx = mysql_num_rows($subjectt);
while($subjecta = mysql_fetch_array($subjectt))
 {
 if ($residuea==$subjecta[SUBJECT]) $subjectsum=$subjectsum+$subjecta[sum];
else $subjectsum='0';
$s=$subjecta[SUBJECT];
if (($subjecta[sum]>$minimum || $subjectsum>$minimum) && $residuea!=$subjecta[SUBJECT]) $arrsubject[]=$s;
$residuea=$subjecta[SUBJECT];
$subjectsum=$subjecta[sum];
}

echo "<table border='1'><tr><th rowspan='2'>$option2</th>";
if ($d=="%" || $d=='6') echo "<th colspan='3'>2007/08 Survey</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th colspan='3'>2008/09 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th colspan='3'>2009/10 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th colspan='3'>2010/11 Survey</th>";
echo "</tr>";
if ($d=="%" || $d=='6') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th>No</th><th>PO</th><th>GP</th>";
echo "</tr><tr>";
foreach ($arrsubject as $arr)
{
$joinpd="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract1011 inner join popdlhe1011 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT like '".$arr."')";
$resultpd = mysql_query($joinpd);
$countsd = mysql_num_rows($resultpd);
$joinpc="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract910 inner join popdlhe910 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT like '".$arr."')";
$resultpc = mysql_query($joinpc);
$countsc = mysql_num_rows($resultpc);
$joinpb="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract89 inner join popdlhe89 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT like '".$arr."')";
$resultpb = mysql_query($joinpb);
$countsb = mysql_num_rows($resultpb);
$joinpa="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract78 inner join popdlhe78 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and SUBJECT like '".$arr."')";
$resultpa = mysql_query($joinpa);
$countsa = mysql_num_rows($resultpa);

$apa=0; $bpa=0; $cpa=0; $spa=0; $epa=0; $fpa=0; $gpa=0; $opa=0; $xpa=0;
$apb=0; $bpb=0; $cpb=0; $spb=0; $epb=0; $fpb=0; $gpb=0; $opb=0; $xpb=0;
$apc=0; $bpc=0; $cpc=0; $spc=0; $epc=0; $fpc=0; $gpc=0; $opc=0; $xpc=0;
$apd=0; $bpd=0; $cpd=0; $spd=0; $epd=0; $fpd=0; $gpd=0; $opd=0; $xpd=0;
$socdlhepaa=0; $socdlhenaa=0; $socdlhepba=0; $socdlhenba=0;
$socdlhepab=0; $socdlhenab=0; $socdlhepbb=0; $socdlhenbb=0;
$socdlhepac=0; $socdlhenac=0; $socdlhepbc=0; $socdlhenbc=0;
$socdlhepad=0; $socdlhenad=0; $socdlhepbd=0; $socdlhenbd=0;
while($row = mysql_fetch_array($resultpa))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apa=$apa+1;
elseif ($pub=='B') $bpa=$bpa+1;
elseif ($pub=='C') $cpa=$cpa+1;
elseif ($pub=='E') $epa=$epa+1;
elseif ($pub=='G') $gpa=$gpa+1;
elseif ($pub=='S') $spa=$spa+1;
elseif ($pub=='F') $fpa=$fpa+1;
elseif ($pub=='O') $opa=$opa+1;
elseif ($pub=='X') $xpa=$xpa+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypa1=$ypa1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypa2=$ypa2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypa3=$ypa3+1;
else $zpa=$zpa+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepaa=$socdlhepaa+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenaa=$socdlhenaa+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepba=$socdlhepba+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenba=$socdlhenba+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpb))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apb=$apb+1;
elseif ($pub=='B') $bpb=$bpb+1;
elseif ($pub=='C') $cpb=$cpb+1;
elseif ($pub=='E') $epb=$epb+1;
elseif ($pub=='G') $gpb=$gpb+1;
elseif ($pub=='S') $spb=$spb+1;
elseif ($pub=='F') $fpb=$fpb+1;
elseif ($pub=='O') $opb=$opb+1;
elseif ($pub=='X') $xpb=$xpb+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypb1=$ypb1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypb2=$ypb2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypb3=$ypb3+1;
else $zpb=$zpb+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepab=$socdlhepab+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenab=$socdlhenab+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbb=$socdlhepbb+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbb=$socdlhenbb+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpc))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apc=$apc+1;
elseif ($pub=='B') $bpc=$bpc+1;
elseif ($pub=='C') $cpc=$cpc+1;
elseif ($pub=='E') $epc=$epc+1;
elseif ($pub=='G') $gpc=$gpc+1;
elseif ($pub=='S') $spc=$spc+1;
elseif ($pub=='F') $fpc=$fpc+1;
elseif ($pub=='O') $opc=$opc+1;
elseif ($pub=='X') $xpc=$xpc+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypc1=$ypc1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypc2=$ypc2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypc3=$ypc3+1;
else $zpc=$zpc+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepac=$socdlhepac+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenac=$socdlhenac+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbc=$socdlhepbc+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbc=$socdlhenbc+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpd))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apd=$apd+1;
elseif ($pub=='B') $bpd=$bpd+1;
elseif ($pub=='C') $cpd=$cpd+1;
elseif ($pub=='E') $epd=$epd+1;
elseif ($pub=='G') $gpd=$gpd+1;
elseif ($pub=='S') $spd=$spd+1;
elseif ($pub=='F') $fpd=$fpd+1;
elseif ($pub=='O') $opd=$opd+1;
elseif ($pub=='X') $xpd=$xpd+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypd1=$ypd1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypd2=$ypd2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypd3=$ypd3+1;
else $zpd=$zpd+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepad=$socdlhepad+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenad=$socdlhenad+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbd=$socdlhepbd+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbd=$socdlhenbd+1;
else $socres=$socres+1;
}

$positivea = $apa + $bpa + $cpa + $spa + $epa;
$positive3a = $positivea + $fpa;
$positive2a = number_format((($positivea / $positive3a) * 100),1);

$positiveb = $apb + $bpb + $cpb + $spb + $epb;
$positive3b = $positiveb + $fpb;
$positive2b = number_format((($positiveb / $positive3b) * 100),1);

$positivec = $apc + $bpc + $cpc + $spc + $epc;
$positive3c = $positivec + $fpc;
$positive2c = number_format((($positivec / $positive3c) * 100),1);

$positived = $apd + $bpd + $cpd + $spd + $epd;
$positive3d = $positived + $fpd;
$positive2d = number_format((($positived / $positive3d) * 100),1);

$socdlhepa = $socdlhepaa + $socdlhepba;
$socdlhena = $socdlhenaa + $socdlhenba;
$socdlhea = number_format((($socdlhepa / ($socdlhepa + $socdlhena)) * 100),1);

$socdlhepb = $socdlhepab + $socdlhepbb;
$socdlhenb = $socdlhenab + $socdlhenbb;
$socdlheb = number_format((($socdlhepb / ($socdlhepb + $socdlhenb)) * 100),1);

$socdlhepc = $socdlhepac + $socdlhepbc;
$socdlhenc = $socdlhenac + $socdlhenbc;
$socdlhec = number_format((($socdlhepc / ($socdlhepc + $socdlhenc)) * 100),1);

$socdlhepd = $socdlhepad + $socdlhepbd;
$socdlhend = $socdlhenad + $socdlhenbd;
$socdlhed = number_format((($socdlhepd / ($socdlhepd + $socdlhend)) * 100),1);

if ($arr!=$b) {
echo "<td>$arr</td>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsa</td><td>$positive2a%</td><td>$socdlhea%</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsb</td><td>$positive2b%</td><td>$socdlheb%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsc</td><td>$positive2c%</td><td>$socdlhec%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsd</td><td>$positive2d%</td><td>$socdlhed%</td>";
}
echo "</tr>";
}
else {
echo "<th align='left'>$arr</th>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsa</th><th align='left'>$positive2a%</th><th align='left'>$socdlhea%</th>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsb</th><th align='left'>$positive2b%</th><th align='left'>$socdlheb%</th>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsc</th><th align='left'>$positive2c%</th><th align='left'>$socdlhec%</th>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsd</th><th align='left'>$positive2d%</th><th align='left'>$socdlhed%</th>";
}
echo "</tr>";
}
}
echo "</table><br/>";
echo "<p class='small'>PO: Positive Outcomes: The proportion of graduates who were available for employment that had secured employment or further study.</p><br /><p class='small'>GP: Graduate Prospects: The proportion of graduates who were available for employment that had secured graduate-level employment or graduate-level further study. </p><br />";
}

else {
echo "";
}

if ($school!='%' && $subject=='%' && $course!='%') {
$courses="(select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe78 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE <> '' and SCHOOL = '".$school."' GROUP BY COURSE) UNION (select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe89 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE <> '' and SCHOOL = '".$school."' GROUP BY COURSE) UNION (select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe910 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE <> '' and SCHOOL = '".$school."' GROUP BY COURSE) UNION (select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe1011 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE <> '' and SCHOOL = '".$school."' GROUP BY COURSE) ORDER by COURSE";
$courset = mysql_query($courses);
$coursex = mysql_num_rows($courset);
while($coursea = mysql_fetch_array($courset))
 {
 if ($residuea==$coursea[COURSE]) $coursesum=$coursesum+$coursea[sum];
else $coursesum='0';
$s=$coursea[COURSE];
if (($coursea[sum]>$minimum || $coursesum>$minimum) && $residuea!=$coursea[COURSE]) $arrcourse[]=$s;
$residuea=$coursea[COURSE];
$coursesum=$coursea[sum];
}

echo "<table border='1'><tr><th rowspan='2'>$option3</th>";
if ($d=="%" || $d=='6') echo "<th colspan='3'>2007/08 Survey</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th colspan='3'>2008/09 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th colspan='3'>2009/10 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th colspan='3'>2010/11 Survey</th>";
echo "</tr>";
if ($d=="%" || $d=='6') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th>No</th><th>PO</th><th>GP</th>";
echo "</tr><tr>";
foreach ($arrcourse as $arr)
{
$joinpd="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract1011 inner join popdlhe910 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$arr."')";
$resultpd = mysql_query($joinpd);
$countsd = mysql_num_rows($resultpd);
$joinpc="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract910 inner join popdlhe910 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$arr."')";
$resultpc = mysql_query($joinpc);
$countsc = mysql_num_rows($resultpc);
$joinpb="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract89 inner join popdlhe89 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$arr."')";
$resultpb = mysql_query($joinpb);
$countsb = mysql_num_rows($resultpb);
$joinpa="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract78 inner join popdlhe78 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$arr."')";
$resultpa = mysql_query($joinpa);
$countsa = mysql_num_rows($resultpa);

$apa=0; $bpa=0; $cpa=0; $spa=0; $epa=0; $fpa=0; $gpa=0; $opa=0; $xpa=0;
$apb=0; $bpb=0; $cpb=0; $spb=0; $epb=0; $fpb=0; $gpb=0; $opb=0; $xpb=0;
$apc=0; $bpc=0; $cpc=0; $spc=0; $epc=0; $fpc=0; $gpc=0; $opc=0; $xpc=0;
$apd=0; $bpd=0; $cpd=0; $spd=0; $epd=0; $fpd=0; $gpd=0; $opd=0; $xpd=0;
$socdlhepaa=0; $socdlhenaa=0; $socdlhepba=0; $socdlhenba=0;
$socdlhepab=0; $socdlhenab=0; $socdlhepbb=0; $socdlhenbb=0;
$socdlhepac=0; $socdlhenac=0; $socdlhepbc=0; $socdlhenbc=0;
$socdlhepad=0; $socdlhenad=0; $socdlhepbd=0; $socdlhenbd=0;
while($row = mysql_fetch_array($resultpa))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apa=$apa+1;
elseif ($pub=='B') $bpa=$bpa+1;
elseif ($pub=='C') $cpa=$cpa+1;
elseif ($pub=='E') $epa=$epa+1;
elseif ($pub=='G') $gpa=$gpa+1;
elseif ($pub=='S') $spa=$spa+1;
elseif ($pub=='F') $fpa=$fpa+1;
elseif ($pub=='O') $opa=$opa+1;
elseif ($pub=='X') $xpa=$xpa+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypa1=$ypa1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypa2=$ypa2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypa3=$ypa3+1;
else $zpa=$zpa+1;


if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepaa=$socdlhepaa+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenaa=$socdlhenaa+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepba=$socdlhepba+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenba=$socdlhenba+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpb))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apb=$apb+1;
elseif ($pub=='B') $bpb=$bpb+1;
elseif ($pub=='C') $cpb=$cpb+1;
elseif ($pub=='E') $epb=$epb+1;
elseif ($pub=='G') $gpb=$gpb+1;
elseif ($pub=='S') $spb=$spb+1;
elseif ($pub=='F') $fpb=$fpb+1;
elseif ($pub=='O') $opb=$opb+1;
elseif ($pub=='X') $xpb=$xpb+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypb1=$ypb1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypb2=$ypb2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypb3=$ypb3+1;
else $zpb=$zpb+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepab=$socdlhepab+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenab=$socdlhenab+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbb=$socdlhepbb+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbb=$socdlhenbb+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpc))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apc=$apc+1;
elseif ($pub=='B') $bpc=$bpc+1;
elseif ($pub=='C') $cpc=$cpc+1;
elseif ($pub=='E') $epc=$epc+1;
elseif ($pub=='G') $gpc=$gpc+1;
elseif ($pub=='S') $spc=$spc+1;
elseif ($pub=='F') $fpc=$fpc+1;
elseif ($pub=='O') $opc=$opc+1;
elseif ($pub=='X') $xpc=$xpc+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypc1=$ypc1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypc2=$ypc2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypc3=$ypc3+1;
else $zpc=$zpc+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepac=$socdlhepac+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenac=$socdlhenac+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbc=$socdlhepbc+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbc=$socdlhenbc+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpd))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apd=$apd+1;
elseif ($pub=='B') $bpd=$bpd+1;
elseif ($pub=='C') $cpd=$cpd+1;
elseif ($pub=='E') $epd=$epd+1;
elseif ($pub=='G') $gpd=$gpd+1;
elseif ($pub=='S') $spd=$spd+1;
elseif ($pub=='F') $fpd=$fpd+1;
elseif ($pub=='O') $opd=$opd+1;
elseif ($pub=='X') $xpd=$xpd+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypd1=$ypd1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypd2=$ypd2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypd3=$ypd3+1;
else $zpd=$zpd+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepad=$socdlhepad+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenad=$socdlhenad+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbd=$socdlhepbd+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbd=$socdlhenbd+1;
else $socres=$socres+1;
}

$positivea = $apa + $bpa + $cpa + $spa + $epa;
$positive3a = $positivea + $fpa;
$positive2a = number_format((($positivea / $positive3a) * 100),1);

$positiveb = $apb + $bpb + $cpb + $spb + $epb;
$positive3b = $positiveb + $fpb;
$positive2b = number_format((($positiveb / $positive3b) * 100),1);

$positivec = $apc + $bpc + $cpc + $spc + $epc;
$positive3c = $positivec + $fpc;
$positive2c = number_format((($positivec / $positive3c) * 100),1);

$positived = $apd + $bpd + $cpd + $spd + $epd;
$positive3d = $positived + $fpd;
$positive2d = number_format((($positived / $positive3d) * 100),1);

$socdlhepa = $socdlhepaa + $socdlhepba;
$socdlhena = $socdlhenaa + $socdlhenba;
$socdlhea = number_format((($socdlhepa / ($socdlhepa + $socdlhena)) * 100),1);

$socdlhepb = $socdlhepab + $socdlhepbb;
$socdlhenb = $socdlhenab + $socdlhenbb;
$socdlheb = number_format((($socdlhepb / ($socdlhepb + $socdlhenb)) * 100),1);

$socdlhepc = $socdlhepac + $socdlhepbc;
$socdlhenc = $socdlhenac + $socdlhenbc;
$socdlhec = number_format((($socdlhepc / ($socdlhepc + $socdlhenc)) * 100),1);

$socdlhepd = $socdlhepad + $socdlhepbd;
$socdlhend = $socdlhenad + $socdlhenbd;
$socdlhed = number_format((($socdlhepd / ($socdlhepd + $socdlhend)) * 100),1);

if ($arr!=$c) {
echo "<td>$arr</td>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsa</td><td>$positive2a%</td><td>$socdlhea%</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsb</td><td>$positive2b%</td><td>$socdlheb%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsc</td><td>$positive2c%</td><td>$socdlhec%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsd</td><td>$positive2d%</td><td>$socdlhed%</td>";
}
echo "</tr>";
}
else {
echo "<th align='left'>$arr</th>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsa</th><th align='left'>$positive2a%</th><th align='left'>$socdlhea%</th>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsb</th><th align='left'>$positive2b%</th><th align='left'>$socdlheb%</th>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsc</th><th align='left'>$positive2c%</th><th align='left'>$socdlhec%</th>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsd</th><th align='left'>$positive2d%</th><th align='left'>$socdlhed%</th>";
}
echo "</tr>";
}
}
echo "</table>";
echo "<br/><p class='small'>PO: Positive Outcomes: The proportion of graduates who were available for employment that had secured employment or further study.</p><br /><p class='small'>GP: Graduate Prospects: The proportion of graduates who were available for employment that had secured graduate-level employment or graduate-level further study. </p><br />";
}

elseif ((($school!='%' && $subject!='%') || ($school=='%' && $subject!='%')) && $course!='%') {
$courses="(select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe78 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE <> '' and SUBJECT = '".$subject."' GROUP BY COURSE) UNION (select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe89 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE <> '' and SUBJECT = '".$subject."' GROUP BY COURSE) UNION (select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe910 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE <> '' and SUBJECT = '".$subject."' GROUP BY COURSE) UNION (select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe1011 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE <> '' and SUBJECT = '".$subject."' GROUP BY COURSE) ORDER by COURSE";
$courset = mysql_query($courses);
$coursex = mysql_num_rows($courset);
while($coursea = mysql_fetch_array($courset))
 {
 if ($residuea==$coursea[COURSE]) $coursesum=$coursesum+$coursea[sum];
else $coursesum='0';
$s=$coursea[COURSE];
if (($coursea[sum]>$minimum || $coursesum>$minimum) && $residuea!=$coursea[COURSE]) $arrcourse[]=$s;
$residuea=$coursea[COURSE];
$coursesum=$coursea[sum];
}

echo "<table border='1'><tr><th rowspan='2'>$option3</th>";
if ($d=="%" || $d=='6') echo "<th colspan='3'>2007/08 Survey</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th colspan='3'>2008/09 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th colspan='3'>2009/10 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th colspan='3'>2010/11 Survey</th>";
echo "</tr>";
if ($d=="%" || $d=='6') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th>No</th><th>PO</th><th>GP</th>";
echo "</tr><tr>";
foreach ($arrcourse as $arr)
{
$joinpd="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract1011 inner join popdlhe1011 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$arr."')";
$resultpd = mysql_query($joinpd);
$countsd = mysql_num_rows($resultpd);
$joinpc="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract910 inner join popdlhe910 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$arr."')";
$resultpc = mysql_query($joinpc);
$countsc = mysql_num_rows($resultpc);
$joinpb="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract89 inner join popdlhe89 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$arr."')";
$resultpb = mysql_query($joinpb);
$countsb = mysql_num_rows($resultpb);
$joinpa="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract78 inner join popdlhe78 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$arr."')";
$resultpa = mysql_query($joinpa);
$countsa = mysql_num_rows($resultpa);

$apa=0; $bpa=0; $cpa=0; $spa=0; $epa=0; $fpa=0; $gpa=0; $opa=0; $xpa=0;
$apb=0; $bpb=0; $cpb=0; $spb=0; $epb=0; $fpb=0; $gpb=0; $opb=0; $xpb=0;
$apc=0; $bpc=0; $cpc=0; $spc=0; $epc=0; $fpc=0; $gpc=0; $opc=0; $xpc=0;
$apd=0; $bpd=0; $cpd=0; $spd=0; $epd=0; $fpd=0; $gpd=0; $opd=0; $xpd=0;
$socdlhepaa=0; $socdlhenaa=0; $socdlhepba=0; $socdlhenba=0;
$socdlhepab=0; $socdlhenab=0; $socdlhepbb=0; $socdlhenbb=0;
$socdlhepac=0; $socdlhenac=0; $socdlhepbc=0; $socdlhenbc=0;
$socdlhepad=0; $socdlhenad=0; $socdlhepbd=0; $socdlhenbd=0;
while($row = mysql_fetch_array($resultpa))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apa=$apa+1;
elseif ($pub=='B') $bpa=$bpa+1;
elseif ($pub=='C') $cpa=$cpa+1;
elseif ($pub=='E') $epa=$epa+1;
elseif ($pub=='G') $gpa=$gpa+1;
elseif ($pub=='S') $spa=$spa+1;
elseif ($pub=='F') $fpa=$fpa+1;
elseif ($pub=='O') $opa=$opa+1;
elseif ($pub=='X') $xpa=$xpa+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypa1=$ypa1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypa2=$ypa2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypa3=$ypa3+1;
else $zpa=$zpa+1;


if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepaa=$socdlhepaa+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenaa=$socdlhenaa+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepba=$socdlhepba+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenba=$socdlhenba+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpb))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apb=$apb+1;
elseif ($pub=='B') $bpb=$bpb+1;
elseif ($pub=='C') $cpb=$cpb+1;
elseif ($pub=='E') $epb=$epb+1;
elseif ($pub=='G') $gpb=$gpb+1;
elseif ($pub=='S') $spb=$spb+1;
elseif ($pub=='F') $fpb=$fpb+1;
elseif ($pub=='O') $opb=$opb+1;
elseif ($pub=='X') $xpb=$xpb+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypb1=$ypb1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypb2=$ypb2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypb3=$ypb3+1;
else $zpb=$zpb+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepab=$socdlhepab+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenab=$socdlhenab+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbb=$socdlhepbb+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbb=$socdlhenbb+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpc))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apc=$apc+1;
elseif ($pub=='B') $bpc=$bpc+1;
elseif ($pub=='C') $cpc=$cpc+1;
elseif ($pub=='E') $epc=$epc+1;
elseif ($pub=='G') $gpc=$gpc+1;
elseif ($pub=='S') $spc=$spc+1;
elseif ($pub=='F') $fpc=$fpc+1;
elseif ($pub=='O') $opc=$opc+1;
elseif ($pub=='X') $xpc=$xpc+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypc1=$ypc1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypc2=$ypc2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypc3=$ypc3+1;
else $zpc=$zpc+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepac=$socdlhepac+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenac=$socdlhenac+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbc=$socdlhepbc+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbc=$socdlhenbc+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpd))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apd=$apd+1;
elseif ($pub=='B') $bpd=$bpd+1;
elseif ($pub=='C') $cpd=$cpd+1;
elseif ($pub=='E') $epd=$epd+1;
elseif ($pub=='G') $gpd=$gpd+1;
elseif ($pub=='S') $spd=$spd+1;
elseif ($pub=='F') $fpd=$fpd+1;
elseif ($pub=='O') $opd=$opd+1;
elseif ($pub=='X') $xpd=$xpd+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypd1=$ypd1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypd2=$ypd2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypd3=$ypd3+1;
else $zpd=$zpd+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepad=$socdlhepad+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenad=$socdlhenad+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbd=$socdlhepbd+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbd=$socdlhenbd+1;
else $socres=$socres+1;
}

$positivea = $apa + $bpa + $cpa + $spa + $epa;
$positive3a = $positivea + $fpa;
$positive2a = number_format((($positivea / $positive3a) * 100),1);

$positiveb = $apb + $bpb + $cpb + $spb + $epb;
$positive3b = $positiveb + $fpb;
$positive2b = number_format((($positiveb / $positive3b) * 100),1);

$positivec = $apc + $bpc + $cpc + $spc + $epc;
$positive3c = $positivec + $fpc;
$positive2c = number_format((($positivec / $positive3c) * 100),1);

$positived = $apd + $bpd + $cpd + $spd + $epd;
$positive3d = $positived + $fpd;
$positive2d = number_format((($positived / $positive3d) * 100),1);

$socdlhepa = $socdlhepaa + $socdlhepba;
$socdlhena = $socdlhenaa + $socdlhenba;
$socdlhea = number_format((($socdlhepa / ($socdlhepa + $socdlhena)) * 100),1);

$socdlhepb = $socdlhepab + $socdlhepbb;
$socdlhenb = $socdlhenab + $socdlhenbb;
$socdlheb = number_format((($socdlhepb / ($socdlhepb + $socdlhenb)) * 100),1);

$socdlhepc = $socdlhepac + $socdlhepbc;
$socdlhenc = $socdlhenac + $socdlhenbc;
$socdlhec = number_format((($socdlhepc / ($socdlhepc + $socdlhenc)) * 100),1);

$socdlhepd = $socdlhepad + $socdlhepbd;
$socdlhend = $socdlhenad + $socdlhenbd;
$socdlhed = number_format((($socdlhepd / ($socdlhepd + $socdlhend)) * 100),1);

if ($arr!=$c) {
echo "<td>$arr</td>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsa</td><td>$positive2a%</td><td>$socdlhea%</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsb</td><td>$positive2b%</td><td>$socdlheb%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsc</td><td>$positive2c%</td><td>$socdlhec%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsd</td><td>$positive2d%</td><td>$socdlhed%</td>";
}
echo "</tr>";
}
else {
echo "<th align='left'>$arr</th>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsa</th><th align='left'>$positive2a%</th><th align='left'>$socdlhea%</th>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsb</th><th align='left'>$positive2b%</th><th align='left'>$socdlheb%</th>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsc</th><th align='left'>$positive2c%</th><th align='left'>$socdlhec%</th>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsd</th><th align='left'>$positive2d%</th><th align='left'>$socdlhed%</th>";
}
echo "</tr>";
}
}

echo "</table>";
echo "<br/><p class='small'>PO: Positive Outcomes: The proportion of graduates who were available for employment that had secured employment or further study.</p><br /><p class='small'>GP: Graduate Prospects: The proportion of graduates who were available for employment that had secured graduate-level employment or graduate-level further study. </p><br />";
}


elseif ($school=='%' && $subject=='%' && $course!='%') {

$subjects="select SUBJECT from popdlhe1011 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SCHOOL like '".$school."' LIMIT 1";
$subjectt = mysql_query($subjects);
$subjectx = mysql_num_rows($subjectt);

if ($subjectx=='0') {
$subjects="select SUBJECT from popdlhe910 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SCHOOL like '".$school."' LIMIT 1";
$subjectt = mysql_query($subjects);
$subjectx = mysql_num_rows($subjectt);
}

if ($subjectx=='0') {
$subjects="select SUBJECT from popdlhe89 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SCHOOL like '".$school."' LIMIT 1";
$subjectt = mysql_query($subjects);
$subjectx = mysql_num_rows($subjectt);
}

if ($subjectx=='0') {
$subjects="select SUBJECT from popdlhe78 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$course."' and SCHOOL like '".$school."' LIMIT 1";
$subjectt = mysql_query($subjects);
$subjectx = mysql_num_rows($subjectt);
}

while($row = mysql_fetch_array($subjectt))
 {
 $subject=$row["SUBJECT"];
}

$courses="(select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe78 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE <> '' and SUBJECT = '".$subject."' GROUP BY COURSE) UNION (select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe89 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE <> '' and SUBJECT = '".$subject."' GROUP BY COURSE) UNION (select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe910 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE <> '' and SUBJECT = '".$subject."' GROUP BY COURSE) UNION (select DISTINCT COURSE, count(COURSE) AS sum FROM popdlhe1011 WHERE XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE <> '' and SUBJECT = '".$subject."' GROUP BY COURSE) ORDER by COURSE";
$courset = mysql_query($courses);
$coursex = mysql_num_rows($courset);
while($coursea = mysql_fetch_array($courset))
 {
 if ($residuea==$coursea[COURSE]) $coursesum=$coursesum+$coursea[sum];
else $coursesum='0';
$s=$coursea[COURSE];
if (($coursea[sum]>$minimum || $coursesum>$minimum) && $residuea!=$coursea[COURSE]) $arrcourse[]=$s;
$residuea=$coursea[COURSE];
$coursesum=$coursea[sum];
}

echo "<table border='1'><tr><th rowspan='2'>$option3</th>";
if ($d=="%" || $d=='6') echo "<th colspan='3'>2007/08 Survey</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th colspan='3'>2008/09 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th colspan='3'>2009/10 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th colspan='3'>2010/11 Survey</th>";
echo "</tr>";
if ($d=="%" || $d=='6') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th>No</th><th>PO</th><th>GP</th>";
echo "</tr><tr>";
foreach ($arrcourse as $arr)
{
$joinpd="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract1011 inner join popdlhe1011 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$arr."')";
$resultpd = mysql_query($joinpd);
$countsd = mysql_num_rows($resultpd);
$joinpc="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract910 inner join popdlhe910 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$arr."')";
$resultpc = mysql_query($joinpc);
$countsc = mysql_num_rows($resultpc);
$joinpb="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract89 inner join popdlhe89 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$arr."')";
$resultpb = mysql_query($joinpb);
$countsb = mysql_num_rows($resultpb);
$joinpa="(select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL from extract78 inner join popdlhe78 on HUSIDa = HUSID where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and COURSE like '".$arr."')";
$resultpa = mysql_query($joinpa);
$countsa = mysql_num_rows($resultpa);

$apa=0; $bpa=0; $cpa=0; $spa=0; $epa=0; $fpa=0; $gpa=0; $opa=0; $xpa=0;
$apb=0; $bpb=0; $cpb=0; $spb=0; $epb=0; $fpb=0; $gpb=0; $opb=0; $xpb=0;
$apc=0; $bpc=0; $cpc=0; $spc=0; $epc=0; $fpc=0; $gpc=0; $opc=0; $xpc=0;
$apd=0; $bpd=0; $cpd=0; $spd=0; $epd=0; $fpd=0; $gpd=0; $opd=0; $xpd=0;
$socdlhepaa=0; $socdlhenaa=0; $socdlhepba=0; $socdlhenba=0;
$socdlhepab=0; $socdlhenab=0; $socdlhepbb=0; $socdlhenbb=0;
$socdlhepac=0; $socdlhenac=0; $socdlhepbc=0; $socdlhenbc=0;
$socdlhepad=0; $socdlhenad=0; $socdlhepbd=0; $socdlhenbd=0;
while($row = mysql_fetch_array($resultpa))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apa=$apa+1;
elseif ($pub=='B') $bpa=$bpa+1;
elseif ($pub=='C') $cpa=$cpa+1;
elseif ($pub=='E') $epa=$epa+1;
elseif ($pub=='G') $gpa=$gpa+1;
elseif ($pub=='S') $spa=$spa+1;
elseif ($pub=='F') $fpa=$fpa+1;
elseif ($pub=='O') $opa=$opa+1;
elseif ($pub=='X') $xpa=$xpa+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypa1=$ypa1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypa2=$ypa2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypa3=$ypa3+1;
else $zpa=$zpa+1;


if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepaa=$socdlhepaa+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenaa=$socdlhenaa+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepba=$socdlhepba+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenba=$socdlhenba+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpb))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apb=$apb+1;
elseif ($pub=='B') $bpb=$bpb+1;
elseif ($pub=='C') $cpb=$cpb+1;
elseif ($pub=='E') $epb=$epb+1;
elseif ($pub=='G') $gpb=$gpb+1;
elseif ($pub=='S') $spb=$spb+1;
elseif ($pub=='F') $fpb=$fpb+1;
elseif ($pub=='O') $opb=$opb+1;
elseif ($pub=='X') $xpb=$xpb+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypb1=$ypb1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypb2=$ypb2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypb3=$ypb3+1;
else $zpb=$zpb+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepab=$socdlhepab+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenab=$socdlhenab+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbb=$socdlhepbb+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbb=$socdlhenbb+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpc))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apc=$apc+1;
elseif ($pub=='B') $bpc=$bpc+1;
elseif ($pub=='C') $cpc=$cpc+1;
elseif ($pub=='E') $epc=$epc+1;
elseif ($pub=='G') $gpc=$gpc+1;
elseif ($pub=='S') $spc=$spc+1;
elseif ($pub=='F') $fpc=$fpc+1;
elseif ($pub=='O') $opc=$opc+1;
elseif ($pub=='X') $xpc=$xpc+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypc1=$ypc1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypc2=$ypc2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypc3=$ypc3+1;
else $zpc=$zpc+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepac=$socdlhepac+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenac=$socdlhenac+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbc=$socdlhepbc+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbc=$socdlhenbc+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpd))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apd=$apd+1;
elseif ($pub=='B') $bpd=$bpd+1;
elseif ($pub=='C') $cpd=$cpd+1;
elseif ($pub=='E') $epd=$epd+1;
elseif ($pub=='G') $gpd=$gpd+1;
elseif ($pub=='S') $spd=$spd+1;
elseif ($pub=='F') $fpd=$fpd+1;
elseif ($pub=='O') $opd=$opd+1;
elseif ($pub=='X') $xpd=$xpd+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypd1=$ypd1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypd2=$ypd2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypd3=$ypd3+1;
else $zpd=$zpd+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepad=$socdlhepad+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenad=$socdlhenad+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbd=$socdlhepbd+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbd=$socdlhenbd+1;
else $socres=$socres+1;
}

$positivea = $apa + $bpa + $cpa + $spa + $epa;
$positive3a = $positivea + $fpa;
$positive2a = number_format((($positivea / $positive3a) * 100),1);

$positiveb = $apb + $bpb + $cpb + $spb + $epb;
$positive3b = $positiveb + $fpb;
$positive2b = number_format((($positiveb / $positive3b) * 100),1);

$positivec = $apc + $bpc + $cpc + $spc + $epc;
$positive3c = $positivec + $fpc;
$positive2c = number_format((($positivec / $positive3c) * 100),1);

$positived = $apd + $bpd + $cpd + $spd + $epd;
$positive3d = $positived + $fpd;
$positive2d = number_format((($positived / $positive3d) * 100),1);

$socdlhepa = $socdlhepaa + $socdlhepba;
$socdlhena = $socdlhenaa + $socdlhenba;
$socdlhea = number_format((($socdlhepa / ($socdlhepa + $socdlhena)) * 100),1);

$socdlhepb = $socdlhepab + $socdlhepbb;
$socdlhenb = $socdlhenab + $socdlhenbb;
$socdlheb = number_format((($socdlhepb / ($socdlhepb + $socdlhenb)) * 100),1);

$socdlhepc = $socdlhepac + $socdlhepbc;
$socdlhenc = $socdlhenac + $socdlhenbc;
$socdlhec = number_format((($socdlhepc / ($socdlhepc + $socdlhenc)) * 100),1);

$socdlhepd = $socdlhepad + $socdlhepbd;
$socdlhend = $socdlhenad + $socdlhenbd;
$socdlhed = number_format((($socdlhepd / ($socdlhepd + $socdlhend)) * 100),1);

if ($arr!=$c) {
echo "<td>$arr</td>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsa</td><td>$positive2a%</td><td>$socdlhea%</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsb</td><td>$positive2b%</td><td>$socdlheb%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsc</td><td>$positive2c%</td><td>$socdlhec%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<td>0</td><td>-</td><td>-</td>";
else echo "<td>$countsd</td><td>$positive2d%</td><td>$socdlhed%</td>";
}
echo "</tr>";
}
else {
echo "<th align='left'>$arr</th>";
if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsa</th><th align='left'>$positive2a%</th><th align='left'>$socdlhea%</th>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsb</th><th align='left'>$positive2b%</th><th align='left'>$socdlheb%</th>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsc</th><th align='left'>$positive2c%</th><th align='left'>$socdlhec%</th>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<th align='left'>0</th><th align='left'>-</th><th align='left'>-</th>";
else echo "<th align='left'>$countsd</th><th align='left'>$positive2d%</th><th align='left'>$socdlhed%</th>";
}
echo "</tr>";
}
}

echo "</table>";
echo "<br/><p class='small'>PO: Positive Outcomes: The proportion of graduates who were available for employment that had secured employment or further study.</p><br /><p class='small'>GP: Graduate Prospects: The proportion of graduates who were available for employment that had secured graduate-level employment or graduate-level further study. </p><br />";
}

else {
echo "";
}

break;
case yes:

//test code

echo "JACS1 code sent to database for 07/08 = $lev1b";
echo "<br />";
echo "JACS1 code sent to database for 10/11 = $lev1";
echo "<br />";

$mysqllev1="(select DISTINCT LEV1, count(LEV1) AS sum FROM tqi78 GROUP BY LEV1) ORDER by LEV1";
$resultlev1 = mysql_query($mysqllev1);

while($lev1x=mysql_fetch_array($resultlev1))
{
echo $lev1x[LEV1];
echo "<br />";
}

//end test

$joinpd="(select distinct COURSE from popdlhe1011 inner join tqi1011 on HUSID = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1."' and LEV2 like '".$lev2."' and LEV3 like '".$lev3."')";
$resultpd = mysql_query($joinpd);

$courseselectd = "and (COURSE like '";

while($row = mysql_fetch_array($resultpd))
 {
 $course = $row["COURSE"];
 $courseselectd .= $course;
 $courseselectd .= "' OR COURSE like'";
 }

$courseselectd = substr($courseselectd,0,-16);
$courseselectd .= ")";


$joinpc="(select distinct COURSE from popdlhe910 inner join tqi910 on HUSID = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1."' and LEV2 like '".$lev2."' and LEV3 like '".$lev3."')";
$resultpc = mysql_query($joinpc);

$courseselectc = "and (COURSE like '";

while($row = mysql_fetch_array($resultpc))
 {
 $course = $row["COURSE"];
 $courseselectc .= $course;
 $courseselectc .= "' OR COURSE like'";
 }

$courseselectc = substr($courseselectc,0,-16);
$courseselectc .= ")";


$joinpb="(select distinct COURSE from popdlhe89 inner join tqi89 on HUSID = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1b."' and LEV2 like '".$lev2b."' and LEV3 like '".$lev3b."')";
$resultpb = mysql_query($joinpb);

$courseselectb = "and (COURSE like '";

while($row = mysql_fetch_array($resultpb))
 {
 $course = $row["COURSE"];
 $courseselectb .= $course;
 $courseselectb .= "' OR COURSE like'";
 }

$courseselectb = substr($courseselectb,0,-16);
$courseselectb .= ")";


$joinpa="(select distinct COURSE from popdlhe78 inner join tqi78 on HUSID = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1b."' and LEV2 like '".$lev2b."' and LEV3 like '".$lev3b."')";
$resultpa = mysql_query($joinpa);

$courseselecta = "and (COURSE like '";

while($row = mysql_fetch_array($resultpa))
 {
 $course = $row["COURSE"];
 $courseselecta .= $course;
 $courseselecta .= "' OR COURSE like'";
 }

$courseselecta = substr($courseselecta,0,-16);
$courseselecta .= ")";


if ($d=="%" || $d=='6') $smallra=mysql_num_rows(mysql_query("select distinct HUSID from popdlhe78 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." $courseselecta"));
else $smallra=='0';
if ($d=="%" || $d=='1' || $d=='5') $smallrb=mysql_num_rows(mysql_query("select distinct HUSID from popdlhe89 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." $courseselectb"));
else $smallrb=='0';
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') $smallrc=mysql_num_rows(mysql_query("select distinct HUSID from popdlhe910 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." $courseselectc"));
else $smallrc=='0';
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') $smallrd=mysql_num_rows(mysql_query("select distinct HUSID from popdlhe1011 where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." $courseselectd"));
else $smallrd=='0';

if ($smallra=="") $smallra='0'; if ($smallrb=="") $smallrb='0'; if ($smallrc=="") $smallrc='0'; if ($smallrd=="") $smallrd='0';

$joinpd="select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL, COUNTER, HUSID from extract1011 inner join popdlhe1011 on HUSIDa = HUSID inner join tqi1011 on HUSIDa = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1."' and LEV2 like '".$lev2."' and LEV3 like '".$lev3."'";
$resultpd = mysql_query($joinpd);
$countsd = mysql_num_rows($resultpd);
$joinpc="select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL, COUNTER, HUSID from extract910 inner join popdlhe910 on HUSIDa = HUSID inner join tqi910 on HUSIDa = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1."' and LEV2 like '".$lev2."' and LEV3 like '".$lev3."'";
$resultpc = mysql_query($joinpc);
$countsc = mysql_num_rows($resultpc);
$joinpb="select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL, COUNTER, HUSID from extract89 inner join popdlhe89 on HUSIDa = HUSID inner join tqi89 on HUSIDa = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1b."' and LEV2 like '".$lev2b."' and LEV3 like '".$lev3b."'";
$resultpb = mysql_query($joinpb);
$countsb = mysql_num_rows($resultpb);
$joinpa="select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL, COUNTER, HUSID from extract78 inner join popdlhe78 on HUSIDa = HUSID inner join tqi78 on HUSIDa = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1b."' and LEV2 like '".$lev2b."' and LEV3 like '".$lev3b."'";
$resultpa = mysql_query($joinpa);
$countsa = mysql_num_rows($resultpa);

$countsd='0';

$apd=0; $bpd=0; $cpd=0; $spd=0; $epd=0; $fpd=0; $gpd=0; $opd=0; $xpd=0;
$apc=0; $bpc=0; $cpc=0; $spc=0; $epc=0; $fpc=0; $gpc=0; $opc=0; $xpc=0;
$apb=0; $bpb=0; $cpb=0; $spb=0; $epb=0; $fpb=0; $gpb=0; $opb=0; $xpb=0;
$apa=0; $bpa=0; $cpa=0; $spa=0; $epa=0; $fpa=0; $gpa=0; $opa=0; $xpa=0;
$apda=0; $bpda=0; $cpda=0; $spda=0; $epda=0; $fpda=0; $gpda=0; $opda=0; $xpda=0;
$apca=0; $bpca=0; $cpca=0; $spca=0; $epca=0; $fpca=0; $gpca=0; $opca=0; $xpca=0;
$apba=0; $bpba=0; $cpba=0; $spba=0; $epba=0; $fpba=0; $gpba=0; $opba=0; $xpba=0;
$apaa=0; $bpaa=0; $cpaa=0; $spaa=0; $epaa=0; $fpaa=0; $gpaa=0; $opaa=0; $xpaa=0;

$ypd1a=0; $ypc1a=0; $ypb1a=0; $ypa1a=0;
$ypd2a=0; $ypc2a=0; $ypb2a=0; $ypa2a=0; 
$ypd3a=0; $ypc3a=0; $ypb3a=0; $ypa3a=0; 
$zpda=0; $zpca=0; $zpba=0; $zpaa=0; 

$ypd1=0; $ypc1=0; $ypb1=0; $ypa1=0;
$ypd2=0; $ypc2=0; $ypb2=0; $ypa2=0; 
$ypd3=0; $ypc3=0; $ypb3=0; $ypa3=0; 
$zpd=0; $zpc=0; $zpb=0; $zpa=0; 

while($r=mysql_fetch_array($resultpd))
{
 $emp=$r["EMPCIR"];
 $mod=$r["MODSTUDY"];
 $type=$r["TYPEQUAL"];
 $soc=$r["SOCDLHE"];
 $count3=$r["COUNTER"];
$husid=$r["HUSID"];
$pub=$r["PUBGRID"];
$homeeuint=$r["HOMEEU"];
if ($r["COUNTER"]=='33' || $r["COUNTER"]=='34') $add=2;
elseif ($r["COUNTER"]=='50') $add=3;
elseif ($r["COUNTER"]=='66' || $r["COUNTER"]=='67') $add=4;
else $add=6;
if ($pub=='A') $apda=$apda+1;
elseif ($pub=='B') $bpda=$bpda+1;
elseif ($pub=='C') $cpda=$cpda+1;
elseif ($pub=='E') $epda=$epda+1;
elseif ($pub=='G') $gpda=$gpda+1;
elseif ($pub=='S') $spda=$spda+1;
elseif ($pub=='F') $fpda=$fpda+1;
elseif ($pub=='O') $opda=$opda+1;
elseif ($pub=='X') $xpda=$xpda+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypd1a=$ypd1a+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypd2a=$ypd2a+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypd3a=$ypd3a+1;
else $zpda=$zpda+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepda=$socdlhepda+$add;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhendd=$socdlhendd+$add;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbd=$socdlhepbd+$add;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbd=$socdlhenbd+$add;
else $socres=$socres+$add;

if (in_array($husid, $arrd)) {
echo "";
}
else {
$countsd=$countsd+1;
if ($pub=='A') $apd=$apd+1;
elseif ($pub=='B') $bpd=$bpd+1;
elseif ($pub=='C') $cpd=$cpd+1;
elseif ($pub=='E') $epd=$epd+1;
elseif ($pub=='G') $gpd=$gpd+1;
elseif ($pub=='S') $spd=$spd+1;
elseif ($pub=='F') $fpd=$fpd+1;
elseif ($pub=='O') $opd=$opd+1;
elseif ($pub=='X') $xpd=$xpd+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypd1=$ypd1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypd2=$ypd2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypd3=$ypd3+1;
else $zpd=$zpd+1;
}
$arrd[]=$husid;
}

$countsc='0';
while($r=mysql_fetch_array($resultpc))
{
 $emp=$r["EMPCIR"];
 $mod=$r["MODSTUDY"];
 $type=$r["TYPEQUAL"];
 $soc=$r["SOCDLHE"];
 $count3=$r["COUNTER"];
$husid=$r["HUSID"];
if ($r["COUNTER"]=='33' || $r["COUNTER"]=='34') $add=2;
elseif ($r["COUNTER"]=='50') $add=3;
elseif ($r["COUNTER"]=='66' || $r["COUNTER"]=='67') $add=4;
else $add=6;
$pub=$r["PUBGRID"];
 $homeeuint=$r["HOMEEU"];
if ($pub=='A') $apca=$apca+$add;
elseif ($pub=='B') $bpca=$bpca+$add;
elseif ($pub=='C') $cpca=$cpca+$add;
elseif ($pub=='E') $epca=$epca+$add;
elseif ($pub=='G') $gpca=$gpca+$add;
elseif ($pub=='S') $spca=$spca+$add;
elseif ($pub=='F') $fpca=$fpca+$add;
elseif ($pub=='O') $opca=$opca+$add;
elseif ($pub=='X') $xpca=$xpca+$add;
elseif ($pub=='Y' && $homeeuint=='1') $ypc1a=$ypc1a+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypc2a=$ypc2a+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypc3a=$ypc3a+1;
else $zpca=$zpca+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepca=$socdlhepca+$add;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenca=$socdlhenca+$add;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbc=$socdlhepbc+$add;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbc=$socdlhenbc+$add;
else $socres=$socres+$add;

if (in_array($husid, $arrc)) {
echo "";
}
else {
$countsc=$countsc+1;
if ($pub=='A') $apc=$apc+1;
elseif ($pub=='B') $bpc=$bpc+1;
elseif ($pub=='C') $cpc=$cpc+1;
elseif ($pub=='E') $epc=$epc+1;
elseif ($pub=='G') $gpc=$gpc+1;
elseif ($pub=='S') $spc=$spc+1;
elseif ($pub=='F') $fpc=$fpc+1;
elseif ($pub=='O') $opc=$opc+1;
elseif ($pub=='X') $xpc=$xpc+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypc1=$ypc1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypc2=$ypc2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypc3=$ypc3+1;
else $zpc=$zpc+1;
}
$arrc[]=$husid;
}

$countsb='0';
while($r=mysql_fetch_array($resultpb))
{
 $emp=$r["EMPCIR"];
 $mod=$r["MODSTUDY"];
 $type=$r["TYPEQUAL"];
 $soc=$r["SOCDLHE"];
 $count3=$r["COUNTER"];
$husid=$r["HUSID"];
if ($r["COUNTER"]=='33' || $r["COUNTER"]=='34') $add=2;
elseif ($r["COUNTER"]=='50') $add=3;
elseif ($r["COUNTER"]=='66' || $r["COUNTER"]=='67') $add=4;
else $add=6;
$pub=$r["PUBGRID"];
 $homeeuint=$r["HOMEEU"];
if ($pub=='A') $apba=$apba+$add;
elseif ($pub=='B') $bpba=$bpba+$add;
elseif ($pub=='C') $cpba=$cpba+$add;
elseif ($pub=='E') $epba=$epba+$add;
elseif ($pub=='G') $gpba=$gpba+$add;
elseif ($pub=='S') $spba=$spba+$add;
elseif ($pub=='F') $fpba=$fpba+$add;
elseif ($pub=='O') $opba=$opba+$add;
elseif ($pub=='X') $xpba=$xpba+$add;
elseif ($pub=='Y' && $homeeuint=='1') $ypb1a=$ypb1a+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypb2a=$ypb2a+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypb3a=$ypb3a+1;
else $zpba=$zpba+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepba=$socdlhepba+$add;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenba=$socdlhenba+$add;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbb=$socdlhepbb+$add;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbb=$socdlhenbb+$add;
else $socres=$socres+$add;

if (in_array($husid, $arrb)) {
echo "";
}
else {
$countsb=$countsb+1;
if ($pub=='A') $apb=$apb+1;
elseif ($pub=='B') $bpb=$bpb+1;
elseif ($pub=='C') $cpb=$cpb+1;
elseif ($pub=='E') $epb=$epb+1;
elseif ($pub=='G') $gpb=$gpb+1;
elseif ($pub=='S') $spb=$spb+1;
elseif ($pub=='F') $fpb=$fpb+1;
elseif ($pub=='O') $opb=$opb+1;
elseif ($pub=='X') $xpb=$xpb+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypb1=$ypb1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypb2=$ypb2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypb3=$ypb3+1;
else $zpb=$zpb+1;
}
$arrb[]=$husid;
}

$countsa='0';
while($r=mysql_fetch_array($resultpa))
{
 $emp=$r["EMPCIR"];
 $mod=$r["MODSTUDY"];
 $type=$r["TYPEQUAL"];
 $soc=$r["SOCDLHE"];
 $count3=$r["COUNTER"];
$husid=$r["HUSID"];
if ($r["COUNTER"]=='33' || $r["COUNTER"]=='34') $add=2;
elseif ($r["COUNTER"]=='50') $add=3;
elseif ($r["COUNTER"]=='66' || $r["COUNTER"]=='67') $add=4;
else $add=6;
$pub=$r["PUBGRID"];
 $homeeuint=$r["HOMEEU"];
if ($pub=='A') $apaa=$apaa+$add;
elseif ($pub=='B') $bpaa=$bpaa+$add;
elseif ($pub=='C') $cpaa=$cpaa+$add;
elseif ($pub=='E') $epaa=$epaa+$add;
elseif ($pub=='G') $gpaa=$gpaa+$add;
elseif ($pub=='S') $spaa=$spaa+$add;
elseif ($pub=='F') $fpaa=$fpaa+$add;
elseif ($pub=='O') $opaa=$opaa+$add;
elseif ($pub=='X') $xpaa=$xpaa+$add;
elseif ($pub=='Y' && $homeeuint=='1') $ypa1a=$ypa1a+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypa2a=$ypa2a+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypa3a=$ypa3a+1;
else $zpaa=$zpaa+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepaa=$socdlhepaa+$add;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenaa=$socdlhenaa+$add;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepba=$socdlhepba+$add;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenba=$socdlhenba+$add;
else $socres=$socres+$add;

if (in_array($husid, $arra)) {
echo "";
}
else {
$countsa=$countsa+1;
if ($pub=='A') $apa=$apa+1;
elseif ($pub=='B') $bpa=$bpa+1;
elseif ($pub=='C') $cpa=$cpa+1;
elseif ($pub=='E') $epa=$epa+1;
elseif ($pub=='G') $gpa=$gpa+1;
elseif ($pub=='S') $spa=$spa+1;
elseif ($pub=='F') $fpa=$fpa+1;
elseif ($pub=='O') $opa=$opa+1;
elseif ($pub=='X') $xpa=$xpa+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypa1=$ypa1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypa2=$ypa2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypa3=$ypa3+1;
else $zpa=$zpa+1;

}
$arra[]=$husid;
}

$positivea = $apaa + $bpaa + $cpaa + $spaa + $epaa;
$positive3a = $positivea + $fpaa;
$positive2a = number_format((($positivea / $positive3a) * 100),1);

$socdlhepa = $socdlhepaa + $socdlhepba;
$socdlhena = $socdlhenaa + $socdlhenba;
$socdlhea = number_format((($socdlhepa / ($socdlhepa + $socdlhena)) * 100),1);


$positiveb = $apba + $bpba + $cpba + $spba + $epba;
$positive3b = $positiveb + $fpba;
$positive2b = number_format((($positiveb / $positive3b) * 100),1);

$socdlhepb = $socdlhepba + $socdlhepbb;
$socdlhenb = $socdlhenba + $socdlhenbb;
$socdlheb = number_format((($socdlhepb / ($socdlhepb + $socdlhenb)) * 100),1);


$positivec = $apca + $bpca + $cpca + $spca + $epca;
$positive3c = $positivec + $fpca;
$positive2c = number_format((($positivec / $positive3c) * 100),1);

$socdlhepc = $socdlhepca + $socdlhepbc;
$socdlhenc = $socdlhenca + $socdlhenbc;
$socdlhec = number_format((($socdlhepc / ($socdlhepc + $socdlhenc)) * 100),1);


$positived = $apda + $bpda + $cpda + $spda + $epda;
$positive3d = $positived + $fpda;
$positive2d = number_format((($positived / $positive3d) * 100),1);

$socdlhepd = $socdlhepda + $socdlhepbd;
$socdlhend = $socdlhenda + $socdlhenbd;
$socdlhed = number_format((($socdlhepd / ($socdlhepd + $socdlhend)) * 100),1);


echo "<br /><table border='1'><tr><th>Survey</th><th>Survey Population</th><th>Respondents</th><th>Response Rate</th><th>Weighted Positive Outcomes (PO)</th><th>Weighted Graduate Prospects (GP)</th></tr>";
$percentar = number_format((( $countsa / $smallra ) * 100 ),1);
$percentbr = number_format((( $countsb / $smallrb ) * 100 ),1);
$percentcr = number_format((( $countsc / $smallrc ) * 100 ),1);
$percentdr = number_format((( $countsd / $smallrd ) * 100 ),1);
if ($d=="%" || $d=='6') {
if ($smallra>0) echo "<tr><th>2007/08</th><td>$smallra</td><td>$countsa</td><td>$percentar%</td><td>$positive2a%</td><td>$socdlhea%</td></tr>";
else echo "<tr><th>2007/08</th><td>$smallra</td><td>$countsa</td><td>N/A</td><td>N/A</td><td>N/A</td></tr>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($smallrb>0) echo "<tr><th>2008/09</th><td>$smallrb</td><td>$countsb</td><td>$percentbr%</td><td>$positive2b%</td><td>$socdlheb%</td></tr>";
else echo "<tr><th>2008/09</th><td>$smallrb</td><td>$countsb</td><td>N/A</td><td>N/A</td><td>N/A</td></tr>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($smallrc>0) echo "<tr><th>2009/10</th><td>$smallrc</td><td>$countsc</td><td>$percentcr%</td><td>$positive2c%</td><td>$socdlhec%</td></tr>";
else echo "<tr><th>2009/10</th><td>$smallrc</td><td>$countsc</td><td>N/A</td><td>N/A</td><td>N/A</td></tr>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($smallrd>0) echo "<tr><th>2010/11</th><td>$smallrd</td><td>$countsd</td><td>$percentdr%</td><td>$positive2d%</td><td>$socdlhed%</td></tr>";
else echo "<tr><th>2010/11</th><td>$smallrd</td><td>$countsd</td><td>N/A</td><td>N/A</td><td>N/A</td></tr>";
}
echo "</table>";



$percentpa = $apa + $bpa + $cpa + $spa + $epa + $fpa + $gpa + $opa;
$percentapa = (number_format((( $apa / $percentpa ) * 100 ),1));
$percentbpa = (number_format((( $bpa / $percentpa ) * 100 ),1));
$percentcpa = (number_format((( $cpa / $percentpa ) * 100 ),1));
$percentspa = (number_format((( $spa / $percentpa ) * 100 ),1));
$percentepa = (number_format((( $epa / $percentpa ) * 100 ),1));
$percentfpa = (number_format((( $fpa / $percentpa ) * 100 ),1));
$percentgpa = (number_format((( $gpa / $percentpa ) * 100 ),1));
$percentopa = (number_format((( $opa / $percentpa ) * 100 ),1));

$percentpb = $apb + $bpb + $cpb + $spb + $epb + $fpb + $gpb + $opb;
$percentapb = (number_format((( $apb / $percentpb ) * 100 ),1));
$percentbpb = (number_format((( $bpb / $percentpb ) * 100 ),1));
$percentcpb = (number_format((( $cpb / $percentpb ) * 100 ),1));
$percentspb = (number_format((( $spb / $percentpb ) * 100 ),1));
$percentepb = (number_format((( $epb / $percentpb ) * 100 ),1));
$percentfpb = (number_format((( $fpb / $percentpb ) * 100 ),1));
$percentgpb = (number_format((( $gpb / $percentpb ) * 100 ),1));
$percentopb = (number_format((( $opb / $percentpb ) * 100 ),1));

$percentpc = $apc + $bpc + $cpc + $spc + $epc + $fpc + $gpc + $opc;
$percentapc = (number_format((( $apc / $percentpc ) * 100 ),1));
$percentbpc = (number_format((( $bpc / $percentpc ) * 100 ),1));
$percentcpc = (number_format((( $cpc / $percentpc ) * 100 ),1));
$percentspc = (number_format((( $spc / $percentpc ) * 100 ),1));
$percentepc = (number_format((( $epc / $percentpc ) * 100 ),1));
$percentfpc = (number_format((( $fpc / $percentpc ) * 100 ),1));
$percentgpc = (number_format((( $gpc / $percentpc ) * 100 ),1));
$percentopc = (number_format((( $opc / $percentpc ) * 100 ),1));

$percentpd = $apd + $bpd + $cpd + $spd + $epd + $fpd + $gpd + $opd;
$percentapd = (number_format((( $apd / $percentpd ) * 100 ),1));
$percentbpd = (number_format((( $bpd / $percentpd ) * 100 ),1));
$percentcpd = (number_format((( $cpd / $percentpd ) * 100 ),1));
$percentspd = (number_format((( $spd / $percentpd ) * 100 ),1));
$percentepd = (number_format((( $epd / $percentpd ) * 100 ),1));
$percentfpd = (number_format((( $fpd / $percentpd ) * 100 ),1));
$percentgpd = (number_format((( $gpd / $percentpd ) * 100 ),1));
$percentopd = (number_format((( $opd / $percentpd ) * 100 ),1));

echo "<br /><table border='1'><tr><th rowspan='2'>Publication Categories</th>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><th colspan='2'>2007/08 Survey</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><th colspan='2'>2008/09 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><th colspan='2'>2009/10 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><th colspan='2'>2010/11 Survey</th>";
echo "</tr>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><th style='font-size:10px'>&nbsp;Number&nbsp;</th><th style='font-size:10px'>&nbsp;Percentage&nbsp;</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><th style='font-size:10px'>&nbsp;Number&nbsp;</th><th style='font-size:10px'>&nbsp;Percentage&nbsp;</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><th style='font-size:10px'>&nbsp;Number&nbsp;</th><th style='font-size:10px'>&nbsp;Percentage&nbsp;</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><th style='font-size:10px'>&nbsp;Number&nbsp;</th><th style='font-size:10px'>&nbsp;Percentage&nbsp;</th>";
echo "</tr><tr><td>In full-time paid work (inc. self-employment)&nbsp;&nbsp;</td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$apa</td><td class='value'>" . $percentapa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$apb</td><td class='value'>" . $percentapb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$apc</td><td class='value'>" . $percentapc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$apd</td><td class='value'>" . $percentapd . "%</td>";
echo "</tr><tr><td>In part-time paid work </td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$bpa</td><td class='value'>" . $percentbpa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$bpb</td><td class='value'>" . $percentbpb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$bpc</td><td class='value'>" . $percentbpc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$bpd</td><td class='value'>" . $percentbpd . "%</td>";
echo "</tr><tr><td>In voluntary/unpaid work </td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$cpa</td><td class='value'>" . $percentcpa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$cpb</td><td class='value'>" . $percentcpb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$cpc</td><td class='value'>" . $percentcpc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$cpd</td><td class='value'>" . $percentcpd . "%</td>";
echo "</tr><tr><td>In further study </td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$epa</td><td class='value'>" . $percentepa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$epb</td><td class='value'>" . $percentepb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$epc</td><td class='value'>" . $percentepc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$epd</td><td class='value'>" . $percentepd . "%</td>";
echo "</tr><tr><td>Not available for employment (inc. gap year)</td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$gpa</td><td class='value'>" . $percentgpa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$gpb</td><td class='value'>" . $percentgpb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$gpc</td><td class='value'>" . $percentgpc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$gpd</td><td class='value'>" . $percentgpd . "%</td>";
echo "</tr><tr><td>Due to start work</td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$spa</td><td class='value'>" . $percentspa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$spb</td><td class='value'>" . $percentspb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$spc</td><td class='value'>" . $percentspc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$spd</td><td class='value'>" . $percentspd . "%</td>";
echo "</tr><tr><td>Assumed unemployed</td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$fpa</td><td class='value'>" . $percentfpa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$fpb</td><td class='value'>" . $percentfpb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$fpc</td><td class='value'>" . $percentfpc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$fpd</td><td class='value'>" . $percentfpd . "%</td>";
echo "</tr><tr><td>Other</td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$opa</td><td class='value'>" . $percentopa . "%</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$opb</td><td class='value'>" . $percentopb . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$opc</td><td class='value'>" . $percentopc . "%</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$opd</td><td class='value'>" . $percentopd . "%</td>";
echo "</tr><tr><th>Total Known Destinations</th>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$percentpa</td><td>&nbsp;</td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$percentpb</td><td>&nbsp;</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$percentpc</td><td>&nbsp;</td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$percentpd</td><td>&nbsp;</td>";
echo "</tr><tr><td class='value'>Declined</td>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><td>&nbsp;$xpa</td><td></td>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><td>&nbsp;$xpb</td><td></td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><td>&nbsp;$xpc</td><td></td>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><td>&nbsp;$xpd</td><td></td>";
echo "</tr></table>";

echo "<br /><table border='1'><tr><th>No Information obtained</th>";
if ($d=="%" || $d=='6') echo "<td class='no'></td><th>2007/08 Survey</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<td class='no'></td><th>2008/09 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<td class='no'></td><th>2009/10 Survey</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<td class='no'></td><th>2010/11 Survey</th>";
echo "</tr><tr><td>Home graduates&nbsp;&nbsp;</td>";
if ($d=="%" || $d=='6') {
if ($h=='%' || $h=='1' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypa1</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($h=='%' || $h=='1' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypb1</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($h=='%' || $h=='1' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypc1</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($h=='%' || $h=='1' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypd1</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
echo "</tr><tr><td>EU graduates&nbsp;&nbsp;</td>";
if ($d=="%" || $d=='6') {
if ($h=='%' || $h=='2' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypa2</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($h=='%' || $h=='2' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypb2</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($h=='%' || $h=='2' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypc2</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($h=='%' || $h=='2' || $h=='3') echo "<td class='no'></td><td>&nbsp;$ypd2</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
echo "</tr><tr><td>International graduates&nbsp;&nbsp;</td>";
if ($d=="%" || $d=='6') {
if ($h=='%' || $h=='4') echo "<td class='no'></td><td>&nbsp;$ypa3</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($h=='%' || $h=='4') echo "<td class='no'></td><td>&nbsp;$ypb3</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($h=='%' || $h=='4') echo "<td class='no'></td><td>&nbsp;$ypc3</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($h=='%' || $h=='4') echo "<td class='no'></td><td>&nbsp;$ypd3</td>";
else echo "<td class='no'></td><td>&nbsp;-</td>";
}
echo "</tr></table>";

echo "<br /><p class='positive'>Courses which make up this group of graduates and their weightings:</p>";

$joinca="(select COUNTER, COURSE from extract78 inner join popdlhe78 on HUSIDa = HUSID inner join tqi78 on HUSIDa = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1b."' and LEV2 like '".$lev2b."' and LEV3 like '".$lev3b."' group by COUNTER, COURSE) UNION (select COUNTER, COURSE from extract89 inner join popdlhe89 on HUSIDa = HUSID inner join tqi89 on HUSIDa = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1b."' and LEV2 like '".$lev2b."' and LEV3 like '".$lev3b."' group by COUNTER, COURSE) UNION (select COUNTER, COURSE from extract910 inner join popdlhe910 on HUSIDa = HUSID inner join tqi910 on HUSIDa = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1."' and LEV2 like '".$lev2."' and LEV3 like '".$lev3."' group by COUNTER, COURSE) UNION (select COUNTER, COURSE from extract1011 inner join popdlhe1011 on HUSIDa = HUSID inner join tqi1011 on HUSIDa = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1."' and LEV2 like '".$lev2."' and LEV3 like '".$lev3."' group by COUNTER, COURSE) order by (COUNTER+0) DESC, COURSE";
$resultca = mysql_query($joinca);
$countca = mysql_num_rows($resultca);

echo "<table border='1'><tr><th rowspan='2'>Course</th><th rowspan='2'>Weight</th>";
if ($d=="%" || $d=='6') echo "<th colspan='3'>2007/08</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th colspan='3'>2008/09</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th colspan='3'>2009/10</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th colspan='3'>2010/11</th>";
echo "</tr><tr>";
if ($d=="%" || $d=='6') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='5') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') echo "<th>No</th><th>PO</th><th>GP</th>";
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') echo "<th>No</th><th>PO</th><th>GP</th>";
echo "</tr>";

while($r=mysql_fetch_array($resultca))
{
$course=$r["COURSE"];
$counter=$r["COUNTER"];
echo "<tr><td style='font-size:0.8em' height='17px'>";
echo $course;
echo "</td><td style='font-size:0.8em'>";
if ($counter=='100') $countered='1';
elseif ($counter=='66' || $counter=='67') $countered="<sup>2</sup>&frasl;<sub>3</sub>";
elseif ($counter=='50') $countered="<sup>1</sup>&frasl;<sub>2</sub>";
else $countered="<sup>1</sup>&frasl;<sub>3</sub>";
echo $countered;
echo "</td>";

$joinpa="select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL, COUNTER, HUSID from extract78 inner join popdlhe78 on HUSIDa = HUSID inner join tqi78 on HUSIDa = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1b."' and LEV2 like '".$lev2b."' and LEV3 like '".$lev3b."' and COURSE = '".$course."' and COUNTER = '".$counter."'";
$resultpa = mysql_query($joinpa);
$countsa = mysql_num_rows($resultpa);
$joinpb="select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL, COUNTER, HUSID from extract89 inner join popdlhe89 on HUSIDa = HUSID inner join tqi89 on HUSIDa = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1b."' and LEV2 like '".$lev2b."' and LEV3 like '".$lev3b."' and COURSE = '".$course."' and COUNTER = '".$counter."'";
$resultpb = mysql_query($joinpb);
$countsb = mysql_num_rows($resultpb);
$joinpc="select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL, COUNTER, HUSID from extract910 inner join popdlhe910 on HUSIDa = HUSID inner join tqi910 on HUSIDa = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1."' and LEV2 like '".$lev2."' and LEV3 like '".$lev3."' and COURSE = '".$course."' and COUNTER = '".$counter."'";
$resultpc = mysql_query($joinpc);
$countsc = mysql_num_rows($resultpc);
$joinpd="select PUBGRID, HOMEEU, EMPCIR, MODSTUDY, SOCDLHE, TYPEQUAL, COUNTER, HUSID from extract1011 inner join popdlhe1011 on HUSIDa = HUSID inner join tqi1011 on HUSIDa = HUSIDd where XQMODE01 like '".$e."' and " . $level . " and " . $levela . " and ".$homeeu." and LEV1 like '".$lev1."' and LEV2 like '".$lev2."' and LEV3 like '".$lev3."' and COURSE = '".$course."' and COUNTER = '".$counter."'";
$resultpd = mysql_query($joinpd);
$countsd = mysql_num_rows($resultpd);

$adda='0'; $addb='0'; $addc='0';

$apa=0; $bpa=0; $cpa=0; $spa=0; $epa=0; $fpa=0; $gpa=0; $opa=0; $xpa=0;
$apb=0; $bpb=0; $cpb=0; $spb=0; $epb=0; $fpb=0; $gpb=0; $opb=0; $xpb=0;
$apc=0; $bpc=0; $cpc=0; $spc=0; $epc=0; $fpc=0; $gpc=0; $opc=0; $xpc=0;
$apd=0; $bpd=0; $cpd=0; $spd=0; $epd=0; $fpd=0; $gpd=0; $opd=0; $xpd=0;
$socdlhepaa=0; $socdlhenaa=0; $socdlhepba=0; $socdlhenba=0;
$socdlhepab=0; $socdlhenab=0; $socdlhepbb=0; $socdlhenbb=0;
$socdlhepac=0; $socdlhenac=0; $socdlhepbc=0; $socdlhenbc=0;
$socdlhepad=0; $socdlhenad=0; $socdlhepbd=0; $socdlhenbd=0;
while($row = mysql_fetch_array($resultpa))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apa=$apa+1;
elseif ($pub=='B') $bpa=$bpa+1;
elseif ($pub=='C') $cpa=$cpa+1;
elseif ($pub=='E') $epa=$epa+1;
elseif ($pub=='G') $gpa=$gpa+1;
elseif ($pub=='S') $spa=$spa+1;
elseif ($pub=='F') $fpa=$fpa+1;
elseif ($pub=='O') $opa=$opa+1;
elseif ($pub=='X') $xpa=$xpa+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypa1=$ypa1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypa2=$ypa2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypa3=$ypa3+1;
else $zpa=$zpa+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepaa=$socdlhepaa+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenaa=$socdlhenaa+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepba=$socdlhepba+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenba=$socdlhenba+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpb))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apb=$apb+1;
elseif ($pub=='B') $bpb=$bpb+1;
elseif ($pub=='C') $cpb=$cpb+1;
elseif ($pub=='E') $epb=$epb+1;
elseif ($pub=='G') $gpb=$gpb+1;
elseif ($pub=='S') $spb=$spb+1;
elseif ($pub=='F') $fpb=$fpb+1;
elseif ($pub=='O') $opb=$opb+1;
elseif ($pub=='X') $xpb=$xpb+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypb1=$ypb1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypb2=$ypb2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypb3=$ypb3+1;
else $zpb=$zpb+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepab=$socdlhepab+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenab=$socdlhenab+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbb=$socdlhepbb+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbb=$socdlhenbb+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpc))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apc=$apc+1;
elseif ($pub=='B') $bpc=$bpc+1;
elseif ($pub=='C') $cpc=$cpc+1;
elseif ($pub=='E') $epc=$epc+1;
elseif ($pub=='G') $gpc=$gpc+1;
elseif ($pub=='S') $spc=$spc+1;
elseif ($pub=='F') $fpc=$fpc+1;
elseif ($pub=='O') $opc=$opc+1;
elseif ($pub=='X') $xpc=$xpc+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypc1=$ypc1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypc2=$ypc2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypc3=$ypc3+1;
else $zpc=$zpc+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepac=$socdlhepac+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenac=$socdlhenac+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbc=$socdlhepbc+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbc=$socdlhenbc+1;
else $socres=$socres+1;
}
while($row = mysql_fetch_array($resultpd))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $type=$row["TYPEQUAL"];
 $soc=$row["SOCDLHE"];
$pub=$row["PUBGRID"];
 $homeeuint=$row["HOMEEU"];
if ($pub=='A') $apd=$apd+1;
elseif ($pub=='B') $bpd=$bpd+1;
elseif ($pub=='C') $cpd=$cpd+1;
elseif ($pub=='E') $epd=$epd+1;
elseif ($pub=='G') $gpd=$gpd+1;
elseif ($pub=='S') $spd=$spd+1;
elseif ($pub=='F') $fpd=$fpd+1;
elseif ($pub=='O') $opd=$opd+1;
elseif ($pub=='X') $xpd=$xpd+1;
elseif ($pub=='Y' && $homeeuint=='1') $ypd1=$ypd1+1;
elseif ($pub=='Y' && $homeeuint=='2') $ypd2=$ypd2+1;
elseif ($pub=='Y' && $homeeuint=='3') $ypd3=$ypd3+1;
else $zpd=$zpd+1;

if ((substr($soc,0,3)=='111' || substr($soc,0,3)=='112' || substr($soc,0,3)=='113' || substr($soc,0,3)=='114' || substr($soc,0,3)=='115' || substr($soc,0,4)=='1162' || substr($soc,0,4)=='1163' || substr($soc,0,4)=='1171' || substr($soc,0,4)=='1172' || substr($soc,0,4)=='1173' || substr($soc,0,3)=='118' || substr($soc,0,4)=='1221' || substr($soc,0,4)=='1222' || substr($soc,0,4)=='1224' || substr($soc,0,4)=='1225' || substr($soc,0,4)=='1226' || substr($soc,0,4)=='1231' || substr($soc,0,4)=='1235' || substr($soc,0,4)=='1239' || substr($soc,0,1)=='2' || substr($soc,0,4)=='3111' || substr($soc,0,4)=='3113' || substr($soc,0,4)=='3114' || substr($soc,0,4)=='3115' || substr($soc,0,4)=='3119' || substr($soc,0,4)=='3121' || substr($soc,0,4)=='3123' || substr($soc,0,4)=='3132' || substr($soc,0,4)=='3211' || substr($soc,0,4)=='3212' || substr($soc,0,4)=='3214' || substr($soc,0,4)=='3215' || substr($soc,0,4)=='3218' || substr($soc,0,3)=='322' || substr($soc,0,3)=='323' || substr($soc,0,4)=='3312' || substr($soc,0,4)=='3319' || substr($soc,0,3)=='341' || substr($soc,0,3)=='342' || substr($soc,0,3)=='343' || substr($soc,0,4)=='3442' || substr($soc,0,4)=='3449' || substr($soc,0,4)=='3512' || substr($soc,0,3)=='352' || substr($soc,0,3)=='353' || substr($soc,0,3)=='354' || substr($soc,0,3)=='355' || substr($soc,0,3)=='356' || substr($soc,0,4)=='4111' || substr($soc,0,4)=='4114' || substr($soc,0,4)=='4137' || substr($soc,0,4)=='5245' || substr($soc,0,3)=='541' || $type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $socdlhepad=$socdlhepad+1;
elseif ((substr($soc,0,4)=='1161' || substr($soc,0,4)=='1174' || substr($soc,0,4)=='1219' || substr($soc,0,4)=='1223' || substr($soc,0,4)=='1232' || substr($soc,0,4)=='1233' || substr($soc,0,4)=='1234' || substr($soc,0,4)=='3112' || substr($soc,0,4)=='3122' || substr($soc,0,4)=='3131' || substr($soc,0,4)=='3213' || substr($soc,0,4)=='3216' || substr($soc,0,4)=='3217' || substr($soc,0,4)=='3311' || substr($soc,0,4)=='3313' || substr($soc,0,4)=='3314' || substr($soc,0,4)=='3441' || substr($soc,0,4)=='3443' || substr($soc,0,4)=='3511' || substr($soc,0,4)=='3513' || substr($soc,0,4)=='3514' || substr($soc,0,4)=='4112' || substr($soc,0,4)=='4113' || substr($soc,0,3)=='412' || substr($soc,0,4)=='4131' || substr($soc,0,4)=='4132' || substr($soc,0,4)=='4133' || substr($soc,0,4)=='4134' || substr($soc,0,4)=='4135' || substr($soc,0,4)=='4136' || substr($soc,0,3)=='414' || substr($soc,0,3)=='415' || substr($soc,0,2)=='42' || substr($soc,0,2)=='51' || substr($soc,0,3)=='521' || substr($soc,0,3)=='522' || substr($soc,0,3)=='523' || substr($soc,0,4)=='5241' || substr($soc,0,4)=='5242' || substr($soc,0,4)=='5243' || substr($soc,0,4)=='5244' || substr($soc,0,4)=='5249' || substr($soc,0,2)=='53' || substr($soc,0,4)=='5411' || substr($soc,0,4)=='5412' || substr($soc,0,4)=='5413' || substr($soc,0,4)=='5419' || substr($soc,0,3)=='542' || substr($soc,0,3)=='543' || substr($soc,0,3)=='549' || substr($soc,0,1)=='6' || substr($soc,0,1)=='7' || substr($soc,0,1)=='8' || substr($soc,0,1)=='9') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15') && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenad=$socdlhenad+1;
elseif (($emp=='12' || $emp=='13' || $emp=='14') && ($type=='1' || $type=='2' || $type=='3' || $type=='4' || $type=='6')) $socdlhepbd=$socdlhepbd+1;
elseif ($emp=='12' && ($type=='5' || $type=='7' || $type=='98' || $type=='XX')) $socdlhenbd=$socdlhenbd+1;
else $socres=$socres+1;
}

$positivea = $apa + $bpa + $cpa + $spa + $epa;
$positive3a = $positivea + $fpa;
$positive2a = number_format((($positivea / $positive3a) * 100),1);

$positiveb = $apb + $bpb + $cpb + $spb + $epb;
$positive3b = $positiveb + $fpb;
$positive2b = number_format((($positiveb / $positive3b) * 100),1);

$positivec = $apc + $bpc + $cpc + $spc + $epc;
$positive3c = $positivec + $fpc;
$positive2c = number_format((($positivec / $positive3c) * 100),1);

$positived = $apd + $bpd + $cpd + $spd + $epd;
$positive3d = $positived + $fpd;
$positive2d = number_format((($positived / $positive3d) * 100),1);

$socdlhepa = $socdlhepaa + $socdlhepba;
$socdlhena = $socdlhenaa + $socdlhenba;
$socdlhea = number_format((($socdlhepa / ($socdlhepa + $socdlhena)) * 100),1);

$socdlhepb = $socdlhepab + $socdlhepbb;
$socdlhenb = $socdlhenab + $socdlhenbb;
$socdlheb = number_format((($socdlhepb / ($socdlhepb + $socdlhenb)) * 100),1);

$socdlhepc = $socdlhepac + $socdlhepbc;
$socdlhenc = $socdlhenac + $socdlhenbc;
$socdlhec = number_format((($socdlhepc / ($socdlhepc + $socdlhenc)) * 100),1);

$socdlhepd = $socdlhepad + $socdlhepbd;
$socdlhend = $socdlhenad + $socdlhenbd;
$socdlhed = number_format((($socdlhepd / ($socdlhepd + $socdlhend)) * 100),1);

if ($d=="%" || $d=='6') {
if ($countsa=='0') echo "<td>$countsa</td><td>-</td><td>-</td>";
else echo "<td>$countsa</td><td>$positive2a%</td><td>$socdlhea%</td>";
}
if ($d=="%" || $d=='1' || $d=='5') {
if ($countsb=='0') echo "<td>$countsb</td><td>-</td><td>-</td>";
else echo "<td>$countsb</td><td>$positive2b%</td><td>$socdlheb%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='4') {
if ($countsc=='0') echo "<td>$countsc</td><td>-</td><td>-</td>";
else echo "<td>$countsc</td><td>$positive2c</td><td>$socdlhec%</td>";
}
if ($d=="%" || $d=='1' || $d=='2' || $d=='3') {
if ($countsd=='0') echo "<td>$countsd</td><td>-</td><td>-</td>";
else echo "<td>$countsd</td><td>$positive2d</td><td>$socdlhed%</td>";
}
echo "</tr>";
}

echo "</table>";

break;
default:
echo "";
}
}


elseif ($smallr<=$minimum) {

echo "<br /><p class='positive'>There are too few graduates in your chosen population, please go back and re-select.</p>";

}

echo "<br /><a class='one' href='index.php'>Take me back to the main page</a><br /><br />";
echo "</div>
  <div id='footer'>$footer</div>
  </div>
</body>
</html>";
?>