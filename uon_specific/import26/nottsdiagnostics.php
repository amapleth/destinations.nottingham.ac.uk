<!DOCTYPE html>

<html>

<head>
<title>Notts Diagnostic Code</title>
<style type="text/css">

th {
	background-color: black;
	color: white;
}

td {
	background-color: #DDDDDD;
}

</style>
</head>

<body>

<h1>Nottingham diagnostic code</h1>

<?php

$course = 'Chemistry BSc Hons';

include("database.php");

$result1 = mysql_query("SELECT * FROM popdlhe1011 WHERE course = '$course'");
$numInPop = mysql_num_rows( $result1 );

echo "<p>Number of $course students in popdlhe1011: $numInPop</p>";
echo "<p>Table showing school/subject information for those students:</p>";
echo "<table><tr><th>Course</th><th>Subject</th><th>School</th></tr>";

while ( $hit = mysql_fetch_object( $result1 ) ) {
	echo "<tr><td>$hit->COURSE</td><td>$hit->SUBJECT</td><td>$hit->SCHOOL</td></tr>";
}

echo "</table>";

$result2 = mysql_query("SELECT * FROM extract1011 INNER JOIN popdlhe1011 on extract1011.HUSIDa = popdlhe1011.HUSID  WHERE course = '$course'");

$numInJoin = mysql_num_rows( $result2 );

echo "<p>Number of $course students in extract1011: $numInJoin</p>";

echo "<p>Table showing school/subject information for those students:</p>";
echo "<table><tr><th>Course</th><th>Subject</th><th>School</th></tr>";

while ( $hit = mysql_fetch_object( $result2 ) ) {
	echo "<tr><td>$hit->COURSE</td><td>$hit->SUBJECT</td><td>$hit->SCHOOL</td></tr>";
}

echo "</table>";


?>


</body>
</html>