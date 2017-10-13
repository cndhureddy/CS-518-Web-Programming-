<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/6/2017
 * Time: 7:24 PM
 */
//echo "hello <br>";
//echo $_POST["hello"]."1"."<br>";
$channel_name='';
function get_channel_name_onclick()
{
   // $channel_name='';
    foreach ($_POST as $name => $content) {

        // echo $name;
        //echo $content;
        $GLOBALS['channel_name'] = str_replace('# ', '', $content);
      //  echo $channel_name;
    }

return $GLOBALS['channel_name'];
}


$channel_name=get_channel_name_onclick();
//echo $channel_name;

include("connect.php");
session_start();
$email = $_SESSION['email'];

function get_user($conn,$email){

    $query = mysqli_query($conn, "select  user_id from users where email_id='" . mysqli_real_escape_string($conn,$email ). "'");

    $res = mysqli_fetch_row($query);
    //echo $res;
    $user_id=$res[0];

    return $user_id;
}

$user_id=get_user($conn,$email);
//echo $user_id."userid";
function get_channel_id($conn,$email,$channel_name){
   // echo $channel_name;
   // $query = mysqli_query($conn,""

    $query1 = mysqli_query($conn,"select channels.channel_id from channels,channel_users,users where channels.channel_name='".mysqli_real_escape_string($conn,$channel_name)."' and channels.channel_id=channel_users.channel_id and channel_users.user_id=users.user_id and users.work_space_url=channels.work_space_url and users.email_id='".mysqli_real_escape_string($conn,$email)."'");
    //echo $query;
    $res1 = mysqli_fetch_row($query1);
   // echo $res1;
    $channel_id=$res1[0];
    return $channel_id;

}

$channel_id=get_channel_id($conn,$email,$channel_name);
//echo $channel_id ."channelid"."";
$parameter="channel_id=".($channel_id)."&user_id=".($user_id)."&channel_name=".($channel_name);
//$_SESSION[""]=
header("location: home.php?$parameter");