<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 11/13/2017
 * Time: 5:28 PM
 */

session_start();
include ("connect.php");
if($_SESSION['email'])
{

}
else{
    header('location:../index.php');
}

include_once "./get_more_messages_file.php";
include_once "./message_posting.php";
include_once "./message_post_pic.php";
//include('db_queries.php');

//echo "test";
$retrieving_messages=new get_more_messages();
$message_posting=new message_posting();
$message_post_pic=new message_post_pic();




if(isset($_POST["retrieve_channel_id"])){

$channel_id=$_POST["retrieve_channel_id"];
$count=$_POST["count_div"];

$div=$retrieving_messages->retrieve_next_messages($channel_id,$count);



    echo $div;

}


if(isset($_POST["message"])){
    $channel_id=$_POST["channel_id"];
    $user_id=$_POST["user_id"];
    $message=$_POST["message"];
    $message_type="message";
    $return_value=$message_posting->post_message($channel_id,$user_id,$message,$message_type);
    echo $return_value;
    echo "in message";

    if($return_value==1){

        header("location: home.php?$parameter#test");

    }




}


if(isset($_POST["codesnip_value"])){

    $channel_id=$_POST["channel_id"];
    $user_id=$_POST["user_id"];
    $message=$_POST["codesnip_value"];
    $message_type=$_POST["message_type"];
    $return_value=$message_posting->post_message($channel_id,$user_id,$message,$message_type);
    echo $return_value;
    echo "in code snip values";
     if($return_value==1){
         header("location: home.php?$parameter#test");

     }





}
if(isset($_POST["img_link_content"])){

    $channel_id=$_POST["channel_id"];
    $user_id=$_POST["user_id"];
    $message=$_POST["img_link_content"];
    $message_type=$_POST["message_type"];
    $return_value=$message_posting->post_message($channel_id,$user_id,$message,$message_type);
    echo $return_value;
    echo "img_link_content";
      if($return_value==1){
          header("location: home.php?$parameter#test");

      }





}



if(isset($_FILES["fileToUpload"])){

    $db_object=new db_queries();

    $query=$db_object->get_file_name();
    //mysqli_query($conn,$query);

    $result_set=$conn->query($query);
    mysqli_close($conn);
    $row=$result_set->fetch_array(MYSQLI_ASSOC);
    $number=$row["message_id"]+1;
    $channel_id=$_POST["channel_id"];
    $user_id=$_POST["user_id"];
    $submit=$_POST["submit"];
    $size=$_FILES["fileToUpload"]["size"];
    $image_name_a=$_FILES["fileToUpload"]["name"];
    $img_file_name=$_FILES["fileToUpload"]["tmp_name"];
    $img_name=$number."msg_unique_img".$number;

    /*
       echo $img_file_name;
       echo "<br>";
       echo $channel_id;
        echo "<br>";
       echo $user_id;
        echo "<br>";
       echo $submit;
        echo "<br>";
       echo $size;
        echo "<br>";
       echo $image_name_a;
        echo "<br>";
       echo $img_file_name;
        echo "<br>";
       //echo $img_file_name;
        echo "<br>";
       echo $img_name;*/
    $smiley_status="false";
    $message_type="picture";
    $message_post_pic->upload_pic($submit,$img_name,$img_file_name,$image_name_a,$size,$channel_id,$user_id,$smiley_status,$message_type);

    /* $query=$db_object->insert_message($channel_id,$user_id,$message_final,$current_date,$smiley_status,$message_type);

     //$conn->query($query);


     // $query = "insert into channel_messages values(DEFAULT,'$channel_id','$user_id','$message_final','$current_date','$smiley_status','$message_type')";
     mysqli_query($conn, $query);
 */
}







