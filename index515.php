<?php include 'details.php'; ?>
<?php include 'database.php'; ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Main page - GEMS</title>
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

<?php include 'header.php' ?>

<div id="col1"> 

<div id="secta" class="homesect">
    <div>
    <h2>Section A - Standard Publication Categories</h2>
    <ul>
        <li><a href="selector.php?cat=empcirc">Employment circumstances</a></li>
    </ul>
    </div>
</div><!-- end secta -->

<div id="sectb" class="homesect">
    <div>
    <h2>Section B - Employment Details</h2>
    <ul>
        <li><a href="selector.php?cat=jobdetails">Job titles and employer names</a></li>
        <li><a href="selector.php?cat=salary">Salaries</a></li>
        <li><a href="selector.php?cat=location">Employer locations</a></li>
        <li><a href="selector.php?cat=size">Employer sizes</a></li>
        <li><a href="selector.php?cat=contract">Contract types</a></li>
        <li><a href="selector.php?cat=relevance">Relevance of qualification</a></li>
        <li><a href="selector.php?cat=soc">Standard occupational classifications</a></li>
    </ul>
    </div>
</div><!-- end sectb -->

</div><!-- end col1 -->

<div id="col2">

<div id="sectc" class="homesect">
    <div>
    <h2>Section C - Inital Teacher Training Graduates' Details</h2>
    <ul>
        <li><a href="ittempcirc.php">Employment circumstances of ITT graduates</a></li>
    </ul>
    </div>
</div><!-- end sectc -->

<div id="sectd" class="homesect">
    <div>
    <h2>Section D - Further Study Details</h2>
    <ul>
        <li><a href="selector.php?cat=fsdest">Further study destinations</a></li>
        <li><a href="retentionform.php">Retention of graduates</a></li>
        <li><a href="selector.php?cat=fsfund">Funding of further study</a></li>
    </ul>
    </div>
</div><!-- end sectd -->

<div id="secte" class="homesect">
    <div>
    <h2>Section E - Overall Higher Education Experience</h2>
    <ul>
        <li><a href="selector.php?cat=heexp">Overall experience statistics</a></li>
    </ul>
    </div>
</div><!-- end secte -->

</div><!-- end col2 -->

<div id="furtherinfo" class="homesect">
    <div>
    <ul>
        <li><a href="whatis.php">Further details about the Destination of Leavers from Higher Education (DLHE) survey</a></li>
    </ul>
    </div>
</div><!-- end furtherinfo -->

<?php include 'footer.php' ?>

      <?php include 'scripts.inc'; ?>

        <?php include 'analytics.php'; ?>
    </body>
</html>
