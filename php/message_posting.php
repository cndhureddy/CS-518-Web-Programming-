<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 11/19/2017
 * Time: 2:36 PM
 */
include_once('db_queries.php');
class message_posting
{

    public function post_message($channel_id,$user_id,$message,$message_type){

        include ("connect.php");

        //$message = $_POST['message'];
        //$user_id = $_POST['user_id'];
        //$channel_id = $_POST['channel_id'];
       // echo "hello";
       // die();

        $smiley_status='False';
        date_default_timezone_set("America/New_York");


        $date = new DateTime();

        $current_date = $date->format('Y-m-d H:i:s');

        $message_final=mysqli_real_escape_string($conn,$message);


        if (trim($message_final)!=='') {

            $db_object=new db_queries();
            //echo $channel_id;
            //echo $user_id;
            //echo $message_final;
            //echo $current_date;
            //echo $smiley_status;
            //echo $message_type;

            $query=$db_object->insert_message($channel_id,$user_id,$message_final,$current_date,$smiley_status,$message_type);

            //$conn->query($query);
            //echo $query;


           // $query = "insert into channel_messages values(DEFAULT,'$channel_id','$user_id','$message_final','$current_date','$smiley_status','$message_type')";
            mysqli_query($conn, $query);
            //echo $query;
            mysqli_close($conn);

//echo "hello";
        }

        return 1;


    }




}