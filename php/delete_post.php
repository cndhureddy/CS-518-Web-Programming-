<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 11/21/2017
 * Time: 9:14 AM
 */
include('connect.php');
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
session_start();
if($_SESSION["admin"]=="yes"){
    if(isset($_POST["message_id"])){


    }else{

       header('Location:admin_home.php?user_id=18&channel_id=1&channel_name=general');
       die();
    }


}else{

    header('location:../index.php');
    die();

}


$message_id=$_POST["message_id"];
$query="delete from channel_messages where message_id='".$message_id."'";
mysqli_query($conn,$query);
//header('admin_home.php?user_id=18&channel_id=1&channel_name=general');
mysqli_close($conn);
header('Location:admin_home.php?user_id=18&channel_id=1&channel_name=general');
die();