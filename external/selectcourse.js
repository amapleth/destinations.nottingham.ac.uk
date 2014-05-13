var xmlhttp

function showcourse(str)
{
xmlhttp=GetXmlHttpObject();
if (xmlhttp==null)
{
alert ("Your browser does not support AJAX!");
return;
}
var url="getcourse.php";
url=url+"?q="+str;
url=url+"&sid="+Math.random();
xmlhttp.onreadystatechange=stateChanged;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged()
{
if (xmlhttp.readyState==4)
{
document.getElementById("results").innerHTML=xmlhttp.responseText;
}
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
{
return new XMLHttpRequest();
}
if (window.ActiveXObject)
{
return new ActiveXObject("Microsoft.XMLHTTP");
}
return null;
}