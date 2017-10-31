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
<div id="login" style="width:80%;">

    <div>

        <div class="image_div_profile"><img style="height: 300px; width: 300px; margin-left:7%; margin-top: 4%;" src="<?php echo $res[11]; ?>"/>
        <div class="edit_pic"><form action="upload_picture.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="hidden" name="uname" value="<?php echo $res[3]; ?>"/>
                <input class="image_upload_class" type="file" name="fileToUpload" id="fileToUpload">
                <input class="image_upload_class" id="update_pic_button" type="submit" value="update picture" name="submit">
            </form>
        </div></div>
        <div class="display_info">

            <table >
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

    </div>


    <?php  if(isset($_SESSION["no_file"])) {
        if($_SESSION["no_file"]=="error"){

            echo "<div id=\"error\"> Image not selected , please select the image</div>";
            $_SESSION["no_file"]="";
        }


    }?>

    <?php  if(isset($_SESSION["error_image"])) {
        if($_SESSION["error_image"]=="error"){

            echo "<div id=\"error\"> Image width and height should be in between 250 px and 750 px </div>";
            $_SESSION["error_image"]="";
        }


    }?>



</div>


</body>
</html>
