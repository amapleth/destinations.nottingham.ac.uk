<?php

echo "This is the javascript code which has been generated and will be needed for the external version of GEMS.  Please copy ALL of the text below the horizontal line all the way to the bottom of the page and paste it into a text-based editor such as notepad or dreamweaver.  Please then save this file as selectcourse.js and press the 'Next Page' button to finish the process.<form name='form' action='finalpage.php' method='post'><input type='hidden' name='noyears' value='$a' /><input type='hidden' name='nostuds' value='$b' /><input type='hidden' name='salary' value='$c' /><input type='hidden' name='jobtitle' value='$d' /><input type='hidden' name='employer' value='$e' /><input type='hidden' name='linkej' value='$f' /><input type='hidden' name='locs1' value='$g' /><input type='hidden' name='locs2' value='$h' /><input type='hidden' name='school' value='$k' /><input type='hidden' name='course' value='$l' /><input class='red' type='submit' value='Next Page -->' /><br /><hr />";

echo htmlentities ('var xmlhttp');
echo "<br /><br />";
echo htmlentities ('function showcourse(str)');
echo "<br />";
echo htmlentities ('{');
echo "<br />";
echo htmlentities ('xmlhttp=GetXmlHttpObject();');
echo "<br />";
echo htmlentities ('if (xmlhttp==null)');
echo "<br />";
echo htmlentities ('{');
echo "<br />";
echo htmlentities ('alert ("Your browser does not support AJAX!");');
echo "<br />";
echo htmlentities ('return;');
echo "<br />";
echo htmlentities ('}');
echo "<br />";
echo htmlentities ('var url="getcourse.php";');
echo "<br />";
echo htmlentities ('url=url+"?q="+str;');
echo "<br />";
echo htmlentities ('url=url+"&sid="+Math.random();');
echo "<br />";
echo htmlentities ('xmlhttp.onreadystatechange=stateChanged;');
echo "<br />";
echo htmlentities ('xmlhttp.open("GET",url,true);');
echo "<br />";
echo htmlentities ('xmlhttp.send(null);');
echo "<br />";
echo htmlentities ('}');
echo "<br /><br />";
echo htmlentities ('function stateChanged()');
echo "<br />";
echo htmlentities ('{');
echo "<br />";
echo htmlentities ('if (xmlhttp.readyState==4)');
echo "<br />";
echo htmlentities ('{');
echo "<br />";
echo htmlentities ('document.getElementById("results").innerHTML=xmlhttp.responseText;');
echo "<br />";
echo htmlentities ('}');
echo "<br />";
echo htmlentities ('}');
echo "<br /><br />";
echo htmlentities ('function GetXmlHttpObject()');
echo "<br />";
echo htmlentities ('{');
echo "<br />";
echo htmlentities ('if (window.XMLHttpRequest)');
echo "<br />";
echo htmlentities ('{');
echo "<br />";
echo htmlentities ('return new XMLHttpRequest();');
echo "<br />";
echo htmlentities ('}');
echo "<br />";
echo htmlentities ('if (window.ActiveXObject)');
echo "<br />";
echo htmlentities ('{');
echo "<br />";
echo htmlentities ('return new ActiveXObject("Microsoft.XMLHTTP");');
echo "<br />";
echo htmlentities ('}');
echo "<br />";
echo htmlentities ('return null;');
echo "<br />";
echo htmlentities ('}');
echo "<br />";

?>