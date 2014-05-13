<?php
/**
 * Created by PhpStorm.
 * User: mszadm
 * Date: 11/04/2014
 * Time: 11:32
 */

session_start();
if (isset($_SESSION['_user_data']['id'])) {
    session_destroy();
    echo "<br> you have are logged out successfully!";
}
echo "<br/><a href='login.php'>login</a>";
?>