<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">

</head>
<body>


<?php
include ("connect.php");

session_start();

if($_SESSION['email'])
{

}
else{
    header('location:../index.php');
    die();
}

?>

<div id="topbar" >
    <div ><img id="logo"  src="../images/logo.jpg"></div>
    <div class="logo-text">ODU CS Slack</div>
    <div class="login-button"><form action="home.php" method="post"><input id="signin-button" type="submit" value=" home "></form></div>
</div>
<br>


<table align="center" style="margin-top: 10%">
<?php
    if(array_key_exists( 'channel_id',$_POST)){
        $_SESSION["channel_id"]= $_POST["channel_id"];
        $_SESSION["channel_name"]=$_POST["channel_name"];
    }

    $channel_id=$_SESSION["channel_id"];

    $sql_user_id = "SELECT * from users where work_space_url='slack.cs.odu.edu'";
    $result_user_id = $conn->query($sql_user_id);
if($channel_id) {

    if ($result_user_id->num_rows > 0) {
        // output data of each row
        $channel_name=$_SESSION["channel_name"];
        echo "<div text-align='center' ><h1 >invite members to channel   ". htmlspecialchars($channel_name) ."</h1></div>";
        $count=1;
        while ($row_user_id = $result_user_id->fetch_assoc()) {


            $user_id = $row_user_id["user_id"];
            $full_name = $row_user_id["full_name"];
            //echo $channel_id;
            //echo $user_id;
            $sql_channel_user_id_1 = "SELECT * from channel_users where channel_id='$channel_id' and user_id='$user_id'";
            $result_channel_user_id_1 = $conn->query($sql_channel_user_id_1);
           $row_user_id_channel = $result_channel_user_id_1->fetch_assoc();
           //echo $row_user_id_channel[0];

               if($result_channel_user_id_1->num_rows > 0)
               {

               }else {
                    $count=0;

                   echo "<form action=\"addmember.php\" method=\"post\"><input type=\"hidden\" name=\"user_id\" value=\"$user_id\" ><input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\" ><tr><td>" . htmlspecialchars($full_name) . "</td><td><input type=\"submit\" value=\"invite member\"/></td></tr></form>";
               }




        }

    }
    else{


    }



    if($count==1){
        echo "<div text-align='center' ><h1 >all users are in the channel</h1></div>";


    }
}
else{
    header('location:home.php');
    mysqli_close($conn);
    die();

}
?>





</table>







</body>
</html>