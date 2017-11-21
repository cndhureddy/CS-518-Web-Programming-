<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/31/2017
 * Time: 5:21 AM*/


session_start();
include ("connect.php");
if($_SESSION['admin']=="yes")
{

}
else{
    header('location:../index.php');
    die();
}


if(strlen($_POST["channel_name"])>100||strlen($_POST["channel_name"])<5){


    $_SESSION["channel_name_error"]="error";
    header('location:channel_creation.php');
    die();
}

if(strlen($_POST["purpose"])>200){


    $_SESSION["channel_purpose_error"]="error";
    header('location:channel_creation.php');
    die();
}

$channel_name=$_POST["channel_name"];

$purpose= $_POST["purpose"];

$privacy_settings=$_POST["channel_settings"];



//$email = $_SESSION['email'];

//$query = mysqli_query($conn, "select  user_id from users where email_id='" . mysqli_real_escape_string($conn,$email ). "'");

//$res = mysqli_fetch_row($query);
//echo $res;
$user_id=18;

date_default_timezone_set("America/New_York");


$date = new DateTime();

$current_date = $date->format('Y-m-d H:i:s');

$query_insert = "insert into channels values(DEFAULT,'". mysqli_real_escape_string($conn,$channel_name)."','slack.cs.odu.edu','$privacy_settings','$purpose','$user_id','$current_date',DEFAULT)";
mysqli_query($conn, $query_insert);


$query_get_id = mysqli_query($conn, "select  channel_id from channels where channel_name='" . mysqli_real_escape_string($conn,$channel_name ). "'");

//echo $query_get_id;
$res_get = mysqli_fetch_row($query_get_id);

$channel_id=$res_get[0];

$query_channel="insert into channel_users values('$channel_id','$user_id','$current_date','$current_date')";

mysqli_query($conn, $query_channel);

$_SESSION["success"]="success";
header('location:channel_creation_admin.php');
mysqli_close($conn);
die();
