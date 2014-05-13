<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php

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

echo "This is the xml code which has been generated from your choices and will be needed for the external version of GEMS.  Please copy ALL of the text below the horizontal line all the way to the bottom of the page and paste it into a text-based editor such as notepad or dreamweaver.  Please then save this file as destinations.xml and press the 'Next Page' button to start generating the page content.<form name='form' action='phpgenerator.php' method='post'><input type='hidden' name='noyears' value='$a' /><input type='hidden' name='nostuds' value='$b' /><input type='hidden' name='salary' value='$c' /><input type='hidden' name='jobtitle' value='$d' /><input type='hidden' name='employer' value='$e' /><input type='hidden' name='linkej' value='$f' /><input type='hidden' name='locs1' value='$g' /><input type='hidden' name='locs2' value='$h' /><input type='hidden' name='school' value='$k' /><input type='hidden' name='course' value='$l' /><input class='red' type='submit' value='Next Page -->' /><br /><hr />";


include("../database.php");
echo htmlentities('<?xml version="1.0" encoding="ISO-8859-1" ?>');
echo "<br />";
echo htmlentities('<CATALOG>');
echo "<br />";

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
if ($a=='2') $union=") UNION ALL (select EMPCIR, MODSTUDY, SALARY, LOCEMP, PUBGRID from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$high." like '".$school."'";
elseif ($a=='3') $union=") UNION ALL (select EMPCIR, MODSTUDY, SALARY, LOCEMP, PUBGRID from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$high." like '".$school."') UNION ALL (select EMPCIR, MODSTUDY, SALARY, LOCEMP, PUBGRID from extract89 inner join popdlhe89 on extract89.HUSIDa = popdlhe89.HUSID where ".$high." like '".$school."'";
else $union="";
$joinp="(select EMPCIR, MODSTUDY, SALARY, LOCEMP, PUBGRID from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$high." like '".$school."'".$union.") order by (SALARY+0)";
$resultp = mysql_query($joinp);
$ap=0; $bp=0; $cp=0; $dp=0; $ep=0; $fp=0; $gp=0; $op=0; $xp=0;
$apa=0; $bpa=0; $cpa=0; $dpa=0; $epa=0; $fpa=0; $gpa=0; $hpa=0; $ipa=0; $jpa=0; $kpa=0; $lpa=0;
$aapa=0; $abpa=0; $acpa=0; $adpa=0; $aepa=0; $afpa=0; $agpa=0; $ahpa=0; $aipa=0; $ajpa=0; $akpa=0; $alpa=0; $ampa=0; $anpa=0; $aopa=0; $appa=0; $aqpa=0; $arpa=0; $aspa=0; $atpa=0; $aupa=0; $avpa=0; $awpa=0; $axpa=0; $aypa=0; $azpa=0;
$bapa=0; $bbpa=0; $bcpa=0; $bdpa=0; $bepa=0; $bfpa=0; $bgpa=0; $bhpa=0; $bipa=0; $bjpa=0; $bkpa=0; $blpa=0; $bmpa=0; $bnpa=0; $bopa=0; $bppa=0; $bqpa=0; $brpa=0; $bspa=0; $btpa=0; $bupa=0; $bvpa=0; $bwpa=0; $bxpa=0; $bypa=0; $bzpa=0; $baapa=0; $bbbpa=0; $bccpa=0; $bddpa=0; $beepa=0; $bffpa=0;
$capa=0; $cbpa=0; $ccpa=0; $cdpa=0; $cepa=0; $cfpa=0; $cgpa=0; $chpa=0; $cipa=0; $cjpa=0; $ckpa=0; $clpa=0; $cmpa=0; $cnpa=0; $copa=0; $cppa=0; $cqpa=0; $crpa=0; $cspa=0; $ctpa=0; $cupa=0; $cvpa=0;
$dapa=0; $dbpa=0; $dcpa=0; $ddpa=0; $depa=0; $dfpa=0;
$eapa=0; $ebpa=0; $ecpa=0; $edpa=0; $eepa=0; $efpa=0;
$fapa=0; $fbpa=0; $fcpa=0; $fdpa=0; $fepa=0;
$gapa=0; $gbpa=0; $gcpa=0; $gdpa=0;
$hapa=0; $hbpa=0; $hcpa=0; $hdpa=0; $hepa=0;
$iapa=0; $ibpa=0; $icpa=0; $iepa=0; $ifpa=0; $igpa=0; $ihpa=0; $iipa=0; $ijpa=0;
$japa=0; $jbpa=0; $jcpa=0; $jdpa=0; $jepa=0; $jfpa=0; $jgpa=0;
$kapa=0; $kbpa=0; $kcpa=0; $kdpa=0; $kepa=0; $kfpa=0;
$lapa=0; $lbpa=0; $lcpa=0; $ldpa=0; $lepa=0;
$salcountmed=0;
while($row = mysql_fetch_array($resultp))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $sal=$row["SALARY"];
if ($sal!='XXXXXX' && $sal!='0' && ($emp=='1' || $emp=='3') && $mod=='3') $salcountmed=$salcountmed+1;
}
$remainder = ($salcountmed % 2);
$salcountmeda=($salcountmed / 2);
$salcountmedb=($salcountmed / 2) + 1;
$salcountmedc=($salcountmed / 2) + 0.5;

mysql_data_seek($resultp,0);
$salcountmean=0;
$saltotal=0; 
while($row = mysql_fetch_array($resultp))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $sal=$row["SALARY"];
 $loc=$row["LOCEMP"];
 $pub=$row["PUBGRID"];
 $loc2=substr($loc,0,2);
 $loc3=substr($loc,0,3);
 $loc4=substr($loc,0,4);
 $loc1=substr($loc,0,1);
if (($mod=='3' && ($emp=='1' || $emp=='3'))) $ap=$ap+1;
elseif ($emp=='2' && $mod=='3') $bp=$bp+1;
elseif ($emp=='15' && $mod=='3') $cp=$cp+1;
elseif (($mod=='1' || $mod=='2') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $dp=$dp+1;
elseif (($mod=='1' && ($emp=='17' || $emp=='11' || $emp=='12' || $emp=='13' || $emp=='14')) || ($mod=='2' && ($emp=='17' || $emp=='13' || $emp=='14'))) $ep=$ep+1;
elseif (($mod=='2' || $mod=='3') && ($emp=='11' || $emp=='12')) $fp=$fp+1;
elseif ($emp=='16' || $emp=='10' || ($emp=='17' && $mod=='3')) $gp=$gp+1;
elseif ($mod=='3' && ($emp=='13' || $emp=='14')) $op=$op+1;
elseif ($pub == 'X')  $xp=$xp+1;
if ($sal!='XXXXXX' && $sal!='0' && ($emp=='1' || $emp=='3') && $mod=='3') $saltotal=$saltotal+$sal;
if ($sal!='XXXXXX' && $sal!='0' && ($emp=='1' || $emp=='3') && $mod=='3') $salcountmean=$salcountmean+1;
if ($sal!='XXXXXX' && $sal!='0' && ($emp=='1' || $emp=='3') && $mod=='3' && $remainder=='1' && $salcountmean==$salcountmedc) $median3a=$sal;
elseif ($sal!='XXXXXX' && $sal!='0' && ($emp=='1' || $emp=='3') && $mod=='3' && $remainder=='0' && $salcountmean==$salcountmeda) $median1a=$sal;
elseif ($sal!='XXXXXX' && $sal!='0' && ($emp=='1' || $emp=='3') && $mod=='3' && $remainder=='0' && $salcountmean==$salcountmedb) $median2a=$sal;
else echo "";
if ($loc4=='BA12' || $loc4=='BA13' || $loc4=='BA14' || $loc4=='BA15') {$jgpa=$jgpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='BA') {$jfpa=$jfpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='BB') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='BD23' || $loc4=='BD24') {$lcpa=$lcpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='BD') {$lepa=$lepa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc4=='BH24' || $loc4=='BH25') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='BH') {$jdpa=$jdpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='BL') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='BN50' || $loc4=='BN51' || $loc4=='BN52') {$icpa=$icpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='BN5' || $loc3=='BN6' || $loc4=='BN11' || $loc4=='BN12' || $loc4=='BN13') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='BN14' || $loc4=='BN15' || $loc4=='BN16' || $loc4=='BN17' || $loc4=='BN18') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='BN42' || $loc4=='BN43' || $loc4=='BN44' || $loc4=='BN45' || $loc4=='BN99') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='BN') {$icpa=$icpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='BR8') {$igpa=$igpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='BR') {$fcpa=$fcpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='BS20' || $loc4=='BS21' || $loc4=='BS22' || $loc4=='BS23' || $loc4=='BS24') {$jfpa=$jfpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='BS25' || $loc4=='BS26' || $loc4=='BS27' || $loc4=='BS28' || $loc4=='BS29') {$jfpa=$jfpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='BS31' || $loc4=='BS39' || $loc4=='BS40' || $loc4=='BS41' || $loc4=='BS48') {$jfpa=$jfpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='BS49') {$jfpa=$jfpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='BS15' || $loc4=='BS16' || $loc4=='BS30' || $loc4=='BS31' || $loc4=='BS32') {$jepa=$jepa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='BS34' || $loc4=='BS35' || $loc4=='BS36' || $loc4=='BS37') {$jepa=$jepa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='BS') {$japa=$japa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='BT18' || $loc4=='BT19' || $loc4=='BT20') {$axpa=$axpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT21' || $loc4=='BT22' || $loc4=='BT23') {$abpa=$abpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT24') {$anpa=$anpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT25' || $loc4=='BT32') {$afpa=$afpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT26' || $loc4=='BT27' || $loc4=='BT28') {$aspa=$aspa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT30' || $loc4=='BT31' || $loc4=='BT33') {$anpa=$anpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT34' || $loc4=='BT35') {$avpa=$avpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT36' || $loc4=='BT37' || $loc4=='BT39') {$awpa=$awpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT38') {$ahpa=$ahpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT40') {$aqpa=$aqpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT41') {$aapa=$aapa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT42' || $loc4=='BT43' || $loc4=='BT44') {$adpa=$adpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT45' || $loc4=='BT46') {$atpa=$atpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT47' || $loc4=='BT48') {$ampa=$ampa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT49') {$arpa=$arpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT51' || $loc4=='BT52') {$ajpa=$ajpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT53') {$aepa=$aepa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT54') {$aupa=$aupa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT60' || $loc4=='BT61') {$acpa=$acpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT62' || $loc4=='BT63' || $loc4=='BT64') {$alpa=$alpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT65' || $loc4=='BT66' || $loc4=='BT67') {$alpa=$alpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT68' || $loc4=='BT69' || $loc4=='BT70') {$aopa=$aopa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT71' || $loc4=='BT76' || $loc4=='BT77') {$aopa=$aopa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT74' || $loc4=='BT75' || $loc4=='BT92' || $loc4=='BT93' || $loc4=='BT94') {$appa=$appa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT78' || $loc4=='BT79') {$aypa=$aypa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT80') {$akpa=$akpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT81' || $loc4=='BT82') {$azpa=$azpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc2=='BT') {$agpa=$agpa+1; $apa=$apa+1; $arrapa[]=$loc;}

elseif ($loc3=='B46' || $loc3=='B49' || $loc3=='B50' || $loc3=='B80' || $loc3=='B95') {$kdpa=$kdpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='B47' || $loc3=='B48' || $loc3=='B60' || $loc3=='B61' || $loc3=='B96') {$kfpa=$kfpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='B97' || $loc3=='B98') {$kfpa=$kfpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='B77' || $loc3=='B78' || $loc3=='B79') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc1=='B') {$kepa=$kepa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}

elseif ($loc4=='EC1P' || $loc4=='EC2P' || $loc4=='EC3P' || $loc4=='EC4P' || $loc4=='EC50') {$fbpa=$fbpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='EC1A') {$fbpa=$fbpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='EC1' || $loc4=='EC2A') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='EC') {$fbpa=$fbpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='EH18' || $loc4=='EH19' || $loc4=='EH20' || $loc4=='EH22' || $loc4=='EH23') {$brpa=$brpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH24' || $loc4=='EH25' || $loc4=='EH26' || $loc4=='EH37' || $loc4=='EH38') {$brpa=$brpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH21' || $loc4=='EH31' || $loc4=='EH32' || $loc4=='EH33' || $loc4=='EH34') {$bjpa=$bjpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH35' || $loc4=='EH36' || $loc4=='EH39' || $loc4=='EH40' || $loc4=='EH41') {$bjpa=$bjpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH42') {$bjpa=$bjpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH27' || $loc4=='EH47' || $loc4=='EH48' || $loc4=='EH49' || $loc4=='EH52') {$bffpa=$bffpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH53' || $loc4=='EH54' || $loc4=='EH55') {$bffpa=$bffpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH43' || $loc4=='EH44' || $loc4=='EH45' || $loc4=='EH46') {$bzpa=$bzpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH51') {$bmpa=$bmpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='EH') {$blpa=$blpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='EN9') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='EN11' || $loc4=='EN10' || $loc3=='EN8' || $loc3=='EN7' || $loc3=='EN6') {$edpa=$edpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='EN') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='EX23') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='EX') {$jcpa=$jcpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='E5' || $loc2=='E8' || $loc2=='E9' || $loc3=='E10') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc1=='E') {$fbpa=$fbpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='GL') {$jepa=$jepa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='GU13' || $loc4=='GU11' || $loc4=='GU12' || $loc4=='GU14' || $loc4=='GU17') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='GU30' || $loc4=='GU31' || $loc4=='GU32' || $loc4=='GU33' || $loc4=='GU34') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='GU35' || $loc4=='GU46' || $loc4=='GU47' || $loc4=='GU51' || $loc4=='GU52') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='GU28' || $loc4=='GU29') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='GU') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}

elseif ($loc3=='G46' || $loc4=='G76' || $loc4=='G77' || $loc4=='G78') {$bkpa=$bkpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G60' || $loc4=='G81' || $loc4=='G82' || $loc4=='G83') {$beepa=$beepa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G61' || $loc4=='G62' || $loc4=='G64' || $loc4=='G66') {$bipa=$bipa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G63') {$bddpa=$bddpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G65' || $loc4=='G67' || $loc4=='G68' || $loc4=='G70') {$bvpa=$bvpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G71' || $loc4=='G72' || $loc4=='G73' || $loc4=='G74') {$bccpa=$bccpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G75' || $loc4=='G79') {$bccpa=$bccpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G84') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc1=='G') {$bopa=$bopa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='LA1' || $loc4=='LA2' || $loc4=='LA3' || $loc4=='LA4') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='LA5' || $loc4=='LA6') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='LA') {$hbpa=$hbpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='LD') {$cqpa=$cqpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LE15') {$dfpa=$dfpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='LE') {$dbpa=$dbpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='LL11' || $loc4=='LL12' || $loc4=='LL13' || $loc4=='LL14') {$cvpa=$cvpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL15' || $loc4=='LL16' || $loc4=='LL17' || $loc4=='LL18' || $loc4=='LL19') {$chpa=$chpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL20' || $loc4=='LL21') {$chpa=$chpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL22') {$cgpa=$cgpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL23') {$cjpa=$cjpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL24' || $loc4=='LL25' || $loc4=='LL26' || $loc4=='LL27' || $loc4=='LL28') {$cgpa=$cgpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL29' || $loc4=='LL30' || $loc4=='LL31' || $loc4=='LL32' || $loc4=='LL33') {$cgpa=$cgpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL34') {$cgpa=$cgpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL58' || $loc4=='LL59' || $loc3=='LL6' || $loc3=='LL7') {$ckpa=$ckpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc3=='LL3' || $loc3=='LL4' || $loc3=='LL5') {$cjpa=$cjpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc2=='LN') {$dcpa=$dcpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='LS24') {$lcpa=$lcpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='LS') {$lepa=$lepa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='LU') {$eapa=$eapa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc3=='L24') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='L39' || $loc3=='L40') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc1=='L') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='ME') {$igpa=$igpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='MK40' || $loc4=='MK41' || $loc4=='MK42' || $loc4=='MK43' || $loc4=='MK44') {$eapa=$eapa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='MK45') {$eapa=$eapa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='MK') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='ML1' || $loc3=='ML2' || $loc3=='ML4' || $loc3=='ML5' || $loc3=='ML6') {$bvpa=$bvpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='ML7') {$bvpa=$bvpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='ML') {$bccpa=$bccpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc1=='M') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='NE18' || $loc4=='NE19' || $loc4=='NE20' || $loc4=='NE22' || $loc4=='NE23') {$gcpa=$gcpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='NE24' || $loc4=='NE43' || $loc4=='NE44' || $loc4=='NE45' || $loc4=='NE46') {$gcpa=$gcpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='NE47' || $loc4=='NE48' || $loc4=='NE49' || $loc4=='NE61' || $loc4=='NE62') {$gcpa=$gcpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='NE63' || $loc4=='NE64' || $loc4=='NE65' || $loc4=='NE66' || $loc4=='NE67') {$gcpa=$gcpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='NE68' || $loc4=='NE69' || $loc4=='NE70' || $loc4=='NE71') {$gcpa=$gcpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc2=='NE') {$gdpa=$gdpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='NG10' || $loc4=='NG20') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='NG31' || $loc4=='NG32' || $loc4=='NG33' || $loc4=='NG34') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='NG') {$depa=$depa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='NN') {$ddpa=$ddpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc3=='NP4' || $loc4=='NP44') {$ctpa=$ctpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc3=='NP8') {$cqpa=$cqpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='NP11' || $loc4=='NP12') {$ccpa=$ccpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='NP10' || $loc4=='NP18' || $loc4=='NP19' || $loc4=='NP20') {$copa=$copa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='NP13' || $loc4=='NP22' || $loc4=='NP23' || $loc4=='NP24') {$capa=$capa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc2=='NP') {$cmpa=$cmpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='NR32' || $loc4=='NR33' || $loc4=='NR34' || $loc4=='NR35') {$efpa=$efpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='NR') {$eepa=$eepa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc3=='NW6' || $loc4=='NW10') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='NW') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc1=='N') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='SA8' || $loc3=='SA9' || $loc4=='SA10' || $loc4=='SA11' || $loc4=='SA12') {$cnpa=$cnpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA13') {$cnpa=$cnpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA14' || $loc4=='SA15' || $loc4=='SA16' || $loc4=='SA17' || $loc4=='SA18') {$cepa=$cepa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA19' || $loc4=='SA20' || $loc4=='SA31' || $loc4=='SA32' || $loc4=='SA33') {$cepa=$cepa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA34' || $loc4=='SA38' || $loc4=='SA39' || $loc4=='SA40' || $loc4=='SA41') {$cepa=$cepa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA35' || $loc4=='SA36' || $loc4=='SA37' || $loc4=='SA42') {$cppa=$cppa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA43' || $loc4=='SA44' || $loc4=='SA45' || $loc4=='SA46' || $loc4=='SA47') {$cfpa=$cfpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA48') {$cfpa=$cfpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA61' || $loc4=='SA62' || $loc4=='SA63' || $loc4=='SA64' || $loc4=='SA65') {$cppa=$cppa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA66' || $loc4=='SA67' || $loc4=='SA68' || $loc4=='SA69' || $loc4=='SA70') {$cppa=$cppa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA71' || $loc4=='SA72' || $loc4=='SA73') {$cppa=$cppa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc2=='SA') {$cspa=$cspa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SE11' || $loc4=='SE19' || $loc4=='SE24' || $loc4=='SE25' || $loc4=='SE27') {$fdpa=$fdpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='SE') {$fcpa=$fcpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='SG15' || $loc4=='SG16' || $loc4=='SG17' || $loc4=='SG18' || $loc4=='SG19') {$eapa=$eapa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='SG') {$edpa=$edpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc3=='SK9' || $loc4=='SK10' || $loc4=='SK11' || $loc4=='SK12') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='SK13' || $loc4=='SK17' || $loc4=='SK22' || $loc4=='SK23') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='SK') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='SL3' || $loc3=='SL4' || $loc3=='SL5' || $loc3=='SL6' || $loc3=='SL95') {$iapa=$iapa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='SL') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='SM7') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='SM') {$fdpa=$fdpa+1; $fpa=$fpa+1; $arripa[]=$loc;}
elseif ($loc3=='SN7') {$ihpa=$ihpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='SN') {$jgpa=$jgpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='SO') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='SP6' || $loc4=='SP10' || $loc4=='SP11') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='SP7' || $loc3=='SP8') {$jdpa=$jdpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='SP') {$jgpa=$jgpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc3=='SR7' || $loc3=='SR8') {$gapa=$gapa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc2=='SR') {$gdpa=$gdpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc2=='SS') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='ST') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='SW1A' || $loc4=='SW1E' || $loc4=='SW1H' || $loc4=='SW1P' || $loc4=='SW1V') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='SW1W' || $loc4=='SW1X' || $loc4=='SW1Y') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='SW2' || $loc3=='SW4' || $loc3=='SW8' || $loc3=='SW9') {$fdpa=$fdpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='SW') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='SY14') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='SY15' || $loc4=='SY16' || $loc4=='SY17' || $loc4=='SY18' || $loc4=='SY19') {$cqpa=$cqpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SY20' || $loc4=='SY21' || $loc4=='SY22') {$cqpa=$cqpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SY23' || $loc4=='SY24' || $loc4=='SY25') {$cfpa=$cfpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc2=='SY') {$kbpa=$kbpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='S18' || $loc3=='S21' || $loc3=='S32' || $loc3=='S33' || $loc3=='S40') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc3=='S41' || $loc3=='S42' || $loc3=='S43' || $loc3=='S44' || $loc3=='S45') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc3=='S49') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc3=='S80' || $loc3=='S81') {$depa=$depa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc1=='S') {$ldpa=$ldpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif (substr($loc,0,5)=='WA3 1' || substr($loc,0,5)=='WA3 2' || substr($loc,0,5)=='WA3 3') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='WA9' || $loc4=='WA10' || $loc4=='WA11' || $loc4=='WA12') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='WA14' || $loc4=='WA15') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='WA') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='WC') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='WD') {$edpa=$edpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='WF') {$lepa=$lepa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc3=='WN8') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='WN') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='WR') {$kfpa=$kfpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='WS6' || $loc3=='WS7' || $loc4=='WS11' || $loc4=='WS12') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='WS13' || $loc4=='WS14' || $loc4=='WS15') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='WS') {$kepa=$kepa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='WV5') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='WV15' || $loc4=='WV16') {$kbpa=$kbpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='WV') {$kepa=$kepa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='W3' || $loc2=='W4' || $loc2=='W5' || $loc2=='W6' || $loc2=='W7') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='W8' || $loc3=='W10' || $loc3=='W11' || $loc3=='W12' || $loc3=='W13') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='W14') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc1=='W') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='AB1' || $loc3=='AB2') {$bapa=$bapa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='AB37' || $loc4=='AB38' || $loc4=='AB55' || $loc4=='AB56') {$bspa=$bspa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='AB') {$bbpa=$bbpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='AL') {$edpa=$edpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='CA') {$hbpa=$hbpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='CB8' || $loc3=='CB9') {$efpa=$efpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='CB10' || $loc4=='CB11') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='CB') {$ebpa=$ebpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='CF31' || $loc4=='CF32' || $loc4=='CF33' || $loc4=='CF34' || $loc4=='CF35') {$cbpa=$cbpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CF36') {$cbpa=$cbpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CF37' || $loc4=='CF38' || $loc4=='CF39' || $loc4=='CF40' || $loc4=='CF41') {$crpa=$crpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CF42' || $loc4=='CF43' || $loc4=='CF44' || $loc4=='CF45' || $loc4=='CF72') {$crpa=$crpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CF46') {$clpa=$clpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CF61' || $loc4=='CF62' || $loc4=='CF63' || $loc4=='CF64' || $loc4=='CF71') {$cupa=$cupa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CF81' || $loc4=='CF82' || $loc4=='CF83') {$ccpa=$ccpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc2=='CF') {$cdpa=$cdpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CH25' || $loc4=='CH26' || $loc4=='CH27' || $loc4=='CH28' || $loc4=='CH29') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='CH30' || $loc4=='CH31' || $loc4=='CH32' || $loc4=='CH41' || $loc4=='CH42') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='CH43' || $loc4=='CH44' || $loc4=='CH45' || $loc4=='CH46' || $loc4=='CH47') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='CH48' || $loc4=='CH49' || $loc4=='CH60' || $loc4=='CH61' || $loc4=='CH62') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='CH63') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='CH64' || $loc4=='CH65' || $loc4=='CH66' || $loc4=='CH70' || $loc4=='CH88') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='CH5' || $loc3=='CH6' || $loc3=='CH7' || $loc3=='CH8') {$cipa=$cipa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc2=='CH') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='CM21' || $loc4=='CM22' || $loc4=='CM23') {$edpa=$edpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='CM') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='CO') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc3=='CR6') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='CR') {$fdpa=$fdpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='CT') {$igpa=$igpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='CV7' || $loc3=='CV8' || $loc3=='CV9' || $loc4=='CV10' || $loc4=='CV11') {$kdpa=$kdpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='CV12' || $loc4=='CV21' || $loc4=='CV22' || $loc4=='CV23' || $loc4=='CV31') {$kdpa=$kdpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='CV32' || $loc4=='CV33' || $loc4=='CV34' || $loc4=='CV35' || $loc4=='CV36') {$kdpa=$kdpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='CV37' || $loc4=='CV47') {$kdpa=$kdpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='CV13') {$dbpa=$dbpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='CV') {$kepa=$kepa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='CW') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='DA5' || $loc3=='DA6' || $loc3=='DA7' || $loc3=='DA8' || $loc4=='DA14') {$fcpa=$fcpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='DA15' || $loc4=='DA16' || $loc4=='DA17' || $loc4=='DA18') {$fcpa=$fcpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='DA') {$igpa=$igpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='DD6' || $loc3=='DD7') {$bnpa=$bnpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='DD8' || $loc3=='DD9' || $loc4=='DD10' || $loc4=='DD11') {$bcpa=$bcpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='DD') {$bgpa=$bgpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='DE12' || $loc4=='DE74') {$dbpa=$dbpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='DE14' || $loc4=='DE15') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='DE') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='DG') {$bfpa=$bfpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='DH4' || $loc3=='DH5') {$gdpa=$gdpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc2=='DH') {$gapa=$gapa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc3=='DL6' || $loc3=='DL7' || $loc3=='DL8' || $loc3=='DL9' || $loc4=='DL10') {$lcpa=$lcpa+1; $lpa=$lpa+1; $arrl[]=$loc;}
elseif ($loc4=='DL11') {$lcpa=$lcpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='DL') {$gapa=$gapa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='DN15' || $loc4=='DN16' || $loc4=='DN17' || $loc4=='DN18' || $loc4=='DN19') {$lbpa=$lbpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc4=='DN20' || $loc4=='DN31' || $loc4=='DN32' || $loc4=='DN33' || $loc4=='DN34') {$lbpa=$lbpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc4=='DN35' || $loc4=='DN37' || $loc4=='DN38' || $loc4=='DN39' || $loc4=='DN40') {$lbpa=$lbpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc4=='DN41') {$lbpa=$lbpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc4=='DN10' || $loc4=='DN11' || $loc4=='DN22') {$depa=$depa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='DN21' || $loc4=='DN36') {$dcpa=$dcpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='DN14') {$lapa=$lapa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='DN') {$ldpa=$ldpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='DT') {$jdpa=$jdpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='DY10' || $loc4=='DY11' || $loc4=='DY12' || $loc4=='DY13') {$kfpa=$kfpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='DY14') {$kbpa=$kbpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='DY7') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='DY') {$kepa=$kepa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='FK7' || $loc3=='FK8' || $loc3=='FK9' || $loc4=='FK15' || $loc4=='FK16') {$bddpa=$bddpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='FK17' || $loc4=='FK18' || $loc4=='FK19' || $loc4=='FK20' || $loc4=='FK21') {$bddpa=$bddpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='FK10' || $loc4=='FK11' || $loc4=='FK12' || $loc4=='FK13' || $loc4=='FK14') {$bepa=$bepa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='FK') {$bmpa=$bmpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='FY') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='HA8') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='HA') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='HD') {$lepa=$lepa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='HG') {$lcpa=$lcpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc3=='HP5' || $loc3=='HP6' || $loc3=='HP7' || $loc3=='HP8' || $loc3=='HP9') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='HP10' || $loc4=='HP11' || $loc4=='HP12' || $loc4=='HP13' || $loc4=='HP14') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='HP15' || $loc4=='HP16' || $loc4=='HP17' || $loc4=='HP18' || $loc4=='HP19') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='HP20' || $loc4=='HP21' || $loc4=='HP22' || $loc4=='HP27') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='HP') {$edpa=$edpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='HR') {$kapa=$kapa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='HS') {$btpa=$btpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='HU') {$lapa=$lapa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='HX') {$lepa=$lepa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc3=='IG7' || $loc3=='IG9' || $loc4=='IG10') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='IG') {$fbpa=$fbpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='IP22' || $loc4=='IP24' || $loc4=='IP25' || $loc4=='IP26') {$eepa=$eepa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='IP') {$efpa=$efpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='IV30' || $loc4=='IV31' || $loc4=='IV32' || $loc4=='IV36') {$bspa=$bspa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='IV') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='KA') {$bhpa=$bhpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='KT7' || $loc3=='KT8' || $loc4=='KT10' || $loc4=='KT11' || $loc4=='KT12') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='KT13' || $loc4=='KT14' || $loc4=='KT15' || $loc4=='KT16' || $loc4=='KT17') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='KT18' || $loc4=='KT19' || $loc4=='KT20' || $loc4=='KT21' || $loc4=='KT22') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='KT23' || $loc4=='KT24') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='KT') {$fdpa=$fdpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='KW15' || $loc4=='KW16' || $loc4=='KW17') {$bwpa=$bwpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='KW') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='KY13') {$bxpa=$bxpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='KY') {$bnpa=$bnpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='OL14') {$lepa=$lepa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='OL') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='OX17') {$ddpa=$ddpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='OX') {$ihpa=$ihpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='PA20' || $loc4=='PA21' || $loc4=='PA22' || $loc4=='PA23' || $loc4=='PA24') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA25' || $loc4=='PA26' || $loc4=='PA27' || $loc4=='PA28' || $loc4=='PA29') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA30' || $loc4=='PA31' || $loc4=='PA32' || $loc4=='PA33' || $loc4=='PA34') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA35' || $loc4=='PA36' || $loc4=='PA37' || $loc4=='PA38' || $loc4=='PA41') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA42' || $loc4=='PA43' || $loc4=='PA44' || $loc4=='PA45' || $loc4=='PA46') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA47' || $loc4=='PA48' || $loc4=='PA49' || $loc4=='PA60' || $loc4=='PA61') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA62' || $loc4=='PA63' || $loc4=='PA64' || $loc4=='PA65' || $loc4=='PA66') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA67' || $loc4=='PA68' || $loc4=='PA69' || $loc4=='PA70' || $loc4=='PA71') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA72' || $loc4=='PA73' || $loc4=='PA74' || $loc4=='PA75' || $loc4=='PA76') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA77' || $loc4=='PA78') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA13' || $loc4=='PA14' || $loc4=='PA15' || $loc4=='PA16' || $loc4=='PA18') {$bqpa=$bqpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA19') {$bqpa=$bqpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA17') {$bupa=$bupa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA80') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='PA') {$bypa=$bypa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PE99') {$ebpa=$ebpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc3=='PE6' || $loc3=='PE9' || $loc4=='PE10' || $loc4=='PE11' || $loc4=='PE12') {$dcpa=$dcpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='PE20' || $loc4=='PE21' || $loc4=='PE22' || $loc4=='PE23' || $loc4=='PE24') {$dcpa=$dcpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='PE25') {$dcpa=$dcpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='PE30' || $loc4=='PE31' || $loc4=='PE32' || $loc4=='PE33' || $loc4=='PE34') {$eepa=$eepa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='PE35' || $loc4=='PE36' || $loc4=='PE37' || $loc4=='PE38') {$eepa=$eepa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc3=='PE8') {$ddpa=$ddpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='PE') {$ebpa=$ebpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='PH19' || $loc4=='PH20' || $loc4=='PH21' || $loc4=='PH22' || $loc4=='PH23') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PH24' || $loc4=='PH25' || $loc4=='PH26' || $loc4=='PH30' || $loc4=='PH31') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PH32' || $loc4=='PH33' || $loc4=='PH34' || $loc4=='PH35' || $loc4=='PH36') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PH37' || $loc4=='PH38' || $loc4=='PH39' || $loc4=='PH40' || $loc4=='PH41') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PH42' || $loc4=='PH43' || $loc4=='PH44' || $loc4=='PH49' || $loc4=='PH50') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='PH') {$bxpa=$bxpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PL10' || $loc4=='PL11' || $loc4=='PL12' || $loc4=='PL13' || $loc4=='PL14') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='PL15' || $loc4=='PL17' || $loc4=='PL18' || $loc4=='PL22' || $loc4=='PL23') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='PL24' || $loc4=='PL25' || $loc4=='PL26' || $loc4=='PL27' || $loc4=='PL28') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='PL29' || $loc4=='PL30' || $loc4=='PL31' || $loc4=='PL32' || $loc4=='PL33') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='PL34' || $loc4=='PL35') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='PL') {$jcpa=$jcpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='PO30' || $loc4=='PO31' || $loc4=='PO32' || $loc4=='PO33' || $loc4=='PO34') {$ifpa=$ifpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='PO35' || $loc4=='PO36' || $loc4=='PO37' || $loc4=='PO38' || $loc4=='PO39') {$ifpa=$ifpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='PO40' || $loc4=='PO41') {$ifpa=$ifpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='PO18' || $loc4=='PO19' || $loc4=='PO20' || $loc4=='PO21' || $loc4=='PO22') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='PO') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='PR8' || $loc3=='PR9') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='PR') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='RG21' || $loc4=='RG22' || $loc4=='RG23' || $loc4=='RG24' || $loc4=='RG25') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='RG26' || $loc4=='RG29' || $loc4=='RG28' || $loc4=='RG27') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='RG8' || $loc3=='RG9') {$ihpa=$ihpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='RG') {$iapa=$iapa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='RH10' || $loc4=='RH11' || $loc4=='RH12' || $loc4=='RH13' || $loc4=='RH14') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='RH15' || $loc4=='RH16' || $loc4=='RH17' || $loc4=='RH18' || $loc4=='RH19') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='RH20') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='RH') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='RM15' || $loc4=='RM16' || $loc4=='RM17' || $loc4=='RM18' || $loc4=='RM19') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='RM20') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='RM') {$fbpa=$fbpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='TA') {$jfpa=$jfpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='TD15') {$gcpa=$gcpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc2=='TD') {$bzpa=$bzpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='TF') {$kbpa=$kbpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='TN5' || $loc3=='TN6' || $loc3=='TN7' || $loc4=='TN19' || $loc4=='TN20') {$icpa=$icpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='TN21' || $loc4=='TN22' || $loc4=='TN31' || $loc4=='TN32' || $loc4=='TN33') {$icpa=$icpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='TN34' || $loc4=='TN35' || $loc4=='TN36' || $loc4=='TN37' || $loc4=='TN38') {$icpa=$icpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='TN39' || $loc4=='TN40') {$icpa=$icpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='TN14' || $loc4=='TN16') {$fcpa=$fcpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='TN') {$igpa=$igpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='TQ') {$jcpa=$jcpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='TR') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc3=='TS2' || $loc4=='TS16' || $loc4=='TS18' || $loc4=='TS19') {$gapa=$gapa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc2=='TS') {$gbpa=$gbpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='TW15' || $loc4=='TW16' || $loc4=='TW17' || $loc4=='TW18' || $loc4=='TW19') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='TW20') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='TW3' || $loc3=='TW4' || $loc3=='TW5' || $loc3=='TW6' || $loc3=='TW7') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='TW8' || $loc4=='TW13' || $loc4=='TW14') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='TW') {$fdpa=$fdpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='UB9') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='UB') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='YO15' || $loc4=='YO16' || $loc4=='YO25' || $loc4=='YO41' || $loc4=='YO42') {$lapa=$lapa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc4=='YO43') {$lapa=$lapa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='YO') {$lcpa=$lcpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='ZE') {$baapa=$baapa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='GY' || $loc2=='JE') $a3826pa=$a3826pa+1;
elseif ($loc2=='IM') $a4826pa=$a4826pa+1;
else $respa=$respa+1;


}
$salmean=$saltotal/$salcountmean;
$salmean=round($salmean,-2);
$salmean=number_format($salmean);
if ($remainder=='1') $median=$median3a;
elseif ($remainder=='0') $median=($median2a + $median1a) / 2;
$median=round($median,-2);
$median=number_format($median);
switch ($b)
{
case $sum>$b:
$total=$ap+$bp+$cp+$dp+$ep+$fp+$gp+$op+$xp;
$pa=number_format((($ap/$total)*100),1);
$pb=number_format((($bp/$total)*100),1);
$pc=number_format((($cp/$total)*100),1);
$pd=number_format((($dp/$total)*100),1);
$pe=number_format((($ep/$total)*100),1);
$pf=number_format((($fp/$total)*100),1);
$pg=number_format((($gp/$total)*100),1);
$po=number_format((($op/$total)*100),1);
$px=number_format((($xp/$total)*100),1);
$positive=number_format(((($ap+$bp+$cp+$dp+$ep)/($ap+$bp+$cp+$dp+$ep+$fp))*100),1);

$totala=$apa+$bpa+$cpa+$dpa+$epa+$fpa+$gpa+$hpa+$ipa+$jpa+$kpa+$lpa;
$pa2=number_format((($apa/$totala)*100),1); $pb2=number_format((($bpa/$totala)*100),1); $pc2=number_format((($cpa/$totala)*100),1);
$pd2=number_format((($dpa/$totala)*100),1); $pe2=number_format((($epa/$totala)*100),1); $pf2=number_format((($fpa/$totala)*100),1);
$pg2=number_format((($gpa/$totala)*100),1); $ph2=number_format((($hpa/$totala)*100),1); $pi2=number_format((($ipa/$totala)*100),1);
$pj2=number_format((($jpa/$totala)*100),1); $pk2=number_format((($kpa/$totala)*100),1); $pl2=number_format((($lpa/$totala)*100),1);

$paa=number_format((($aapa/$totala)*100),1); $pab=number_format((($abpa/$totala)*100),1); $pac=number_format((($acpa/$totala)*100),1);$pad=number_format((($adpa/$totala)*100),1); $pae=number_format((($aepa/$totala)*100),1); $paf=number_format((($afpa/$totala)*100),1);$pag=number_format((($agpa/$totala)*100),1); $pah=number_format((($ahpa/$totala)*100),1); $pai=number_format((($aipa/$totala)*100),1);$paj=number_format((($ajpa/$totala)*100),1); $pak=number_format((($akpa/$totala)*100),1); $pal=number_format((($alpa/$totala)*100),1);
$pam=number_format((($ampa/$totala)*100),1); $pan=number_format((($anpa/$totala)*100),1); $pao=number_format((($aopa/$totala)*100),1);
$pap=number_format((($appa/$totala)*100),1); $paq=number_format((($aqpa/$totala)*100),1); $par=number_format((($arpa/$totala)*100),1);
$pas=number_format((($aspa/$totala)*100),1); $pat=number_format((($atpa/$totala)*100),1); $pau=number_format((($aupa/$totala)*100),1);
$pav=number_format((($avpa/$totala)*100),1); $paw=number_format((($awpa/$totala)*100),1); $pax=number_format((($axpa/$totala)*100),1);
$pay=number_format((($aypa/$totala)*100),1); $paz=number_format((($azpa/$totala)*100),1);

$pba=number_format((($bapa/$totala)*100),1); $pbb=number_format((($bbpa/$totala)*100),1); $pbc=number_format((($bcpa/$totala)*100),1);$pbd=number_format((($bdpa/$totala)*100),1); $pbe=number_format((($bepa/$totala)*100),1); $pbf=number_format((($bfpa/$totala)*100),1);$pbg=number_format((($bgpa/$totala)*100),1); $pbh=number_format((($bhpa/$totala)*100),1); $pbi=number_format((($bipa/$totala)*100),1);$pbj=number_format((($bjpa/$totala)*100),1); $pbk=number_format((($bkpa/$totala)*100),1); $pbl=number_format((($blpa/$totala)*100),1);
$pbm=number_format((($bmpa/$totala)*100),1); $pbn=number_format((($bnpa/$totala)*100),1); $pbo=number_format((($bopa/$totala)*100),1);
$pbp=number_format((($bppa/$totala)*100),1); $pbq=number_format((($bqpa/$totala)*100),1); $pbr=number_format((($brpa/$totala)*100),1);
$pbs=number_format((($bspa/$totala)*100),1); $pbt=number_format((($btpa/$totala)*100),1); $pbu=number_format((($bupa/$totala)*100),1);
$pbv=number_format((($bvpa/$totala)*100),1); $pbw=number_format((($bwpa/$totala)*100),1); $pbx=number_format((($bxpa/$totala)*100),1);
$pby=number_format((($bypa/$totala)*100),1); $pbz=number_format((($bzpa/$totala)*100),1); 
$pbaa=number_format((($baapa/$totala)*100),1); $pbbb=number_format((($bbbpa/$totala)*100),1); 
$pbcc=number_format((($bccpa/$totala)*100),1); $pbdd=number_format((($bddpa/$totala)*100),1); 
$pbee=number_format((($beepa/$totala)*100),1); $pbff=number_format((($bffpa/$totala)*100),1);

$pca=number_format((($capa/$totala)*100),1); $pcb=number_format((($cbpa/$totala)*100),1); $pcc=number_format((($ccpa/$totala)*100),1);$pcd=number_format((($cdpa/$totala)*100),1); $pce=number_format((($cepa/$totala)*100),1); $pcf=number_format((($cfpa/$totala)*100),1);$pcg=number_format((($cgpa/$totala)*100),1); $pch=number_format((($chpa/$totala)*100),1); $pci=number_format((($cipa/$totala)*100),1);$pcj=number_format((($cjpa/$totala)*100),1); $pck=number_format((($ckpa/$totala)*100),1); $pcl=number_format((($clpa/$totala)*100),1);
$pcm=number_format((($cmpa/$totala)*100),1); $pcn=number_format((($cnpa/$totala)*100),1); $pco=number_format((($copa/$totala)*100),1);
$pcp=number_format((($cppa/$totala)*100),1); $pcq=number_format((($cqpa/$totala)*100),1); $pcr=number_format((($crpa/$totala)*100),1);
$pcs=number_format((($cspa/$totala)*100),1); $pct=number_format((($ctpa/$totala)*100),1); $pcu=number_format((($cupa/$totala)*100),1);
$pcv=number_format((($cvpa/$totala)*100),1); 

$pda=number_format((($dapa/$totala)*100),1); $pdb=number_format((($dbpa/$totala)*100),1); $pdc=number_format((($dcpa/$totala)*100),1);$pdd=number_format((($ddpa/$totala)*100),1); $pde=number_format((($depa/$totala)*100),1); $pdf=number_format((($dfpa/$totala)*100),1);

$pea=number_format((($eapa/$totala)*100),1); $peb=number_format((($ebpa/$totala)*100),1); $pec=number_format((($ecpa/$totala)*100),1);$ped=number_format((($edpa/$totala)*100),1); $pee=number_format((($eepa/$totala)*100),1); $pef=number_format((($efpa/$totala)*100),1);

$pfa=number_format((($fapa/$totala)*100),1); $pfb=number_format((($fbpa/$totala)*100),1); $pfc=number_format((($fcpa/$totala)*100),1);$pfd=number_format((($fdpa/$totala)*100),1); $pfe=number_format((($fepa/$totala)*100),1); 

$pga=number_format((($gapa/$totala)*100),1); $pgb=number_format((($gbpa/$totala)*100),1); $pgc=number_format((($gcpa/$totala)*100),1);$pgd=number_format((($gdpa/$totala)*100),1); $pge=number_format((($gepa/$totala)*100),1); 

$pha=number_format((($hapa/$totala)*100),1); $phb=number_format((($hbpa/$totala)*100),1); $phc=number_format((($hcpa/$totala)*100),1);$phd=number_format((($hdpa/$totala)*100),1); $phe=number_format((($hepa/$totala)*100),1); 

$pia=number_format((($iapa/$totala)*100),1); $pib=number_format((($ibpa/$totala)*100),1); $pic=number_format((($icpa/$totala)*100),1);$pid=number_format((($idpa/$totala)*100),1); $pie=number_format((($iepa/$totala)*100),1); $pif=number_format((($ifpa/$totala)*100),1);$pig=number_format((($igpa/$totala)*100),1); $pih=number_format((($ihpa/$totala)*100),1); $pii=number_format((($iipa/$totala)*100),1);$pij=number_format((($ijpa/$totala)*100),1);

$pja=number_format((($japa/$totala)*100),1); $pjb=number_format((($jbpa/$totala)*100),1); $pjc=number_format((($jcpa/$totala)*100),1);$pjd=number_format((($jdpa/$totala)*100),1); $pje=number_format((($jepa/$totala)*100),1); $pjf=number_format((($jfpa/$totala)*100),1);$pjg=number_format((($jgpa/$totala)*100),1);

$pka=number_format((($kapa/$totala)*100),1); $pkb=number_format((($kbpa/$totala)*100),1); $pkc=number_format((($kcpa/$totala)*100),1);$pkd=number_format((($kdpa/$totala)*100),1); $pke=number_format((($kepa/$totala)*100),1); $pkf=number_format((($kfpa/$totala)*100),1);

$pla=number_format((($lapa/$totala)*100),1); $plb=number_format((($lbpa/$totala)*100),1); $plc=number_format((($lcpa/$totala)*100),1);$pld=number_format((($ldpa/$totala)*100),1); $ple=number_format((($lepa/$totala)*100),1);

echo htmlentities('<CD>');
echo "<br />";
$school=str_replace("&","and",$school);
echo htmlentities('<Name>'.$school.'</Name>');
echo "<br />";
echo htmlentities('<COURSE>'.$school.'</COURSE>');
echo "<br />";
echo htmlentities('<Fulla>'.$ap.'</Fulla>');
echo "<br />";
echo htmlentities('<Fullb>'.$pa.'%</Fullb>');
echo "<br />";
echo htmlentities('<Parta>'.$bp.'</Parta>');
echo "<br />";
echo htmlentities('<Partb>'.$pb.'%</Partb>');
echo "<br />";
echo htmlentities('<Unpaida>'.$cp.'</Unpaida>');
echo "<br />";
echo htmlentities('<Unpaidb>'.$pc.'%</Unpaidb>');
echo "<br />";
echo htmlentities('<Worka>'.$dp.'</Worka>');
echo "<br />";
echo htmlentities('<Workb>'.$pd.'%</Workb>');
echo "<br />";
echo htmlentities('<Studya>'.$ep.'</Studya>');
echo "<br />";
echo htmlentities('<Studyb>'.$pe.'%</Studyb>');
echo "<br />";
echo htmlentities('<Assumeda>'.$fp.'</Assumeda>');
echo "<br />";
echo htmlentities('<Assumedb>'.$pf.'%</Assumedb>');
echo "<br />";
echo htmlentities('<Nota>'.$gp.'</Nota>');
echo "<br />";
echo htmlentities('<Notb>'.$pg.'%</Notb>');
echo "<br />";
echo htmlentities('<Othera>'.$op.'</Othera>');
echo "<br />";
echo htmlentities('<Otherb>'.$po.'%</Otherb>');
echo "<br />";
echo htmlentities('<Refusea>'.$xp.'</Refusea>');
echo "<br />";
echo htmlentities('<Refuseb>'.$px.'%</Refuseb>');
echo "<br />";
echo htmlentities('<Positive>'.$positive.'%</Positive>');
echo "<br />";
if ($c=='1') echo htmlentities('<Salary>£'.$salmean.'</Salary>');
elseif ($c=='2') echo htmlentities('<Salary>£'.$median.'</Salary>');
else echo htmlentities('<Salary>Empty</Salary>');
echo "<br />";
echo htmlentities('<Job>Empty</Job>');
echo "<br />";
echo htmlentities('<Emp>Empty</Emp>');
echo "<br />";
if ($g=='1') {
echo htmlentities('<NIreland>'.$apa.'</NIreland>');
echo "<br />";
echo htmlentities('<NIrelandp>'.$pa2.'%</NIrelandp>');
echo "<br />";
echo htmlentities('<Scotland>'.$bpa.'</Scotland>');
echo "<br />";
echo htmlentities('<Scotlandp>'.$pb2.'%</Scotlandp>');
echo "<br />";
echo htmlentities('<Wales>'.$cpa.'</Wales>');
echo "<br />";
echo htmlentities('<Walesp>'.$pc2.'%</Walesp>');
echo "<br />";
echo htmlentities('<EastMid>'.$dpa.'</EastMid>');
echo "<br />";
echo htmlentities('<EastMidp>'.$pd2.'%</EastMidp>');
echo "<br />";
echo htmlentities('<East>'.$epa.'</East>');
echo "<br />";
echo htmlentities('<Eastp>'.$pe2.'%</Eastp>');
echo "<br />";
echo htmlentities('<London>'.$fpa.'</London>');
echo "<br />";
echo htmlentities('<Londonp>'.$pf2.'%</Londonp>');
echo "<br />";
echo htmlentities('<NorthEast>'.$gpa.'</NorthEast>');
echo "<br />";
echo htmlentities('<NorthEastp>'.$pg2.'%</NorthEastp>');
echo "<br />";
echo htmlentities('<NorthWest>'.$hpa.'</NorthWest>');
echo "<br />";
echo htmlentities('<NorthWestp>'.$ph2.'%</NorthWestp>');
echo "<br />";
echo htmlentities('<SouthEast>'.$ipa.'</SouthEast>');
echo "<br />";
echo htmlentities('<SouthEastp>'.$pi2.'%</SouthEastp>');
echo "<br />";
echo htmlentities('<SouthWest>'.$jpa.'</SouthWest>');
echo "<br />";
echo htmlentities('<SouthWestp>'.$pj2.'%</SouthWestp>');
echo "<br />";
echo htmlentities('<WestMid>'.$kpa.'</WestMid>');
echo "<br />";
echo htmlentities('<WestMidp>'.$pk2.'%</WestMidp>');
echo "<br />";
echo htmlentities('<Yorkshire>'.$lpa.'</Yorkshire>');
echo "<br />";
echo htmlentities('<Yorkshirep>'.$pl2.'%</Yorkshirep>');
echo "<br />";
if ($h=='1') {
echo htmlentities('<Antrim>'.$aapa.'</Antrim>');
echo "<br />";
echo htmlentities('<Antrimp>'.$paa.'%</Antrimp>');
echo "<br />";
echo htmlentities('<Ards>'.$abpa.'</Ards>');
echo "<br />";
echo htmlentities('<Ardsp>'.$pab.'%</Ardsp>');
echo "<br />";
echo htmlentities('<Armagh>'.$acpa.'</Armagh>');
echo "<br />";
echo htmlentities('<Armaghp>'.$pac.'%</Armaghp>');
echo "<br />";
echo htmlentities('<Ballymena>'.$adpa.'</Ballymena>');
echo "<br />";
echo htmlentities('<Ballymenap>'.$pad.'%</Ballymenap>');
echo "<br />";
echo htmlentities('<Ballymoney>'.$aepa.'</Ballymoney>');
echo "<br />";
echo htmlentities('<Ballymoneyp>'.$pae.'%</Ballymoneyp>');
echo "<br />";
echo htmlentities('<Banbridge>'.$afpa.'</Banbridge>');
echo "<br />";
echo htmlentities('<Banbridgep>'.$paf.'%</Banbridgep>');
echo "<br />";
echo htmlentities('<Belfast>'.$agpa.'</Belfast>');
echo "<br />";
echo htmlentities('<Belfastp>'.$pag.'%</Belfastp>');
echo "<br />";
echo htmlentities('<Carrickfergus>'.$ahpa.'</Carrickfergus>');
echo "<br />";
echo htmlentities('<Carrickfergusp>'.$pah.'%</Carrickfergusp>');
echo "<br />";
echo htmlentities('<Castlereagh>'.$aipa.'</Castlereagh>');
echo "<br />";
echo htmlentities('<Castlereaghp>'.$pai.'%</Castlereaghp>');
echo "<br />";
echo htmlentities('<Coleraine>'.$ajpa.'</Coleraine>');
echo "<br />";
echo htmlentities('<Colerainep>'.$paj.'%</Colerainep>');
echo "<br />";
echo htmlentities('<Cookstown>'.$akpa.'</Cookstown>');
echo "<br />";
echo htmlentities('<Cookstownp>'.$pak.'%</Cookstownp>');
echo "<br />";
echo htmlentities('<Craigavon>'.$alpa.'</Craigavon>');
echo "<br />";
echo htmlentities('<Craigavonp>'.$pal.'%</Craigavonp>');
echo "<br />";
echo htmlentities('<Derry>'.$ampa.'</Derry>');
echo "<br />";
echo htmlentities('<Derryp>'.$pam.'%</Derryp>');
echo "<br />";
echo htmlentities('<Down>'.$anpa.'</Down>');
echo "<br />";
echo htmlentities('<Downp>'.$pan.'%</Downp>');
echo "<br />";
echo htmlentities('<Dungannon>'.$aopa.'</Dungannon>');
echo "<br />";
echo htmlentities('<Dungannonp>'.$pao.'%</Dungannonp>');
echo "<br />";
echo htmlentities('<Fermanagh>'.$appa.'</Fermanagh>');
echo "<br />";
echo htmlentities('<Fermanaghp>'.$pap.'%</Fermanaghp>');
echo "<br />";
echo htmlentities('<Larne>'.$aqpa.'</Larne>');
echo "<br />";
echo htmlentities('<Larnep>'.$paq.'%</Larnep>');
echo "<br />";
echo htmlentities('<Limavady>'.$arpa.'</Limavady>');
echo "<br />";
echo htmlentities('<Limavadyp>'.$par.'%</Limavadyp>');
echo "<br />";
echo htmlentities('<Lisburn>'.$aspa.'</Lisburn>');
echo "<br />";
echo htmlentities('<Lisburnp>'.$pas.'%</Lisburnp>');
echo "<br />";
echo htmlentities('<Magherafelt>'.$atpa.'</Magherafelt>');
echo "<br />";
echo htmlentities('<Magherafeltp>'.$pat.'%</Magherafeltp>');
echo "<br />";
echo htmlentities('<Moyle>'.$aupa.'</Moyle>');
echo "<br />";
echo htmlentities('<Moylep>'.$pau.'%</Moylep>');
echo "<br />";
echo htmlentities('<Newry>'.$avpa.'</Newry>');
echo "<br />";
echo htmlentities('<Newryp>'.$pav.'%</Newryp>');
echo "<br />";
echo htmlentities('<Newtownabbey>'.$awpa.'</Newtownabbey>');
echo "<br />";
echo htmlentities('<Newtownabbeyp>'.$paw.'%</Newtownabbeyp>');
echo "<br />";
echo htmlentities('<NorthDown>'.$axpa.'</NorthDown>');
echo "<br />";
echo htmlentities('<NorthDownp>'.$pax.'%</NorthDownp>');
echo "<br />";
echo htmlentities('<Omagh>'.$aypa.'</Omagh>');
echo "<br />";
echo htmlentities('<Omaghp>'.$pay.'%</Omaghp>');
echo "<br />";
echo htmlentities('<Strabane>'.$azpa.'</Strabane>');
echo "<br />";
echo htmlentities('<Strabanep>'.$paz.'%</Strabanep>');
echo "<br />";
}
if ($h=='2') {
echo htmlentities('<Aberdeen>'.$bapa.'</Aberdeen>');
echo "<br />";
echo htmlentities('<Aberdeenp>'.$pba.'%</Aberdeenp>');
echo "<br />";
echo htmlentities('<Aberdeenshire>'.$bbpa.'</Aberdeenshire>');
echo "<br />";
echo htmlentities('<Aberdeenshirep>'.$pbb.'%</Aberdeenshirep>');
echo "<br />";
echo htmlentities('<Angus>'.$bcpa.'</Angus>');
echo "<br />";
echo htmlentities('<Angusp>'.$pbc.'%</Angusp>');
echo "<br />";
echo htmlentities('<Argyll>'.$bdpa.'</Argyll>');
echo "<br />";
echo htmlentities('<Argyllp>'.$pbd.'%</Argyllp>');
echo "<br />";
echo htmlentities('<Clackmannanshire>'.$bepa.'</Clackmannanshire>');
echo "<br />";
echo htmlentities('<Clackmannanshirep>'.$pbe.'%</Clackmannanshirep>');
echo "<br />";
echo htmlentities('<Dumfries>'.$bfpa.'</Dumfries>');
echo "<br />";
echo htmlentities('<Dumfriesp>'.$pbf.'%</Dumfriesp>');
echo "<br />";
echo htmlentities('<Dundee>'.$bgpa.'</Dundee>');
echo "<br />";
echo htmlentities('<Dundeep>'.$pbg.'%</Dundeep>');
echo "<br />";
echo htmlentities('<EastAyrshire>'.$bhpa.'</EastAyrshire>');
echo "<br />";
echo htmlentities('<EastAyrshirep>'.$pbh.'%</EastAyrshirep>');
echo "<br />";
echo htmlentities('<EastDunbarton>'.$bipa.'</EastDunbarton>');
echo "<br />";
echo htmlentities('<EastDunbartonp>'.$pbi.'%</EastDunbartonp>');
echo "<br />";
echo htmlentities('<EastLothian>'.$bjpa.'</EastLothian>');
echo "<br />";
echo htmlentities('<EastLothianp>'.$pbj.'%</EastLothianp>');
echo "<br />";
echo htmlentities('<EastRenfrew>'.$bkpa.'</EastRenfrew>');
echo "<br />";
echo htmlentities('<EastRenfrewp>'.$pbk.'%</EastRenfrewp>');
echo "<br />";
echo htmlentities('<Edinburgh>'.$blpa.'</Edinburgh>');
echo "<br />";
echo htmlentities('<Edinburghp>'.$pbl.'%</Edinburghp>');
echo "<br />";
echo htmlentities('<Falkirk>'.$bmpa.'</Falkirk>');
echo "<br />";
echo htmlentities('<Falkirkp>'.$pbm.'%</Falkirkp>');
echo "<br />";
echo htmlentities('<Fife>'.$bnpa.'</Fife>');
echo "<br />";
echo htmlentities('<Fifep>'.$pbn.'%</Fifep>');
echo "<br />";
echo htmlentities('<Glasgow>'.$bopa.'</Glasgow>');
echo "<br />";
echo htmlentities('<Glasgowp>'.$pbo.'%</Glasgowp>');
echo "<br />";
echo htmlentities('<Highland>'.$bppa.'</Highland>');
echo "<br />";
echo htmlentities('<Highlandp>'.$pbp.'%</Highlandp>');
echo "<br />";
echo htmlentities('<Inverclyde>'.$bqpa.'</Inverclyde>');
echo "<br />";
echo htmlentities('<Inverclydep>'.$pbq.'%</Inverclydep>');
echo "<br />";
echo htmlentities('<Midlothian>'.$brpa.'</Midlothian>');
echo "<br />";
echo htmlentities('<Midlothianp>'.$pbr.'%</Midlothianp>');
echo "<br />";
echo htmlentities('<Moray>'.$bspa.'</Moray>');
echo "<br />";
echo htmlentities('<Morayp>'.$pbs.'%</Morayp>');
echo "<br />";
echo htmlentities('<Eilanan>'.$btpa.'</Eilanan>');
echo "<br />";
echo htmlentities('<Eilananp>'.$pbt.'%</Eilananp>');
echo "<br />";
echo htmlentities('<NorthAyrshire>'.$bupa.'</NorthAyrshire>');
echo "<br />";
echo htmlentities('<NorthAyrshirep>'.$pbu.'%</NorthAyrshirep>');
echo "<br />";
echo htmlentities('<NorthLanark>'.$bvpa.'</NorthLanark>');
echo "<br />";
echo htmlentities('<NorthLanarkp>'.$pbv.'%</NorthLanarkp>');
echo "<br />";
echo htmlentities('<Orkney>'.$bwpa.'</Orkney>');
echo "<br />";
echo htmlentities('<Orkneyp>'.$pbw.'%</Orkneyp>');
echo "<br />";
echo htmlentities('<Perth>'.$bxpa.'</Perth>');
echo "<br />";
echo htmlentities('<Perthp>'.$pbx.'%</Perthp>');
echo "<br />";
echo htmlentities('<Renfrewshire>'.$bypa.'</Renfrewshire>');
echo "<br />";
echo htmlentities('<Renfrewshirep>'.$pby.'%</Renfrewshirep>');
echo "<br />";
echo htmlentities('<Borders>'.$bzpa.'</Borders>');
echo "<br />";
echo htmlentities('<Bordersp>'.$pbz.'%</Bordersp>');
echo "<br />";
echo htmlentities('<Shetland>'.$baapa.'</Shetland>');
echo "<br />";
echo htmlentities('<Shetlandp>'.$pbaa.'%</Shetlandp>');
echo "<br />";
echo htmlentities('<SouthAyrshire>'.$bbbpa.'</SouthAyrshire>');
echo "<br />";
echo htmlentities('<SouthAyrshirep>'.$pbbb.'%</SouthAyrshirep>');
echo "<br />";
echo htmlentities('<SouthLanark>'.$bccpa.'</SouthLanark>');
echo "<br />";
echo htmlentities('<SouthLanarkp>'.$pbcc.'%</SouthLanarkp>');
echo "<br />";
echo htmlentities('<Stirling>'.$bddpa.'</Stirling>');
echo "<br />";
echo htmlentities('<Stirlingp>'.$pbdd.'%</Stirlingp>');
echo "<br />";
echo htmlentities('<WestDunbarton>'.$beepa.'</WestDunbarton>');
echo "<br />";
echo htmlentities('<WestDunbartonp>'.$pbee.'%</WestDunbartonp>');
echo "<br />";
echo htmlentities('<WestLothian>'.$bffpa.'</WestLothian>');
echo "<br />";
echo htmlentities('<WestLothianp>'.$pbff.'%</WestLothianp>');
echo "<br />";
}
if ($h=='3') {
echo htmlentities('<Blaenau>'.$capa.'</Blaenau>');
echo "<br />";
echo htmlentities('<Blaenaup>'.$pca.'%</Blaenaup>');
echo "<br />";
echo htmlentities('<Bridgend>'.$cbpa.'</Bridgend>');
echo "<br />";
echo htmlentities('<Bridgendp>'.$pcb.'%</Bridgendp>');
echo "<br />";
echo htmlentities('<Caerphilly>'.$ccpa.'</Caerphilly>');
echo "<br />";
echo htmlentities('<Caerphillyp>'.$pcc.'%</Caerphillyp>');
echo "<br />";
echo htmlentities('<Cardiff>'.$cdpa.'</Cardiff>');
echo "<br />";
echo htmlentities('<Cardiffp>'.$pcd.'%</Cardiffp>');
echo "<br />";
echo htmlentities('<Carmarthenshire>'.$cepa.'</Carmarthenshire>');
echo "<br />";
echo htmlentities('<Carmarthenshirep>'.$pce.'%</Carmarthenshirep>');
echo "<br />";
echo htmlentities('<Ceredigion>'.$cfpa.'</Ceredigion>');
echo "<br />";
echo htmlentities('<Ceredigionp>'.$pcf.'%</Ceredigionp>');
echo "<br />";
echo htmlentities('<Conwy>'.$cgpa.'</Conwy>');
echo "<br />";
echo htmlentities('<Conwyp>'.$pcg.'%</Conwyp>');
echo "<br />";
echo htmlentities('<Denbighshire>'.$chpa.'</Denbighshire>');
echo "<br />";
echo htmlentities('<Denbighshirep>'.$pch.'%</Denbighshirep>');
echo "<br />";
echo htmlentities('<Flintshire>'.$cipa.'</Flintshire>');
echo "<br />";
echo htmlentities('<Flintshirep>'.$pci.'%</Flintshirep>');
echo "<br />";
echo htmlentities('<Gwynedd>'.$cjpa.'</Gwynedd>');
echo "<br />";
echo htmlentities('<Gwyneddp>'.$pcj.'%</Gwyneddp>');
echo "<br />";
echo htmlentities('<Anglesey>'.$ckpa.'</Anglesey>');
echo "<br />";
echo htmlentities('<Angleseyp>'.$pck.'%</Angleseyp>');
echo "<br />";
echo htmlentities('<MerthyrTydfil>'.$clpa.'</MerthyrTydfil>');
echo "<br />";
echo htmlentities('<MerthyrTydfilp>'.$pcl.'%</MerthyrTydfilp>');
echo "<br />";
echo htmlentities('<Monmouthshire>'.$cmpa.'</Monmouthshire>');
echo "<br />";
echo htmlentities('<Monmouthshirep>'.$pcm.'%</Monmouthshirep>');
echo "<br />";
echo htmlentities('<NeathPortTalbot>'.$cnpa.'</NeathPortTalbot>');
echo "<br />";
echo htmlentities('<NeathPortTalbotp>'.$pcn.'%</NeathPortTalbotp>');
echo "<br />";
echo htmlentities('<Newport>'.$copa.'</Newport>');
echo "<br />";
echo htmlentities('<Newportp>'.$pco.'%</Newportp>');
echo "<br />";
echo htmlentities('<Pembrokeshire>'.$cppa.'</Pembrokeshire>');
echo "<br />";
echo htmlentities('<Pembrokeshirep>'.$pcp.'%</Pembrokeshirep>');
echo "<br />";
echo htmlentities('<Powys>'.$cqpa.'</Powys>');
echo "<br />";
echo htmlentities('<Powysp>'.$pcq.'%</Powysp>');
echo "<br />";
echo htmlentities('<Rhondda>'.$crpa.'</Rhondda>');
echo "<br />";
echo htmlentities('<Rhonddap>'.$pcr.'%</Rhonddap>');
echo "<br />";
echo htmlentities('<Swansea>'.$cspa.'</Swansea>');
echo "<br />";
echo htmlentities('<Swanseap>'.$pcs.'%</Swanseap>');
echo "<br />";
echo htmlentities('<Torfaen>'.$ctpa.'</Torfaen>');
echo "<br />";
echo htmlentities('<Torfaenp>'.$pct.'%</Torfaenp>');
echo "<br />";
echo htmlentities('<Glamorgan>'.$cupa.'</Glamorgan>');
echo "<br />";
echo htmlentities('<Glamorganp>'.$pcu.'%</Glamorganp>');
echo "<br />";
echo htmlentities('<Wrexham>'.$cvpa.'</Wrexham>');
echo "<br />";
echo htmlentities('<Wrexhamp>'.$pcv.'%</Wrexhamp>');
echo "<br />";
}
if ($h=='4') {
echo htmlentities('<Derbyshire>'.$dapa.'</Derbyshire>');
echo "<br />";
echo htmlentities('<Derbyshirep>'.$pda.'%</Derbyshirep>');
echo "<br />";
echo htmlentities('<Leicestershire>'.$dbpa.'</Leicestershire>');
echo "<br />";
echo htmlentities('<Leicestershirep>'.$pdb.'%</Leicestershirep>');
echo "<br />";
echo htmlentities('<Lincolnshired>'.$dcpa.'</Lincolnshired>');
echo "<br />";
echo htmlentities('<Lincolnshiredp>'.$pdc.'%</Lincolnshiredp>');
echo "<br />";
echo htmlentities('<Northamptonshire>'.$ddpa.'</Northamptonshire>');
echo "<br />";
echo htmlentities('<Northamptonshirep>'.$pdd.'%</Northamptonshirep>');
echo "<br />";
echo htmlentities('<Nottinghamshire>'.$depa.'</Nottinghamshire>');
echo "<br />";
echo htmlentities('<Nottinghamshirep>'.$pde.'%</Nottinghamshirep>');
echo "<br />";
echo htmlentities('<Rutland>'.$dfpa.'</Rutland>');
echo "<br />";
echo htmlentities('<Rutlandp>'.$pdf.'%</Rutlandp>');
echo "<br />";
}
if ($h=='5') {
echo htmlentities('<Bedfordshire>'.$eapa.'</Bedfordshire>');
echo "<br />";
echo htmlentities('<Bedfordshirep>'.$pea.'%</Bedfordshirep>');
echo "<br />";
echo htmlentities('<Cambridgeshire>'.$ebpa.'</Cambridgeshire>');
echo "<br />";
echo htmlentities('<Cambridgeshirep>'.$peb.'%</Cambridgeshirep>');
echo "<br />";
echo htmlentities('<Essex>'.$ecpa.'</Essex>');
echo "<br />";
echo htmlentities('<Essexp>'.$pec.'%</Essexp>');
echo "<br />";
echo htmlentities('<Hertfordshire>'.$edpa.'</Hertfordshire>');
echo "<br />";
echo htmlentities('<Hertfordshirep>'.$ped.'%</Hertfordshirep>');
echo "<br />";
echo htmlentities('<Norfolk>'.$eepa.'</Norfolk>');
echo "<br />";
echo htmlentities('<Norfolkp>'.$pee.'%</Norfolkp>');
echo "<br />";
echo htmlentities('<Suffolk>'.$efpa.'</Suffolk>');
echo "<br />";
echo htmlentities('<Suffolkp>'.$pef.'%</Suffolkp>');
echo "<br />";
}
if ($h=='6') {
echo htmlentities('<NorthLondon>'.$fapa.'</NorthLondon>');
echo "<br />";
echo htmlentities('<NorthLondonp>'.$pfa.'%</NorthLondonp>');
echo "<br />";
echo htmlentities('<NorthEastLondon>'.$fbpa.'</NorthEastLondon>');
echo "<br />";
echo htmlentities('<NorthEastLondonp>'.$pfb.'%</NorthEastLondonp>');
echo "<br />";
echo htmlentities('<SouthEastLondon>'.$fcpa.'</SouthEastLondon>');
echo "<br />";
echo htmlentities('<SouthEastLondonp>'.$pfc.'%</SouthEastLondonp>');
echo "<br />";
echo htmlentities('<SouthWestLondon>'.$fdpa.'</SouthWestLondon>');
echo "<br />";
echo htmlentities('<SouthWestLondonp>'.$pfd.'%</SouthWestLondonp>');
echo "<br />";
echo htmlentities('<WestLondon>'.$fepa.'</WestLondon>');
echo "<br />";
echo htmlentities('<WestLondonp>'.$pfe.'%</WestLondonp>');
echo "<br />";
}
if ($h=='7') {
echo htmlentities('<Durham>'.$gapa.'</Durham>');
echo "<br />";
echo htmlentities('<Durhamp>'.$pga.'%</Durhamp>');
echo "<br />";
echo htmlentities('<NorthYorkshireg>'.$gbpa.'</NorthYorkshireg>');
echo "<br />";
echo htmlentities('<NorthYorkshiregp>'.$pgb.'%</NorthYorkshiregp>');
echo "<br />";
echo htmlentities('<Northumberland>'.$gcpa.'</Northumberland>');
echo "<br />";
echo htmlentities('<Northumberlandp>'.$pgc.'%</Northumberlandp>');
echo "<br />";
echo htmlentities('<TyneandWear>'.$gdpa.'</TyneandWear>');
echo "<br />";
echo htmlentities('<TyneandWearp>'.$pgd.'%</TyneandWearp>');
echo "<br />";
}
if ($h=='8') {
echo htmlentities('<Cheshire>'.$hapa.'</Cheshire>');
echo "<br />";
echo htmlentities('<Cheshirep>'.$pha.'%</Cheshirep>');
echo "<br />";
echo htmlentities('<Cumbria>'.$hbpa.'</Cumbria>');
echo "<br />";
echo htmlentities('<Cumbriap>'.$phb.'%</Cumbriap>');
echo "<br />";
echo htmlentities('<Manchester>'.$hcpa.'</Manchester>');
echo "<br />";
echo htmlentities('<Manchesterp>'.$phc.'%</Manchesterp>');
echo "<br />";
echo htmlentities('<Lancashire>'.$hdpa.'</Lancashire>');
echo "<br />";
echo htmlentities('<Lancashirep>'.$phd.'%</Lancashirep>');
echo "<br />";
echo htmlentities('<Merseyside>'.$hepa.'</Merseyside>');
echo "<br />";
echo htmlentities('<Merseysidep>'.$phe.'%</Merseysidep>');
echo "<br />";
}
if ($h=='9') {
echo htmlentities('<Berkshire>'.$iapa.'</Berkshire>');
echo "<br />";
echo htmlentities('<Berkshirep>'.$pia.'%</Berkshirep>');
echo "<br />";
echo htmlentities('<Buckinghamshire>'.$ibpa.'</Buckinghamshire>');
echo "<br />";
echo htmlentities('<Buckinghamshirep>'.$pib.'%</Buckinghamshirep>');
echo "<br />";
echo htmlentities('<EastSussex>'.$icpa.'</EastSussex>');
echo "<br />";
echo htmlentities('<EastSussexp>'.$pic.'%</EastSussexp>');
echo "<br />";
echo htmlentities('<Hampshire>'.$iepa.'</Hampshire>');
echo "<br />";
echo htmlentities('<Hampshirep>'.$pie.'%</Hampshirep>');
echo "<br />";
echo htmlentities('<IsleofWight>'.$ifpa.'</IsleofWight>');
echo "<br />";
echo htmlentities('<IsleofWightp>'.$pif.'%</IsleofWightp>');
echo "<br />";
echo htmlentities('<Kent>'.$igpa.'</Kent>');
echo "<br />";
echo htmlentities('<Kentp>'.$pig.'%</Kentp>');
echo "<br />";
echo htmlentities('<Oxfordshire>'.$ihpa.'</Oxfordshire>');
echo "<br />";
echo htmlentities('<Oxfordshirep>'.$pih.'%</Oxfordshirep>');
echo "<br />";
echo htmlentities('<Surrey>'.$iipa.'</Surrey>');
echo "<br />";
echo htmlentities('<Surreyp>'.$pii.'%</Surreyp>');
echo "<br />";
echo htmlentities('<WestSussex>'.$ijpa.'</WestSussex>');
echo "<br />";
echo htmlentities('<WestSussexp>'.$pij.'%</WestSussexp>');
echo "<br />";
}
if ($h=='10') {
echo htmlentities('<Bristol>'.$japa.'</Bristol>');
echo "<br />";
echo htmlentities('<Bristolp>'.$pja.'%</Bristolp>');
echo "<br />";
echo htmlentities('<Cornwall>'.$jbpa.'</Cornwall>');
echo "<br />";
echo htmlentities('<Cornwallp>'.$pjb.'%</Cornwallp>');
echo "<br />";
echo htmlentities('<Devon>'.$jcpa.'</Devon>');
echo "<br />";
echo htmlentities('<Devonp>'.$pjc.'%</Devonp>');
echo "<br />";
echo htmlentities('<Dorset>'.$jdpa.'</Dorset>');
echo "<br />";
echo htmlentities('<Dorsetp>'.$pjd.'%</Dorsetp>');
echo "<br />";
echo htmlentities('<Gloucestershire>'.$jepa.'</Gloucestershire>');
echo "<br />";
echo htmlentities('<Gloucestershirep>'.$pje.'%</Gloucestershirep>');
echo "<br />";
echo htmlentities('<Somerset>'.$jfpa.'</Somerset>');
echo "<br />";
echo htmlentities('<Somersetp>'.$pjf.'%</Somersetp>');
echo "<br />";
echo htmlentities('<Wiltshire>'.$jgpa.'</Wiltshire>');
echo "<br />";
echo htmlentities('<Wiltshirep>'.$pjg.'%</Wiltshirep>');
echo "<br />";
}
if ($h=='11') {
echo htmlentities('<Herefordshire>'.$kapa.'</Herefordshire>');
echo "<br />";
echo htmlentities('<Herefordshirep>'.$pka.'%</Herefordshirep>');
echo "<br />";
echo htmlentities('<Shropshire>'.$kbpa.'</Shropshire>');
echo "<br />";
echo htmlentities('<Shropshirep>'.$pkb.'%</Shropshirep>');
echo "<br />";
echo htmlentities('<Staffordshire>'.$kcpa.'</Staffordshire>');
echo "<br />";
echo htmlentities('<Staffordshirep>'.$pkc.'%</Staffordshirep>');
echo "<br />";
echo htmlentities('<Warwickshire>'.$kdpa.'</Warwickshire>');
echo "<br />";
echo htmlentities('<Warwickshirep>'.$pkd.'%</Warwickshirep>');
echo "<br />";
echo htmlentities('<WestMidlands>'.$kepa.'</WestMidlands>');
echo "<br />";
echo htmlentities('<WestMidlandsp>'.$pke.'%</WestMidlandsp>');
echo "<br />";
echo htmlentities('<Worcestershire>'.$kfpa.'</Worcestershire>');
echo "<br />";
echo htmlentities('<Worcestershirep>'.$pkf.'%</Worcestershirep>');
echo "<br />";
}
if ($h=='12') {
echo htmlentities('<EastRiding>'.$lapa.'</EastRiding>');
echo "<br />";
echo htmlentities('<EastRidingp>'.$pla.'%</EastRidingp>');
echo "<br />";
echo htmlentities('<Lincolnshirel>'.$lbpa.'</Lincolnshirel>');
echo "<br />";
echo htmlentities('<Lincolnshirelp>'.$plb.'%</Lincolnshirelp>');
echo "<br />";
echo htmlentities('<NorthYorkshirel>'.$lcpa.'</NorthYorkshirel>');
echo "<br />";
echo htmlentities('<NorthYorkshirelp>'.$plc.'%</NorthYorkshirelp>');
echo "<br />";
echo htmlentities('<SouthYorkshire>'.$ldpa.'</SouthYorkshire>');
echo "<br />";
echo htmlentities('<SouthYorkshirep>'.$pld.'%</SouthYorkshirep>');
echo "<br />";
echo htmlentities('<WestYorkshire>'.$lepa.'</WestYorkshire>');
echo "<br />";
echo htmlentities('<WestYorkshirep>'.$ple.'%</WestYorkshirep>');
echo "<br />";
}
}


echo htmlentities('</CD>');
echo "<br />";
break;
default:
echo "";
}
break;
default:
echo "";
}
}


if ($l=='1') $low="SUBJECT";
else $low="COURSE";

if ($a=='1') $sqlschool="select distinct ".$low.", count(".$low.") AS sum from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$low." <> '' group by ".$low." order by ".$low."";
if ($a=='2') $sqlschool="(select distinct ".$low.", count(".$low.") AS sum from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." <> '' group by ".$low.") UNION (select distinct ".$low.", count(".$low.") AS sum from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$low." <> '' group by ".$low.") order by ".$low."";
if ($a=='3') $sqlschool="(select distinct ".$low.", count(".$low.") AS sum from extract89 inner join popdlhe89 on extract89.HUSIDa = popdlhe89.HUSID where ".$low." <> '' group by ".$low.") UNION (select distinct ".$low.", count(".$low.") AS sum from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." <> '' group by ".$low.") UNION (select distinct ".$low.", count(".$low.") AS sum from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$low." <> '' group by ".$low.") order by ".$low."";
$sqlschool=mysql_query($sqlschool);
while ($row=mysql_fetch_array($sqlschool))
{
if ($l=='1') $school=$row['SUBJECT'];
else $school=$row['COURSE'];
$sum=$row['sum'];
switch ($school)
{
case $school!=$school2:
$school2=$school;
if ($a=='2') $union=") UNION ALL (select EMPCIR, MODSTUDY, SALARY, LOCEMP, PUBGRID from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." like '".$school."'";
elseif ($a=='3') $union=") UNION ALL (select EMPCIR, MODSTUDY, SALARY, LOCEMP, PUBGRID from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." like '".$school."') UNION ALL (select EMPCIR, MODSTUDY, SALARY, LOCEMP, PUBGRID from extract89 inner join popdlhe89 on extract89.HUSIDa = popdlhe89.HUSID where ".$low." like '".$school."'";
else $union="";
$joinp="(select EMPCIR, MODSTUDY, SALARY, LOCEMP, PUBGRID from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$low." like '".$school."'".$union.") order by (SALARY+0)";
$resultp = mysql_query($joinp);
$ap=0; $bp=0; $cp=0; $dp=0; $ep=0; $fp=0; $gp=0; $op=0; $xp=0;
$apa=0; $bpa=0; $cpa=0; $dpa=0; $epa=0; $fpa=0; $gpa=0; $hpa=0; $ipa=0; $jpa=0; $kpa=0; $lpa=0;
$aapa=0; $abpa=0; $acpa=0; $adpa=0; $aepa=0; $afpa=0; $agpa=0; $ahpa=0; $aipa=0; $ajpa=0; $akpa=0; $alpa=0; $ampa=0; $anpa=0; $aopa=0; $appa=0; $aqpa=0; $arpa=0; $aspa=0; $atpa=0; $aupa=0; $avpa=0; $awpa=0; $axpa=0; $aypa=0; $azpa=0;
$bapa=0; $bbpa=0; $bcpa=0; $bdpa=0; $bepa=0; $bfpa=0; $bgpa=0; $bhpa=0; $bipa=0; $bjpa=0; $bkpa=0; $blpa=0; $bmpa=0; $bnpa=0; $bopa=0; $bppa=0; $bqpa=0; $brpa=0; $bspa=0; $btpa=0; $bupa=0; $bvpa=0; $bwpa=0; $bxpa=0; $bypa=0; $bzpa=0; $baapa=0; $bbbpa=0; $bccpa=0; $bddpa=0; $beepa=0; $bffpa=0;
$capa=0; $cbpa=0; $ccpa=0; $cdpa=0; $cepa=0; $cfpa=0; $cgpa=0; $chpa=0; $cipa=0; $cjpa=0; $ckpa=0; $clpa=0; $cmpa=0; $cnpa=0; $copa=0; $cppa=0; $cqpa=0; $crpa=0; $cspa=0; $ctpa=0; $cupa=0; $cvpa=0;
$dapa=0; $dbpa=0; $dcpa=0; $ddpa=0; $depa=0; $dfpa=0;
$eapa=0; $ebpa=0; $ecpa=0; $edpa=0; $eepa=0; $efpa=0;
$fapa=0; $fbpa=0; $fcpa=0; $fdpa=0; $fepa=0;
$gapa=0; $gbpa=0; $gcpa=0; $gdpa=0;
$hapa=0; $hbpa=0; $hcpa=0; $hdpa=0; $hepa=0;
$iapa=0; $ibpa=0; $icpa=0; $iepa=0; $ifpa=0; $igpa=0; $ihpa=0; $iipa=0; $ijpa=0;
$japa=0; $jbpa=0; $jcpa=0; $jdpa=0; $jepa=0; $jfpa=0; $jgpa=0;
$kapa=0; $kbpa=0; $kcpa=0; $kdpa=0; $kepa=0; $kfpa=0;
$lapa=0; $lbpa=0; $lcpa=0; $ldpa=0; $lepa=0;
$salcountmed=0;
while($row = mysql_fetch_array($resultp))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $sal=$row["SALARY"];
if ($sal!='XXXXXX' && $sal!='0' && ($emp=='1' || $emp=='3') && $mod=='3') $salcountmed=$salcountmed+1;
}
$remainder = ($salcountmed % 2);
$salcountmeda=($salcountmed / 2);
$salcountmedb=($salcountmed / 2) + 1;
$salcountmedc=($salcountmed / 2) + 0.5;

mysql_data_seek($resultp,0);
$salcountmean=0;
$saltotal=0;
while($row = mysql_fetch_array($resultp))
 {
 $emp=$row["EMPCIR"];
 $mod=$row["MODSTUDY"];
 $sal=$row["SALARY"];
 $loc=$row["LOCEMP"];
 $pub=$row["PUBGRID"];
 $loc2=substr($loc,0,2);
 $loc3=substr($loc,0,3);
 $loc4=substr($loc,0,4);
 $loc1=substr($loc,0,1);
if (($mod=='3' && ($emp=='1' || $emp=='3'))) $ap=$ap+1;
elseif ($emp=='2' && $mod=='3') $bp=$bp+1;
elseif ($emp=='15' && $mod=='3') $cp=$cp+1;
elseif (($mod=='1' || $mod=='2') && ($emp=='1' || $emp=='2' || $emp=='3' || $emp=='15')) $dp=$dp+1;
elseif (($mod=='1' && ($emp=='17' || $emp=='11' || $emp=='12' || $emp=='13' || $emp=='14')) || ($mod=='2' && ($emp=='17' || $emp=='13' || $emp=='14'))) $ep=$ep+1;
elseif (($mod=='2' || $mod=='3') && ($emp=='11' || $emp=='12')) $fp=$fp+1;
elseif ($emp=='16' || $emp=='10' || ($emp=='17' && $mod=='3')) $gp=$gp+1;
elseif ($mod=='3' && ($emp=='13' || $emp=='14')) $op=$op+1;
elseif ($pub == 'X') $xp=$xp+1;
if ($sal!='XXXXXX' && $sal!='0' && ($emp=='1' || $emp=='3') && $mod=='3') $saltotal=$saltotal+$sal;
if ($sal!='XXXXXX' && $sal!='0' && ($emp=='1' || $emp=='3') && $mod=='3') $salcountmean=$salcountmean+1;
if ($sal!='XXXXXX' && $sal!='0' && ($emp=='1' || $emp=='3') && $mod=='3' && $remainder=='1' && $salcountmean==$salcountmedc) $median3a=$sal;
elseif ($sal!='XXXXXX' && $sal!='0' && ($emp=='1' || $emp=='3') && $mod=='3' && $remainder=='0' && $salcountmean==$salcountmeda) $median1a=$sal;
elseif ($sal!='XXXXXX' && $sal!='0' && ($emp=='1' || $emp=='3') && $mod=='3' && $remainder=='0' && $salcountmean==$salcountmedb) $median2a=$sal;
else echo "";
if ($loc4=='BA12' || $loc4=='BA13' || $loc4=='BA14' || $loc4=='BA15') {$jgpa=$jgpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='BA') {$jfpa=$jfpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='BB') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='BD23' || $loc4=='BD24') {$lcpa=$lcpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='BD') {$lepa=$lepa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc4=='BH24' || $loc4=='BH25') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='BH') {$jdpa=$jdpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='BL') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='BN50' || $loc4=='BN51' || $loc4=='BN52') {$icpa=$icpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='BN5' || $loc3=='BN6' || $loc4=='BN11' || $loc4=='BN12' || $loc4=='BN13') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='BN14' || $loc4=='BN15' || $loc4=='BN16' || $loc4=='BN17' || $loc4=='BN18') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='BN42' || $loc4=='BN43' || $loc4=='BN44' || $loc4=='BN45' || $loc4=='BN99') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='BN') {$icpa=$icpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='BR8') {$igpa=$igpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='BR') {$fcpa=$fcpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='BS20' || $loc4=='BS21' || $loc4=='BS22' || $loc4=='BS23' || $loc4=='BS24') {$jfpa=$jfpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='BS25' || $loc4=='BS26' || $loc4=='BS27' || $loc4=='BS28' || $loc4=='BS29') {$jfpa=$jfpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='BS31' || $loc4=='BS39' || $loc4=='BS40' || $loc4=='BS41' || $loc4=='BS48') {$jfpa=$jfpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='BS49') {$jfpa=$jfpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='BS15' || $loc4=='BS16' || $loc4=='BS30' || $loc4=='BS31' || $loc4=='BS32') {$jepa=$jepa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='BS34' || $loc4=='BS35' || $loc4=='BS36' || $loc4=='BS37') {$jepa=$jepa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='BS') {$japa=$japa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='BT18' || $loc4=='BT19' || $loc4=='BT20') {$axpa=$axpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT21' || $loc4=='BT22' || $loc4=='BT23') {$abpa=$abpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT24') {$anpa=$anpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT25' || $loc4=='BT32') {$afpa=$afpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT26' || $loc4=='BT27' || $loc4=='BT28') {$aspa=$aspa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT30' || $loc4=='BT31' || $loc4=='BT33') {$anpa=$anpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT34' || $loc4=='BT35') {$avpa=$avpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT36' || $loc4=='BT37' || $loc4=='BT39') {$awpa=$awpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT38') {$ahpa=$ahpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT40') {$aqpa=$aqpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT41') {$aapa=$aapa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT42' || $loc4=='BT43' || $loc4=='BT44') {$adpa=$adpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT45' || $loc4=='BT46') {$atpa=$atpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT47' || $loc4=='BT48') {$ampa=$ampa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT49') {$arpa=$arpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT51' || $loc4=='BT52') {$ajpa=$ajpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT53') {$aepa=$aepa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT54') {$aupa=$aupa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT60' || $loc4=='BT61') {$acpa=$acpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT62' || $loc4=='BT63' || $loc4=='BT64') {$alpa=$alpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT65' || $loc4=='BT66' || $loc4=='BT67') {$alpa=$alpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT68' || $loc4=='BT69' || $loc4=='BT70') {$aopa=$aopa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT71' || $loc4=='BT76' || $loc4=='BT77') {$aopa=$aopa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT74' || $loc4=='BT75' || $loc4=='BT92' || $loc4=='BT93' || $loc4=='BT94') {$appa=$appa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT78' || $loc4=='BT79') {$aypa=$aypa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT80') {$akpa=$akpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc4=='BT81' || $loc4=='BT82') {$azpa=$azpa+1; $apa=$apa+1; $arrapa[]=$loc;}
elseif ($loc2=='BT') {$agpa=$agpa+1; $apa=$apa+1; $arrapa[]=$loc;}

elseif ($loc3=='B46' || $loc3=='B49' || $loc3=='B50' || $loc3=='B80' || $loc3=='B95') {$kdpa=$kdpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='B47' || $loc3=='B48' || $loc3=='B60' || $loc3=='B61' || $loc3=='B96') {$kfpa=$kfpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='B97' || $loc3=='B98') {$kfpa=$kfpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='B77' || $loc3=='B78' || $loc3=='B79') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc1=='B') {$kepa=$kepa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}

elseif ($loc4=='EC1P' || $loc4=='EC2P' || $loc4=='EC3P' || $loc4=='EC4P' || $loc4=='EC50') {$fbpa=$fbpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='EC1A') {$fbpa=$fbpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='EC1' || $loc4=='EC2A') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='EC') {$fbpa=$fbpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='EH18' || $loc4=='EH19' || $loc4=='EH20' || $loc4=='EH22' || $loc4=='EH23') {$brpa=$brpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH24' || $loc4=='EH25' || $loc4=='EH26' || $loc4=='EH37' || $loc4=='EH38') {$brpa=$brpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH21' || $loc4=='EH31' || $loc4=='EH32' || $loc4=='EH33' || $loc4=='EH34') {$bjpa=$bjpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH35' || $loc4=='EH36' || $loc4=='EH39' || $loc4=='EH40' || $loc4=='EH41') {$bjpa=$bjpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH42') {$bjpa=$bjpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH27' || $loc4=='EH47' || $loc4=='EH48' || $loc4=='EH49' || $loc4=='EH52') {$bffpa=$bffpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH53' || $loc4=='EH54' || $loc4=='EH55') {$bffpa=$bffpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH43' || $loc4=='EH44' || $loc4=='EH45' || $loc4=='EH46') {$bzpa=$bzpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='EH51') {$bmpa=$bmpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='EH') {$blpa=$blpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='EN9') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='EN11' || $loc4=='EN10' || $loc3=='EN8' || $loc3=='EN7' || $loc3=='EN6') {$edpa=$edpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='EN') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='EX23') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='EX') {$jcpa=$jcpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='E5' || $loc2=='E8' || $loc2=='E9' || $loc3=='E10') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc1=='E') {$fbpa=$fbpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='GL') {$jepa=$jepa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='GU13' || $loc4=='GU11' || $loc4=='GU12' || $loc4=='GU14' || $loc4=='GU17') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='GU30' || $loc4=='GU31' || $loc4=='GU32' || $loc4=='GU33' || $loc4=='GU34') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='GU35' || $loc4=='GU46' || $loc4=='GU47' || $loc4=='GU51' || $loc4=='GU52') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='GU28' || $loc4=='GU29') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='GU') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}

elseif ($loc3=='G46' || $loc4=='G76' || $loc4=='G77' || $loc4=='G78') {$bkpa=$bkpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G60' || $loc4=='G81' || $loc4=='G82' || $loc4=='G83') {$beepa=$beepa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G61' || $loc4=='G62' || $loc4=='G64' || $loc4=='G66') {$bipa=$bipa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G63') {$bddpa=$bddpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G65' || $loc4=='G67' || $loc4=='G68' || $loc4=='G70') {$bvpa=$bvpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G71' || $loc4=='G72' || $loc4=='G73' || $loc4=='G74') {$bccpa=$bccpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G75' || $loc4=='G79') {$bccpa=$bccpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='G84') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc1=='G') {$bopa=$bopa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='LA1' || $loc4=='LA2' || $loc4=='LA3' || $loc4=='LA4') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='LA5' || $loc4=='LA6') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='LA') {$hbpa=$hbpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='LD') {$cqpa=$cqpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LE15') {$dfpa=$dfpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='LE') {$dbpa=$dbpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='LL11' || $loc4=='LL12' || $loc4=='LL13' || $loc4=='LL14') {$cvpa=$cvpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL15' || $loc4=='LL16' || $loc4=='LL17' || $loc4=='LL18' || $loc4=='LL19') {$chpa=$chpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL20' || $loc4=='LL21') {$chpa=$chpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL22') {$cgpa=$cgpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL23') {$cjpa=$cjpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL24' || $loc4=='LL25' || $loc4=='LL26' || $loc4=='LL27' || $loc4=='LL28') {$cgpa=$cgpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL29' || $loc4=='LL30' || $loc4=='LL31' || $loc4=='LL32' || $loc4=='LL33') {$cgpa=$cgpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL34') {$cgpa=$cgpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='LL58' || $loc4=='LL59' || $loc3=='LL6' || $loc3=='LL7') {$ckpa=$ckpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc3=='LL3' || $loc3=='LL4' || $loc3=='LL5') {$cjpa=$cjpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc2=='LN') {$dcpa=$dcpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='LS24') {$lcpa=$lcpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='LS') {$lepa=$lepa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='LU') {$eapa=$eapa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc3=='L24') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='L39' || $loc3=='L40') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc1=='L') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='ME') {$igpa=$igpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='MK40' || $loc4=='MK41' || $loc4=='MK42' || $loc4=='MK43' || $loc4=='MK44') {$eapa=$eapa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='MK45') {$eapa=$eapa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='MK') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='ML1' || $loc3=='ML2' || $loc3=='ML4' || $loc3=='ML5' || $loc3=='ML6') {$bvpa=$bvpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='ML7') {$bvpa=$bvpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='ML') {$bccpa=$bccpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc1=='M') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='NE18' || $loc4=='NE19' || $loc4=='NE20' || $loc4=='NE22' || $loc4=='NE23') {$gcpa=$gcpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='NE24' || $loc4=='NE43' || $loc4=='NE44' || $loc4=='NE45' || $loc4=='NE46') {$gcpa=$gcpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='NE47' || $loc4=='NE48' || $loc4=='NE49' || $loc4=='NE61' || $loc4=='NE62') {$gcpa=$gcpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='NE63' || $loc4=='NE64' || $loc4=='NE65' || $loc4=='NE66' || $loc4=='NE67') {$gcpa=$gcpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='NE68' || $loc4=='NE69' || $loc4=='NE70' || $loc4=='NE71') {$gcpa=$gcpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc2=='NE') {$gdpa=$gdpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='NG10' || $loc4=='NG20') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='NG31' || $loc4=='NG32' || $loc4=='NG33' || $loc4=='NG34') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='NG') {$depa=$depa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='NN') {$ddpa=$ddpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc3=='NP4' || $loc4=='NP44') {$ctpa=$ctpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc3=='NP8') {$cqpa=$cqpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='NP11' || $loc4=='NP12') {$ccpa=$ccpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='NP10' || $loc4=='NP18' || $loc4=='NP19' || $loc4=='NP20') {$copa=$copa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='NP13' || $loc4=='NP22' || $loc4=='NP23' || $loc4=='NP24') {$capa=$capa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc2=='NP') {$cmpa=$cmpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='NR32' || $loc4=='NR33' || $loc4=='NR34' || $loc4=='NR35') {$efpa=$efpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='NR') {$eepa=$eepa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc3=='NW6' || $loc4=='NW10') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='NW') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc1=='N') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='SA8' || $loc3=='SA9' || $loc4=='SA10' || $loc4=='SA11' || $loc4=='SA12') {$cnpa=$cnpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA13') {$cnpa=$cnpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA14' || $loc4=='SA15' || $loc4=='SA16' || $loc4=='SA17' || $loc4=='SA18') {$cepa=$cepa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA19' || $loc4=='SA20' || $loc4=='SA31' || $loc4=='SA32' || $loc4=='SA33') {$cepa=$cepa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA34' || $loc4=='SA38' || $loc4=='SA39' || $loc4=='SA40' || $loc4=='SA41') {$cepa=$cepa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA35' || $loc4=='SA36' || $loc4=='SA37' || $loc4=='SA42') {$cppa=$cppa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA43' || $loc4=='SA44' || $loc4=='SA45' || $loc4=='SA46' || $loc4=='SA47') {$cfpa=$cfpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA48') {$cfpa=$cfpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA61' || $loc4=='SA62' || $loc4=='SA63' || $loc4=='SA64' || $loc4=='SA65') {$cppa=$cppa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA66' || $loc4=='SA67' || $loc4=='SA68' || $loc4=='SA69' || $loc4=='SA70') {$cppa=$cppa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SA71' || $loc4=='SA72' || $loc4=='SA73') {$cppa=$cppa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc2=='SA') {$cspa=$cspa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SE11' || $loc4=='SE19' || $loc4=='SE24' || $loc4=='SE25' || $loc4=='SE27') {$fdpa=$fdpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='SE') {$fcpa=$fcpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='SG15' || $loc4=='SG16' || $loc4=='SG17' || $loc4=='SG18' || $loc4=='SG19') {$eapa=$eapa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='SG') {$edpa=$edpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc3=='SK9' || $loc4=='SK10' || $loc4=='SK11' || $loc4=='SK12') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='SK13' || $loc4=='SK17' || $loc4=='SK22' || $loc4=='SK23') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='SK') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='SL3' || $loc3=='SL4' || $loc3=='SL5' || $loc3=='SL6' || $loc3=='SL95') {$iapa=$iapa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='SL') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='SM7') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='SM') {$fdpa=$fdpa+1; $fpa=$fpa+1; $arripa[]=$loc;}
elseif ($loc3=='SN7') {$ihpa=$ihpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='SN') {$jgpa=$jgpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='SO') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='SP6' || $loc4=='SP10' || $loc4=='SP11') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='SP7' || $loc3=='SP8') {$jdpa=$jdpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='SP') {$jgpa=$jgpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc3=='SR7' || $loc3=='SR8') {$gapa=$gapa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc2=='SR') {$gdpa=$gdpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc2=='SS') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='ST') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='SW1A' || $loc4=='SW1E' || $loc4=='SW1H' || $loc4=='SW1P' || $loc4=='SW1V') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='SW1W' || $loc4=='SW1X' || $loc4=='SW1Y') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='SW2' || $loc3=='SW4' || $loc3=='SW8' || $loc3=='SW9') {$fdpa=$fdpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='SW') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='SY14') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='SY15' || $loc4=='SY16' || $loc4=='SY17' || $loc4=='SY18' || $loc4=='SY19') {$cqpa=$cqpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SY20' || $loc4=='SY21' || $loc4=='SY22') {$cqpa=$cqpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='SY23' || $loc4=='SY24' || $loc4=='SY25') {$cfpa=$cfpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc2=='SY') {$kbpa=$kbpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='S18' || $loc3=='S21' || $loc3=='S32' || $loc3=='S33' || $loc3=='S40') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc3=='S41' || $loc3=='S42' || $loc3=='S43' || $loc3=='S44' || $loc3=='S45') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc3=='S49') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc3=='S80' || $loc3=='S81') {$depa=$depa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc1=='S') {$ldpa=$ldpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif (substr($loc,0,5)=='WA3 1' || substr($loc,0,5)=='WA3 2' || substr($loc,0,5)=='WA3 3') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='WA9' || $loc4=='WA10' || $loc4=='WA11' || $loc4=='WA12') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='WA14' || $loc4=='WA15') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='WA') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='WC') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='WD') {$edpa=$edpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='WF') {$lepa=$lepa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc3=='WN8') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='WN') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='WR') {$kfpa=$kfpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='WS6' || $loc3=='WS7' || $loc4=='WS11' || $loc4=='WS12') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='WS13' || $loc4=='WS14' || $loc4=='WS15') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='WS') {$kepa=$kepa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='WV5') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='WV15' || $loc4=='WV16') {$kbpa=$kbpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='WV') {$kepa=$kepa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='W3' || $loc2=='W4' || $loc2=='W5' || $loc2=='W6' || $loc2=='W7') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='W8' || $loc3=='W10' || $loc3=='W11' || $loc3=='W12' || $loc3=='W13') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='W14') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc1=='W') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='AB1' || $loc3=='AB2') {$bapa=$bapa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='AB37' || $loc4=='AB38' || $loc4=='AB55' || $loc4=='AB56') {$bspa=$bspa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='AB') {$bbpa=$bbpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='AL') {$edpa=$edpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='CA') {$hbpa=$hbpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='CB8' || $loc3=='CB9') {$efpa=$efpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='CB10' || $loc4=='CB11') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='CB') {$ebpa=$ebpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='CF31' || $loc4=='CF32' || $loc4=='CF33' || $loc4=='CF34' || $loc4=='CF35') {$cbpa=$cbpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CF36') {$cbpa=$cbpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CF37' || $loc4=='CF38' || $loc4=='CF39' || $loc4=='CF40' || $loc4=='CF41') {$crpa=$crpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CF42' || $loc4=='CF43' || $loc4=='CF44' || $loc4=='CF45' || $loc4=='CF72') {$crpa=$crpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CF46') {$clpa=$clpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CF61' || $loc4=='CF62' || $loc4=='CF63' || $loc4=='CF64' || $loc4=='CF71') {$cupa=$cupa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CF81' || $loc4=='CF82' || $loc4=='CF83') {$ccpa=$ccpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc2=='CF') {$cdpa=$cdpa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc4=='CH25' || $loc4=='CH26' || $loc4=='CH27' || $loc4=='CH28' || $loc4=='CH29') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='CH30' || $loc4=='CH31' || $loc4=='CH32' || $loc4=='CH41' || $loc4=='CH42') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='CH43' || $loc4=='CH44' || $loc4=='CH45' || $loc4=='CH46' || $loc4=='CH47') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='CH48' || $loc4=='CH49' || $loc4=='CH60' || $loc4=='CH61' || $loc4=='CH62') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='CH63') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='CH64' || $loc4=='CH65' || $loc4=='CH66' || $loc4=='CH70' || $loc4=='CH88') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='CH5' || $loc3=='CH6' || $loc3=='CH7' || $loc3=='CH8') {$cipa=$cipa+1; $cpa=$cpa+1; $arrcpa[]=$loc;}
elseif ($loc2=='CH') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='CM21' || $loc4=='CM22' || $loc4=='CM23') {$edpa=$edpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='CM') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='CO') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc3=='CR6') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='CR') {$fdpa=$fdpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='CT') {$igpa=$igpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='CV7' || $loc3=='CV8' || $loc3=='CV9' || $loc4=='CV10' || $loc4=='CV11') {$kdpa=$kdpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='CV12' || $loc4=='CV21' || $loc4=='CV22' || $loc4=='CV23' || $loc4=='CV31') {$kdpa=$kdpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='CV32' || $loc4=='CV33' || $loc4=='CV34' || $loc4=='CV35' || $loc4=='CV36') {$kdpa=$kdpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='CV37' || $loc4=='CV47') {$kdpa=$kdpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='CV13') {$dbpa=$dbpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='CV') {$kepa=$kepa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='CW') {$hapa=$hapa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='DA5' || $loc3=='DA6' || $loc3=='DA7' || $loc3=='DA8' || $loc4=='DA14') {$fcpa=$fcpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='DA15' || $loc4=='DA16' || $loc4=='DA17' || $loc4=='DA18') {$fcpa=$fcpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='DA') {$igpa=$igpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='DD6' || $loc3=='DD7') {$bnpa=$bnpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='DD8' || $loc3=='DD9' || $loc4=='DD10' || $loc4=='DD11') {$bcpa=$bcpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='DD') {$bgpa=$bgpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='DE12' || $loc4=='DE74') {$dbpa=$dbpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='DE14' || $loc4=='DE15') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='DE') {$dapa=$dapa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='DG') {$bfpa=$bfpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='DH4' || $loc3=='DH5') {$gdpa=$gdpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc2=='DH') {$gapa=$gapa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc3=='DL6' || $loc3=='DL7' || $loc3=='DL8' || $loc3=='DL9' || $loc4=='DL10') {$lcpa=$lcpa+1; $lpa=$lpa+1; $arrl[]=$loc;}
elseif ($loc4=='DL11') {$lcpa=$lcpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='DL') {$gapa=$gapa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='DN15' || $loc4=='DN16' || $loc4=='DN17' || $loc4=='DN18' || $loc4=='DN19') {$lbpa=$lbpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc4=='DN20' || $loc4=='DN31' || $loc4=='DN32' || $loc4=='DN33' || $loc4=='DN34') {$lbpa=$lbpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc4=='DN35' || $loc4=='DN37' || $loc4=='DN38' || $loc4=='DN39' || $loc4=='DN40') {$lbpa=$lbpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc4=='DN41') {$lbpa=$lbpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc4=='DN10' || $loc4=='DN11' || $loc4=='DN22') {$depa=$depa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='DN21' || $loc4=='DN36') {$dcpa=$dcpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='DN14') {$lapa=$lapa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='DN') {$ldpa=$ldpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='DT') {$jdpa=$jdpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='DY10' || $loc4=='DY11' || $loc4=='DY12' || $loc4=='DY13') {$kfpa=$kfpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc4=='DY14') {$kbpa=$kbpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='DY7') {$kcpa=$kcpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='DY') {$kepa=$kepa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='FK7' || $loc3=='FK8' || $loc3=='FK9' || $loc4=='FK15' || $loc4=='FK16') {$bddpa=$bddpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='FK17' || $loc4=='FK18' || $loc4=='FK19' || $loc4=='FK20' || $loc4=='FK21') {$bddpa=$bddpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='FK10' || $loc4=='FK11' || $loc4=='FK12' || $loc4=='FK13' || $loc4=='FK14') {$bepa=$bepa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='FK') {$bmpa=$bmpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='FY') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc3=='HA8') {$fapa=$fapa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='HA') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='HD') {$lepa=$lepa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='HG') {$lcpa=$lcpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc3=='HP5' || $loc3=='HP6' || $loc3=='HP7' || $loc3=='HP8' || $loc3=='HP9') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='HP10' || $loc4=='HP11' || $loc4=='HP12' || $loc4=='HP13' || $loc4=='HP14') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='HP15' || $loc4=='HP16' || $loc4=='HP17' || $loc4=='HP18' || $loc4=='HP19') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='HP20' || $loc4=='HP21' || $loc4=='HP22' || $loc4=='HP27') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='HP') {$edpa=$edpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='HR') {$kapa=$kapa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc2=='HS') {$btpa=$btpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='HU') {$lapa=$lapa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='HX') {$lepa=$lepa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc3=='IG7' || $loc3=='IG9' || $loc4=='IG10') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='IG') {$fbpa=$fbpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='IP22' || $loc4=='IP24' || $loc4=='IP25' || $loc4=='IP26') {$eepa=$eepa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='IP') {$efpa=$efpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='IV30' || $loc4=='IV31' || $loc4=='IV32' || $loc4=='IV36') {$bspa=$bspa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='IV') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='KA') {$bhpa=$bhpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc3=='KT7' || $loc3=='KT8' || $loc4=='KT10' || $loc4=='KT11' || $loc4=='KT12') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='KT13' || $loc4=='KT14' || $loc4=='KT15' || $loc4=='KT16' || $loc4=='KT17') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='KT18' || $loc4=='KT19' || $loc4=='KT20' || $loc4=='KT21' || $loc4=='KT22') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='KT23' || $loc4=='KT24') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='KT') {$fdpa=$fdpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='KW15' || $loc4=='KW16' || $loc4=='KW17') {$bwpa=$bwpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='KW') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='KY13') {$bxpa=$bxpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='KY') {$bnpa=$bnpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='OL14') {$lepa=$lepa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='OL') {$hcpa=$hcpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='OX17') {$ddpa=$ddpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='OX') {$ihpa=$ihpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='PA20' || $loc4=='PA21' || $loc4=='PA22' || $loc4=='PA23' || $loc4=='PA24') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA25' || $loc4=='PA26' || $loc4=='PA27' || $loc4=='PA28' || $loc4=='PA29') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA30' || $loc4=='PA31' || $loc4=='PA32' || $loc4=='PA33' || $loc4=='PA34') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA35' || $loc4=='PA36' || $loc4=='PA37' || $loc4=='PA38' || $loc4=='PA41') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA42' || $loc4=='PA43' || $loc4=='PA44' || $loc4=='PA45' || $loc4=='PA46') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA47' || $loc4=='PA48' || $loc4=='PA49' || $loc4=='PA60' || $loc4=='PA61') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA62' || $loc4=='PA63' || $loc4=='PA64' || $loc4=='PA65' || $loc4=='PA66') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA67' || $loc4=='PA68' || $loc4=='PA69' || $loc4=='PA70' || $loc4=='PA71') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA72' || $loc4=='PA73' || $loc4=='PA74' || $loc4=='PA75' || $loc4=='PA76') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA77' || $loc4=='PA78') {$bdpa=$bdpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA13' || $loc4=='PA14' || $loc4=='PA15' || $loc4=='PA16' || $loc4=='PA18') {$bqpa=$bqpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA19') {$bqpa=$bqpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA17') {$bupa=$bupa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PA80') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='PA') {$bypa=$bypa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PE99') {$ebpa=$ebpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc3=='PE6' || $loc3=='PE9' || $loc4=='PE10' || $loc4=='PE11' || $loc4=='PE12') {$dcpa=$dcpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='PE20' || $loc4=='PE21' || $loc4=='PE22' || $loc4=='PE23' || $loc4=='PE24') {$dcpa=$dcpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='PE25') {$dcpa=$dcpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc4=='PE30' || $loc4=='PE31' || $loc4=='PE32' || $loc4=='PE33' || $loc4=='PE34') {$eepa=$eepa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='PE35' || $loc4=='PE36' || $loc4=='PE37' || $loc4=='PE38') {$eepa=$eepa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc3=='PE8') {$ddpa=$ddpa+1; $dpa=$dpa+1; $arrdpa[]=$loc;}
elseif ($loc2=='PE') {$ebpa=$ebpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='PH19' || $loc4=='PH20' || $loc4=='PH21' || $loc4=='PH22' || $loc4=='PH23') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PH24' || $loc4=='PH25' || $loc4=='PH26' || $loc4=='PH30' || $loc4=='PH31') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PH32' || $loc4=='PH33' || $loc4=='PH34' || $loc4=='PH35' || $loc4=='PH36') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PH37' || $loc4=='PH38' || $loc4=='PH39' || $loc4=='PH40' || $loc4=='PH41') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PH42' || $loc4=='PH43' || $loc4=='PH44' || $loc4=='PH49' || $loc4=='PH50') {$bppa=$bppa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='PH') {$bxpa=$bxpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc4=='PL10' || $loc4=='PL11' || $loc4=='PL12' || $loc4=='PL13' || $loc4=='PL14') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='PL15' || $loc4=='PL17' || $loc4=='PL18' || $loc4=='PL22' || $loc4=='PL23') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='PL24' || $loc4=='PL25' || $loc4=='PL26' || $loc4=='PL27' || $loc4=='PL28') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='PL29' || $loc4=='PL30' || $loc4=='PL31' || $loc4=='PL32' || $loc4=='PL33') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='PL34' || $loc4=='PL35') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='PL') {$jcpa=$jcpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='PO30' || $loc4=='PO31' || $loc4=='PO32' || $loc4=='PO33' || $loc4=='PO34') {$ifpa=$ifpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='PO35' || $loc4=='PO36' || $loc4=='PO37' || $loc4=='PO38' || $loc4=='PO39') {$ifpa=$ifpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='PO40' || $loc4=='PO41') {$ifpa=$ifpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='PO18' || $loc4=='PO19' || $loc4=='PO20' || $loc4=='PO21' || $loc4=='PO22') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='PO') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='PR8' || $loc3=='PR9') {$hepa=$hepa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc2=='PR') {$hdpa=$hdpa+1; $hpa=$hpa+1; $arrhpa[]=$loc;}
elseif ($loc4=='RG21' || $loc4=='RG22' || $loc4=='RG23' || $loc4=='RG24' || $loc4=='RG25') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='RG26' || $loc4=='RG29' || $loc4=='RG28' || $loc4=='RG27') {$iepa=$iepa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='RG8' || $loc3=='RG9') {$ihpa=$ihpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='RG') {$iapa=$iapa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='RH10' || $loc4=='RH11' || $loc4=='RH12' || $loc4=='RH13' || $loc4=='RH14') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='RH15' || $loc4=='RH16' || $loc4=='RH17' || $loc4=='RH18' || $loc4=='RH19') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='RH20') {$ijpa=$ijpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='RH') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='RM15' || $loc4=='RM16' || $loc4=='RM17' || $loc4=='RM18' || $loc4=='RM19') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc4=='RM20') {$ecpa=$ecpa+1; $epa=$epa+1; $arrepa[]=$loc;}
elseif ($loc2=='RM') {$fbpa=$fbpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='TA') {$jfpa=$jfpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc4=='TD15') {$gcpa=$gcpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc2=='TD') {$bzpa=$bzpa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='TF') {$kbpa=$kbpa+1; $kpa=$kpa+1; $arrkpa[]=$loc;}
elseif ($loc3=='TN5' || $loc3=='TN6' || $loc3=='TN7' || $loc4=='TN19' || $loc4=='TN20') {$icpa=$icpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='TN21' || $loc4=='TN22' || $loc4=='TN31' || $loc4=='TN32' || $loc4=='TN33') {$icpa=$icpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='TN34' || $loc4=='TN35' || $loc4=='TN36' || $loc4=='TN37' || $loc4=='TN38') {$icpa=$icpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='TN39' || $loc4=='TN40') {$icpa=$icpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='TN14' || $loc4=='TN16') {$fcpa=$fcpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='TN') {$igpa=$igpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='TQ') {$jcpa=$jcpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc2=='TR') {$jbpa=$jbpa+1; $jpa=$jpa+1; $arrjpa[]=$loc;}
elseif ($loc3=='TS2' || $loc4=='TS16' || $loc4=='TS18' || $loc4=='TS19') {$gapa=$gapa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc2=='TS') {$gbpa=$gbpa+1; $gpa=$gpa+1; $arrgpa[]=$loc;}
elseif ($loc4=='TW15' || $loc4=='TW16' || $loc4=='TW17' || $loc4=='TW18' || $loc4=='TW19') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc4=='TW20') {$iipa=$iipa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc3=='TW3' || $loc3=='TW4' || $loc3=='TW5' || $loc3=='TW6' || $loc3=='TW7') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='TW8' || $loc4=='TW13' || $loc4=='TW14') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc2=='TW') {$fdpa=$fdpa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc3=='UB9') {$ibpa=$ibpa+1; $ipa=$ipa+1; $arripa[]=$loc;}
elseif ($loc2=='UB') {$fepa=$fepa+1; $fpa=$fpa+1; $arrfpa[]=$loc;}
elseif ($loc4=='YO15' || $loc4=='YO16' || $loc4=='YO25' || $loc4=='YO41' || $loc4=='YO42') {$lapa=$lapa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc4=='YO43') {$lapa=$lapa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='YO') {$lcpa=$lcpa+1; $lpa=$lpa+1; $arrlpa[]=$loc;}
elseif ($loc2=='ZE') {$baapa=$baapa+1; $bpa=$bpa+1; $arrbpa[]=$loc;}
elseif ($loc2=='GY' || $loc2=='JE') $a3826pa=$a3826pa+1;
elseif ($loc2=='IM') $a4826pa=$a4826pa+1;
else $respa=$respa+1;
}


$salmean=$saltotal/$salcountmean;
$salmean=round($salmean,-2);
$salmean=number_format($salmean);
if ($remainder=='1') $median=$median3a;
elseif ($remainder=='0') $median=($median2a + $median1a) / 2;
$median=round($median,-2);
$median=number_format($median);
$total=$ap+$bp+$cp+$dp+$ep+$fp+$gp+$op+$xp;





switch ($total)
{
case $total>$b:
$pa=number_format((($ap/$total)*100),1);
$pb=number_format((($bp/$total)*100),1);
$pc=number_format((($cp/$total)*100),1);
$pd=number_format((($dp/$total)*100),1);
$pe=number_format((($ep/$total)*100),1);
$pf=number_format((($fp/$total)*100),1);
$pg=number_format((($gp/$total)*100),1);
$po=number_format((($op/$total)*100),1);
$px=number_format((($xp/$total)*100),1);
$positive=number_format(((($ap+$bp+$cp+$dp+$ep)/($ap+$bp+$cp+$dp+$ep+$fp))*100),1);

$totala=$apa+$bpa+$cpa+$dpa+$epa+$fpa+$gpa+$hpa+$ipa+$jpa+$kpa+$lpa;
$pa2=number_format((($apa/$totala)*100),1); $pb2=number_format((($bpa/$totala)*100),1); $pc2=number_format((($cpa/$totala)*100),1);
$pd2=number_format((($dpa/$totala)*100),1); $pe2=number_format((($epa/$totala)*100),1); $pf2=number_format((($fpa/$totala)*100),1);
$pg2=number_format((($gpa/$totala)*100),1); $ph2=number_format((($hpa/$totala)*100),1); $pi2=number_format((($ipa/$totala)*100),1);
$pj2=number_format((($jpa/$totala)*100),1); $pk2=number_format((($kpa/$totala)*100),1); $pl2=number_format((($lpa/$totala)*100),1);

$paa=number_format((($aapa/$totala)*100),1); $pab=number_format((($abpa/$totala)*100),1); $pac=number_format((($acpa/$totala)*100),1);$pad=number_format((($adpa/$totala)*100),1); $pae=number_format((($aepa/$totala)*100),1); $paf=number_format((($afpa/$totala)*100),1);$pag=number_format((($agpa/$totala)*100),1); $pah=number_format((($ahpa/$totala)*100),1); $pai=number_format((($aipa/$totala)*100),1);$paj=number_format((($ajpa/$totala)*100),1); $pak=number_format((($akpa/$totala)*100),1); $pal=number_format((($alpa/$totala)*100),1);
$pam=number_format((($ampa/$totala)*100),1); $pan=number_format((($anpa/$totala)*100),1); $pao=number_format((($aopa/$totala)*100),1);

$pap=number_format((($appa/$totala)*100),1); $paq=number_format((($aqpa/$totala)*100),1); $par=number_format((($arpa/$totala)*100),1);
$pas=number_format((($aspa/$totala)*100),1); $pat=number_format((($atpa/$totala)*100),1); $pau=number_format((($aupa/$totala)*100),1);
$pav=number_format((($avpa/$totala)*100),1); $paw=number_format((($awpa/$totala)*100),1); $pax=number_format((($axpa/$totala)*100),1);
$pay=number_format((($aypa/$totala)*100),1); $paz=number_format((($azpa/$totala)*100),1);

$pba=number_format((($bapa/$totala)*100),1); $pbb=number_format((($bbpa/$totala)*100),1); $pbc=number_format((($bcpa/$totala)*100),1);$pbd=number_format((($bdpa/$totala)*100),1); $pbe=number_format((($bepa/$totala)*100),1); $pbf=number_format((($bfpa/$totala)*100),1);$pbg=number_format((($bgpa/$totala)*100),1); $pbh=number_format((($bhpa/$totala)*100),1); $pbi=number_format((($bipa/$totala)*100),1);$pbj=number_format((($bjpa/$totala)*100),1); $pbk=number_format((($bkpa/$totala)*100),1); $pbl=number_format((($blpa/$totala)*100),1);
$pbm=number_format((($bmpa/$totala)*100),1); $pbn=number_format((($bnpa/$totala)*100),1); $pbo=number_format((($bopa/$totala)*100),1);
$pbp=number_format((($bppa/$totala)*100),1); $pbq=number_format((($bqpa/$totala)*100),1); $pbr=number_format((($brpa/$totala)*100),1);
$pbs=number_format((($bspa/$totala)*100),1); $pbt=number_format((($btpa/$totala)*100),1); $pbu=number_format((($bupa/$totala)*100),1);
$pbv=number_format((($bvpa/$totala)*100),1); $pbw=number_format((($bwpa/$totala)*100),1); $pbx=number_format((($bxpa/$totala)*100),1);
$pby=number_format((($bypa/$totala)*100),1); $pbz=number_format((($bzpa/$totala)*100),1); 
$pbaa=number_format((($baapa/$totala)*100),1); $pbbb=number_format((($bbbpa/$totala)*100),1); 
$pbcc=number_format((($bccpa/$totala)*100),1); $pbdd=number_format((($bddpa/$totala)*100),1); 
$pbee=number_format((($beepa/$totala)*100),1); $pbff=number_format((($bffpa/$totala)*100),1);

$pca=number_format((($capa/$totala)*100),1); $pcb=number_format((($cbpa/$totala)*100),1); $pcc=number_format((($ccpa/$totala)*100),1);$pcd=number_format((($cdpa/$totala)*100),1); $pce=number_format((($cepa/$totala)*100),1); $pcf=number_format((($cfpa/$totala)*100),1);$pcg=number_format((($cgpa/$totala)*100),1); $pch=number_format((($chpa/$totala)*100),1); $pci=number_format((($cipa/$totala)*100),1);$pcj=number_format((($cjpa/$totala)*100),1); $pck=number_format((($ckpa/$totala)*100),1); $pcl=number_format((($clpa/$totala)*100),1);
$pcm=number_format((($cmpa/$totala)*100),1); $pcn=number_format((($cnpa/$totala)*100),1); $pco=number_format((($copa/$totala)*100),1);
$pcp=number_format((($cppa/$totala)*100),1); $pcq=number_format((($cqpa/$totala)*100),1); $pcr=number_format((($crpa/$totala)*100),1);
$pcs=number_format((($cspa/$totala)*100),1); $pct=number_format((($ctpa/$totala)*100),1); $pcu=number_format((($cupa/$totala)*100),1);
$pcv=number_format((($cvpa/$totala)*100),1); 

$pda=number_format((($dapa/$totala)*100),1); $pdb=number_format((($dbpa/$totala)*100),1); $pdc=number_format((($dcpa/$totala)*100),1);$pdd=number_format((($ddpa/$totala)*100),1); $pde=number_format((($depa/$totala)*100),1); $pdf=number_format((($dfpa/$totala)*100),1);

$pea=number_format((($eapa/$totala)*100),1); $peb=number_format((($ebpa/$totala)*100),1); $pec=number_format((($ecpa/$totala)*100),1);$ped=number_format((($edpa/$totala)*100),1); $pee=number_format((($eepa/$totala)*100),1); $pef=number_format((($efpa/$totala)*100),1);

$pfa=number_format((($fapa/$totala)*100),1); $pfb=number_format((($fbpa/$totala)*100),1); $pfc=number_format((($fcpa/$totala)*100),1);$pfd=number_format((($fdpa/$totala)*100),1); $pfe=number_format((($fepa/$totala)*100),1); 

$pga=number_format((($gapa/$totala)*100),1); $pgb=number_format((($gbpa/$totala)*100),1); $pgc=number_format((($gcpa/$totala)*100),1);$pgd=number_format((($gdpa/$totala)*100),1); $pge=number_format((($gepa/$totala)*100),1); 

$pha=number_format((($hapa/$totala)*100),1); $phb=number_format((($hbpa/$totala)*100),1); $phc=number_format((($hcpa/$totala)*100),1);$phd=number_format((($hdpa/$totala)*100),1); $phe=number_format((($hepa/$totala)*100),1); 

$pia=number_format((($iapa/$totala)*100),1); $pib=number_format((($ibpa/$totala)*100),1); $pic=number_format((($icpa/$totala)*100),1);$pid=number_format((($idpa/$totala)*100),1); $pie=number_format((($iepa/$totala)*100),1); $pif=number_format((($ifpa/$totala)*100),1);$pig=number_format((($igpa/$totala)*100),1); $pih=number_format((($ihpa/$totala)*100),1); $pii=number_format((($iipa/$totala)*100),1);$pij=number_format((($ijpa/$totala)*100),1);

$pja=number_format((($japa/$totala)*100),1); $pjb=number_format((($jbpa/$totala)*100),1); $pjc=number_format((($jcpa/$totala)*100),1);$pjd=number_format((($jdpa/$totala)*100),1); $pje=number_format((($jepa/$totala)*100),1); $pjf=number_format((($jfpa/$totala)*100),1);$pjg=number_format((($jgpa/$totala)*100),1);

$pka=number_format((($kapa/$totala)*100),1); $pkb=number_format((($kbpa/$totala)*100),1); $pkc=number_format((($kcpa/$totala)*100),1);$pkd=number_format((($kdpa/$totala)*100),1); $pke=number_format((($kepa/$totala)*100),1); $pkf=number_format((($kfpa/$totala)*100),1);

$pla=number_format((($lapa/$totala)*100),1); $plb=number_format((($lbpa/$totala)*100),1); $plc=number_format((($lcpa/$totala)*100),1);$pld=number_format((($ldpa/$totala)*100),1); $ple=number_format((($lepa/$totala)*100),1);

echo htmlentities('<CD>');
echo "<br />";
$schoola=str_replace("&","and",$school);
echo htmlentities('<Name>'.$schoola.'</Name>');
echo "<br />";
echo htmlentities('<COURSE>'.$schoola.'</COURSE>');
echo "<br />";
echo htmlentities('<Fulla>'.$ap.'</Fulla>');
echo "<br />";
echo htmlentities('<Fullb>'.$pa.'%</Fullb>');
echo "<br />";
echo htmlentities('<Parta>'.$bp.'</Parta>');
echo "<br />";
echo htmlentities('<Partb>'.$pb.'%</Partb>');
echo "<br />";
echo htmlentities('<Unpaida>'.$cp.'</Unpaida>');
echo "<br />";
echo htmlentities('<Unpaidb>'.$pc.'%</Unpaidb>');
echo "<br />";
echo htmlentities('<Worka>'.$dp.'</Worka>');
echo "<br />";
echo htmlentities('<Workb>'.$pd.'%</Workb>');
echo "<br />";
echo htmlentities('<Studya>'.$ep.'</Studya>');
echo "<br />";
echo htmlentities('<Studyb>'.$pe.'%</Studyb>');
echo "<br />";
echo htmlentities('<Assumeda>'.$fp.'</Assumeda>');
echo "<br />";
echo htmlentities('<Assumedb>'.$pf.'%</Assumedb>');
echo "<br />";
echo htmlentities('<Nota>'.$gp.'</Nota>');
echo "<br />";
echo htmlentities('<Notb>'.$pg.'%</Notb>');
echo "<br />";
echo htmlentities('<Othera>'.$op.'</Othera>');
echo "<br />";
echo htmlentities('<Otherb>'.$po.'%</Otherb>');
echo "<br />";
echo htmlentities('<Refusea>'.$xp.'</Refusea>');
echo "<br />";
echo htmlentities('<Refuseb>'.$px.'%</Refuseb>');
echo "<br />";
echo htmlentities('<Positive>'.$positive.'%</Positive>');
echo "<br />";
if ($c=='1') echo htmlentities('<Salary>£'.$salmean.'</Salary>');
elseif ($c=='2') echo htmlentities('<Salary>£'.$median.'</Salary>');
else echo htmlentities('<Salary>Empty</Salary>');
echo "<br />";

switch ($f)
{
case $f=='2':

switch ($d)
{
case $d!='3':
if ($a=='2') $union=") UNION ALL (select JOBTITLE, SOCDLHE from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." like '".$school."' and JOBTITLE <> 'XXXX' and JOBTITLE <> ''";
elseif ($a=='3') $union=") UNION ALL (select JOBTITLE, SOCDLHE from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." like '".$school."' and JOBTITLE <> 'XXXX' and JOBTITLE <> '') UNION ALL (select JOBTITLE, SOCDLHE from extract89 inner join popdlhe89 on extract89.HUSIDa = popdlhe89.HUSID where ".$low." like '".$school."' and JOBTITLE <> 'XXXX' and JOBTITLE <> ''";
else $union="";
echo htmlentities('<Job>');
$joina="(select JOBTITLE, SOCDLHE from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$low." like '".$school."' and JOBTITLE <> 'XXXX' and JOBTITLE <> ''".$union.") order by SOCDLHE";
$resulta = mysql_query($joina);
$countjob=0;
while($row = mysql_fetch_array($resulta))
 {
$job=$row["JOBTITLE"];
$soc=$row["SOCDLHE"];
$soc4=substr($soc,0,4);
$soc3=substr($soc,0,3);
$soc2=substr($soc,0,2);
$soc1=substr($soc,0,1);
$countjob=$countjob+1;
if ($d=='2' && ($soc3=='111' || $soc3=='112' || $soc3=='113' || $soc3=='114' || $soc3=='115' || $soc4=='1162' || $soc4=='1163' || $soc4=='1171' || $soc4=='1172' || $soc4=='1173' || $soc3=='118' || $soc4=='1211' || $soc4=='1212' || $soc4=='1221' || $soc4=='1222' || $soc4=='1224' || $soc4=='1225' || $soc4=='1226' || $soc4=='1231' || $soc4=='1235' || $soc4=='1239' || $soc1=='2' || $soc4=='3111' || $soc4=='3113' || $soc4=='3114' || $soc4=='3115' || $soc4=='3119' || $soc4=='3121' || $soc4=='3123' || $soc4=='3132' || $soc4=='3211' || $soc4=='3212' || $soc4=='3214' || $soc4=='3215' || $soc4=='3218' || $soc3=='322' || $soc3=='323' || $soc4=='3312' || $soc4=='3319' || $soc3=='341' || $soc3=='342' || $soc3=='343' || $soc4=='3442' || $soc4=='3449' || $soc4=='3512' || $soc4=='3520' || $soc3=='353' || $soc3=='354' || $soc3=='355' || $soc3=='356' || $soc4=='4111' || $soc4=='4114' || $soc4=='4137' || $soc4=='5245' || $soc4=='5414'))
{
echo htmlentities($job);
echo "qqq";
}
else echo "";
if ($d=='1') 
{
echo htmlentities($job);
echo "qqq";
}
else echo "";
}
echo htmlentities('</Job>');
echo "<br />";
break;
default:
echo "";
}

switch ($e)
{
case $e!='4':
if ($a=='2') $union=") UNION ALL (select EMPNAME, SIC2007, EMPSIZE, SOCDLHE from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." like '".$school."' and EMPNAME <> 'XXXX' and EMPNAME <> ''";
elseif ($a=='3') $union=") UNION ALL (select EMPNAME, SIC2007, EMPSIZE, SOCDLHE from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." like '".$school."' and EMPNAME <> 'XXXX' and EMPNAME <> '') UNION ALL (select EMPNAME, SIC2007, EMPSIZE, SOCDLHE from extract89 inner join popdlhe89 on extract89.HUSIDa = popdlhe89.HUSID where ".$low." like '".$school."' and EMPNAME <> 'XXXX' and EMPNAME <> ''";
else $union="";
$joina="(select EMPNAME, SIC2007, EMPSIZE, SOCDLHE from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$low." like '".$school."' and EMPNAME <> 'XXXX' and EMPNAME <> ''".$union.") order by SIC2007, EMPSIZE, EMPNAME";
$resulta = mysql_query($joina);
$countemp=0;
echo htmlentities('<Emp>');
while($row = mysql_fetch_array($resulta))
 {
$emp=$row["EMPNAME"];
$sic=$row["SIC2007"];
$size=$row["EMPSIZE"];
$soc=$row["SOCDLHE"];
$soc4=substr($soc,0,4);
$soc3=substr($soc,0,3);
$soc2=substr($soc,0,2);
$soc1=substr($soc,0,1);
$countemp=$countemp+1;

if (($e=='3' && $size!='3') || ($e=='2' && ($size!='2' && $size!='3')))
{

if ($sic<'170') $emp="Crop and animal production";
elseif ($sic<'200') $emp="Hunting, trapping and related activities";
elseif ($sic<'300') $emp="Forestry and logging";
elseif ($sic=='300') $emp="Fishing and aquaculture";
elseif ($sic<'320') $emp="Fishing";
elseif ($sic<'330') $emp="Aquaculture";
elseif ($sic<'600') $emp="Mining of coal and lignite";
elseif ($sic=='600') $emp="Extraction of crude petroleum and natural gas";
elseif ($sic<'620') $emp="Extraction of crude petroleum";
elseif ($sic<'630') $emp="Extraction of natural gas";
elseif ($sic<'800') $emp="Mining of metal ores";
elseif ($sic<'900') $emp="Other mining and quarrying";
elseif ($sic<'1000') $emp="Mining support service activities";
elseif ($sic<'1100') $emp="Manufacture of food products";
elseif ($sic<'1200') $emp="Manufacture of beverages";
elseif ($sic<'1300') $emp="Manufacture of tobacco products";
elseif ($sic<'1400') $emp="Manufacture of textiles";
elseif ($sic<'1500') $emp="Manufacture of wearing apparel";
elseif ($sic<'1600') $emp="Manufacture of leather and related products";
elseif ($sic<'1700') $emp="Manufacture of products made from wood";
elseif ($sic<'1800') $emp="Manufacture of paper and paper products";
elseif ($sic=='1800') $emp="Printing and reproduction of recorded media";
elseif ($sic<'1820') $emp="Printing";
elseif ($sic<'1900') $emp="Reproduction of recorded media";
elseif ($sic<'2000') $emp="Manufacture of coke and refined petroleum products";
elseif ($sic<'2100') $emp="Manufacture of chemicals and chemical products";
elseif ($sic<'2200') $emp="Manufacture of pharmaceuticals";
elseif ($sic<'2300') $emp="Manufacture of rubber and plastic products";
elseif ($sic<'2400') $emp="Manufacture of non-metallic mineral products";
elseif ($sic<'2600') $emp="Manufacture of metals and metal products";
elseif ($sic<'2700') $emp="Manufacture of computer, electronic and optical products";
elseif ($sic<'2800') $emp="Manufacture of electrical equipment";
elseif ($sic<'2900') $emp="Manufacture of other machinery and equipment";
elseif ($sic<'3000') $emp="Manufacture of motor vehicles";
elseif ($sic=='3000') $emp="Manufacture of other transport equipment";
elseif ($sic<'3020') $emp="Building of ships and boats";
elseif ($sic<'3030') $emp="Manufacture of railway locomotives";
elseif ($sic<'3040') $emp="Manufacture of air and spacecraft";
elseif ($sic<'3090') $emp="Manufacture of military vehicles";
elseif ($sic<'3100') $emp="Manufacture of other transport equipment";
elseif ($sic<'3200') $emp="Manufacture of furniture";
elseif ($sic=='3200') $emp="Other manufacturing";
elseif ($sic<'3220') $emp="Manufacture of jewellery";
elseif ($sic<'3230') $emp="Manufacture of musical instruments";
elseif ($sic<'3230') $emp="Manufacture of sports goods";
elseif ($sic<'3240') $emp="Manufacture of games and toys";
elseif ($sic<'3290') $emp="Manufacture of medical and dental instruments";
elseif ($sic<'3300') $emp="ther manufacturing";
elseif ($sic=='3300') $emp="Repair and installation of machinery and equipment";
elseif ($sic<'3320') $emp="Repair of machinery and equipment";
elseif ($sic<'3330') $emp="Installation of machinery and equipment";
elseif ($sic=='3500') $emp="Electricity, gas, steam and air conditioning supply";
elseif ($sic<'3520') $emp="Electric power generation, transmission and distribution";
elseif ($sic<'3530') $emp="Manufacture of gas; distribution of gaseous fuels";
elseif ($sic<'3600') $emp="Steam and air conditioning supply";
elseif ($sic<'3700') $emp="Water collection, treatment and supply";
elseif ($sic<'3800') $emp="Sewerage";
elseif ($sic<'3900') $emp="Waste collection, treatment and disposal";
elseif ($sic<'4100') $emp="Remediation activities";
elseif ($sic<'4200') $emp="Construction of buildings";
elseif ($sic<'4300') $emp="Civil engineering";
elseif ($sic<'4400') $emp="Specialised construction activities";
elseif ($sic<'4600') $emp="Sale, trade and repair of motor vehicles";
elseif ($sic<'4700') $emp="Wholesale trade";
elseif ($sic<'4900') $emp="Retail trade";
elseif ($sic<'5000') $emp="Land transport";
elseif ($sic<'5100') $emp="Water transport";
elseif ($sic<'5200') $emp="Air transport";
elseif ($sic<'5300') $emp="Warehousing and support activities for transportation";
elseif ($sic<'5500') $emp="Postal and courier activities";
elseif ($sic<'5600') $emp="Accommodation";
elseif ($sic<'5800') $emp="Food and beverage service activities";
elseif ($sic=='5800') $emp="Publishing activities";
elseif ($sic<'5820') $emp="Publishing of books, periodicals and related";
elseif ($sic<'5900') $emp="Software publishing";
elseif ($sic=='5900') $emp="Media production activities";
elseif ($sic<'5920') $emp="Motion picture, video and television programme activities";
elseif ($sic<'6000') $emp="Sound recording and music publishing";
elseif ($sic=='6000') $emp="Programming and broadcasting";
elseif ($sic<'6020') $emp="Radio broadcasting";
elseif ($sic<'6100') $emp="Television programming and broadcasting";
elseif ($sic<'6200') $emp="Telecommunications";
elseif ($sic<'6300') $emp="Computer programming";
elseif ($sic<'6400') $emp="Information services";
elseif ($sic<'6500') $emp="Financial services";
elseif ($sic<'6600') $emp="Insurance and pension funding";
elseif ($sic<'6800') $emp="Other financial and insurance activities";
elseif ($sic<'6900') $emp="Real estate";
elseif ($sic=='6900') $emp="Legal and accounting";
elseif ($sic<'6920') $emp="Legal";
elseif ($sic<'7000') $emp="Accountancy";
elseif ($sic<'7100') $emp="Management consultancy";
elseif ($sic=='7100') $emp="Architectural and engineering";
elseif ($sic<'7112') $emp="Architectural";
elseif ($sic<'7120') $emp="Engineering design and consultancy";
elseif ($sic<'7200') $emp="Technical testing";
elseif ($sic<'7300') $emp="Scientific research and development";
elseif ($sic<'7400') $emp="Advertising and market research";
elseif ($sic<'7500') $emp="Other professional, scientific and technical activities";
elseif ($sic<'7700') $emp="Veterinary";
elseif ($sic<'7800') $emp="Rental and leasing";
elseif ($sic<'7900') $emp="Employment and human resources";
elseif ($sic<'8000') $emp="Travel agency";
elseif ($sic<'8100') $emp="Security and investigation";
elseif ($sic<'8200') $emp="Services to buildings and landscape activities";
elseif ($sic<'8400') $emp="Business support services";
elseif ($sic<'8500') $emp="Public administration and service";
elseif ($sic=='8500') $emp="Education";
elseif ($sic<'8520') $emp="Pre-primary education";
elseif ($sic<'8530') $emp="Primary education";
elseif ($sic<'8540') $emp="Secondary education";
elseif ($sic<'8550') $emp="Higher education";
elseif ($sic<'8560') $emp="Other education";
elseif ($sic<'8600') $emp="Educational support activities";
elseif ($sic=='8600') $emp="Health activities";
elseif ($sic<'8620') $emp="Hospital activities";
elseif ($sic<'8690') $emp="Medical and dental practice activities";
elseif ($sic<'8700') $emp="Other health activities";
elseif ($sic<'8800') $emp="Residential care activities";
elseif ($sic<'9000') $emp="Social work";
elseif ($sic<'9100') $emp="Creative arts and entertainment";
elseif ($sic<'9200') $emp="Libraries and museums";
elseif ($sic<'9300') $emp="Gambling and betting";
elseif ($sic=='9300') $emp="Sports and recreation";
elseif ($sic<'9320') $emp="Sports activities";
elseif ($sic<'9400') $emp="Amusement and recreation";
elseif ($sic<'9700') $emp="Other services";
elseif ($sic<'9999') $emp="Other";
else echo "";
}
if ($d=='2' && ($soc3=='111' || $soc3=='112' || $soc3=='113' || $soc3=='114' || $soc3=='115' || $soc4=='1162' || $soc4=='1163' || $soc4=='1171' || $soc4=='1172' || $soc4=='1173' || $soc3=='118' || $soc4=='1211' || $soc4=='1212' || $soc4=='1221' || $soc4=='1222' || $soc4=='1224' || $soc4=='1225' || $soc4=='1226' || $soc4=='1231' || $soc4=='1235' || $soc4=='1239' || $soc1=='2' || $soc4=='3111' || $soc4=='3113' || $soc4=='3114' || $soc4=='3115' || $soc4=='3119' || $soc4=='3121' || $soc4=='3123' || $soc4=='3132' || $soc4=='3211' || $soc4=='3212' || $soc4=='3214' || $soc4=='3215' || $soc4=='3218' || $soc3=='322' || $soc3=='323' || $soc4=='3312' || $soc4=='3319' || $soc3=='341' || $soc3=='342' || $soc3=='343' || $soc4=='3442' || $soc4=='3449' || $soc4=='3512' || $soc4=='3520' || $soc3=='353' || $soc3=='354' || $soc3=='355' || $soc3=='356' || $soc4=='4111' || $soc4=='4114' || $soc4=='4137' || $soc4=='5245' || $soc4=='5414'))
{
$emp=str_replace("&","and",$emp);
echo htmlentities($emp);
echo "qqq";
}

else echo "";
if ($d=='1') 
{
$emp=str_replace("&","and",$emp);
echo htmlentities($emp);
echo "qqq";
}
else echo "";
}
echo htmlentities('</Emp>');
echo "<br />";
break;
default:
echo "";
}


break;
case $f=='1':


if ($a=='2') $union=") UNION ALL (select JOBTITLE, SOCDLHE, EMPNAME, SIC2007, EMPSIZE from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." like '".$school."' and JOBTITLE <> 'XXXX' and JOBTITLE <> '' and EMPNAME <> 'XXXX' and EMPNAME <> ''";
elseif ($a=='3') $union=") UNION ALL (select JOBTITLE, SOCDLHE, EMPNAME, SIC2007, EMPSIZE from extract910 inner join popdlhe910 on extract910.HUSIDa = popdlhe910.HUSID where ".$low." like '".$school."' and JOBTITLE <> 'XXXX' and JOBTITLE <> '' and EMPNAME <> 'XXXX' and EMPNAME <> '') UNION ALL (select JOBTITLE, SOCDLHE, EMPNAME, SIC2007, EMPSIZE from extract89 inner join popdlhe89 on extract89.HUSIDa = popdlhe89.HUSID where ".$low." like '".$school."' and JOBTITLE <> 'XXXX' and JOBTITLE <> '' and EMPNAME <> 'XXXX' and EMPNAME <> ''";
else $union="";
$joina="(select JOBTITLE, SOCDLHE, EMPNAME, SIC2007, EMPSIZE from extract1011 inner join popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID where ".$low." like '".$school."' and JOBTITLE <> 'XXXX' and JOBTITLE <> '' and EMPNAME <> 'XXXX' and EMPNAME <> ''".$union.") order by SOCDLHE";
$resulta = mysql_query($joina);
$countjob=0;
echo htmlentities('<Job>');
while($row = mysql_fetch_array($resulta))
 {
$job=$row["JOBTITLE"];
$soc=$row["SOCDLHE"];
$emp=$row["EMPNAME"];
$sic=$row["SIC2007"];
$size=$row["EMPSIZE"];
$soc4=substr($soc,0,4);
$soc3=substr($soc,0,3);
$soc2=substr($soc,0,2);
$soc1=substr($soc,0,1);
$countjob=$countjob+1;


if (($e=='3' && $size!='3') || ($e=='2' && ($size!='2' && $size!='3')))
{

if ($sic<'170') $emp="Crop and animal production";
elseif ($sic<'200') $emp="Hunting, trapping and related activities";
elseif ($sic<'300') $emp="Forestry and logging";
elseif ($sic=='300') $emp="Fishing and aquaculture";
elseif ($sic<'320') $emp="Fishing";
elseif ($sic<'330') $emp="Aquaculture";
elseif ($sic<'600') $emp="Mining of coal and lignite";
elseif ($sic=='600') $emp="Extraction of crude petroleum and natural gas";
elseif ($sic<'620') $emp="Extraction of crude petroleum";
elseif ($sic<'630') $emp="Extraction of natural gas";
elseif ($sic<'800') $emp="Mining of metal ores";
elseif ($sic<'900') $emp="Other mining and quarrying";
elseif ($sic<'1000') $emp="Mining support service activities";
elseif ($sic<'1100') $emp="Manufacture of food products";
elseif ($sic<'1200') $emp="Manufacture of beverages";
elseif ($sic<'1300') $emp="Manufacture of tobacco products";
elseif ($sic<'1400') $emp="Manufacture of textiles";
elseif ($sic<'1500') $emp="Manufacture of wearing apparel";
elseif ($sic<'1600') $emp="Manufacture of leather and related products";
elseif ($sic<'1700') $emp="Manufacture of products made from wood";
elseif ($sic<'1800') $emp="Manufacture of paper and paper products";
elseif ($sic=='1800') $emp="Printing and reproduction of recorded media";
elseif ($sic<'1820') $emp="Printing";
elseif ($sic<'1900') $emp="Reproduction of recorded media";
elseif ($sic<'2000') $emp="Manufacture of coke and refined petroleum products";
elseif ($sic<'2100') $emp="Manufacture of chemicals and chemical products";
elseif ($sic<'2200') $emp="Manufacture of pharmaceuticals";
elseif ($sic<'2300') $emp="Manufacture of rubber and plastic products";
elseif ($sic<'2400') $emp="Manufacture of non-metallic mineral products";
elseif ($sic<'2600') $emp="Manufacture of metals and metal products";
elseif ($sic<'2700') $emp="Manufacture of computer, electronic and optical products";
elseif ($sic<'2800') $emp="Manufacture of electrical equipment";
elseif ($sic<'2900') $emp="Manufacture of other machinery and equipment";
elseif ($sic<'3000') $emp="Manufacture of motor vehicles";
elseif ($sic=='3000') $emp="Manufacture of other transport equipment";
elseif ($sic<'3020') $emp="Building of ships and boats";
elseif ($sic<'3030') $emp="Manufacture of railway locomotives";
elseif ($sic<'3040') $emp="Manufacture of air and spacecraft";
elseif ($sic<'3090') $emp="Manufacture of military vehicles";
elseif ($sic<'3100') $emp="Manufacture of other transport equipment";
elseif ($sic<'3200') $emp="Manufacture of furniture";
elseif ($sic=='3200') $emp="Other manufacturing";
elseif ($sic<'3220') $emp="Manufacture of jewellery";
elseif ($sic<'3230') $emp="Manufacture of musical instruments";
elseif ($sic<'3230') $emp="Manufacture of sports goods";
elseif ($sic<'3240') $emp="Manufacture of games and toys";
elseif ($sic<'3290') $emp="Manufacture of medical and dental instruments";
elseif ($sic<'3300') $emp="ther manufacturing";
elseif ($sic=='3300') $emp="Repair and installation of machinery and equipment";
elseif ($sic<'3320') $emp="Repair of machinery and equipment";
elseif ($sic<'3330') $emp="Installation of machinery and equipment";
elseif ($sic=='3500') $emp="Electricity, gas, steam and air conditioning supply";
elseif ($sic<'3520') $emp="Electric power generation, transmission and distribution";
elseif ($sic<'3530') $emp="Manufacture of gas; distribution of gaseous fuels";
elseif ($sic<'3600') $emp="Steam and air conditioning supply";
elseif ($sic<'3700') $emp="Water collection, treatment and supply";
elseif ($sic<'3800') $emp="Sewerage";
elseif ($sic<'3900') $emp="Waste collection, treatment and disposal";
elseif ($sic<'4100') $emp="Remediation activities";
elseif ($sic<'4200') $emp="Construction of buildings";
elseif ($sic<'4300') $emp="Civil engineering";
elseif ($sic<'4400') $emp="Specialised construction activities";
elseif ($sic<'4600') $emp="Sale, trade and repair of motor vehicles";
elseif ($sic<'4700') $emp="Wholesale trade";
elseif ($sic<'4900') $emp="Retail trade";
elseif ($sic<'5000') $emp="Land transport";
elseif ($sic<'5100') $emp="Water transport";
elseif ($sic<'5200') $emp="Air transport";
elseif ($sic<'5300') $emp="Warehousing and support activities for transportation";
elseif ($sic<'5500') $emp="Postal and courier activities";
elseif ($sic<'5600') $emp="Accommodation";
elseif ($sic<'5800') $emp="Food and beverage service activities";
elseif ($sic=='5800') $emp="Publishing activities";
elseif ($sic<'5820') $emp="Publishing of books, periodicals and related";
elseif ($sic<'5900') $emp="Software publishing";
elseif ($sic=='5900') $emp="Media production activities";
elseif ($sic<'5920') $emp="Motion picture, video and television programme activities";
elseif ($sic<'6000') $emp="Sound recording and music publishing";
elseif ($sic=='6000') $emp="Programming and broadcasting";
elseif ($sic<'6020') $emp="Radio broadcasting";
elseif ($sic<'6100') $emp="Television programming and broadcasting";
elseif ($sic<'6200') $emp="Telecommunications";
elseif ($sic<'6300') $emp="Computer programming";
elseif ($sic<'6400') $emp="Information services";
elseif ($sic<'6500') $emp="Financial services";
elseif ($sic<'6600') $emp="Insurance and pension funding";
elseif ($sic<'6800') $emp="Other financial and insurance activities";
elseif ($sic<'6900') $emp="Real estate";
elseif ($sic=='6900') $emp="Legal and accounting";
elseif ($sic<'6920') $emp="Legal";
elseif ($sic<'7000') $emp="Accountancy";
elseif ($sic<'7100') $emp="Management consultancy";
elseif ($sic=='7100') $emp="Architectural and engineering";
elseif ($sic<'7112') $emp="Architectural";
elseif ($sic<'7120') $emp="Engineering design and consultancy";
elseif ($sic<'7200') $emp="Technical testing";
elseif ($sic<'7300') $emp="Scientific research and development";
elseif ($sic<'7400') $emp="Advertising and market research";
elseif ($sic<'7500') $emp="Other professional, scientific and technical activities";
elseif ($sic<'7700') $emp="Veterinary";
elseif ($sic<'7800') $emp="Rental and leasing";
elseif ($sic<'7900') $emp="Employment and human resources";
elseif ($sic<'8000') $emp="Travel agency";
elseif ($sic<'8100') $emp="Security and investigation";
elseif ($sic<'8200') $emp="Services to buildings and landscape activities";
elseif ($sic<'8400') $emp="Business support services";
elseif ($sic<'8500') $emp="Public administration and service";
elseif ($sic=='8500') $emp="Education";
elseif ($sic<'8520') $emp="Pre-primary education";
elseif ($sic<'8530') $emp="Primary education";
elseif ($sic<'8540') $emp="Secondary education";
elseif ($sic<'8550') $emp="Higher education";
elseif ($sic<'8560') $emp="Other education";
elseif ($sic<'8600') $emp="Educational support activities";
elseif ($sic=='8600') $emp="Health activities";
elseif ($sic<'8620') $emp="Hospital activities";
elseif ($sic<'8690') $emp="Medical and dental practice activities";
elseif ($sic<'8700') $emp="Other health activities";
elseif ($sic<'8800') $emp="Residential care activities";
elseif ($sic<'9000') $emp="Social work";
elseif ($sic<'9100') $emp="Creative arts and entertainment";
elseif ($sic<'9200') $emp="Libraries and museums";
elseif ($sic<'9300') $emp="Gambling and betting";
elseif ($sic=='9300') $emp="Sports and recreation";
elseif ($sic<'9320') $emp="Sports activities";
elseif ($sic<'9400') $emp="Amusement and recreation";
elseif ($sic<'9700') $emp="Other services";
elseif ($sic<'9999') $emp="Other";
else echo "";
}
if ($d=='2' && ($soc3=='111' || $soc3=='112' || $soc3=='113' || $soc3=='114' || $soc3=='115' || $soc4=='1162' || $soc4=='1163' || $soc4=='1171' || $soc4=='1172' || $soc4=='1173' || $soc3=='118' || $soc4=='1211' || $soc4=='1212' || $soc4=='1221' || $soc4=='1222' || $soc4=='1224' || $soc4=='1225' || $soc4=='1226' || $soc4=='1231' || $soc4=='1235' || $soc4=='1239' || $soc1=='2' || $soc4=='3111' || $soc4=='3113' || $soc4=='3114' || $soc4=='3115' || $soc4=='3119' || $soc4=='3121' || $soc4=='3123' || $soc4=='3132' || $soc4=='3211' || $soc4=='3212' || $soc4=='3214' || $soc4=='3215' || $soc4=='3218' || $soc3=='322' || $soc3=='323' || $soc4=='3312' || $soc4=='3319' || $soc3=='341' || $soc3=='342' || $soc3=='343' || $soc4=='3442' || $soc4=='3449' || $soc4=='3512' || $soc4=='3520' || $soc3=='353' || $soc3=='354' || $soc3=='355' || $soc3=='356' || $soc4=='4111' || $soc4=='4114' || $soc4=='4137' || $soc4=='5245' || $soc4=='5414'))
{
$job=str_replace("&","and",$job);
echo htmlentities($job);
echo "qqq";
$emp=str_replace("&","and",$emp);
echo htmlentities($emp);
echo "qqq";
}

else echo "";
if ($d=='1') 
{
$job=str_replace("&","and",$job);
echo htmlentities($job);
echo "qqq";
$emp=str_replace("&","and",$emp);
echo htmlentities($emp);
echo "qqq";
}
else echo "";
}
echo htmlentities('</Job>');
echo "<br />";
echo htmlentities('<Emp>Empty</Emp>');
echo "<br />";
break;
default:
echo "";
}



if ($g=='1') {
echo htmlentities('<NIreland>'.$apa.'</NIreland>');
echo "<br />";
echo htmlentities('<NIrelandp>'.$pa2.'%</NIrelandp>');
echo "<br />";
echo htmlentities('<Scotland>'.$bpa.'</Scotland>');
echo "<br />";
echo htmlentities('<Scotlandp>'.$pb2.'%</Scotlandp>');
echo "<br />";
echo htmlentities('<Wales>'.$cpa.'</Wales>');
echo "<br />";
echo htmlentities('<Walesp>'.$pc2.'%</Walesp>');
echo "<br />";
echo htmlentities('<EastMid>'.$dpa.'</EastMid>');
echo "<br />";
echo htmlentities('<EastMidp>'.$pd2.'%</EastMidp>');
echo "<br />";
echo htmlentities('<East>'.$epa.'</East>');
echo "<br />";
echo htmlentities('<Eastp>'.$pe2.'%</Eastp>');
echo "<br />";
echo htmlentities('<London>'.$fpa.'</London>');
echo "<br />";
echo htmlentities('<Londonp>'.$pf2.'%</Londonp>');
echo "<br />";
echo htmlentities('<NorthEast>'.$gpa.'</NorthEast>');
echo "<br />";
echo htmlentities('<NorthEastp>'.$pg2.'%</NorthEastp>');
echo "<br />";
echo htmlentities('<NorthWest>'.$hpa.'</NorthWest>');
echo "<br />";
echo htmlentities('<NorthWestp>'.$ph2.'%</NorthWestp>');
echo "<br />";
echo htmlentities('<SouthEast>'.$ipa.'</SouthEast>');
echo "<br />";
echo htmlentities('<SouthEastp>'.$pi2.'%</SouthEastp>');
echo "<br />";
echo htmlentities('<SouthWest>'.$jpa.'</SouthWest>');
echo "<br />";
echo htmlentities('<SouthWestp>'.$pj2.'%</SouthWestp>');
echo "<br />";
echo htmlentities('<WestMid>'.$kpa.'</WestMid>');
echo "<br />";
echo htmlentities('<WestMidp>'.$pk2.'%</WestMidp>');
echo "<br />";
echo htmlentities('<Yorkshire>'.$lpa.'</Yorkshire>');
echo "<br />";
echo htmlentities('<Yorkshirep>'.$pl2.'%</Yorkshirep>');
echo "<br />";
if ($h=='1') {
echo htmlentities('<Antrim>'.$aapa.'</Antrim>');
echo "<br />";
echo htmlentities('<Antrimp>'.$paa.'%</Antrimp>');
echo "<br />";
echo htmlentities('<Ards>'.$abpa.'</Ards>');
echo "<br />";
echo htmlentities('<Ardsp>'.$pab.'%</Ardsp>');
echo "<br />";
echo htmlentities('<Armagh>'.$acpa.'</Armagh>');
echo "<br />";
echo htmlentities('<Armaghp>'.$pac.'%</Armaghp>');
echo "<br />";
echo htmlentities('<Ballymena>'.$adpa.'</Ballymena>');
echo "<br />";
echo htmlentities('<Ballymenap>'.$pad.'%</Ballymenap>');
echo "<br />";
echo htmlentities('<Ballymoney>'.$aepa.'</Ballymoney>');
echo "<br />";
echo htmlentities('<Ballymoneyp>'.$pae.'%</Ballymoneyp>');
echo "<br />";
echo htmlentities('<Banbridge>'.$afpa.'</Banbridge>');
echo "<br />";
echo htmlentities('<Banbridgep>'.$paf.'%</Banbridgep>');
echo "<br />";
echo htmlentities('<Belfast>'.$agpa.'</Belfast>');
echo "<br />";
echo htmlentities('<Belfastp>'.$pag.'%</Belfastp>');
echo "<br />";
echo htmlentities('<Carrickfergus>'.$ahpa.'</Carrickfergus>');
echo "<br />";
echo htmlentities('<Carrickfergusp>'.$pah.'%</Carrickfergusp>');
echo "<br />";
echo htmlentities('<Castlereagh>'.$aipa.'</Castlereagh>');
echo "<br />";
echo htmlentities('<Castlereaghp>'.$pai.'%</Castlereaghp>');
echo "<br />";
echo htmlentities('<Coleraine>'.$ajpa.'</Coleraine>');
echo "<br />";
echo htmlentities('<Colerainep>'.$paj.'%</Colerainep>');
echo "<br />";
echo htmlentities('<Cookstown>'.$akpa.'</Cookstown>');
echo "<br />";
echo htmlentities('<Cookstownp>'.$pak.'%</Cookstownp>');
echo "<br />";
echo htmlentities('<Craigavon>'.$alpa.'</Craigavon>');
echo "<br />";
echo htmlentities('<Craigavonp>'.$pal.'%</Craigavonp>');
echo "<br />";
echo htmlentities('<Derry>'.$ampa.'</Derry>');
echo "<br />";
echo htmlentities('<Derryp>'.$pam.'%</Derryp>');
echo "<br />";
echo htmlentities('<Down>'.$anpa.'</Down>');
echo "<br />";
echo htmlentities('<Downp>'.$pan.'%</Downp>');
echo "<br />";
echo htmlentities('<Dungannon>'.$aopa.'</Dungannon>');
echo "<br />";
echo htmlentities('<Dungannonp>'.$pao.'%</Dungannonp>');
echo "<br />";
echo htmlentities('<Fermanagh>'.$appa.'</Fermanagh>');
echo "<br />";
echo htmlentities('<Fermanaghp>'.$pap.'%</Fermanaghp>');
echo "<br />";
echo htmlentities('<Larne>'.$aqpa.'</Larne>');
echo "<br />";
echo htmlentities('<Larnep>'.$paq.'%</Larnep>');
echo "<br />";
echo htmlentities('<Limavady>'.$arpa.'</Limavady>');
echo "<br />";
echo htmlentities('<Limavadyp>'.$par.'%</Limavadyp>');
echo "<br />";
echo htmlentities('<Lisburn>'.$aspa.'</Lisburn>');
echo "<br />";
echo htmlentities('<Lisburnp>'.$pas.'%</Lisburnp>');
echo "<br />";
echo htmlentities('<Magherafelt>'.$atpa.'</Magherafelt>');
echo "<br />";
echo htmlentities('<Magherafeltp>'.$pat.'%</Magherafeltp>');
echo "<br />";
echo htmlentities('<Moyle>'.$aupa.'</Moyle>');
echo "<br />";
echo htmlentities('<Moylep>'.$pau.'%</Moylep>');
echo "<br />";
echo htmlentities('<Newry>'.$avpa.'</Newry>');
echo "<br />";
echo htmlentities('<Newryp>'.$pav.'%</Newryp>');
echo "<br />";
echo htmlentities('<Newtownabbey>'.$awpa.'</Newtownabbey>');
echo "<br />";
echo htmlentities('<Newtownabbeyp>'.$paw.'%</Newtownabbeyp>');
echo "<br />";
echo htmlentities('<NorthDown>'.$axpa.'</NorthDown>');
echo "<br />";
echo htmlentities('<NorthDownp>'.$pax.'%</NorthDownp>');
echo "<br />";
echo htmlentities('<Omagh>'.$aypa.'</Omagh>');
echo "<br />";
echo htmlentities('<Omaghp>'.$pay.'%</Omaghp>');
echo "<br />";
echo htmlentities('<Strabane>'.$azpa.'</Strabane>');
echo "<br />";
echo htmlentities('<Strabanep>'.$paz.'%</Strabanep>');
echo "<br />";
}
if ($h=='2') {
echo htmlentities('<Aberdeen>'.$bapa.'</Aberdeen>');
echo "<br />";
echo htmlentities('<Aberdeenp>'.$pba.'%</Aberdeenp>');
echo "<br />";
echo htmlentities('<Aberdeenshire>'.$bbpa.'</Aberdeenshire>');
echo "<br />";
echo htmlentities('<Aberdeenshirep>'.$pbb.'%</Aberdeenshirep>');
echo "<br />";
echo htmlentities('<Angus>'.$bcpa.'</Angus>');
echo "<br />";
echo htmlentities('<Angusp>'.$pbc.'%</Angusp>');
echo "<br />";
echo htmlentities('<Argyll>'.$bdpa.'</Argyll>');
echo "<br />";
echo htmlentities('<Argyllp>'.$pbd.'%</Argyllp>');
echo "<br />";
echo htmlentities('<Clackmannanshire>'.$bepa.'</Clackmannanshire>');
echo "<br />";
echo htmlentities('<Clackmannanshirep>'.$pbe.'%</Clackmannanshirep>');
echo "<br />";
echo htmlentities('<Dumfries>'.$bfpa.'</Dumfries>');
echo "<br />";
echo htmlentities('<Dumfriesp>'.$pbf.'%</Dumfriesp>');
echo "<br />";
echo htmlentities('<Dundee>'.$bgpa.'</Dundee>');
echo "<br />";
echo htmlentities('<Dundeep>'.$pbg.'%</Dundeep>');
echo "<br />";
echo htmlentities('<EastAyrshire>'.$bhpa.'</EastAyrshire>');
echo "<br />";
echo htmlentities('<EastAyrshirep>'.$pbh.'%</EastAyrshirep>');
echo "<br />";
echo htmlentities('<EastDunbarton>'.$bipa.'</EastDunbarton>');
echo "<br />";
echo htmlentities('<EastDunbartonp>'.$pbi.'%</EastDunbartonp>');
echo "<br />";
echo htmlentities('<EastLothian>'.$bjpa.'</EastLothian>');
echo "<br />";
echo htmlentities('<EastLothianp>'.$pbj.'%</EastLothianp>');
echo "<br />";
echo htmlentities('<EastRenfrew>'.$bkpa.'</EastRenfrew>');
echo "<br />";
echo htmlentities('<EastRenfrewp>'.$pbk.'%</EastRenfrewp>');
echo "<br />";
echo htmlentities('<Edinburgh>'.$blpa.'</Edinburgh>');
echo "<br />";
echo htmlentities('<Edinburghp>'.$pbl.'%</Edinburghp>');
echo "<br />";
echo htmlentities('<Falkirk>'.$bmpa.'</Falkirk>');
echo "<br />";
echo htmlentities('<Falkirkp>'.$pbm.'%</Falkirkp>');
echo "<br />";
echo htmlentities('<Fife>'.$bnpa.'</Fife>');
echo "<br />";
echo htmlentities('<Fifep>'.$pbn.'%</Fifep>');
echo "<br />";
echo htmlentities('<Glasgow>'.$bopa.'</Glasgow>');
echo "<br />";
echo htmlentities('<Glasgowp>'.$pbo.'%</Glasgowp>');
echo "<br />";
echo htmlentities('<Highland>'.$bppa.'</Highland>');
echo "<br />";
echo htmlentities('<Highlandp>'.$pbp.'%</Highlandp>');
echo "<br />";
echo htmlentities('<Inverclyde>'.$bqpa.'</Inverclyde>');
echo "<br />";
echo htmlentities('<Inverclydep>'.$pbq.'%</Inverclydep>');
echo "<br />";
echo htmlentities('<Midlothian>'.$brpa.'</Midlothian>');
echo "<br />";
echo htmlentities('<Midlothianp>'.$pbr.'%</Midlothianp>');
echo "<br />";
echo htmlentities('<Moray>'.$bspa.'</Moray>');
echo "<br />";
echo htmlentities('<Morayp>'.$pbs.'%</Morayp>');
echo "<br />";
echo htmlentities('<Eilanan>'.$btpa.'</Eilanan>');
echo "<br />";
echo htmlentities('<Eilananp>'.$pbt.'%</Eilananp>');
echo "<br />";
echo htmlentities('<NorthAyrshire>'.$bupa.'</NorthAyrshire>');
echo "<br />";
echo htmlentities('<NorthAyrshirep>'.$pbu.'%</NorthAyrshirep>');
echo "<br />";
echo htmlentities('<NorthLanark>'.$bvpa.'</NorthLanark>');
echo "<br />";
echo htmlentities('<NorthLanarkp>'.$pbv.'%</NorthLanarkp>');
echo "<br />";
echo htmlentities('<Orkney>'.$bwpa.'</Orkney>');
echo "<br />";
echo htmlentities('<Orkneyp>'.$pbw.'%</Orkneyp>');
echo "<br />";
echo htmlentities('<Perth>'.$bxpa.'</Perth>');
echo "<br />";
echo htmlentities('<Perthp>'.$pbx.'%</Perthp>');
echo "<br />";
echo htmlentities('<Renfrewshire>'.$bypa.'</Renfrewshire>');
echo "<br />";
echo htmlentities('<Renfrewshirep>'.$pby.'%</Renfrewshirep>');
echo "<br />";
echo htmlentities('<Borders>'.$bzpa.'</Borders>');
echo "<br />";
echo htmlentities('<Bordersp>'.$pbz.'%</Bordersp>');
echo "<br />";
echo htmlentities('<Shetland>'.$baapa.'</Shetland>');
echo "<br />";
echo htmlentities('<Shetlandp>'.$pbaa.'%</Shetlandp>');
echo "<br />";
echo htmlentities('<SouthAyrshire>'.$bbbpa.'</SouthAyrshire>');
echo "<br />";
echo htmlentities('<SouthAyrshirep>'.$pbbb.'%</SouthAyrshirep>');
echo "<br />";

echo htmlentities('<SouthLanark>'.$bccpa.'</SouthLanark>');
echo "<br />";
echo htmlentities('<SouthLanarkp>'.$pbcc.'%</SouthLanarkp>');
echo "<br />";
echo htmlentities('<Stirling>'.$bddpa.'</Stirling>');
echo "<br />";
echo htmlentities('<Stirlingp>'.$pbdd.'%</Stirlingp>');
echo "<br />";
echo htmlentities('<WestDunbarton>'.$beepa.'</WestDunbarton>');
echo "<br />";
echo htmlentities('<WestDunbartonp>'.$pbee.'%</WestDunbartonp>');
echo "<br />";
echo htmlentities('<WestLothian>'.$bffpa.'</WestLothian>');
echo "<br />";
echo htmlentities('<WestLothianp>'.$pbff.'%</WestLothianp>');
echo "<br />";
}
if ($h=='3') {
echo htmlentities('<Blaenau>'.$capa.'</Blaenau>');
echo "<br />";
echo htmlentities('<Blaenaup>'.$pca.'%</Blaenaup>');
echo "<br />";
echo htmlentities('<Bridgend>'.$cbpa.'</Bridgend>');
echo "<br />";
echo htmlentities('<Bridgendp>'.$pcb.'%</Bridgendp>');
echo "<br />";
echo htmlentities('<Caerphilly>'.$ccpa.'</Caerphilly>');
echo "<br />";
echo htmlentities('<Caerphillyp>'.$pcc.'%</Caerphillyp>');
echo "<br />";
echo htmlentities('<Cardiff>'.$cdpa.'</Cardiff>');
echo "<br />";
echo htmlentities('<Cardiffp>'.$pcd.'%</Cardiffp>');
echo "<br />";
echo htmlentities('<Carmarthenshire>'.$cepa.'</Carmarthenshire>');
echo "<br />";
echo htmlentities('<Carmarthenshirep>'.$pce.'%</Carmarthenshirep>');
echo "<br />";
echo htmlentities('<Ceredigion>'.$cfpa.'</Ceredigion>');
echo "<br />";
echo htmlentities('<Ceredigionp>'.$pcf.'%</Ceredigionp>');
echo "<br />";
echo htmlentities('<Conwy>'.$cgpa.'</Conwy>');
echo "<br />";
echo htmlentities('<Conwyp>'.$pcg.'%</Conwyp>');
echo "<br />";
echo htmlentities('<Denbighshire>'.$chpa.'</Denbighshire>');
echo "<br />";
echo htmlentities('<Denbighshirep>'.$pch.'%</Denbighshirep>');
echo "<br />";
echo htmlentities('<Flintshire>'.$cipa.'</Flintshire>');
echo "<br />";
echo htmlentities('<Flintshirep>'.$pci.'%</Flintshirep>');
echo "<br />";
echo htmlentities('<Gwynedd>'.$cjpa.'</Gwynedd>');
echo "<br />";
echo htmlentities('<Gwyneddp>'.$pcj.'%</Gwyneddp>');
echo "<br />";
echo htmlentities('<Anglesey>'.$ckpa.'</Anglesey>');
echo "<br />";
echo htmlentities('<Angleseyp>'.$pck.'%</Angleseyp>');
echo "<br />";
echo htmlentities('<MerthyrTydfil>'.$clpa.'</MerthyrTydfil>');
echo "<br />";
echo htmlentities('<MerthyrTydfilp>'.$pcl.'%</MerthyrTydfilp>');
echo "<br />";
echo htmlentities('<Monmouthshire>'.$cmpa.'</Monmouthshire>');
echo "<br />";
echo htmlentities('<Monmouthshirep>'.$pcm.'%</Monmouthshirep>');
echo "<br />";
echo htmlentities('<NeathPortTalbot>'.$cnpa.'</NeathPortTalbot>');
echo "<br />";
echo htmlentities('<NeathPortTalbotp>'.$pcn.'%</NeathPortTalbotp>');
echo "<br />";
echo htmlentities('<Newport>'.$copa.'</Newport>');
echo "<br />";
echo htmlentities('<Newportp>'.$pco.'%</Newportp>');
echo "<br />";
echo htmlentities('<Pembrokeshire>'.$cppa.'</Pembrokeshire>');
echo "<br />";
echo htmlentities('<Pembrokeshirep>'.$pcp.'%</Pembrokeshirep>');
echo "<br />";
echo htmlentities('<Powys>'.$cqpa.'</Powys>');
echo "<br />";
echo htmlentities('<Powysp>'.$pcq.'%</Powysp>');
echo "<br />";
echo htmlentities('<Rhondda>'.$crpa.'</Rhondda>');
echo "<br />";
echo htmlentities('<Rhonddap>'.$pcr.'%</Rhonddap>');
echo "<br />";
echo htmlentities('<Swansea>'.$cspa.'</Swansea>');
echo "<br />";
echo htmlentities('<Swanseap>'.$pcs.'%</Swanseap>');
echo "<br />";
echo htmlentities('<Torfaen>'.$ctpa.'</Torfaen>');
echo "<br />";
echo htmlentities('<Torfaenp>'.$pct.'%</Torfaenp>');
echo "<br />";
echo htmlentities('<Glamorgan>'.$cupa.'</Glamorgan>');
echo "<br />";
echo htmlentities('<Glamorganp>'.$pcu.'%</Glamorganp>');
echo "<br />";
echo htmlentities('<Wrexham>'.$cvpa.'</Wrexham>');
echo "<br />";
echo htmlentities('<Wrexhamp>'.$pcv.'%</Wrexhamp>');
echo "<br />";
}
if ($h=='4') {
echo htmlentities('<Derbyshire>'.$dapa.'</Derbyshire>');
echo "<br />";
echo htmlentities('<Derbyshirep>'.$pda.'%</Derbyshirep>');
echo "<br />";
echo htmlentities('<Leicestershire>'.$dbpa.'</Leicestershire>');
echo "<br />";
echo htmlentities('<Leicestershirep>'.$pdb.'%</Leicestershirep>');
echo "<br />";
echo htmlentities('<Lincolnshired>'.$dcpa.'</Lincolnshired>');
echo "<br />";
echo htmlentities('<Lincolnshiredp>'.$pdc.'%</Lincolnshiredp>');
echo "<br />";
echo htmlentities('<Northamptonshire>'.$ddpa.'</Northamptonshire>');
echo "<br />";
echo htmlentities('<Northamptonshirep>'.$pdd.'%</Northamptonshirep>');
echo "<br />";
echo htmlentities('<Nottinghamshire>'.$depa.'</Nottinghamshire>');
echo "<br />";
echo htmlentities('<Nottinghamshirep>'.$pde.'%</Nottinghamshirep>');
echo "<br />";
echo htmlentities('<Rutland>'.$dfpa.'</Rutland>');
echo "<br />";
echo htmlentities('<Rutlandp>'.$pdf.'%</Rutlandp>');
echo "<br />";
}
if ($h=='5') {
echo htmlentities('<Bedfordshire>'.$eapa.'</Bedfordshire>');
echo "<br />";
echo htmlentities('<Bedfordshirep>'.$pea.'%</Bedfordshirep>');
echo "<br />";
echo htmlentities('<Cambridgeshire>'.$ebpa.'</Cambridgeshire>');
echo "<br />";
echo htmlentities('<Cambridgeshirep>'.$peb.'%</Cambridgeshirep>');
echo "<br />";
echo htmlentities('<Essex>'.$ecpa.'</Essex>');
echo "<br />";
echo htmlentities('<Essexp>'.$pec.'%</Essexp>');
echo "<br />";
echo htmlentities('<Hertfordshire>'.$edpa.'</Hertfordshire>');
echo "<br />";
echo htmlentities('<Hertfordshirep>'.$ped.'%</Hertfordshirep>');
echo "<br />";
echo htmlentities('<Norfolk>'.$eepa.'</Norfolk>');
echo "<br />";
echo htmlentities('<Norfolkp>'.$pee.'%</Norfolkp>');
echo "<br />";
echo htmlentities('<Suffolk>'.$efpa.'</Suffolk>');
echo "<br />";
echo htmlentities('<Suffolkp>'.$pef.'%</Suffolkp>');
echo "<br />";
}
if ($h=='6') {
echo htmlentities('<NorthLondon>'.$fapa.'</NorthLondon>');
echo "<br />";
echo htmlentities('<NorthLondonp>'.$pfa.'%</NorthLondonp>');
echo "<br />";
echo htmlentities('<NorthEastLondon>'.$fbpa.'</NorthEastLondon>');
echo "<br />";
echo htmlentities('<NorthEastLondonp>'.$pfb.'%</NorthEastLondonp>');
echo "<br />";
echo htmlentities('<SouthEastLondon>'.$fcpa.'</SouthEastLondon>');
echo "<br />";
echo htmlentities('<SouthEastLondonp>'.$pfc.'%</SouthEastLondonp>');
echo "<br />";
echo htmlentities('<SouthWestLondon>'.$fdpa.'</SouthWestLondon>');
echo "<br />";
echo htmlentities('<SouthWestLondonp>'.$pfd.'%</SouthWestLondonp>');
echo "<br />";
echo htmlentities('<WestLondon>'.$fepa.'</WestLondon>');
echo "<br />";
echo htmlentities('<WestLondonp>'.$pfe.'%</WestLondonp>');
echo "<br />";
}
if ($h=='7') {
echo htmlentities('<Durham>'.$gapa.'</Durham>');
echo "<br />";
echo htmlentities('<Durhamp>'.$pga.'%</Durhamp>');
echo "<br />";
echo htmlentities('<NorthYorkshireg>'.$gbpa.'</NorthYorkshireg>');
echo "<br />";
echo htmlentities('<NorthYorkshiregp>'.$pgb.'%</NorthYorkshiregp>');
echo "<br />";
echo htmlentities('<Northumberland>'.$gcpa.'</Northumberland>');
echo "<br />";
echo htmlentities('<Northumberlandp>'.$pgc.'%</Northumberlandp>');
echo "<br />";
echo htmlentities('<TyneandWear>'.$gdpa.'</TyneandWear>');
echo "<br />";
echo htmlentities('<TyneandWearp>'.$pgd.'%</TyneandWearp>');
echo "<br />";
}
if ($h=='8') {
echo htmlentities('<Cheshire>'.$hapa.'</Cheshire>');
echo "<br />";
echo htmlentities('<Cheshirep>'.$pha.'%</Cheshirep>');
echo "<br />";
echo htmlentities('<Cumbria>'.$hbpa.'</Cumbria>');
echo "<br />";
echo htmlentities('<Cumbriap>'.$phb.'%</Cumbriap>');
echo "<br />";
echo htmlentities('<Manchester>'.$hcpa.'</Manchester>');
echo "<br />";
echo htmlentities('<Manchesterp>'.$phc.'%</Manchesterp>');
echo "<br />";
echo htmlentities('<Lancashire>'.$hdpa.'</Lancashire>');
echo "<br />";
echo htmlentities('<Lancashirep>'.$phd.'%</Lancashirep>');
echo "<br />";
echo htmlentities('<Merseyside>'.$hepa.'</Merseyside>');
echo "<br />";
echo htmlentities('<Merseysidep>'.$phe.'%</Merseysidep>');
echo "<br />";
}
if ($h=='9') {
echo htmlentities('<Berkshire>'.$iapa.'</Berkshire>');
echo "<br />";
echo htmlentities('<Berkshirep>'.$pia.'%</Berkshirep>');
echo "<br />";
echo htmlentities('<Buckinghamshire>'.$ibpa.'</Buckinghamshire>');
echo "<br />";
echo htmlentities('<Buckinghamshirep>'.$pib.'%</Buckinghamshirep>');
echo "<br />";
echo htmlentities('<EastSussex>'.$icpa.'</EastSussex>');
echo "<br />";
echo htmlentities('<EastSussexp>'.$pic.'%</EastSussexp>');
echo "<br />";
echo htmlentities('<Hampshire>'.$iepa.'</Hampshire>');
echo "<br />";
echo htmlentities('<Hampshirep>'.$pie.'%</Hampshirep>');
echo "<br />";
echo htmlentities('<IsleofWight>'.$ifpa.'</IsleofWight>');
echo "<br />";
echo htmlentities('<IsleofWightp>'.$pif.'%</IsleofWightp>');
echo "<br />";
echo htmlentities('<Kent>'.$igpa.'</Kent>');
echo "<br />";
echo htmlentities('<Kentp>'.$pig.'%</Kentp>');
echo "<br />";
echo htmlentities('<Oxfordshire>'.$ihpa.'</Oxfordshire>');
echo "<br />";
echo htmlentities('<Oxfordshirep>'.$pih.'%</Oxfordshirep>');
echo "<br />";
echo htmlentities('<Surrey>'.$iipa.'</Surrey>');
echo "<br />";
echo htmlentities('<Surreyp>'.$pii.'%</Surreyp>');
echo "<br />";
echo htmlentities('<WestSussex>'.$ijpa.'</WestSussex>');
echo "<br />";
echo htmlentities('<WestSussexp>'.$pij.'%</WestSussexp>');
echo "<br />";
}
if ($h=='10') {
echo htmlentities('<Bristol>'.$japa.'</Bristol>');
echo "<br />";
echo htmlentities('<Bristolp>'.$pja.'%</Bristolp>');
echo "<br />";
echo htmlentities('<Cornwall>'.$jbpa.'</Cornwall>');
echo "<br />";
echo htmlentities('<Cornwallp>'.$pjb.'%</Cornwallp>');
echo "<br />";
echo htmlentities('<Devon>'.$jcpa.'</Devon>');
echo "<br />";
echo htmlentities('<Devonp>'.$pjc.'%</Devonp>');
echo "<br />";
echo htmlentities('<Dorset>'.$jdpa.'</Dorset>');
echo "<br />";
echo htmlentities('<Dorsetp>'.$pjd.'%</Dorsetp>');
echo "<br />";
echo htmlentities('<Gloucestershire>'.$jepa.'</Gloucestershire>');
echo "<br />";
echo htmlentities('<Gloucestershirep>'.$pje.'%</Gloucestershirep>');
echo "<br />";
echo htmlentities('<Somerset>'.$jfpa.'</Somerset>');
echo "<br />";
echo htmlentities('<Somersetp>'.$pjf.'%</Somersetp>');
echo "<br />";
echo htmlentities('<Wiltshire>'.$jgpa.'</Wiltshire>');
echo "<br />";
echo htmlentities('<Wiltshirep>'.$pjg.'%</Wiltshirep>');
echo "<br />";
}
if ($h=='11') {
echo htmlentities('<Herefordshire>'.$kapa.'</Herefordshire>');
echo "<br />";
echo htmlentities('<Herefordshirep>'.$pka.'%</Herefordshirep>');
echo "<br />";
echo htmlentities('<Shropshire>'.$kbpa.'</Shropshire>');
echo "<br />";
echo htmlentities('<Shropshirep>'.$pkb.'%</Shropshirep>');
echo "<br />";
echo htmlentities('<Staffordshire>'.$kcpa.'</Staffordshire>');
echo "<br />";
echo htmlentities('<Staffordshirep>'.$pkc.'%</Staffordshirep>');
echo "<br />";
echo htmlentities('<Warwickshire>'.$kdpa.'</Warwickshire>');
echo "<br />";
echo htmlentities('<Warwickshirep>'.$pkd.'%</Warwickshirep>');
echo "<br />";
echo htmlentities('<WestMidlands>'.$kepa.'</WestMidlands>');
echo "<br />";
echo htmlentities('<WestMidlandsp>'.$pke.'%</WestMidlandsp>');
echo "<br />";
echo htmlentities('<Worcestershire>'.$kfpa.'</Worcestershire>');
echo "<br />";
echo htmlentities('<Worcestershirep>'.$pkf.'%</Worcestershirep>');
echo "<br />";
}
if ($h=='12') {
echo htmlentities('<EastRiding>'.$lapa.'</EastRiding>');
echo "<br />";
echo htmlentities('<EastRidingp>'.$pla.'%</EastRidingp>');
echo "<br />";
echo htmlentities('<Lincolnshirel>'.$lbpa.'</Lincolnshirel>');
echo "<br />";
echo htmlentities('<Lincolnshirelp>'.$plb.'%</Lincolnshirelp>');
echo "<br />";
echo htmlentities('<NorthYorkshirel>'.$lcpa.'</NorthYorkshirel>');
echo "<br />";
echo htmlentities('<NorthYorkshirelp>'.$plc.'%</NorthYorkshirelp>');
echo "<br />";
echo htmlentities('<SouthYorkshire>'.$ldpa.'</SouthYorkshire>');
echo "<br />";
echo htmlentities('<SouthYorkshirep>'.$pld.'%</SouthYorkshirep>');
echo "<br />";
echo htmlentities('<WestYorkshire>'.$lepa.'</WestYorkshire>');
echo "<br />";
echo htmlentities('<WestYorkshirep>'.$ple.'%</WestYorkshirep>');
echo "<br />";
}
}



echo htmlentities('</CD>');
echo "<br />";
break;
default:
echo "";
}
break;
default:
echo "";
}
}
echo htmlentities('</CATALOG>');
?>


</body>
</html>