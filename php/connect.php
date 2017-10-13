<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 9/30/2017
 * Time: 11:19 PM
 */
$servername = "localhost";
$username = "admin";
$password = "M0n@rch$";
<<<<<<< HEAD
$database ="slack_lamp_stack";
=======
$database ="slack_lampstack";
>>>>>>> c6ebe6f50a6db1a29caf03ef05a7a560ab258135
$conn = mysqli_connect($servername, $username, $password ,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
