<!DOCTYPE html>
<html>
<head>
<title>Diagnostics</title>
<style>

table, th, td {
	border: 1px solid black;
	padding: 10px;
}

</style>
</head>
<body>

<?php
include 'details.php';
include 'database.php';
include 'lookups.php';


$statement = "SELECT DISTINCT(EMPBASIS), COUNT(EMPBASIS) as count FROM popdlhe1112 INNER JOIN extract1112 on popdlhe1112.HUSID = extract1112.HUSIDa GROUP BY EMPBASIS";
$res = mysqli_query( $con, $statement );

$count = 0;

while ( $row = mysqli_fetch_object($res) ) {
	$count += $row->count;
	echo "<p>".$row->EMPBASIS." : ".$row->count." : $count</p>";
}

?>




</body>
</html>
 