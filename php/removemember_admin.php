<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 11/21/2017
 * Time: 7:39 AM
 */
session_start();
if($_SESSION['admin']=="yes" )
{

}
else{
    header('location:../index.php');
    die();
}

include("connect.php");
date_default_timezone_set("America/New_York");
$date = new DateTime();

$current_date = $date->format('Y-m-d H:i:s');

$user_id=$_POST["user_id"];
$channel_id=$_POST["channel_id"];
echo $user_id;
echo $channel_id;
$query_insert = "delete from channel_users where channel_id='".$channel_id."' and user_id='".$user_id."'";
mysqli_query($conn, $query_insert);
$_SESSION["visited"]="true";
header('location:admin_channel_membership.php');
mysqli_close($conn);
die();