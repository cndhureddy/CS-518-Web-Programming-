<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>

<div id="topbar" >
    <div ><img id="logo"  src="images/logo.jpg"></div>
    <div class="logo-text">ODU CS Slack</div>
    <div class="login-button"><form><input id="signin-button" type="submit" value="Sign in"></form></div>
    <div class="login-button"><form action="help.php"><input id="signin-button" type="submit" value="Help"></form></div>
</div>
    
    
    

<div id="login-center">

    
    <a href="https://www.facebook.com/dialog/oauth?client_id=2009876122630098&redirect_uri=http://sukeshsangam.cs518.cs.odu.edu/index.php&scope=publish_stream,email" title="Signup with facebook">
 
<button>Signup with facebook</button>
 
</a>
            <?php
            
            $app_id = "2009876122630098";
$app_secret = "4821af77768547a874145bd96db355d3";
$my_url = "http://sukeshsangam.cs518.cs.odu.edu/index.php";
$token_url = "https://graph.facebook.com/oauth/access_token?"
 . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
 . "&client_secret=" . $app_secret . "&code=" . $code . "&scope=publish_stream,email";
 
$response = @file_get_contents($token_url);
$params = null;
parse_str($response, $params);
         
$graph_url = "https://graph.facebook.com/me?access_token="
 . $params['access_token'];
 
$user = json_decode(file_get_contents($graph_url));
$username = $user->username;
$email = $user->email;
$facebook_id = $user->id;
            
            
            echo "$username";
            echo "email";
            echo "facebook_id";
                
            
            ?>
    
    
    
    <h1 class="logo-text sign-in-text"> Sign in to ODU CS Slack</h1>
    <span class="sign-in-text-url">oducs.slack.com</span>
    <form action="php/login.php" method="post">
        <div id="login">
            <span style="font-family: Sans-serif;"> Enter your email address and password </span>

            <input id="login-fields" placeholder="email id" type="text" name="email"/> <br>
            <input id="login-fields" placeholder="password" type="password" name="password"/>
            <input id="submit" type="submit"/>
            <a id="forgot_p" href="">forgot password?</a>
            <a id="forgot_p" href="php/registration.php" > Register</a><br>
            <a id="forgot_p" href="php/admin_login.php" > login as admin</a>
            
            
            
            
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
