<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php include("../details.php"); ?>

For each <?php echo $option3 ?> selected, the table of standard publication categories will be shown as on your employment.php (internal GEMS) page, along with the percentage of positive outcomes for that <?php echo $option3 ?>.  There is also the option to have any of the following information below these:  *please bear in mind that the greater the amount of data chosen, the slower the webpage will work.
<br /><br />
Number of surveys which data will be taken from<br />
<form name="input" action="xmlgenerator.php" method="post">
<input type="radio" name="noyears" value="1" checked="checked" />Just 2010/11 *our recommended selection for larger HEIs<br />
<input type="radio" name="noyears" value="2" />2009/10 and 2010/11<br />
<input type="radio" name="noyears" value="3" />2008/09, 2009/10 and 2010/11<br /><br />
Only two distinctions can be used for the web version rather than the three that form the drop-down menus in the internal version of GEMS.  Please choose which you would like to form your higher level:<br />
<input type="radio" name="school" value="1" checked="checked" /><?php echo $option1 ?><br />
<input type="radio" name="school" value="2" /><?php echo $option2 ?><br /><br />
and choose which you would like to form your lower level:<br />
<input type="radio" name="course" value="1" /><?php echo $option2 ?><br />
<input type="radio" name="course" value="2" checked="checked" /><?php echo $option3 ?><br /><br />
Number of students that answered the survey in order for a course to appear (for Data Protection and statistical significance purposes)<br />
<input type="radio" name="nostuds" value="6" checked="checked" />More than 6<br />
<input type="radio" name="nostuds" value="7" />More than 7<br />
<input type="radio" name="nostuds" value="8" />More than 8<br />
<input type="radio" name="nostuds" value="9" />More than 9<br />
<input type="radio" name="nostuds" value="10" />More than 10<br /><br />
Show the average salary for those in full-time paid employment only<br />
<input type="radio" name="salary" value="1" />Show the mean salary<br />
<input type="radio" name="salary" value="2" />Show the median salary<br />
<input type="radio" name="salary" value="3" checked="checked" />Do not show salaries<br /><br />
Show SOC-coded job titles (for the lower level only e.g. <?php echo $option3 ?>-level)<br />
<input type="radio" name="jobtitle" value="1" />Show all job titles <br />
<input type="radio" name="jobtitle" value="2" />Show just graduate-level job titles<br />
<input type="radio" name="jobtitle" value="3" checked="checked" />Do not show job titles<br /><br />
Show employer names (for the lower level only e.g. <?php echo $option3 ?>-level)<br />
<input type="radio" name="employer" value="1" />Show all employers<br />
<input type="radio" name="employer" value="2" />Show employers larger than 50 employees (uses the SIC (2nd Level where appropriate) for small organisations e.g. a primary school)<br />
<input type="radio" name="employer" value="3" />Show employers larger than 250 employees (uses the SIC for SMEs)<br />
<input type="radio" name="employer" value="4" checked="checked" />Do not show employer names<br /><br />
Link employer names with job titles (for the lower level only e.g. <?php echo $option3 ?>-level)<br />
<input type="radio" name="linkej" value="1" />Show each job title with its corresponding employer name<br />
<input type="radio" name="linkej" value="2" checked="checked" />Keep job titles and employer names in two separate lists (also use this option if you have not selected both employer names and job titles above)<br /><br />
<input type="radio" name="locs1" value="1" />Show the UK employment locations of graduates in a table (The following regions will be shown but please select which one you would like to break down into sub-regions (your local area))<br />
&nbsp;&nbsp;<input type="radio" name="locs2" value="1" />Northern Ireland (only recommended for Northern Irish Universities)<br />
&nbsp;&nbsp;<input type="radio" name="locs2" value="2" />Scotland (only recommended for Scottish Universities)<br />
&nbsp;&nbsp;<input type="radio" name="locs2" value="3" />Wales (only recommended for Welsh Universities)<br />
&nbsp;&nbsp;<input type="radio" name="locs2" value="4" />East Midlands<br />
&nbsp;&nbsp;<input type="radio" name="locs2" value="5" />East of England<br />
&nbsp;&nbsp;<input type="radio" name="locs2" value="6" />Greater London<br />
&nbsp;&nbsp;<input type="radio" name="locs2" value="7" />North East England<br />
&nbsp;&nbsp;<input type="radio" name="locs2" value="8" />North West England<br />
&nbsp;&nbsp;<input type="radio" name="locs2" value="9" />South East England<br />
&nbsp;&nbsp;<input type="radio" name="locs2" value="10" />South West England<br />
&nbsp;&nbsp;<input type="radio" name="locs2" value="11" />West Midlands<br />
&nbsp;&nbsp;<input type="radio" name="locs2" value="12" />Yorkshire and the Humber<br />
<input type="radio" name="locs1" value="2" checked="checked" />Do not show the employment locations of graduates<br /><br />
<input class="red" type="submit" value="Submit Form" />
</form>
</body>
</html>
