<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">


    <style>

        .ratings {
            position: relative;
            vertical-align: middle;
            display: inline-block;
            color: #b1b1b1;
            overflow: hidden;
        }
        .full-stars {
            position: absolute;
            left: 0;
            top: 0;
            white-space: nowrap;
            overflow: hidden;
            color: #fde16d;
        }
        .empty-stars:before, .full-stars:before {
            content:"\2605\2605\2605\2605\2605";
            font-size: 14pt;
        }
        .empty-stars:before {
            -webkit-text-stroke: 1px #848484;
        }
        .full-stars:before {
            -webkit-text-stroke: 1px orange;
        }
        /* Webkit-text-stroke is not supported on firefox or IE */

        /* Firefox */
        @-moz-document url-prefix() {
            .full-stars {
                color: #ECBE24;
            }
        }
        /* IE */
        <!--[if IE]> .full-stars {
                       color: #ECBE24;
                   }
        <![endif]-->


    </style>

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
    <?php   $sql_channel_ids = "SELECT channel_id from channel_users where user_id='".mysqli_real_escape_string($conn,$user_id)."'";
    $result_channel_id = $conn->query($sql_channel_ids);

    if($result_channel_id->num_rows>0){

        while($result_channel_users=$result_channel_id->fetch_assoc()){

            $channel_id_a=$result_channel_users["channel_id"];
            // echo $channel_id_a;
            $sql_channels_display="SELECT channel_name from channels where channel_id='".mysqli_real_escape_string($conn,$channel_id_a)."'";
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
<?php }

$query_channal_users="select count(*) from channel_users where user_id='".$user_id."'";

$result_channal_count=$conn->query($query_channal_users);

$result_set_channal=$result_channal_count->fetch_assoc();

$user_channal_count=$result_set_channal["count(*)"];

//echo $user_channal_count;
//echo "<br>";
$query_total_count_channel="SELECT max(maximum) as max FROM( SELECT count(channel_id) as maximum FROM `channel_users` GROUP by user_id) TEMP";

$result_channal_count_1=$conn->query($query_total_count_channel);

$result_set_channal_1=$result_channal_count_1->fetch_assoc();

$user_channal_count_t=$result_set_channal_1["max"];
//echo $user_channal_count_t;
//echo "<br>";
$initial_channel_per=$user_channal_count/$user_channal_count_t;
//echo $initial_channel_per*100;
$channel_metrix=$initial_channel_per*100;
//echo "<br>";
//$channel_metrix=$initial_channel_per*5;
//echo $channel_metrix*100;

echo " <b>channels memberships ratings</b><div class=\"ratings\">
    <div class=\"empty-stars\"></div>
    <div class=\"full-stars\" style=\"width:".$channel_metrix."%\"></div>
</div>";

$query_total_count_messages="SELECT max(maximum) as max FROM( SELECT count(message_id) as maximum FROM `channel_messages` GROUP by user_id) TEMP";

$result_message_count_1=$conn->query($query_total_count_messages);

$result_set_message_1=$result_message_count_1->fetch_assoc();

$user_message_count_t=$result_set_message_1["max"];

$query_message_users="select count(*) from channel_messages where user_id='".$user_id."'";

$result_message_count=$conn->query($query_message_users);

$result_set_message=$result_message_count->fetch_assoc();

$user_message_count=$result_set_message["count(*)"];
//echo $user_message_count;
$message_metrix_i=$user_message_count/$user_message_count_t;

$message_metrix=$message_metrix_i*100;
//echo $message_metrix;
echo " <b>message post ratings</b><div class=\"ratings\">
    <div class=\"empty-stars\"></div>
    <div class=\"full-stars\" style=\"width:".$message_metrix."%\"></div>
</div>";



$query_reaction_t="SELECT max(maximum) as max FROM( SELECT count(message_id) as maximum FROM message_reaction GROUP by user_id) TEMP";
$result_reaction_t=$conn->query($query_reaction_t);
$result_set_t=$result_reaction_t->fetch_assoc();

$user_reactions_t=$result_set_t["max"];


$query_reactions_user="select count(*) from message_reaction where user_id='".$user_id."'";

$result_reactions_count=$conn->query($query_reactions_user);

$result_set_reactions=$result_reactions_count->fetch_assoc();

$user_reaction_count=$result_set_reactions["count(*)"];


$message_reaction_metrix_i=$user_reaction_count/$user_reactions_t;

$message_reaction_metrix=$message_reaction_metrix_i*100;

echo " <b>messages reactions ratings</b><div class=\"ratings\">
    <div class=\"empty-stars\"></div>
    <div class=\"full-stars\" style=\"width:".$message_reaction_metrix."%\"></div>
</div>";

$overall_rating=($channel_metrix+$message_metrix+$message_reaction_metrix)/3;

echo "<br> <b>Overall rating</b><div class=\"ratings\">
    <div class=\"empty-stars\"></div>
    <div class=\"full-stars\" style=\"width:".$overall_rating."%\"></div>
</div>";

?>




</body>
</html>