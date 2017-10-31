<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="../css/registration.css">

</head>
<body>
<?php  session_start();  ?>
<div id="topbar" >
    <div ><img id="logo"  src="../images/logo.jpg"></div>
    <div class="logo-text">ODU CS Slack</div>
    <div class="login-button" ><form action="login.php" ><input id="signin-button" type="submit" value="Sign in"></form></div>
</div>

<div id="login-center">

    <h1 class="logo-text sign-in-text"> Register in to ODU CS Slack</h1>
    <span class="sign-in-text-url">oducs.slack.com</span>
    <form action="register.php" method="post">
        <div id="login">

            <?php  if(isset($_SESSION['register_success'])) {
                if($_SESSION['register_success']=="success"){

                    echo "<div id=\"error\"> REgistration Successful</div>";

                }


            }?>

            <span style="font-family: Sans-serif;"> Enter your details </span>
            <input id="login-fields" placeholder="user name" type="text" name="username" required/><br> <?php  if(isset($_SESSION['username_check'])) {
                if($_SESSION['username_check']=="error"){

                    echo "<div id=\"error\"> Error:  Entered username length should be between 6 and 20 characters </div>";

                }


            }
            if(isset($_SESSION["username_exists"])){

                if($_SESSION["username_exists"]=="error") {

                    echo "<div id=\"error\"> Entered username already exists </div>";
                }
            }



            ?>
            <input id="login-fields" placeholder="email id" type="email" name="email" required/> <br><?php  if(isset($_SESSION["email_id_check"])) {
                if($_SESSION["email_id_check"]=="error"){

                    echo "<div id=\"error\"> Error:  Entered email id is invalid </div>";

                }

            }

            if(isset($_SESSION["email_exists"])){

             if($_SESSION["email_exists"]=="error") {

                 echo "<div id=\"error\"> Entered email id already exists </div>";
             }
            }

            ?>
            <input id="login-fields" placeholder="password" type="password" name="password" required/><br><?php  if(isset($_SESSION["password_check"])) {
                if($_SESSION["password_check"]="error"){

                    echo "<div id=\"error\"> Password length should be between 6 and 20 characters</div>";

                }

            } ?>
            <input id="login-fields" placeholder="confirm password" type="password" name="confirmpassword" required/><br><?php  if(isset($_SESSION["confirmpassword"])) {
                if($_SESSION["confirmpassword"]="error"){

                    echo "<div id=\"error\"> Password and Confirm password doesn't matched</div>";

                }

            } ?>

            <?php

            session_unset();
            session_destroy();

            ?>
            <input id="submit" type="submit" value="register"/>


        </div>
    </form>
</div>

</body>
</html>