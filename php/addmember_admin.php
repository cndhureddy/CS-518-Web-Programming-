<?php
/**
 * Created by PhpStorm.
 * Date: 11/21/2017
 * Time: 7:25 AM
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
$query_insert = "insert into channel_users values('$channel_id','$user_id','$current_date','$current_date')";
mysqli_query($conn, $query_insert);
$_SESSION["visited"]="true";
header('location:admin_channel_membership.php');
mysqli_close($conn);
die();
