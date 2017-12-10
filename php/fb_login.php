<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 12/10/2017
 * Time: 1:45 AM
 */
include ("connect.php");
session_start();
if(isset($_SESSION["facebook"])){


}
else{

    header("../index.php");
    die();

}

$user_id_facebook= GET["user_id"];
$user_email_facebook= GET["user_email"];
$user_image_facebook= GET["image_src"];

echo $user_id;
echo $user_email_facebook;
echo $user_image_facebook;
