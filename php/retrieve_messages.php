<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/10/2017
 * Time: 2:05 AM
 */

include("connect.php");
function retrieving_messages($conn,$channel_id){
   // echo $channel_id;

   $query = "select  * from channel_messages where channel_id='" . $channel_id . "'";

    $result =$conn->query($query);
    $message_array = array();

    while($row=$result->fetch_array(MYSQLI_ASSOC))
    {
        echo "<div class=\"message_display\">".htmlspecialchars($row["message"])."</div>";
        echo "<br>";

    }







}

retrieving_messages($conn,$channel_id);