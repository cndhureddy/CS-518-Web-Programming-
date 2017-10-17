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
        $query = mysqli_query($conn,"select * from users where email_id='".mysqli_real_escape_string($conn,$email)."' and password='".mysqli_real_escape_string($conn,$password)."'");

        $res=mysqli_fetch_row($query);
        if($res)
        {
            $_SESSION['email']=$email;

            $query_workspace = mysqli_query($conn,  "select work_space.work_space_name from work_space,users where users.email_id='".mysqli_real_escape_string($conn,$email)."' and work_space.work_space_url = users.work_space_url");
            $result_workspace_name=mysqli_fetch_row($query_workspace);

            $_SESSION['work_space_name']=$result_workspace_name[0];


            $query_user_names = mysqli_query($conn,"select full_name, display_name from users where email_id='".mysqli_real_escape_string($conn,$email)."'");
            $result_user_name=mysqli_fetch_row($query_user_names);

            $_SESSION['full_name'] = $result_user_name[0];
            $_SESSION['display_name'] = $result_user_name[1];

            mysqli_close($conn);
            header('location:home.php#test');
        }
        else
        {
            mysqli_close($conn);
            $_SESSION['error']="yes";
            echo 'You entered username or password is incorrect';
            header('location:../index.php');

        }

    }
    else{

        mysqli_close($conn);
        $_SESSION['null']="yes";
        header('location:../index.php');



    }

