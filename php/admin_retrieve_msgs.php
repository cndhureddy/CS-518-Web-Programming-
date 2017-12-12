<?php
/*
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/10/2017
 * Time: 2:05 AM
 */
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
include("connect.php");
//$channel_id=1;
//echo "hello";

function retrieving_messages($conn,$channel_id){
    //echo "hello";
    $query = "select * from (SELECT * FROM `channel_messages` where channel_id='" . $channel_id . "' ORDER BY timestamp DESC LIMIT 15)a order by timestamp ASC";
    //select * from (SELECT * FROM `channel_messages` where channel_id='1' ORDER BY timestamp DESC LIMIT 15)a order by timestamp ASC
    $result =$conn->query($query);
    //$message_array = array();
    // $num_rows=count($result);
    //$count=0;
  //  print_r($result);
    $temp_time="";
    $temp_time_month="";
    $counter_today=0;
    $counter_yesterday=0;
    $temp_user_id="";
//    $query_message_id="select message_id,reaction,count(*) from message_reaction group by message_id,reaction ";
    // $result_message_id=$conn->query($query_message_id);
    //$row_message_id=$result_message_id->fetch_all(MYSQLI_ASSOC);
    // print_r($row_message_id);
    // $restrict=0;
    $i_increment=0;


    $query_channel_status="select * from channels where channel_id='".$channel_id."'";

    $result_channel_status=$conn->query($query_channel_status);
    $row_channel_status=$result_channel_status->fetch_array(MYSQLI_ASSOC);


    while($row=$result->fetch_array(MYSQLI_ASSOC))
    {
       // echo "hello";
        $i_increment=$i_increment+1;
        $attach_id=$row["message_id"];
        if($i_increment==1){

            echo "<div><label message_id=\"$attach_id\"class=\"older_messages\" user_id=\"18\" id=\"$channel_id\">older messages</label></div>";

        }
        //$restrict=$restrict+1;
        // if($restrict>16){
        //break;
        //}
        echo "<br>";
        $user_id=$row["user_id"];
        $query_user="select * from users where user_id='".$user_id."'";
        $result_user=$conn->query($query_user);
        $row_user=$result_user->fetch_array(MYSQLI_ASSOC);
        $formated_date=date("l F jS, Y",strtotime($row["timestamp"]));
        //echo $formated_date;
        $formated_time_am_pm=date("h:i A",strtotime($row["timestamp"]));
        // echo $row["timestamp"];
        $message_id_for_likes=$row["message_id"];
        $query_message_id_like="SELECT count(*) as count FROM `message_reaction` WHERE message_id='$message_id_for_likes' and reaction=1";
        $result_message_id_like=$conn->query($query_message_id_like);
        if(mysqli_num_rows($result_message_id_like)>0) {
            $row_message_id_like=$result_message_id_like->fetch_array(MYSQLI_ASSOC);
            $count_like=$row_message_id_like["count"];
            // print_r($row_message_id);
        }
        $query_message_id_dislike="SELECT count(*) as count FROM `message_reaction` WHERE message_id='$message_id_for_likes' and reaction=2";
        $result_message_id_dislike=$conn->query($query_message_id_dislike);
        if(mysqli_num_rows($result_message_id_dislike)>0) {
            $row_message_id_dislike = $result_message_id_dislike->fetch_array(MYSQLI_ASSOC);
            $count_dislike=$row_message_id_dislike["count"];
        }
        // echo $row["user_id"];
        //   echo $temp_user_id;
        if($temp_time==$formated_time_am_pm and $row["user_id"]==$temp_user_id) {
            /* echo "<div><img class=\" message_user_image\" src=\"" . $row_user["picture"] . "\"</img></div>";
             echo "<div class=\"message_user_full_name\"><span class=\"fullname_msg_span\" \>" . $row_user['full_name'] . " </span>" . $formated_time_am_pm . "</div>";
            */
            //   echo "<div class=\"the_whole_message_sub\">";
            // echo "<br>";
            if($row["message_type"]=="message") {
                echo "<div class=\"message_display_sub the_whole_message_sub\" > <div class=\"message_sub\" id=\"" . htmlspecialchars($row["message_id"]) . "_div\">" . htmlspecialchars($row["message"]) . " <br> ";
            }
            if($row["message_type"]=="codesnip"){

                echo "<div class=\"message_display_sub the_whole_message_sub\" > <div class=\"message_sub\" id=\"" . htmlspecialchars($row["message_id"]) . "_div\"><pre><code>" . htmlspecialchars($row["message"]) . " </code></pre><br> ";
                // echo "<div class=\"clear\"></div>";
            }
            if($row["message_type"]=="image_link" ){

                echo "<div class=\"message_display_sub the_whole_message_sub\" > <div class=\"message_sub\" id=\"" . htmlspecialchars($row["message_id"]) . "_div\"><a href=\"" . htmlspecialchars($row["message"]) ." \">" . htmlspecialchars($row["message"]) . "</a><br><img height=\"200\" width=\"200\" src=\"" . htmlspecialchars($row["message"]) . "\"\><br> ";
                //echo "<div class=\"clear\"></div>";

            }
            if($row["message_type"]=="picture"){

                echo "<div class=\"message_display_sub the_whole_message_sub\" > <div class=\"message_sub\" id=\"" . htmlspecialchars($row["message_id"]) . "_div\"><img height=\"200\" width=\"200\" src=\"" . htmlspecialchars($row["message"]) . "\"\><br> ";
                //echo "<div class=\"clear\"></div>";

            }
            if($row["message_type"]=="file"){

                echo "<div class=\"message_display_sub the_whole_message_sub\" > <div class=\"message_sub\" id=\"" . htmlspecialchars($row["message_id"]) . "_div\"><a href=\"" . htmlspecialchars($row["message"]) ." \"download>" . htmlspecialchars($row["message"]) . "</a><br> ";
                //echo "<div class=\"clear\"></div>";

            }



            $query_thread_count="select count(*) from thread where message_id='".$row["message_id"]."'";
            $result_thread_count =$conn->query($query_thread_count);
            $row_count=$result_thread_count->fetch_array(MYSQLI_ASSOC);
            echo "<div> <form action=\"delete_post.php\"  method=\"post\"><input type=\"hidden\" name=\"message_id\" value=\"".htmlspecialchars($row["message_id"])."\"/><input type=\"submit\" value=\"delete\"></form></div>";
            if($count_like>0)
            {
                echo "<i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\" id=\"". htmlspecialchars($row["message_id"]). "_like\">".$count_like."</i> &nbsp;";
            }
            if($count_dislike>0)
            {
                echo   "<i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"  id=\"". htmlspecialchars($row["message_id"]). "_dislike\"  >".$count_dislike."</i>&nbsp;";
            }
            echo "</div>";
            echo "<div class=\"thread_count_div_".htmlspecialchars($row["message_id"])."\">";
            if($row_count["count(*)"]>0)
            {
                echo "<div class=\"unique_count_".htmlspecialchars($row["message_id"])."  \">";
                if($row_channel_status["archieved_status"]=="unarchieved") {
                    echo "<button id=\"thread_count_" . htmlspecialchars($row["message_id"]) . "\"   value=\" " . htmlspecialchars($row["message_id"]) . "\"   >" . $row_count["count(*)"] . " replies </button>";
                }else {
                    echo " <button archieved=\"yes\" id=\"thread_count_" . htmlspecialchars($row["message_id"]) . "\" value=\" " . htmlspecialchars($row["message_id"]) . "\"    >" . $row_count["count(*)"] . " replies</button>";
                }
                echo "</div>";
            }
            echo "</div>";
            if($row_channel_status["archieved_status"]=="unarchieved") {
                echo "<div class=\"message_reactions_sub\" ><button id=\"like\"  class=\"like_dislike\" value=\" " . htmlspecialchars($row["message_id"]) . "\"><i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"></i></button><button id=\"dis_like\"   class=\"like_dislike\"  value=\" " . htmlspecialchars($row["message_id"]) . "\"> <i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"></i></button> <button id=\"thread_message\"   class=\"like_dislike\"  value=\" " . htmlspecialchars($row["message_id"]) . "\"> <i class=\"fa fa-reply\" aria-hidden=\"true\"></i></button> </div> ";
                // echo "</div>";
            }
           // else{
                echo "</div>";
           // echo "<div style=\"float: right; margin-right: 2%;\"> <form action=\"delete_post.php\"><input type=\"hidden\" name=\"message_id\" value=\"".htmlspecialchars($row["message_id"])."\"/><input type=\"submit\" value=\"delete\"></form></div>";
              //  echo "</div>";
            //}
        }
        else{
            $temp_user_id=$row["user_id"];
            $temp_time=$formated_time_am_pm;
            date_default_timezone_set("America/New_York");
            //echo time();
            $date_current=new DateTime();
            $date_yesterday=new DateTime();
            $date_current_format=$date_current->format('d.m.Y');
            $date_yesterday->sub(new DateInterval('P1D'));
            $date_yesterday_format=$date_yesterday->format('d.m.Y');
            $msg_date=date('d.m.Y',strtotime($row["timestamp"]));
            // echo $date_current;
            //echo $msg_date;
            $check_br=0;
            if($date_current_format== $msg_date and $counter_today==0){
                //echo "DATE";
                echo "<div class=\"row\"><hr class=\"left_hr col-md-4\"> <span class=\"today_text col-lg-2\">today</span> <hr class=\"right_hr col-md-4\"></div>";
                $counter_today++;
                $check_br=1;
            }
            else if($counter_yesterday==0 and $date_yesterday_format== $msg_date ){
                echo "<div class=\"row\"><hr class=\"left_hr col-md-4\"> <span class=\"today_text col-lg-2\">yesterday</span> <hr class=\"right_hr col-md-4\"></div>";
                $counter_yesterday++;
                $check_br=1;
                // echo "test failed";
            }
            else if($temp_time_month!=$formated_date and $counter_yesterday!=1)
            {
                if($counter_today!=1) {
                    echo "<div class=\"row\"><hr class=\"left_hr col-md-4\"> <span class=\"date_msg_text col-lg-2\">$formated_date</span> <hr class=\"right_hr col-md-4\"></div>";
                    $temp_time_month = $formated_date;
                    $check_br=1;
                }
            }
            /*  if($check_br==1)
              {
                  // echo "<br><div class=\"gap\"></div>";
              }
              else
              {
                  //  echo "<div class=\"gap\"></div>";
              }
  */
            echo "<div class=\"row\">";
            echo "<div class=\"the_whole_message\">";
            echo "<div class=\"image_div col-xs-1\"><img class=\"message_user_image\" src=\"" . $row_user["picture"] . "\"</img></div>";
            echo "<div class=\" col-lg-10 \">";
            echo "<div class=\"message_user_full_name\"><span class=\"fullname_msg_span\" \>" . $row_user['full_name'] . " </span>" . $formated_time_am_pm . "</div>";
            if($row["message_type"]=="message") {
                echo "<div class=\"message_display \" id=\"" . htmlspecialchars($row["message_id"]) . "_div\"><div class=\"only_message\">" . htmlspecialchars($row["message"]) . "  </div>  ";
            }
            if($row["message_type"]=="picture" ){

                echo "<div class=\"message_display \" id=\"" . htmlspecialchars($row["message_id"]) . "_div\"><div class=\"only_message\"><img height=\"200\" width=\"200\" src=\"" . htmlspecialchars($row["message"]) . "\"\>  </div>  ";
                // echo "<div class=\"clear\"></div>";
            }
            if($row["message_type"]=="file" ){

                echo "<div class=\"message_display \" id=\"" . htmlspecialchars($row["message_id"]) . "_div\"><div class=\"only_message\"><a href=\"" . htmlspecialchars($row["message"]) ." \"download>" . htmlspecialchars($row["message"]) . "</a> </div>  ";
                // echo "<div class=\"clear\"></div>";
            }
            if($row["message_type"]=="image_link"){


                echo "<div class=\"message_display \" id=\"" . htmlspecialchars($row["message_id"]) . "_div\"><div class=\"only_message\"><a href=\"" . htmlspecialchars($row["message"]) ." \">" . htmlspecialchars($row["message"]) . "</a><br><img height=\"200\" width=\"200\" src=\"" . htmlspecialchars($row["message"]) . "\"\>  </div>  ";

            }

            if($row["message_type"]=="codesnip"){

                echo "<div class=\"message_display \" id=\"" . htmlspecialchars($row["message_id"]) . "_div\"><div class=\"only_message\"><pre> <code>" . htmlspecialchars($row["message"]) . " </code></pre> </div>  ";
                // echo "<div class=\"clear\"></div>";
            }
            $query_thread_count="select count(*) from thread where message_id='".$row["message_id"]."'";
            $result_thread_count =$conn->query($query_thread_count);
            $row_count=$result_thread_count->fetch_array(MYSQLI_ASSOC);
            echo "<div> <form method=\"post\" action=\"delete_post.php\"><input type=\"hidden\" name=\"message_id\" value=\"".htmlspecialchars($row["message_id"])."\"/><input type=\"submit\" value=\"delete\"></form></div>";
            if($count_like>0)
            {
                echo "<i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"  id=\"".htmlspecialchars($row["message_id"])."_like\"  >".$count_like."</i> &nbsp;";
            }
            if($count_dislike>0)
            {
                echo   "<i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\" id=\"".htmlspecialchars($row["message_id"])."_dislike\" >".$count_dislike."</i>&nbsp;";
            }
            echo "<div class=\"thread_count_div_".htmlspecialchars($row["message_id"])."\">";
            if($row_count["count(*)"]>0) {
                echo "<div class=\"unique_count_".htmlspecialchars($row["message_id"])."\">";
                if($row_channel_status["archieved_status"]=="unarchieved") {
                    echo " <button id=\"thread_count_" . htmlspecialchars($row["message_id"]) . "\" value=\" " . htmlspecialchars($row["message_id"]) . "\"    >" . $row_count["count(*)"] . " replies</button>";
                }else{

                    echo " <button archieved=\"yes\" id=\"thread_count_" . htmlspecialchars($row["message_id"]) . "\" value=\" " . htmlspecialchars($row["message_id"]) . "\"    >" . $row_count["count(*)"] . " replies</button>";
                }
                echo "</div>";
            }
            echo "</div></div> ";
            echo "</div>";
            echo "</div>";
            if($row_channel_status["archieved_status"]=="unarchieved") {
                echo "<div class=\"message_reactions_with_user col-md-2\"><button id=\"like\"  class=\"like_dislike\" value=\"" . htmlspecialchars($row["message_id"]) . "\"><i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"></i></button><button id=\"dis_like\"   class=\"like_dislike\"  value=\"" . htmlspecialchars($row["message_id"]) . "\"> <i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"></i></button> <button id=\"thread_message\"   class=\"like_dislike\"  value=\" " . htmlspecialchars($row["message_id"]) . "\"> <i class=\"fa fa-reply\" aria-hidden=\"true\"></i></button> </div>";
            }
            else{
                //echo "<br>";
            }
            echo "</div>";

        }
    }
}
retrieving_messages($conn,$channel_id);
mysqli_close($conn);
