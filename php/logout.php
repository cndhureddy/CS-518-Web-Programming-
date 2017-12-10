<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/1/2017
 * Time: 1:01 AM
 */

session_start();
session_unset();
session_destroy();
$_SESSION = array();
echo '<script type=\"javascript\">
  FB.logout(function(response) {
  // user is now logged out
});
</script>';
//die();

header('location: ../index.php');
