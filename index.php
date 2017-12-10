<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
    <?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
session_start();
    ?>
    <div id="topbar" >
    <div ><img id="logo"  src="images/logo.jpg"></div>
    <div class="logo-text">ODU CS Slack</div>
    <div class="login-button"><form><input id="signin-button" type="submit" value="Sign in"></form></div>
    <div class="login-button"><form action="help.php"><input id="signin-button" type="submit" value="Help"></form></div>
</div>
    
    
    

<div id="login-center">

    

    
    
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

            <script>
                // This is called with the results from from FB.getLoginStatus().
                
                FB.logout(function(response) {
  // user is now logged out
});
                function statusChangeCallback(response) {
                    console.log('statusChangeCallback');
                    console.log(response);
                    // The response object is returned with a status field that lets the
                    // app know the current login status of the person.
                    // Full docs on the response object can be found in the documentation
                    // for FB.getLoginStatus().
                    if (response.status === 'connected') {
                        // Logged into your app and Facebook.
                        testAPI();
                    } else {
                        // The person is not logged into your app or we are unable to tell.
                        document.getElementById('status').innerHTML = 'Please log ' +
                            'into this app.';
                    }
                }

                // This function is called when someone finishes with the Login
                // Button.  See the onlogin handler attached to it in the sample
                // code below.
                function checkLoginState() {
                    FB.getLoginStatus(function(response) {
                        statusChangeCallback(response);
                    });
                }

                window.fbAsyncInit = function() {
                    FB.init({
                        appId      : '2009876122630098',
                        cookie     : true,  // enable cookies to allow the server to access
                                            // the session
                        xfbml      : true,  // parse social plugins on this page
                        version    : 'v2.8' // use graph api version 2.8
                    });

                    // Now that we've initialized the JavaScript SDK, we call
                    // FB.getLoginStatus().  This function gets the state of the
                    // person visiting this page and can return one of three states to
                    // the callback you provide.  They can be:
                    //
                    // 1. Logged into your app ('connected')
                    // 2. Logged into Facebook, but not your app ('not_authorized')
                    // 3. Not logged into Facebook and can't tell if they are logged into
                    //    your app or not.
                    //
                    // These three cases are handled in the callback function.

                    FB.getLoginStatus(function(response) {
                        statusChangeCallback(response);
                    });

                };

                // Load the SDK asynchronously
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "https://connect.facebook.net/en_US/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
              //  var final_user_id;
                // Here we run a very simple test of the Graph API after login is
                // successful.  See statusChangeCallback() for when this call is made.
                function testAPI() {
                    console.log('Welcome!  Fetching your information.... ');
                    FB.api('/me',{ locale: 'en_US', fields: 'name, email' }, function(response) {
                        console.log(response);
                        console.log('Successful login for: ' + response.name+' '+response.email);
                      //  document.getElementById('status').innerHTML =
                       //     'Thanks for logging in, ' + response.name + '!';
                        var user_name=response.name;
                        var user_email=response.email;
                        final_user_id=response.id;
                        var src="//graph.facebook.com/"+final_user_id+"/picture?type=large";
                        console.log(src);
                        <?php $_SESSION["facebook"]="yes"; ?>
                      window.location="/php/facebook_login.php?user_name="+user_name+"&user_email="+user_email+"&image_src="+src;
                        //window.location="/php/sample.php";

                    });
                }
            </script>

            <!--
              Below we include the Login Button social plugin. This button uses
              the JavaScript SDK to present a graphical Login button that triggers
              the FB.login() function when clicked.
            -->

            <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
            </fb:login-button>
          <!--  <img id="profile_pic" src="//graph.facebook.com/{+final_user_id+}/picture?type=large">-->
            <div id="status">


            </div>



            <?php
            //session_start();
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
