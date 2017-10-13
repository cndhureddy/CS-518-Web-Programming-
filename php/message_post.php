<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/8/2017
 * Time: 3:12 AM
 */

echo $_POST['message'];
echo $_POST['user_id'];
echo $_POST['channel_id'];

include("connect.php");

$message = $_POST['message'];
$user_id = $_POST['user_id'];
$channel_id = $_POST['channel_id'];


function insert_message($conn,$message,$user_id,$channel_id){

    $smileys = explode(':', $message); //
    $smiley_status='False';

    //echo "<br>";
    //echo $smileys[0];
    if(count($smileys)>1)
    {
        $smiley_status='True';
    }


    $date = new DateTime();

    $current_date = $date->format('Y-m-d H:i:s');
    echo $current_date;
    $message_final=mysqli_real_escape_string($conn,$message);

 $query="insert into channel_messages values(DEFAULT,'$channel_id','$user_id','$message_final','$current_date','$smiley_status')";
    mysqli_query($conn,$query);
 echo $query;
//echo "hello";



}

insert_message($conn,$message,$user_id,$channel_id);
mysqli_close($conn);
header("location: home.php");