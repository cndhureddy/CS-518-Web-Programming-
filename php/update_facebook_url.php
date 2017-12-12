<?php


include("connect.php");
$email=$_SESSION["email"];
$query_1="select * from dp_urls where email_id='".$email."'";
$result_1=$conn->$query_1;
$row_1=$result_1->fetch_assoc();
$to_update=$row_1["facebook_url"];

$query="update users set picture='".$to_update."'";
mysqli_query($conn,$query);
header("location:userprofile.php");
mysqli_close($conn);