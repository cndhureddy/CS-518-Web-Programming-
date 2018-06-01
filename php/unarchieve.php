<?php
/**
 * Created by PhpStorm.
 * Date: 11/21/2017
 * Time: 6:46 AM
 */
include ("connect.php");
session_start();

if($_SESSION['admin']=="yes" )
{

}
else{
    header('location:../index.php');
    die();
}

$channel_id=$_POST["channel_id"];
$channel_name=$_POST["channel_name"];
$user_id="18";

$query="update channels set archieved_status='unarchieved' where channel_id='".$channel_id."'";
mysqli_query($conn,$query);
mysqli_close($conn);
$parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
header("location: admin_home.php?$parameter#test");
