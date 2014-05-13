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

<h1>Graduate prospect calculations (unfiltered)</h1>

<?php
include 'details.php';
include 'database.php';
include 'lookups.php';



$yearsToSample = array('1112', '1011', '910', '89', '78');

$popcounts = array();

foreach ( $yearsToSample as $yearcode ) {

	echo "<h2>Year: $yearcode</h2>";
	
	$popstm = "SELECT HUSID FROM popdlhe$yearcode";
	$respstm = "SELECT HUSID FROM popdlhe$yearcode INNER JOIN extract$yearcode on popdlhe$yearcode.HUSID = extract$yearcode.HUSIDa";

    $pc = array();

    if ( $yearcode < '1112' ) {
        $pc = $prospclauses;
    } else {
        $pc = $prospclauses1112;
    }

    foreach ( $pc as $prosp => $clause ) {
        $prospstm = $respstm." WHERE ( ".$clause." )";

        if ( $yearcode > '1011' ) {
            $prospstm = str_replace('SOCDLHE', 'SOCDLHE2010', $prospstm);

        }

        echo "<hr /><p>SQL statement for $prosp:<br /> $prospstm</p>";
        $prost = mysqli_query( $con, $prospstm );
        $popcounts[$yearcode][$prosp] = mysqli_num_rows( $prost );
		echo "<p>Population for $prosp: ".mysqli_num_rows( $prost );

    }
	
	$ec = array();
    if ( $yearcode < '1112' ) {
        $ec = $empcircs;
    } else {
        $ec = $empcircs1112;
    }

#	$statement = $respstm." AND (".$ec['noemp'].")";
#	$result = mysqli_query( $con, $statement );
#	$popcounts[$yearcode]['noemp'] = mysqli_num_rows( $result );
#	echo "<hr />SQL statement for noemp:<br /> $statement</p>";
#	echo "<p>Population for noemp: ".mysqli_num_rows( $result );


    $popcounts[$yearcode]['gradprosppos'] = $popcounts[$yearcode]['posemp']+$popcounts[$yearcode]['posstudy'];
    $popcounts[$yearcode]['gradprospneg'] = $popcounts[$yearcode]['negemp']+$popcounts[$yearcode]['negstudy'];
	
	echo "<p>Positive graduate prospects = positive empoyment + positive study:<br />".$popcounts[$yearcode]['posemp']." + ".$popcounts[$yearcode]['posstudy']." = ".$popcounts[$yearcode]['gradprosppos']."</p>";
	echo "<p>Negative graduate prospects = negative empoyment + negative study:<br />".$popcounts[$yearcode]['negemp']." + ".$popcounts[$yearcode]['negstudy']." = ".$popcounts[$yearcode]['gradprospneg']."</p>";
	
	$prosppc = number_format( ( ( $popcounts[$yearcode]['gradprosppos'] / ($popcounts[$yearcode]['gradprosppos']+$popcounts[$yearcode]['gradprospneg']) ) * 100 ), 1 );
	$prospnum = $popcounts[$yearcode]['gradprosppos'] / ($popcounts[$yearcode]['gradprosppos']+$popcounts[$yearcode]['gradprospneg']);
	echo "<p>Graduate prospects percentage is Positive prospects / ( Positive prospects + negative prospects ) x 100</p>";
	echo "<p>".$popcounts[$yearcode]['gradprosppos']." / (".$popcounts[$yearcode]['gradprosppos']."+".$popcounts[$yearcode]['gradprospneg'].") = $prospnum</p>";
	echo "<p>Multiply by 100 and round to one decimal point: $prosppc</p>";
	
}



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
 