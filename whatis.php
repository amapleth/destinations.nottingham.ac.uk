<?php include 'details.php'; ?>
<?php include 'database.php'; ?>
<?php include 'lookups.php'; ?>
<?php

$popres = mysqli_query($con, "SELECT HUSID from popdlhe1112");
$popcount = number_format(mysqli_num_rows( $popres ));

$resres = mysqli_query($con, "SELECT HUSID from popdlhe1112 INNER JOIN extract1112 on extract1112.HUSIDa = popdlhe1112.HUSID");
$rescount = number_format(mysqli_num_rows( $resres ));

$resprate = number_format( ($rescount/$popcount) * 100 , 1);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>What is GEMS?</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <?php include 'styles.inc'; ?>

       <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

<div class='rootcontainer'>

<?php include 'header.php' ?>

<h2>The Destinations of Leavers from Higher Education</h2>

<p>It is a requirement for all Universities to complete the Destination of Leavers Survey which is an annual census of all UK and EU graduates who qualify with a recognised HE qualification. The Higher Education Statistics Agency (HESA) provides the survey, which was sent to <?php echo $popcount ?> 2011/12 University of Nottingham graduates. These graduates were surveyed approximately six months after graduation to achieve consistency in the results. We received responses from <?php echo $rescount ?> graduates, a response rate of <?php echo $resprate ?>%.  This response rate means that the data is statistically significant at both University and Academic School levels. </p>

<p>The Survey is becoming increasingly important as the data is used to create League Tables, Key Information Sets and research findings published by the Higher Education Funding Council and Business Innovation skills on recent graduate destinations.  It can also be used for independent research. University wide data is available and published by HESA against all other UK Universities.</p>

<h2>Graduate Employment Market Statistics (GEMS)</h2>

<p>The Data Protection Act 1998 must be adhered to first and foremost and because of this the information contained within this application is confidential and cannot be distributed outside of this University. This application is designed to allow users to easily access data relevant to their School or Course without having to submit a request to the Careers and Employability Service. It is possible that some of the statistics can be used as marketing material provided that the Careers and Employability Service are aware of all published material to ensure that the accumulation of published data adheres to the above Data Protection rules.</p>

<h3>Changes for the Destination of Leavers 2011/12</h3>

<p>The latest GEMS database now holds data from the 2011/12 leaving cohort, the first collection since a fundamental review of the survey was conducted.  As a result there are elements of data which cannot be mapped or compared to previous years.  Changes include:</p>

<ul>
<li>The system now allows us to produce data for other undergraduate qualifications and the selections screen offers the opportunity to now select this as an option.</li>
<li>Employment circumstance categories have changed but still allow a certain level of comparison; the categories voluntary work (now included with part-time work) and due to start work (now included with unemployed) no longer exist and not available for work does not exist from 2011/12 going forward; a category for work and study has also been created.  This has also had an effect on the positive outcome indicator which now categorises those due to start work as a negative outcome. </li>
<li>A new section of the database has been added analysing how graduates felt their experience at university prepared them for employment further study and becoming self-employed, freelance or starting up their own business.  </li>
<li>The employer size question has also undergone significant change; it is no longer   included on the survey but is outsourced by HESA to an external organisation for coding.  This has resulted in poor data quality for the 2011/12 return which has resulted in the Careers and Employability Service independently updating this data. However, this should not be used to directly compare with previous years.</li>
</ul>


<p><a href="index.php">Back to main page</a></p>

<?php include 'footer.php' ?>

        <?php include 'scripts.inc'; ?>

        <?php include 'analytics.php'; ?>
    </body>
</html>
