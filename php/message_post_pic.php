<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 11/19/2017
 * Time: 6:20 PM
 */
include_once('db_queries.php');


class message_post_pic
{

    function upload_pic($submit,$img_name,$img_file_name,$img_name_a,$size,$channel_id,$user_id,$smiley_status,$message_type,$channel_name){
        include ("connect.php");
        $db_object=new db_queries();

        if (!empty($submit)){

//   include ("connect.php");

            $uname= $img_name;
           // echo $uname;

            $check = getimagesize($img_file_name);
            list($width, $height) = getimagesize($img_file_name);

            echo $width;
            echo $height;

            //$fileupload = $_POST['fileToUpload'];

            if ($img_name_a!="") {

            }else{ //
                // $_SESSION["no_file"]="error";
                header("location: home.php?$parameter#test");
                die();
            }
/*
            if($width>750 || $height>750 ){

                //$_SESSION["error_image"]="error";
                header('location:userprofile.php?error=more_height');
                die();
            }

            if($width<250||$height<250)

            {

                //$_SESSION["error_image"]="error";
                //
                header('location:userprofile.php?error=less_height');
                die();
            }
*/

            //$w = imagesx($image);
            //$h = imagesy($image);



            if($check !== false) {

                $uploadOk = 1;
            } else {

                $uploadOk = 0;
            }



            $target_dir= "../images/";
            chmod($target_dir,0777);

            $temp = explode(".", $img_name_a);
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


            //echo "size <br>";
            //echo $size;

            if ($size > 1000000) {

                $uploadOk = 0;
            }



            if ($uploadOk == 0) {

                    if($user_id!=0) {
                        $parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                        header("location: home.php?$parameter#test");
                    }
                    else{

                        $parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                        header("location: admin_home.php?$parameter#test");
                    }

                die();
            }

            else {
                echo "target file <br>";
                echo $target_file;
                if (move_uploaded_file($img_file_name, $target_file)) {

                    $filename_to_insert='../images/'.$modifiedname;

                   // $query = "update users set picture='".mysqli_real_escape_string($conn,$filename_to_insert)."' where email_id='".mysqli_real_escape_string($conn,$_SESSION['email'])."'";
                    //mysqli_query($conn, $query);
                    //echo "file uploaded";
                    date_default_timezone_set("America/New_York");
                    $date = new DateTime();

                    $current_date = $date->format('Y-m-d H:i:s');


                    $query=$db_object->insert_message($channel_id,$user_id,$filename_to_insert,$current_date,$smiley_status,$message_type);

                    //$conn->query($query);


                    // $query = "insert into channel_messages values(DEFAULT,'$channel_id','$user_id','$message_final','$current_date','$smiley_status','$message_type')";
                    mysqli_query($conn, $query);

                    echo $query;
                    if($user_id!=18) {
                        $parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                        header("location: home.php?$parameter#test");
                    }
                    else{

                        $parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                        header("location: admin_home.php?$parameter#test");
                    }
                 die();
                    echo <<<EOL
<script type="text/javascript">
   alert('Profile Picture changed successfully');
</script>
EOL;



                }

                else if($_FILES['uploaded']['error'] !== UPLOAD_ERR_OK) {
                    die("Upload failed" . $_FILES['uploaded']['error']);

                }
            }
        }













    }






    function upload_pic_direct($submit,$img_name,$img_file_name,$img_name_a,$size,$to_user_id,$user_id,$smiley_status,$message_type,$channel_name){
        include ("connect.php");
        $db_object=new db_queries();

        if (!empty($submit)){

//   include ("connect.php");

            $uname= $img_name;
            // echo $uname;

            $check = getimagesize($img_file_name);
            list($width, $height) = getimagesize($img_file_name);

            echo $width;
            echo $height;

            //$fileupload = $_POST['fileToUpload'];

            if ($img_name_a!="") {

            }else{ //
                // $_SESSION["no_file"]="error";
                header("location: home.php?$parameter#test");
                die();
            }
            /*
                        if($width>750 || $height>750 ){

                            //$_SESSION["error_image"]="error";
                            header('location:userprofile.php?error=more_height');
                            die();
                        }

                        if($width<250||$height<250)

                        {

                            //$_SESSION["error_image"]="error";
                            //
                            header('location:userprofile.php?error=less_height');
                            die();
                        }
            */

            //$w = imagesx($image);
            //$h = imagesy($image);



            if($check !== false) {

                $uploadOk = 1;
            } else {

                $uploadOk = 0;
            }



            $target_dir= "../images/";
            chmod($target_dir,0777);

            $temp = explode(".", $img_name_a);
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


            //echo "size <br>";
            //echo $size;

            if ($size > 1000000) {

                $uploadOk = 0;
            }



            if ($uploadOk == 0) {

                if($user_id!=0) {
                    $parameter = "to_user_id=" . ($to_user_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                    header("location: home.php?$parameter#test");
                }
                else{

                    $parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                    header("location: admin_home.php?$parameter#test");
                }

                die();
            }

            else {
                echo "target file <br>";
                echo $target_file;
                if (move_uploaded_file($img_file_name, $target_file)) {

                    $filename_to_insert='../images/'.$modifiedname;

                    // $query = "update users set picture='".mysqli_real_escape_string($conn,$filename_to_insert)."' where email_id='".mysqli_real_escape_string($conn,$_SESSION['email'])."'";
                    //mysqli_query($conn, $query);
                    //echo "file uploaded";
                    date_default_timezone_set("America/New_York");
                    $date = new DateTime();

                    $current_date = $date->format('Y-m-d H:i:s');
                    $work_space_url='slack.cs.odu.edu';

                    $query=$db_object->insert_message_user($user_id,$to_user_id,$filename_to_insert,$message_type,$current_date,$work_space_url);

                    //$conn->query($query);


                    // $query = "insert into channel_messages values(DEFAULT,'$channel_id','$user_id','$message_final','$current_date','$smiley_status','$message_type')";
                    mysqli_query($conn, $query);

                    echo $query;
                    //die();
                    if($user_id!=18) {
                        $parameter = "to_user_id=".($to_user_id)."&user_id=".($user_id)."&channel_name=".($channel_name);
                        //echo $parameter;
                        header("location: home.php?$parameter#test");
                        die();
                    }
                    else{

                        $parameter = "channel_id=" . ($channel_id) . "&user_id=" . ($user_id) . "&channel_name=" . ($channel_name);
                        header("location: admin_home.php?$parameter#test");
                    }
                    die();
                    echo <<<EOL
<script type="text/javascript">
   alert('Profile Picture changed successfully');
</script>
EOL;



                }

                else if($_FILES['uploaded']['error'] !== UPLOAD_ERR_OK) {
                    die("Upload failed" . $_FILES['uploaded']['error']);

                }
            }
        }













    }











}