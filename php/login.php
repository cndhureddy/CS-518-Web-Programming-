<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 9/30/2017
 * Time: 11:17 PM
 */
include('connect.php');

session_start();

$_SESSION['error'] ="No";
$_SESSION['null']="No";

$email = $_POST['email'];
$password =  $_POST['password'];

if($email!=""&$password!="")
    {
        $query = mysqli_query($conn,"select * from users where email_id='".$email."' and password='".$password."'");

        $res=mysqli_fetch_row($query);
        if($res)
        {
            $_SESSION['email']=$email;
            header('location:home.php');
        }
        else
        {
            echo 'You entered username or password is incorrect';
            header('location:../index.php');
            $_SESSION['error']="yes";
        }

    }
    else{

        header('location:../index.php');
        $_SESSION['null']="yes";


    }