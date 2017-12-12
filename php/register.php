<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/30/2017
 * Time: 2:09 AM
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('connect.php');
if($_POST["username"]!=""&&$_POST["email"]!=""&&$_POST["password"]!=""&&$_POST["confirmpassword"]!="") {
$user_name=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];
$confirm_password=$_POST["confirmpassword"];
session_start();
if(strlen($user_name)>20||strlen($user_name)<6){

  $_SESSION["username_check"]="error";

    header('location:registration.php');
    die();
}
if(strlen($email)>200){


    $_SESSION["email_id_check"]="error";
    header('location:registration.php');
    die();
}
if(strlen($password)>20||strlen($password)<6){

    $_SESSION["password_check"]="error";
    header('location:registration.php');
    die();

}
if($password!=$confirm_password){

    $_SESSION["confirmpassword"]="error";
    header('location:registration.php');
    die();

}

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';


if(preg_match($regex,$email)){


}
else{

    $_SESSION["invalid_email"]="error";
    header('location:registration.php');
    die();

}





$check_email="select * from users where email_id='".mysqli_real_escape_string($conn,$email)."'";
$res_e = mysqli_query($conn,$check_email);
$data_email = mysqli_fetch_array($res_e, MYSQLI_NUM);
echo $data_email[0];
if($data_email[0] > 1) {
    $_SESSION["email_exists"]="error";
    header('location:registration.php');
    die();
}
//echo $user_name;
$check_username="select * from users where display_name='".mysqli_real_escape_string($conn,$user_name)."'";
$res_u = mysqli_query($conn,$check_username);
$data_username = mysqli_fetch_array($res_u, MYSQLI_NUM);
//echo $data_username[0];
if($data_username[0]>1){

    echo "User Already in Exists<br/>";
    $_SESSION["username_exists"]="error";
    header('location:registration.php');
    die();
}


    date_default_timezone_set("America/New_York");


    $date = new DateTime();

    $current_date = $date->format('Y-m-d H:i:s');

    $final_email_id = mysqli_real_escape_string($conn, $email);
    $final_user_name = mysqli_real_escape_string($conn, $user_name);
    $final_password = mysqli_real_escape_string($conn, $password);
    echo "helo";
    $gravatar_url=get_gravatar( $email, $s = 400, $d = 'mm', $r = 'g', $img = false, array() );
    echo $gravatar_url;
    $headers = get_headers($gravatar_url, 1);
    if (strpos($headers['Content-Type'], 'image/') !== false) {
         
 
         echo "image";
        } else {
            echo "not a image";
        }
  echo "TEST";
    //die();
    $insert_user = "insert into users values(DEFAULT ,'$final_email_id','$final_user_name','$final_user_name','$final_password','slack.cs.odu.edu','','','','','','$gravatar_url','','$current_date',DEFAULT)";
    mysqli_query($conn, $insert_user);

  $insert_gravatar="insert into dp_urls values('$final_email_id',DEFAULT,'$gravatar_url','','')";
  mysqli_query($conn,$insert_gravatar);
  
    $_SESSION["register_success"]="success";

    header('location:registration.php');
    die();

}else{
    header('location:registration.php');
    die();



}
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

mysqli_close($conn);
