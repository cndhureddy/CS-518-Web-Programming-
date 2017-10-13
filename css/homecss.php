<<<<<<< HEAD
<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/2/2017
 * Time: 11:59 PM
 */

header("Content-type: text/css; charset: UTF-8");

session_start();
$email=$_SESSION['email'];
$work_space=$_SESSION['work_space_name'];

?>
.onclick-menu:before {
    content: "<?php echo $work_space ?>";
    font-weight: 900;
    font-size: 150%;
    Helvetica: Helvetica;
    position: relative;
    color: #FFFFFF;
    top: 20%;
    left: 10%;
}
=======
<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/2/2017
 * Time: 11:59 PM
 */

header("Content-type: text/css; charset: UTF-8");

session_start();
$email=$_SESSION['email'];
$work_space=$_SESSION['work_space_name'];

?>
.onclick-menu:before {
    content: "<?php echo $work_space ?>";
    font-weight: 900;
    font-size: 150%;
    Helvetica: Helvetica;
    position: relative;
    color: #FFFFFF;
    top: 20%;
    left: 10%;
}
>>>>>>> c6ebe6f50a6db1a29caf03ef05a7a560ab258135
