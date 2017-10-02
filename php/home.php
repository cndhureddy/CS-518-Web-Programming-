<?php
/**
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

echo $_SESSION['email'];
?>
<form action="logout.php" method="post">
    <input type="submit"/>

</form>