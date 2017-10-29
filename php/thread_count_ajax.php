<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/29/2017
 * Time: 6:16 PM
 */

include ("connect.php");

$message_id = $_POST["message_id"];



$query_thread_messages="select count(*) from thread where message_id='".$message_id."'";

$result =$conn->query($query_thread_messages);

$row=$result->fetch_array(MYSQLI_ASSOC);

echo $row["count(*)"];


//echo $message_id;