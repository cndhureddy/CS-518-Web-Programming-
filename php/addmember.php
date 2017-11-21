<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/31/2017
 * Time: 8:00 AM
 */
session_start();
if($_SESSION['email'] )
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

header('location:invite_members.php');
mysqli_close($conn);
die();
