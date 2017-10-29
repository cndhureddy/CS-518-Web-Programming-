<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/29/2017
 * Time: 4:34 PM
 */

include ("connect.php");

$query_thread_messages="select count(*) from thread where message_id='".$message_id."'";

$result =$conn->query($query_thread_messages);

$row=$result->fetch_array(MYSQLI_ASSOC);

