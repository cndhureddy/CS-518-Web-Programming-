<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <style>
        .display_info{

            float: right;
            margin-top: 10%;
            margin-right: 6%;
            font-family: Helvetica;
            font-weight: 700;

        }
        .image_div_profile {
            float: left;
        }
        .edit_pic{

            margin-left: 2%;
        }
        .image_upload_class{
            border: none;

            background-color: #2D9EE0;
            border-radius: 0.2em;
            color: #FFFFFF;


        }
        #update_pic_button{

            margin-left: 40%;
            margin-top: 5%;

        }




    </style>

</head>
<body>

<?php
/*
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/1/2017
 * Time: 12:30 AM
 */


session_start();

if($_SESSION['email'])
{

}
else{
    header('location:../index.php');
}

//echo $_SESSION['email'];

//echo $_SESSION['work_space_name'];

include("connect.php");
$email=$_SESSION['email'];
$query = mysqli_query($conn,"select * from users where email_id='".mysqli_real_escape_string($conn,$email)."'");
//$res_e = mysqli_query($conn,$query);
$res=mysqli_fetch_row($query);




?>

<div id="topbar" >
    <div ><img id="logo"  src="../images/logo.jpg"></div>
    <div class="logo-text">ODU CS Slack</div>
    <div class="login-button"><form action="home.php"><input id="signin-button" type="submit" value="Home"></form></div>
</div>


    <div style="text-align: center;">

        <div ><img style="height: 300px; width: 300px; margin-left:7%; margin-top: 4%;" src="<?php echo $res[11]; ?>"/>
        <form action="upload_picture.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="hidden" name="uname" value="<?php echo $res[3]; ?>"/>
                <input class="image_upload_class" type="file" name="fileToUpload" id="fileToUpload">
                <input class="image_upload_class"  type="submit" value="update picture" name="submit">
            </form>
        </div>
        <div >
            <br>
            <?php 
    $select_images="select * from dp_urls where email_id='".mysqli_real_escape_string($conn,$email)."'";
            $exset=$conn->query($select_images);
            
    
    
    ?>
            
            <br>

            <table align="center">
                <tr>
                    <td>Full name :</td>
                    <td><?php echo $res[2]; ?></td>

                </tr>
                <tr>
                    <td>username :</td>
                    <td><?php echo $res[3]; ?></td>

                </tr>
                <tr>
                    <td>workspace :</td>
                    <td><?php echo $res[5]; ?></td>
                </tr>
            </table>
        </div>



    <?php



    echo "";

    $sql_user_id = "SELECT user_id from users where email_id='".mysqli_real_escape_string($conn,$email)."'";
    $result_urls = $conn->query($sql_user_id);
        $row_urls = $result_urls->fetch_assoc()
if($row_urls["local_url"]!=''){

    echo "<form action=\"update_local_url.php\"><input type=\"submit\" value=\"use my image\"></input></form>";

}
        
if($row_urls["local_url"]!=''){

    echo "<form action=\"update_local_url.php\"><input type=\"submit\" value=\"use my image\"></input></form>";

}
        
if($row_urls["gravatar_url"]!=''){

    echo "<form action=\"update_gravatar_url.php\"><input type=\"submit\" value=\"use Gravatar image\"></input></form>";

}
        
if($row_urls["facebook_url"]!=''){

    echo "<form action=\"update_facebook_url.php\"><input type=\"submit\" value=\"use Facebook image\"></input></form>";

}
        if($row_urls["twitter_url"]!=''){

    echo "<form action=\"update_twitter_url.php\"><input type=\"submit\" value=\"use Twitter image\"></input></form>";

}

    if ($result_user_id->num_rows > 0) {
        // output data of each row
        while($row_user_id = $result_user_id->fetch_assoc()) {
            $user_id_channel=$row_user_id["user_id"];
        }
    } else {
    }

    $sql_channel_ids = "SELECT channel_id from channel_users where user_id='".mysqli_real_escape_string($conn,$user_id_channel)."'";
    $result_channel_id = $conn->query($sql_channel_ids);

    if($result_channel_id->num_rows>0){

        while($result_channel_users=$result_channel_id->fetch_assoc()){

            $channel_id_a=$result_channel_users["channel_id"];
           // echo $channel_id_a;
                $sql_channels_display="SELECT channel_name from channels where channel_id='".mysqli_real_escape_string($conn,$channel_id_a)."'";
            $result_channel_display = $conn->query($sql_channels_display);
            $result_set_display=$result_channel_display->fetch_assoc();
            $sql_channels_display_settings="SELECT privacy_settings from channels where channel_id='".mysqli_real_escape_string($conn,$channel_id_a)."'";
            $result_channel_display_settings = $conn->query($sql_channels_display_settings);
            $result_set_display_settings=$result_channel_display_settings->fetch_assoc();



                echo "<p> ".$result_set_display["channel_name"]."-".$result_set_display_settings["privacy_settings"] ."</p>";

        }




    }
    else{


    }


    ?>




    <?php
    //print_r($_SESSION);
    if(isset($_GET["error"])) {


      //  if($_SESSION["no_file"]==="error"){
//            $_SESSION["no_file"]="ntg";

        //    unset($_SESSION["no_file"]);
        if($_GET["error"]=="nofile"){
            echo "<div class=\"error\"> Image not selected , please select the image</div>";

        }
        if($_GET["error"]=="more_height"||$_GET["error"]=="less_height"){
            echo "<div class=\"error\"> Image width and height should be in between 250 px and 750 px </div>";

        }


    }?>



</div>


</body>
</html>
