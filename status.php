<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>UoN Kit Catalogue</title>
<style>
body {
	background:#EAEAEA;
	font-family: "Verdana", Arial, sans-serif;
	font-size: 0.7em;
	margin:0;
	padding:0;
}
#wrapper {
	width:960px;
	margin:0 auto;
	background:#fff;
}
#pagewrapper {
	background-color: #BBBBBB;
	background-image: url("http://www.nottingham.ac.uk/common/assets/image/background-page.png");
	background-repeat: repeat-y;
	margin: 0 auto;
	max-width: 1020px;
}
div#uon-app-intranet-logo:after {
  bottom: 25px;
  color: #003366;
  content: ": Destinations";
  font-size: 2em;
  position: relative;
  right: 5px;
}
#subheading {
	clear:both;
	margin:0;
	background:#fff;
}
#subheading h1 {
	width:100%;
	margin:15px ;
	color: #003366;
	font-weight:400;
}
#content {
	padding:0 20px;
}
#footer {
  background-color: #FFFFFF;
  clear: both;
  color: #666666;
  font-size: 1em;
  margin: 0;
  padding: 0 0.4em 0.4em;
}
</style>
<?php
// Import UON Internal Header/Footer Assets
class internalUonAssets {
		public static function getContent($url)
			   {
					 
					  $ch = curl_init();
					  curl_setopt($ch, CURLOPT_URL, $url);
					  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					  $output = curl_exec($ch);
					  curl_close($ch);
					 
					  return $output;
			   }
			  
			  // Header call
			   public static function getHeader()
			   {
					  return self::getContent("http://www.nottingham.ac.uk/common/assets/uon-app-header.html");
			   }
			  
			  // Footer call
			   public static function getFooter()
			   {
					  return self::getContent("http://www.nottingham.ac.uk/common/assets/uon-app-footer.html");
			   }	   
}
?>
</head>
<body>
<div id="pagewrapper">
     <div id="wrapper"> 
	 <!--Header Import     -->
	 <?php echo internalUonAssets::getHeader(); ?>
          <div id="subheading">
               <h1>UoN Destinations</h1>
          </div>
          <div id="content"> <a id="TopofPage" name="TopofPage"></a>
               
               
               <div style="border: medium dotted rgb(51, 51, 51); margin: 15px 0pt 0pt; padding: 10px; width: 75%; text-align: left; background-color: rgb(230, 247, 239);"><span style="color: rgb(153, 0, 0); font-size: 2em; font-weight: bold;">! </span>destinations is being upgraded <a href="http://destinations.nottingham.ac.uk/">destinations.nottingham.ac.uk</a> and will be available from <strong>12:00 27 September 2012. </strong><br />
                    <br />
                    Please contact <a href="mailto:alan.maplethorpe@nottingham.ac.uk">Alan Maplethorpe</a> if there are any questions. <br />
                    <br />
  
</div>
       <br />
<br />
        
               
          </div>
          <!--Footer Import     -->
          <?php echo internalUonAssets::getFooter(); ?> </div>
</div>
</body>
</html>
