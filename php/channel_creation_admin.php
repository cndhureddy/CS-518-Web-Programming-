<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">

    <style>


        .channel_creation{

            width: 40%;
            height: 50%;

            position: absolute;
            top:0;
            bottom: 0;
            left: 0;
            right: 0;
            border-radius: 3em;
            margin: auto;
        }


    </style>

</head>
<body>


<?php


session_start();

if($_SESSION['admin']=="yes")
{

}
else{
    header('location:../index.php');
    die();
}




?>

<div id="topbar" >
    <div ><img id="logo"  src="../images/logo.jpg"></div>
    <div class="logo-text">ODU CS Slack</div>
    <div class="login-button"><form action="admin_home.php?user_id=18&channel_id=1&channel_name=general" method="post"><input id="signin-button" type="submit" value=" home "></form></div>
</div>


<div class="channel_creation">
    <form method="post" action="CreateChannelAdmin.php">
        <table align="center">
            <tr>
                <td>channel_name :</td>
                <td> <input type="text" name="channel_name" required /></td>

            </tr>
            <tr>
                <td>privacy setting:</td>
                <td><select name="channel_settings">
                        <option value="public">public</option>
                        <option value="private">private</option>

                    </select></td>

            </tr>
            <tr>
                <td>purpose :</td>
                <td><textarea name="purpose" ></textarea> </td>
            </tr>
            <tr><td></td><td><input type="submit"/></td></tr>
        </table>


    </form>

    <?php

    //$_SESSION = array();
    if(isset($_SESSION["channel_name_error"])) {
        if ($_SESSION["channel_name_error"] == "error") {

            echo "<div id=\"error\"> Error:  Channel name should be atleast of 5 characters and lessthan 100 characters </div>";
            $_SESSION["channel_name_error"] ="";

        }
    }
    if(isset($_SESSION["channel_purpose_error"])){
        if ($_SESSION["channel_purpose_error"] == "error") {

            echo "<div id=\"error\"> Error:  purpose should be less than 200 characters</div>";
            $_SESSION["channel_name_error"] ="";
        }
    }


    if(isset($_SESSION["success"])){
        if ($_SESSION["success"] == "success") {

            echo "<div id=\"error\"> channel creation successful</div>";
            $_SESSION["success"] ="";
        }
    }



    ?>







</div>







</body>
</html>