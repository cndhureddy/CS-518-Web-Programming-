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
    <div class="login-button"><form action="profiles.php" method="post"><input id="signin-button" type="submit" value=" go back "></form></div>
</div>
<br>
<?php

$user_id=$_GET["user_id"];
$query="select * from users where user_id='$user_id'";

$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
?>



<div style="text-align: center"><img style="height: 300px; width: 300px; margin-left:7%; margin-top: 4%;" src="<?php echo $row["picture"]; ?>"/>
<table align="center" style="margin-top: 10%">
    <tr><td>Username : </td><td><?php echo $row["display_name"]; ?></td></tr>
    <?php   $sql_channel_ids = "SELECT channel_id from channel_users where user_id='$user_id'";
    $result_channel_id = $conn->query($sql_channel_ids);

    if($result_channel_id->num_rows>0){

        while($result_channel_users=$result_channel_id->fetch_assoc()){

            $channel_id_a=$result_channel_users["channel_id"];
            // echo $channel_id_a;
            $sql_channels_display="SELECT channel_name from channels where channel_id='$channel_id_a'";
            $result_channel_display = $conn->query($sql_channels_display);
            $result_set_display=$result_channel_display->fetch_assoc();
            $sql_channels_display_settings="SELECT privacy_settings from channels where channel_id='$channel_id_a'";
            $result_channel_display_settings = $conn->query($sql_channels_display_settings);
            $result_set_display_settings=$result_channel_display_settings->fetch_assoc();

           $channel_membership= $result_set_display_settings["privacy_settings"];
                if($channel_membership=="public") {
                    echo "<tr> <td>" . $result_set_display["channel_name"] . "</td><td>" . $result_set_display_settings["privacy_settings"] . "</td></tr>";
                }
        }




    } ?>
</table>
<?php } ?>




</body>
</html>