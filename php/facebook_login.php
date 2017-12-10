<?php

if(isset($_SESSION["facebook"])){


}
else{

    header("../index.php");
    die();

}

$user_id_facebook= GET["user_id"];
$user_email_facebook= GET["user_email"];
$user_image_facebook= GET["image_src"];

?>
