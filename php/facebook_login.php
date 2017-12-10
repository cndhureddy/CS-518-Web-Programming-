<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("connect.php");
session_start();
//die();
if(isset($_SESSION["facebook"])){


}
else{

   header("../index.php");
    die();

}

$user_name_facebook= GET["user_name"];
$user_email_facebook= GET["user_email"];
$user_image_facebook= GET["image_src"];
echo $user_name_facebook;
echo $user_email_facebook;
echo $user_image_facebook;
//die();

 $query = mysqli_query($conn,"select * from users where email_id='".mysqli_real_escape_string($conn,$user_email_facebook)."'");

        $res=mysqli_fetch_row($query);
if($res){
//$query_insert=mysqli_query($conn,"insert into users values()");
    if($res["type_registration"]=="regular"){
    mysqli_close($conn);
        $_SESSION['email']=$user_email_facebook;
    header('location:home.php#test');
    
    }
    else{
    
        $query_insert=mysqli_query($conn,"update users set full_name='".mysqli_real_escape_string($conn,$user_name_facebook)."',display_name='".mysqli_real_escape_string($conn,$user_name_facebook)."',picture='".mysqli_real_escape_string($conn,$user_image_facebook)."',type_registration='facebook' where email_id='".mysqli_real_escape_string($conn,$user_email_facebook)."')");
mysqli_close($conn);
        $_SESSION['email']=$user_email_facebook;
    header('location:home.php#test');
    
    }
    
    
}else{
$query_insert=mysqli_query($conn,"insert into users values(DEFAULT,'".mysqli_real_escape_string($conn,$user_email_facebook)."','".mysqli_real_escape_string($conn,$user_name_facebook)."','".mysqli_real_escape_string($conn,$user_name_facebook)."','***********','slack.cs.odu.edu','','','','','','".mysqli_real_escape_string($conn,$user_image_facebook)."','','2017-10-10 00:00:00','facebook')");
mysqli_close($conn);
    $_SESSION['email']=$user_email_facebook;
    header('location:home.php#test');
    
}



?>
