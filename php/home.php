<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel='stylesheet' type='text/css' href='../css/homecss.php' />

</head>
<body>


<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/1/2017
 * Time: 12:30 AM
 */
session_start();

if($_SESSION['email'])
{

}
else{
    header('location:../index.php');
}

echo $_SESSION['email'];

//echo $_SESSION['work_space_name'];
?>

<div class="vertical-div">


    <div tabindex="0" class="top-user-button onclick-menu">

    <div class="onclick-menu-content ">

        <div id="username-display-in-div"> <?php echo $_SESSION["display_name"]; ?></div>
        <div id="fullname-display-in-div"> <?php echo $_SESSION["full_name"]; ?></div>
        <br>
        <button class="user-dropdown"  > Set a Status</button>
        <button class="user-dropdown" >Profile & account</button>

        <form   action="logout.php" method="post">
            <input id="submit-button"  type="submit" value="Sign Out"/>

        </form>
        <!--<li><button >Look, mom</button></li>
        <li><button >no JavaScript!</button></li>
        <li><button >Pretty nice, right?</button></li>-->
    </div>
        <div id="username-display"> <?php echo $_SESSION["display_name"]; ?></div>


</div>

    <form  action="logout.php" method="post">
        <input    type="submit" value="Sign Out"/>

    </form>







</body>
</html>