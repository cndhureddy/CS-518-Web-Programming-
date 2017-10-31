<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/30/2017
 * Time: 7:34 PM
 */





session_start();
include ("connect.php");
if($_SESSION['email'])
{

}
else{
    header('location:../index.php');
}



if (!empty($_POST['submit'])){

   include ("connect.php");

    $uname= $_POST["uname"];

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    list($width, $height) = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    echo $width;
    echo $height;

    $fileupload = $_POST['fileToUpload'];
    if (empty($fileupload) === true) { //
        $_SESSION["no_file"]="error";
        header('location:userprofile.php');
    }

    if($width>750 || $height>750 ){

        $_SESSION["error_image"]="error";
        header('location:userprofile.php');

    }

    if($width<250||$height<250)

    {

        $_SESSION["error_image"]="error";
        header('location:userprofile.php');

    }


    //$w = imagesx($image);
    //$h = imagesy($image);



    if($check !== false) {

        $uploadOk = 1;
    } else {

        $uploadOk = 0;
    }



    $target_dir= "../images/";


    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
    $newfilename =$uname. '.' . end($temp);
    $modifiedname=$uname. '.' . 'jpg';
    echo $newfilename;
    echo $modifiedname;
    $target_file = $target_dir . basename($modifiedname);


    echo $target_file;


    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {

        $uploadOk = 0;
    }



    if ($_FILES["fileToUpload"]["size"] > 400000) {

        $uploadOk = 0;
    }



    if ($uploadOk == 0) {

    }

    else {

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            $filename_to_insert='../images/'.$modifiedname;

            $query = "update users set picture='".mysqli_real_escape_string($conn,$filename_to_insert)."' where email_id='".mysqli_real_escape_string($conn,$_SESSION['email'])."'";
            mysqli_query($conn, $query);

            header('location:userprofile.php');
            echo <<<EOL
<script type="text/javascript">
   alert('Profile Picture changed successfully');
</script>
EOL;



        }

        else if ($_FILES['uploaded']['error'] !== UPLOAD_ERR_OK) {
            die("Upload failed" . $_FILES['uploaded']['error']);

        }
    }
}





