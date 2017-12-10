<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 12/4/2017
 * Time: 1:49 AM
 */
session_start();
$to_user_id=$_POST["to_user_id"];
$user_id=$_SESSION["user_id"];
//echo $user_id;
$user_name=$_POST["display_name"];
//echo $user_name;
$parameter="to_user_id=".($to_user_id)."&user_id=".($user_id)."&channel_name=".($user_name);
//$_SESSION[""]=
//mysqli_close($conn);
header("location: home.php?$parameter#test");