<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("connect.php");
session_start();
//die();
//echo "hello";
//die();

if(isset($_SESSION["twitter"])){


}
else{

   header("../index.php");
    die();

}

$user_name_facebook= $_GET["user_name"];
$user_email_facebook= $_GET["user_email"];
$user_image_facebook= $_GET["image_src"];
$user_display_twitter=$_GET["display_name"];
//echo $user_name_facebook;
//echo $user_email_facebook;
//echo $user_image_facebook;
//die();

 include ("connect.php");
 $query = mysqli_query($conn,"select * from users where email_id='".mysqli_real_escape_string($conn,$user_email_facebook)."'");
mysqli_close($conn);
        $res=mysqli_fetch_row($query);
if($res){
//$query_insert=mysqli_query($conn,"insert into users values()");
   echo "hello";
   exit();
    if($res[14]=="regular"){
    mysqli_close($conn);
        $_SESSION['email']=$user_email_facebook;
       $_SESSION['work_space_name']='slack.cs.odu.edu';
       $_SESSION['display_name']=$res[3];
       $_SESSION['full_name']=$res[2];
       echo "hello";
       echo $_SESSION['email'];
       echo $_SESSION['work_space_name'];
       echo $_SESSION['display_name'];
       echo $_SESSION['full_name'];
// $query_update=mysqli_query($conn,"update dp_urls set twitter_url='".mysqli_real_escape_string($conn,$user_image_facebook)."' where email_id='".mysqli_real_escape_string($conn,$user_email_facebook)."'");
      // mysqli_close($conn);
      $query_insert=mysqli_query($conn,"update users set picture='$user_image_facebook' where email_id='$user_email_facebook'");
      $query_c_1 = mysqli_query($conn,"select * from dp_urls where email_id='$user_email_facebook'");
       $res_c_1=mysqli_fetch_row($query_c_1);
       if($res_c_1){
            include ("connect.php");
            $query_update=mysqli_query($conn,"update dp_urls set facebook_url='$user_image_facebook' where email_id='$user_email_facebook'");
            mysqli_close($conn);
        }
        else{
            include ("connect.php");
            $a=mysqli_query($conn,"insert into dp_urls values('$user_email_facebook','','','','$user_image_facebook')");

            //echo "insert into dp_urls values('$user_email_facebook','','','$user_image_facebook','')";
            //  if($a){
            //echo "sucess";
            //  die();
            //}
            //ehco $a;
            //die();
            //die();
            mysqli_close($conn);
        }
       
       header('location:home.php#test');
    
    }
    else{
    
        $query_insert=mysqli_query($conn,"update users set full_name='".mysqli_real_escape_string($conn,$user_name_facebook)."',display_name='".mysqli_real_escape_string($conn,$user_display_twitter)."',picture='".mysqli_real_escape_string($conn,$user_image_facebook)."',type_registration='facebook' where email_id='".mysqli_real_escape_string($conn,$user_email_facebook)."')");
       //  echo $query_insert;
$query_update=mysqli_query($conn,"update dp_urls set twitter_url='".mysqli_real_escape_string($conn,$user_image_facebook)."' where email_id='".mysqli_real_escape_string($conn,$user_email_facebook)."'");
      // die();
       
       $query_c_1 = mysqli_query($conn,"select * from dp_urls where email_id='".mysqli_real_escape_string($conn,$user_email_facebook)."'");

        $res_c_1=mysqli_fetch_row($query_c_1);
        if($res_c_1){
            $query_update=mysqli_query($conn,"update dp_urls set twitter_url='".mysqli_real_escape_string($conn,$user_image_facebook)."' where email_id='".mysqli_real_escape_string($conn,$user_email_facebook)."'");
        }
        else{
            $query_update=mysqli_query($conn,"insert into dp_urls values('".mysqli_real_escape_string($conn,$user_email_facebook)."','','','','".mysqli_real_escape_string($conn,$user_image_facebook)."')");

        }
       
       
      // mysqli_close($conn);
        $_SESSION['email']=$user_email_facebook;
        $_SESSION['work_space_name']='slack.cs.odu.edu';
       $_SESSION['display_name']=$user_display_twitter;
       $_SESSION['full_name']=$user_name_facebook;
    header('location:home.php#test');
    
    }
    
    
}else{
$query_insert=mysqli_query($conn,"insert into users values(DEFAULT,'".mysqli_real_escape_string($conn,$user_email_facebook)."','".mysqli_real_escape_string($conn,$user_name_facebook)."','".mysqli_real_escape_string($conn,$user_display_twitter)."','***********','slack.cs.odu.edu',' ',' ',' ',' ',' ','".mysqli_real_escape_string($conn,$user_image_facebook)."',' ','2017-10-10 00:00:00','facebook')");
$query_c_1 = mysqli_query($conn,"select * from dp_urls where email_id='".mysqli_real_escape_string($conn,$user_email_facebook)."'");

    $res_c_1=mysqli_fetch_row($query_c_1);
    if($res_c_1){
        $query_update=mysqli_query($conn,"update dp_urls set twitter_url='".mysqli_real_escape_string($conn,$user_image_facebook)."' where email_id='".mysqli_real_escape_string($conn,$user_email_facebook)."'");
    }
    else{
        $query_update=mysqli_query($conn,"insert into dp_urls values('".mysqli_real_escape_string($conn,$user_email_facebook)."','','','','".mysqli_real_escape_string($conn,$user_image_facebook)."')");

    }
   mysqli_close($conn);
    $_SESSION['email']=$user_email_facebook;
    $_SESSION['work_space_name']='slack.cs.odu.edu';
       $_SESSION['display_name']=$user_display_twitter;
       $_SESSION['full_name']=$user_name_facebook;
    header('location:home.php#test');
    
}



?>
