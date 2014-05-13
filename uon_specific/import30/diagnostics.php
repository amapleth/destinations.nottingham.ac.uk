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

include("database.php");




echo "<p>Individual year international counts</p>";

$count = mysql_num_rows( mysql_query("SELECT * FROM popdlhe78 WHERE HOMEEU = '3'") );
echo "<p>7/8: $count</p>";

$count = mysql_num_rows( mysql_query("SELECT * FROM popdlhe89 WHERE HOMEEU = '3'") );
echo "<p>8/9: $count</p>";

$count = mysql_num_rows( mysql_query("SELECT * FROM popdlhe910 WHERE HOMEEU = '3'") );
echo "<p>9/10: $count</p>";

$count = mysql_num_rows( mysql_query("SELECT * FROM popdlhe1011 WHERE HOMEEU = '3'") );
echo "<p>10/11: $count</p>";

echo "<p>Count of union of year tables</p>";

$count = mysql_num_rows( mysql_query("SELECT XQMODE01 FROM popdlhe78 WHERE HOMEEU = '3' UNION ALL SELECT XQMODE01 FROM popdlhe89 WHERE HOMEEU = '3' UNION ALL SELECT XQMODE01 FROM popdlhe910 WHERE HOMEEU = '3' UNION ALL SELECT XQMODE01 FROM popdlhe1011 WHERE HOMEEU = '3'") );
echo "<p>10/11: $count</p>";



?>


</body>
</html>