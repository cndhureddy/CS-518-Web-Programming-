<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/28/2017
 * Time: 3:01 PM
 */



include ("connect.php");

$type_like= $_POST["type_like"];
$message_id= mysqli_real_escape_string($conn,$_POST["message_id"]);
$user_id= mysqli_real_escape_string($conn,$_POST["user_id"]);

//echo $type_like;
//echo $message_id;
//echo $user_id;


$sql_user_details="select * from users where user_id='$user_id'";

$ret_user=mysqli_query($conn,$sql_user_details);

$row_user=mysqli_fetch_array($ret_user,MYSQLI_ASSOC);

$user_name_thread= $row_user["display_name"];

$user_thread_picture= $row_user["picture"];

$sql_message_thread="select * from channel_messages where message_id='$message_id'";

$ret_message=mysqli_query($conn,$sql_message_thread);

$row_message=mysqli_fetch_array($ret_message,MYSQLI_ASSOC);
$_message_thread = $row_message["message"];
//$_message_timestamp = $row_message["timestamp"];

$formated_time_am_pm=date("d M h:i A",strtotime($row_message["timestamp"]));

echo json_encode(array('picture'=>$user_thread_picture,'user_name'=>$user_name_thread,'message'=>htmlspecialchars($_message_thread),'time'=>$formated_time_am_pm,'user_id'=>$user_id,'message_id'=>$message_id));

mysqli_close($conn);
