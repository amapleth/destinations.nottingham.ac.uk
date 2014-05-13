<?php
$q=$_GET["q"];
error_reporting(-1);
$xmlDoc = new DOMDocument();
$xmlDoc->load("destinations.xml");

$x=$xmlDoc->getElementsByTagName('COURSE');

for ($i=0; $i<=$x->length-1; $i++)
{
if ($x->item($i)->nodeType==1)
{
if ($x->item($i)->childNodes->item(0)->nodeValue == $q)
{
$y=($x->item($i)->parentNode);
}
}
}

$cd=($y->childNodes);

echo "<p>Destinations Data for ";
echo ($cd->item(1)->childNodes->item(0)->nodeValue);
echo "</p><br />";
echo "<table border='1' style='border-collapse: collapse;'><tr><th>";
echo "Standard Publication Category</th><th>";
echo "Number of Graduates</th><th>";
echo "Percentage of Graduates</th></tr><tr><td>";
echo "Full-time paid work only (including self-employed)";
echo "</td><td>";
echo ($cd->item(5)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(7)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "Part-time paid work only";
echo "</td><td>";
echo ($cd->item(9)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(11)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "Voluntary/Unpaid work only";
echo "</td><td>";
echo ($cd->item(13)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(15)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "Work and further study";
echo "</td><td>";
echo ($cd->item(17)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(19)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "Further study only";
echo "</td><td>";
echo ($cd->item(21)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(23)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "Assumed to be unemployed";
echo "</td><td>";
echo ($cd->item(25)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(27)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "Not avilable for employment";
echo "</td><td>";
echo ($cd->item(29)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(31)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "Other";
echo "</td><td>";
echo ($cd->item(33)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(35)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "Explicit refusal";
echo "</td><td>";
echo ($cd->item(37)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(39)->childNodes->item(0)->nodeValue);
echo "</tr></table>";
echo "<br />";
echo "<p>The Proportion of graduates in work or further study is: ";
echo ($cd->item(41)->childNodes->item(0)->nodeValue);
echo "</p>";

echo "<br />";
?>
