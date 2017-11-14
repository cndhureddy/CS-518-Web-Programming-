<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 11/13/2017
 * Time: 5:28 PM
 */

include_once "./get_more_messages_file.php";
//include('db_queries.php');

//echo "test";
$retrieving_messages=new get_more_messages();

if(isset($_POST["retrieve_channel_id"])){

$channel_id=$_POST["retrieve_channel_id"];
$count=$_POST["count_div"];

$div=$retrieving_messages->retrieve_next_messages($channel_id,$count);



    echo $div;

}