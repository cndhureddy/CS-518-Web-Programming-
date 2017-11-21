
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">

</head>
<body>

<div id="topbar" >
    <div ><img id="logo"  src="../images/logo.jpg"></div>
    <div class="logo-text">ODU CS Slack</div>
    <div class="login-button"><form><input id="signin-button" type="submit" value="Sign in"></form></div>
</div>

<div id="login-center">

    <h1 class="logo-text sign-in-text"> Sign in to ODU CS Slack</h1>
    <span class="sign-in-text-url">oducs.slack.com</span>
    <form action="loginAdmin.php" method="post">
        <div id="login">
            <span style="font-family: Sans-serif;"> Enter your email address and password </span>

            <input id="login-fields" placeholder="email id" type="text" name="email"/> <br>
            <input id="login-fields" placeholder="password" type="password" name="password"/>
            <input id="submit" type="submit"/>

            <?php
            session_start();
            //$_SESSION = array();
            if(isset($_SESSION['error'])) {
                if ($_SESSION['error'] == "yes") {

                    echo "<div id=\"error\"> Error:  Entered email or password are incorrect </div>";


                }
                if ($_SESSION['null'] == "yes") {

                    echo "<div id=\"error\"> Error:  please enter both email and password</div>";

                }
            }
            ?>
</div>
</form>
</div>

</body>
</html>