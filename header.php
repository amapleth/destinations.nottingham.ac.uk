


<div id='rootcontainer'> <div id="header">
<?php
echo internalUonAssets::getHeader();
if (isset($_SESSION['_user_data']['id'])) {
    $user = 'LOGOUT:' . $_SESSION['_user_data']['forename'] . '  ' . $_SESSION['_user_data']['surname'];
    echo "<a href='uon_specific/auth/logout.php'>" . $user . "</a>";
} else {
    header('location: uon_specific/auth/login.php');
}
?>

<img src="images/gemslogo2.png" alt="Gems Logo" width="800" height="94" align="right">
<?php
echo <<<headerHTML

<!-- <h1>GEMS 5.1.4</h1> -->
<!-- <p>Graduate Employment Market Statistics</p> -->
</div><!-- end headerBox -->

headerHTML;




?>
