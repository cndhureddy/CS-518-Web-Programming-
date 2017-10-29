<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/29/2017
 * Time: 12:17 AM
 */
include ("connect.php");

$message_id= $_POST['message_id'];
$message= $_POST['message'];
$user_id= $_POST['user_id'];



$smileys = explode(':', $message); //
$smiley_status='False';

//echo "<br>";
//echo $smileys[0];
if(count($smileys)>1)
{
    $smiley_status='True';
}

date_default_timezone_set("America/New_York");


$date = new DateTime();

$current_date = $date->format('Y-m-d H:i:s');
//echo $current_date;
$message_final=mysqli_real_escape_string($conn,$message);


if (trim($message_final)!=='') {
    $query = "insert into thread values(DEFAULT,'$message_id','$message_final','$user_id','$current_date','$smiley_status')";
    mysqli_query($conn, $query);
   // echo $query;
//echo "hello";
}

$query_thread_messages="select * from thread where message_id='".$message_id."'";

$result =$conn->query($query_thread_messages);

$thread_message_return=array();

while($row=$result->fetch_array(MYSQLI_ASSOC)){

    $user_id_thread=$row["user_id"];

    $sql_user_details="select * from users where user_id='$user_id_thread'";

    $ret_user=mysqli_query($conn,$sql_user_details);

    $row_user=mysqli_fetch_array($ret_user,MYSQLI_ASSOC);

    $user_name_thread= $row_user["display_name"];

    $user_thread_picture= $row_user["picture"];

    $thread_message_user=htmlspecialchars($row["message"]);


    $formated_time_am_pm=date("d M h:i A",strtotime($row["timestamp"]));

    $thread_id=$row["thread_id"];

    $thread_message=array('user_id'=>$user_id_thread,'user_name_thread'=>$user_name_thread,'user_thread_picture'=>$user_thread_picture,'thread_message'=>$thread_message_user,'time'=>$formated_time_am_pm,'thread_id'=>$thread_id);

    array_push($thread_message_return,$thread_message);





}


echo json_encode($thread_message_return);


mysqli_close($conn);