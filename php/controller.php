<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 11/13/2017
 * Time: 5:28 PM
 */

session_start();
include ("connect.php");
if(isset($_SESSION['email']))
{

}
else{
    if($_SESSION['admin']=="yes"){

    }else {

       header('location:../index.php');
    }
}

include_once "./get_more_messages_file.php";
include_once "./message_posting.php";
include_once "./message_post_pic.php";
include_once "./get_more_messages_user_file.php";
//include('db_queries.php');

//echo "test";
$retrieving_messages=new get_more_messages();
$message_posting=new message_posting();
$message_post_pic=new message_post_pic();
$get_more_messages_user_file=new get_more_messages_user_file();




if(isset($_POST["retrieve_channel_id"])){
//echo "entered";

$channel_id=$_POST["retrieve_channel_id"];
$count=$_POST["count_div"];
$total_count=$_POST["total_count"];
//echo $channel_id;
//echo $count;
//echo $total_count;
///die();
//echo $_POST["user_id"];
//die();
    if(isset($_POST["user_id"])) {
        //echo "hello";
        //die();
        $user_id=$_POST["user_id"];
        $div = $retrieving_messages->retrieve_next_messages_admin($channel_id, $count, $total_count,$user_id);

    }else {
        $div = $retrieving_messages->retrieve_next_messages($channel_id, $count, $total_count);

    }//echo div;


    echo $div;
   // die();
//echo "hello";
}



if(isset($_POST["from_user_id"])){
//echo "entered";

    $from_user_id=$_POST["from_user_id"];
    $to_user_id=$_POST["to_user_id"];
    $count=$_POST["count_div"];
    $total_count=$_POST["total_count"];
    //$total_count=$_POST["total_count"];
//echo $channel_id;
//echo $count;
//echo $total_count;
///die();
//echo $_POST["user_id"];
//die();
   // if(isset($_POST["user_id"])) {
        //echo "hello";
        //die();
     //   $user_id=$_POST["user_id"];
        $div = $get_more_messages_user_file->get_more_messages_user($from_user_id, $to_user_id, $count,$total_count);

    //}else {
     //   $div = $retrieving_messages->retrieve_next_messages($channel_id, $count, $total_count);

    //}//echo div;


    echo $div;
    // die();
//echo "hello";
}

if(isset($_POST["message"])){
    if(isset($_POST["to_user_id"])){
//echo "hello";
        $to_user_id=$_POST["to_user_id"];
        $user_id=$_SESSION["user_id"];
        $message=$_POST["message"];
        $user_name=$_POST["to_display_name"];
        echo $user_name;
        //die();
        $message_type="message";
        $return_value = $message_posting->post_message_direct($to_user_id, $user_id, $message, $message_type);
        //if ($return_value == 1) {
          //  if ($user_id != 18) {
                $parameter = "to_user_id=" . ($to_user_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($user_name);
                echo $parameter;
                //die();
                header("location: home.php?$parameter#test");
            //}
        //}

    }
    else {
        $channel_id = $_POST["channel_id"];
        $user_id = $_POST["user_id"];
        $message = $_POST["message"];
        $channel_name = $_POST["channel_name"];
        $message_type = "message";
        $return_value = $message_posting->post_message($channel_id, $user_id, $message, $message_type);
        echo $return_value;
        echo "in message";

        if ($return_value == 1) {
            if ($user_id != 18) {
                $parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                header("location: home.php?$parameter#test");
            } else {

                $parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                header("location: admin_home.php?$parameter#test");
            }
        }
    }



}


if(isset($_POST["codesnip_value"])){
    if(isset($_POST["to_user_id"])){
        //echo "hello";

        $to_user_id=$_POST["to_user_id"];
        $user_id=$_SESSION["user_id"];
        $message=$_POST["codesnip_value"];
        $message_type=$_POST["message_type"];
        $user_name=$_POST["channel_name"];
        //echo $message_type;
        //die();
        $return_value = $message_posting->post_message_direct($to_user_id, $user_id, $message, $message_type);
        $parameter = "to_user_id=" . ($to_user_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($user_name);
        header("location: home.php?$parameter#test");
    }
    else {
        $channel_id = $_POST["channel_id"];
        $user_id = $_POST["user_id"];
        $message = $_POST["codesnip_value"];
        $message_type = $_POST["message_type"];
        $channel_name = $_POST["channel_name"];
        $return_value = $message_posting->post_message($channel_id, $user_id, $message, $message_type);
        echo $return_value;
       // echo "in code snip values";
        if ($return_value == 1) {
            if ($user_id != 18) {
                $parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                header("location: home.php?$parameter#test");
            } else {

                $parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                header("location: admin_home.php?$parameter#test");
            }
        }
    }




}
if(isset($_POST["img_link_content"])){
    if(isset($_POST["to_user_id"])){
        //echo "hello";


        $to_user_id=$_POST["to_user_id"];
        $user_id=$_SESSION["user_id"];


        $message=$_POST["img_link_content"];
        $user_name=$_POST["channel_name"];
        $headers = get_headers($message, 1);
        if (strpos($headers['Content-Type'], 'image/') !== false) {
            $message_type = $_POST["message_type"];
        } else {
            $message_type = "message";
        }
        $return_value = $message_posting->post_message_direct($to_user_id, $user_id, $message, $message_type);
        $parameter = "to_user_id=" . ($to_user_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($user_name);

        header("location: home.php?$parameter#test");

    }else {
        $channel_id = $_POST["channel_id"];
        $user_id = $_POST["user_id"];


        $channel_name = $_POST["channel_name"];
        $message = $_POST["img_link_content"];
        $headers = get_headers($message, 1);
        if (strpos($headers['Content-Type'], 'image/') !== false) {
            $message_type = $_POST["message_type"];
        } else {
            $message_type = "message";
        }

        $return_value = $message_posting->post_message($channel_id, $user_id, $message, $message_type);
        echo $return_value;
        echo "img_link_content";
        if ($return_value == 1) {
            if ($user_id != 18) {
                $parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                header("location: home.php?$parameter#test");
            } else {

                $parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                header("location: admin_home.php?$parameter#test");
            }
        }

    }



}



if(isset($_FILES["fileToUpload"])){


    $db_object=new db_queries();
    if(isset($_POST["to_user_id"])){
        $query=$db_object->get_file_name_direct();
        $user_name=$_POST["channel_name"];
        $to_user_id=$_POST["to_user_id"];
        $user_id=$_SESSION["user_id"];
        $result_set=$conn->query($query);
        mysqli_close($conn);
        $row=$result_set->fetch_array(MYSQLI_ASSOC);
        $number=$row["dr_message_id"]+1;
        $submit=$_POST["submit"];
        $size=$_FILES["fileToUpload"]["size"];
        echo $size;
        die();
        $image_name_a=$_FILES["fileToUpload"]["name"];
        $img_file_name=$_FILES["fileToUpload"]["tmp_name"];
        $img_name=$number."dr_msg_unique_img".$number;


        $smiley_status="false";
        $message_type="picture";
        $message_post_pic->upload_pic_direct($submit,$img_name,$img_file_name,$image_name_a,$size,$to_user_id,$user_id,$smiley_status,$message_type,$user_name);



    }



    $query=$db_object->get_file_name();
    //mysqli_query($conn,$query);
    $channel_name=$_POST["channel_name"];

    $result_set=$conn->query($query);
    mysqli_close($conn);
    $row=$result_set->fetch_array(MYSQLI_ASSOC);
    $number=$row["message_id"]+1;
    $channel_id=$_POST["channel_id"];
    $user_id=$_POST["user_id"];
    $channel_name=$_POST["channel_name"];
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
    $message_post_pic->upload_pic($submit,$img_name,$img_file_name,$image_name_a,$size,$channel_id,$user_id,$smiley_status,$message_type,$channel_name);

    /* $query=$db_object->insert_message($channel_id,$user_id,$message_final,$current_date,$smiley_status,$message_type);

     //$conn->query($query);


     // $query = "insert into channel_messages values(DEFAULT,'$channel_id','$user_id','$message_final','$current_date','$smiley_status','$message_type')";
     mysqli_query($conn, $query);
 */


}







