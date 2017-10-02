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
$database ="slack_lampstack";
$conn = mysqli_connect($servername, $username, $password ,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
