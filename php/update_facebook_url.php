<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include("connect.php");
$email=$_SESSION["email"];
//$query_1=;
$result_1=mysqli_query($conn,"select * from dp_urls where email_id='".$email."'");
$row_1=mysqli_fetch_row($result_1);
$to_update=$row_1[3];

$query="update users set picture='".$to_update."' where email_id='".$email."'";
echo $query;
echo $to_update;
//die();
mysqli_query($conn,$query);
header("location:userprofile.php");
mysqli_close($conn);