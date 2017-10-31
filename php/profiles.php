<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">

</head>
<body>


<?php
include ("connect.php");

session_start();

if($_SESSION['email'])
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
    <div class="login-button"><form action="home.php" method="post"><input id="signin-button" type="submit" value=" home "></form></div>

</div>
<br>
<table align="center" style="margin-top: 10%">
<tr><th>User Profiles in slack</th></tr>
<?php

$sql_user_id = "SELECT * from users where work_space_url='slack.cs.odu.edu'";
$result_user_id = $conn->query($sql_user_id);
while ($row_user_id = $result_user_id->fetch_assoc()) {


$user_id = $row_user_id["user_id"];
$full_name = $row_user_id["full_name"];
echo "<tr><td>$full_name</td><td><form action=\"get_profiles.php\" method='get'><input type='hidden' name='user_id' value=$user_id><input type='submit' value='visit profile'></form></td></tr>";



}


?>
    </table>





</body>
</html>