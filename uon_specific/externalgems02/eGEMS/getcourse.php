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

echo "<p>The average (mean) salary of graduates in full-time work is: ";
echo ($cd->item(43)->childNodes->item(0)->nodeValue);
echo "</p>";

$yes=$cd->item(45)->childNodes->item(0)->nodeValue;
$yesa=explode("qqq", $yes);
$yesb=sizeof($yesa);

if ($yesb>'1' && $yes!="Empty") {
echo "<br />Below is a selection of the job titles of these graduates<br />";

$i=0;
while ($i < $yesb) {
echo"<p>" . $yesa[$i] . "</p>";
$i++;
}

}

$yes=$cd->item(47)->childNodes->item(0)->nodeValue;
$yesa=explode("qqq", $yes);
$yesb=sizeof($yesa);

if ($yesb>'1' && $yes!="Empty") {
echo "<br />Below is a selection of the employers/industries of these graduates<br />";

$i=0;
while ($i < $yesb) {
echo"<p>" . $yesa[$i] . "</p>";
$i++;
}

}

echo "<br />";
echo "<table border='1' style='border-collapse: collapse;'><tr><th>";
echo "UK Region</th><th>";
echo "Number of Graduates</th><th>";
echo "Percentage of Graduates</th></tr><tr><td>";
echo "Northern Ireland";
echo "</td><td>";
echo ($cd->item(49)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(51)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "Scotland";
echo "</td><td>";
echo ($cd->item(53)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(55)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "Wales";
echo "</td><td>";
echo ($cd->item(57)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(59)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "East Midlands";
echo "</td><td>";
echo ($cd->item(61)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(63)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "-Derbyshire";
echo "</td><td>";
echo ($cd->item(97)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(99)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "-Leicestershire";
echo "</td><td>";
echo ($cd->item(101)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(103)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "-Lincolnshire (part of)";
echo "</td><td>";
echo ($cd->item(105)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(107)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "-Northamptonshire";
echo "</td><td>";
echo ($cd->item(109)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(111)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "-Nottinghamshire";
echo "</td><td>";
echo ($cd->item(113)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(115)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "-Rutland";
echo "</td><td>";
echo ($cd->item(117)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(119)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "East England";
echo "</td><td>";
echo ($cd->item(65)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(67)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "Greater London";
echo "</td><td>";
echo ($cd->item(69)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(71)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "North East England";
echo "</td><td>";
echo ($cd->item(73)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(75)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "North West England";
echo "</td><td>";
echo ($cd->item(77)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(79)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "South East England";
echo "</td><td>";
echo ($cd->item(81)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(83)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "South West England";
echo "</td><td>";
echo ($cd->item(85)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(87)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "West Midlands";
echo "</td><td>";
echo ($cd->item(89)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(91)->childNodes->item(0)->nodeValue);
echo "</tr>";
echo "<tr><td>";
echo "Yorkshire and the Humber";
echo "</td><td>";
echo ($cd->item(93)->childNodes->item(0)->nodeValue);
echo "</td><td>";
echo ($cd->item(95)->childNodes->item(0)->nodeValue);
echo "</tr></table>";
echo "<br />";
?>