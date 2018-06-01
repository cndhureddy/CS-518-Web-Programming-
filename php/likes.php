<?php
/**
 * Created by PhpStorm.
 * Date: 10/24/2017
 * Time: 3:03 PM
 */
//echo "hello";
$type_like= $_POST["type_like"];
$message_id= $_POST["message_id"];
$user_id= $_POST["user_id"];

include("connect.php");

$query_emoji_id = "select emoji_id from emojis where emoji='$type_like'";


$result_like_type=$conn->query($query_emoji_id);

$row_like=$result_like_type->fetch_array(MYSQLI_ASSOC);
$emoji_id = $row_like["emoji_id"];

$query_check="select * from message_reaction where message_id='$message_id' and user_id='$user_id' and reaction='$emoji_id'";
$result_check=$conn->query($query_check);
$row_check=$result_check->fetch_array(MYSQLI_ASSOC);
if($emoji_id==1){

    $opp_emoji_id=2;

}
if($emoji_id==2){
    $opp_emoji_id=1;
}
//echo $row_check["message_id"];
//echo mysqli_num_rows($result_check);
//if($result_check=mysqli_query($conn,$query_check) && mysqli_num_rows($result_check)>0) {
if(mysqli_num_rows($result_check)){

$query_delete="delete from message_reaction  where message_id='$message_id' and user_id='$user_id' and reaction='$emoji_id'";
    $conn->query($query_delete);
}
else{


    $query_check_dislike="select * from message_reaction where message_id='$message_id' and user_id='$user_id' and reaction='$opp_emoji_id'";
    $result_check_dislike=$conn->query($query_check_dislike);
    $row_check_dislike=$result_check_dislike->fetch_array(MYSQLI_ASSOC);

    if(mysqli_num_rows($result_check_dislike)){

        $query_delete_dislike="delete from message_reaction  where message_id='$message_id' and user_id='$user_id' and reaction='$opp_emoji_id'";
        $conn->query($query_delete_dislike);
    }



    $query = "insert into message_reaction values('$message_id','$emoji_id','$user_id') ";

   // echo $query;

    mysqli_query($conn, $query);
}

$query_message_id_like="SELECT count(*) as count FROM `message_reaction` WHERE message_id='$message_id' and reaction='1'";
$result_message_id_like=$conn->query($query_message_id_like);
if(mysqli_num_rows($result_message_id_like)>0) {
    $row_message_id_like=$result_message_id_like->fetch_array(MYSQLI_ASSOC);
    $count_like=$row_message_id_like["count"];
    // print_r($row_message_id);

}
$query_message_id_dislike="SELECT count(*) as count FROM `message_reaction` WHERE message_id='$message_id' and reaction='2'";

$result_message_id_dislike=$conn->query($query_message_id_dislike);
if(mysqli_num_rows($result_message_id_dislike)>0) {
    $row_message_id_dislike = $result_message_id_dislike->fetch_array(MYSQLI_ASSOC);
    $count_dislike=$row_message_id_dislike["count"];

}

echo json_encode([$count_like,$count_dislike]);


    mysqli_close($conn);

/*

function like_messages($conn,$type_like,$message_id,$user_id){

echo "hello";
    $query = "insert into message_reaction values('$message_id','$user_id','like') ";

    mysqli_query($conn, $query);


}
like_messages($conn,$type_like,$message_id,$user_id);
*/
