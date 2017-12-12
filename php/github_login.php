<?php
session_start();
include("connect.php");


   define('clientID', 'ef0b6b638c2fef6c1b5d');
   define('clientSecret', '0ecb82d5926b24e0308027bb35e797250c0eada6');
   define('appName', 'cs odu 518');

$url = 'https://github.com/login/oauth/access_token';

$fields = array(
       'client_id' => urlencode(clientID),
       'client_secret' => urlencode(clientSecret),
       'code' => urlencode($_GET['code'])
);


foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

$ch = curl_init();


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);


$result = json_decode(curl_exec($ch),TRUE);
echo $result["access_token"].'<br>';

curl_close($ch);

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://api.github.com/user?access_token=".$result["access_token"]);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_USERAGENT,'http://developer.github.com/v3/#user-agent-required');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));

$output=json_decode(curl_exec($ch),TRUE);
curl_close($ch);
$gitEmail = $output["email"];
$gitUserName = $output["login"];
$gitImage = $output["avatar_url"];

//echo $gitEmail;
  //echo $gitUserName;
//echo $gitImage;
//die();

function checkLogin($gitUserName){
   global $conn;
   echo "check login function";
   $sql = "SELECT * FROM users where email= '$gitUserName'";
   $result = mysqli_query($conn,$sql);
   if($result->num_rows > 0 ){
        return false;
   }else{
       return true;
   }
}
if(checkLogin($gitUserName)){
   $sql = "INSERT INTO `users` VALUES(DEFAULT,'$gitUserName','$gitUserName','$gitUserName','**********','slack.cs.odu.edu','','','','','','$gitImage','','2017-10-10 00:00:00','Github')";
   echo $sql;
    if (mysqli_query($conn, $sql)) {
      $_SESSION['email']=$gitUserName;
    $_SESSION['work_space_name']='slack.cs.odu.edu';
    $_SESSION['display_name']=$gitUserName;
    $_SESSION['full_name']=$gitUserName;
       header("location:home.php#test");
    }
}else{
   $update_sql = "update users set picture='$gitImage' where email_id='$gitUserName'";
   echo $update_sql;
   $result = $conn->query($update_sql);
   
   $_SESSION['email']=$gitUserName;
    $_SESSION['work_space_name']='slack.cs.odu.edu';
    $_SESSION['display_name']=$gitUserName;
    $_SESSION['full_name']=$gitUserName;
   
   header("location: home.php#test");
}

?>
