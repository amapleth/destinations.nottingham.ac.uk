<!DOCTYPE html>
<html>
<head>
<title>Diagnostics - negative employment</title>
<style>

table, th, td {
	border: 1px solid black;
	padding: 10px;
}

</style>
</head>
<body>
<h1>Negative employment criteria</h1>

<?php
include 'details.php';
include 'database.php';
include 'lookups.php';



$yearsToSample = array('1112');



foreach ( $yearsToSample as $yearcode ) {

	echo "<p>Records with SOCDLHE 4-9 AND TYPEQAUL 5, 7, 98 or XX : ";
	
	$statement = "SELECT HUSID, SOCDLHE2010, TYPEQUAL, MIMPACT FROM popdlhe1112 INNER JOIN extract1112 on popdlhe1112.HUSID = extract1112.HUSIDa WHERE ((SOCDLHE2010 LIKE '4%' OR SOCDLHE2010 LIKE '5%' OR SOCDLHE2010 LIKE '6%' OR SOCDLHE2010 LIKE '7%' OR SOCDLHE2010 LIKE '8%' OR SOCDLHE2010 LIKE '9%') AND TYPEQUAL IN ('5', '7', '98', 'XX', '05', '07'))";

#	$statement = "SELECT HUSID, SOCDLHE2010, TYPEQUAL, MIMPACT FROM popdlhe1112 INNER JOIN extract1112 on popdlhe1112.HUSID = extract1112.HUSIDa WHERE ((SOCDLHE2010 NOT LIKE '1%' AND SOCDLHE2010 NOT LIKE '2%' AND SOCDLHE2010 NOT LIKE '3%' AND SOCDLHE2010 != '' AND SOCDLHE2010 IS NOT NULL) AND TYPEQUAL IN ('5', '7', '98', 'XX', '05', '07'))";
	
	$result = mysqli_query( $con, $statement );
	
	echo mysqli_num_rows( $result )."</p>";
	
	echo "<p>Breakdown:</p><table><tr><th>HUSID</th><th>SOCDLHE</th><th>TYPEQUAL</th><th>MIMPACT</th></tr>";
	
	while ( $row = mysqli_fetch_object( $result ) ) {
		echo "<tr><td>".$row->HUSID."</td><td>".$row->SOCDLHE2010."</td><td>".$row->TYPEQUAL."</td><td>".$row->MIMPACT."</td></tr>";
	}
	
	echo "</table>";
	
	echo "<p>Records with SOCDLHE 4-9 OR TYPEQAUL 5, 7, 98 or XX : ";
	
#	$statement = "SELECT HUSID, SOCDLHE2010, TYPEQUAL, MIMPACT FROM popdlhe1112 INNER JOIN extract1112 on popdlhe1112.HUSID = extract1112.HUSIDa WHERE  ((SOCDLHE2010 LIKE '4%' OR SOCDLHE2010 LIKE '5%' OR SOCDLHE2010 LIKE '6%' OR SOCDLHE2010 LIKE '7%' OR SOCDLHE2010 LIKE '8%' OR SOCDLHE2010 LIKE '9%') OR TYPEQUAL IN ('5', '7', '98', 'XX', '05', '07'))";
	
	$statement = "SELECT HUSID, SOCDLHE2010, TYPEQUAL, MIMPACT FROM popdlhe1112 INNER JOIN extract1112 on popdlhe1112.HUSID = extract1112.HUSIDa WHERE ((SOCDLHE2010 NOT LIKE '1%' AND SOCDLHE2010 NOT LIKE '2%' AND SOCDLHE2010 NOT LIKE '3%' AND SOCDLHE2010 != '' AND SOCDLHE2010 IS NOT NULL) OR TYPEQUAL IN ('5', '7', '98', 'XX', '05', '07'))";
	
	$result = mysqli_query( $con, $statement );
	
	echo mysqli_num_rows( $result )."</p>";
	
	echo "<p>Breakdown:</p><table><tr><th>HUSID</th><th>SOCDLHE</th><th>TYPEQUAL</th><th>MIMPACT</th></tr>";
	
	while ( $row = mysqli_fetch_object( $result ) ) {
		echo "<tr><td>".$row->HUSID."</td><td>".$row->SOCDLHE2010."</td><td>".$row->TYPEQUAL."</td><td>".$row->MIMPACT."</td></tr>";
	}
	
	echo "</table>";
	
	
}



?>




</body>
</html>
 