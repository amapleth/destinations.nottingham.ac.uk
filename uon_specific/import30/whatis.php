<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("details.php"); ?>
<title><?php echo $title ?></title>
<link href="css/inside.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico" >

</head>

<body class="body">

<div id="container">
  <div id="header">
  <?php echo $header ?>
  <img src="images/gemslogo.gif" alt="Gems Logo" width="195" height="71" align="right" />
  <br />
</div>
  
  <div id="mainContent">
    

<?php

include("database.php");
$joinp="select XQMODE01 from popdlhe1011";
$resultp = mysql_query($joinp);
$totala = mysql_num_rows($resultp);
$counta = number_format($totala);
$joinp="select METHOD from extract1011 WHERE PUBGRID != 'Y'";
$resultp = mysql_query($joinp);
$totalb = mysql_num_rows($resultp);
$countb = number_format($totalb);
$countc = round((( $totalb / $totala ) * 100 ),1);

?>
<span style="font-size: 15pt;"><b>The Destinations of Leavers from Higher Education</b></p>
<span style="font-size: 10pt;">The Destinations of Leavers Survey is an annual census of most of our UK and EU taught graduates.  The Higher Education Statistics Agency (HESA) provide the questions and the population of graduates which we are to survey, this year it included<?php echo "&nbsp;$counta&nbsp;"; ?>graduates who graduated in the 10/11 academic year. The graduates were surveyed six months after their respective graduations to achieve consistency in the results. This year we received responses from<?php echo "&nbsp;$countb&nbsp;"; ?>graduates giving us a response rate of<?php echo "&nbsp;$countc%.</p>"; ?>
<span style="font-size: 10pt;">A<?php echo "&nbsp;$countc%&nbsp;"; ?>response rate at University level means that data collected is very statistically significant, not only this but at <?php echo "$option1"; ?> level much of the data will also be very significant.  Where possible, the number of graduates who are part of a quoted result will always be highlighted.
<span style="font-size: 10pt;">The Survey is important to the University because the responses are used as performance indicators by the newspaper league tables, the Key Information Sets and the Higher Education Funding Councils.  The University wide results are published by HESA against all other UK Universities.</p>

<span style="font-size: 10pt;"><b><?php echo "$title"; ?></b></p>
<span style="font-size: 10pt;">The Data Protection Act must be adhered to first and foremost and because of this the information contained within this application is confidential and cannot be distributed outside of this University.</p>
<span style="font-size: 10pt;">This application is designed to allow users to easily access data relevant to their <?php echo "$option1"; ?> or <?php echo "$option3"; ?> without having to submit a request to the <?php echo "$name"; ?>.  It is possible that some of the statistics can be used as marketing material provided that the <?php echo "$name"; ?> keep track of all published material to ensure that the accumulation of published data does not inadvertently break Data Protection rules.</p>
<br />
<FORM METHOD="LINK" ACTION="index.php">
<INPUT TYPE="submit" VALUE="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter GEMS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" style="position:relative; left:350px;">
</FORM>
<br /><br /><br />
<span style="font-size: 10pt;"><b>Standard Publication Categories</b></p>
<span style="font-size: 10pt;">HESA provide standard publication categories for employment destinations which the University adheres to.  Graduates are asked about their current employment circumstances and their current study circumstance six months after graduation. Graduates are then placed into the following grid in order to produce the proportions into each standard publication category.
<br />
<br />
<table border='1'>
<tr>
<th colspan='2'>Publication Categories</th>
</tr>
<tr>
<td>A</td>
<td>Full-time paid work only (including self-employed)</td>
</tr>
<tr>
<td>B</td>
<td>Part-time paid work only</td>
</tr>
<tr>
<td>C</td>
<td>Voluntary/Unpaid work only</td>
</tr>
<tr>
<td>D</td>
<td>Work and further study</td>
<tr>
<td>E</td>
<td>Further study only</td>
</tr>
<tr>
<td>F</td>
<td>Assumed to be unemployed</td>
</tr>
<tr>
<td>G</td>
<td>Not available for employment</td>
</tr>
<tr>
<td>O</td>
<td>Other</td>
</tr>
<tr>
<td>X</td>
<td>Explicit Refusal</td>
</tr>
</table>
<br />
<span style="font-size: 10pt;">Positive Outcomes = ((A + B + C + D + E) / (A + B + C + D + E + F)) * 100</p>
<span style="font-size: 10pt;"><b>Standard Occupational Classification SOC2000</b></p>
<span style="font-size: 10pt;">The Destinations of Leavers Survey uses the Standard Occupational Classification defined by the Office of National Statistics to ensure that consistent comparisons can be drawn across differing industries and subject areas.  SOC2000 has over 33,000 job titles and is an industry standard when comparing groups of workers.</p>

<a class="one" href="http://www.statistics.gov.uk/methods_quality/ns_sec/downloads/SOC2000_Vol1_V5.pdf">Link to the Standard Occupational Classification 2000</a></p>
<a name="eandp"> </a>
<span style="font-size: 10pt;"><b>Elias and Purcell Classification of Graduate Level Occupations</b></p>
<span style="font-size: 10pt;">Elias and Purcell (University of Warwick) produced an appendix to the SOC2000 (SOC (HE)) where each occupation was given a further classification depending on the proportion of workers with HE degrees.  These classifications are shown below:
<br />
<br />
<table border="1"><tr><td>
SOC (HE) Classification</td><td>
Requirement</td></tr><tr><td>
Traditional</td><td>
More than 60% hold a degree</td></tr><tr><td>
Modern</td><td>
More than 40% of 40-54 year olds hold a degree and<br />More than 50% of 21-35 year olds hold a degree</td></tr><tr><td>
New</td><td>
More than 40% of 21-35 year olds hold a degree and<br />10% more 21-35 year olds hold degree than 40-54 year olds</td></tr><tr><td>
Niche</td><td>
Occupations where the majority of imcumbents are not graduates, but within<br />which there are stable or growing specialist niches which require higher<br />education skills and knowledge</td></tr></table>
<br />
</span><a class="one" href="index.php">Take me back to the main page</a>
<br /><br />
	</div>
  <div id="footer"> <?php echo $footer ?> </div>
</div>
</body>
</html>
