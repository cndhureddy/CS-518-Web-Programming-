<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 12/9/2017
 * Time: 1:32 AM
 */

class get_more_messages_user_file
{

    function get_more_messages_user($from_user_id, $to_user_id, $count, $total_count)
    {

        include("connect.php");
        $to_func_user_id = $from_user_id;
        $temp_user_id = $to_user_id;
        $temp_user_id_S = $to_user_id;

        $attach_div = "";

        $query = "select * from (SELECT * FROM `direct_messages` where from_user_id='".$to_func_user_id."' and to_user_id='".$temp_user_id."' and dr_message_id<'".$count."' or to_user_id='".$to_func_user_id."' and from_user_id='".$temp_user_id."' and dr_message_id<'".$count."' ORDER BY timestamp DESC LIMIT 15)a order by timestamp ASC";

        $result = $conn->query($query);
        $temp_time = "";
        $temp_time_month = "";
        $counter_today = 0;
        $counter_yesterday = 0;
        $temp_user_id = "";

        $query_count = "select count(*) from direct_messages where from_user_id='".$to_func_user_id."' and to_user_id='".$temp_user_id_S."'  or  to_user_id='".$to_func_user_id."' and from_user_id='".$temp_user_id_S."'";
        $result_count = $conn->query($query_count);
        $row_count = $result_count->fetch_array(MYSQLI_ASSOC);
        $row_channel_status = array();
        $row_channel_status["archieved_status"] = "unarchieved";

        while ($row = $result->fetch_assoc()) {

           // echo $row["dr_message_id"].",";

            $i_increment=$i_increment+1;
            $attach_id=$row["dr_message_id"];
            echo $row["from_user_id"];
            //echo $temp_user_id;
            //die();
            if($i_increment==1){
                // echo $temp_user_id .  "hello";
                $attach_div=$attach_div. "<div><label message_id=\"$attach_id\"class=\"older_messages_direct\" from_user_id=\"$to_func_user_id\" to_user_id=\"$temp_user_id_attach\">older messages</label></div>";
                //echo "hello dude";
            }
            //$restrict=$restrict+1;
            // if($restrict>16){
            //break;
            //}
            $attach_div=$attach_div. "<br>";
            //$user_id=$row["$to_func_user_id"];
            $from_user_id_query=$row["from_user_id"];
            $query_user="select * from users where user_id='".$from_user_id_query."'";
            $result_user=$conn->query($query_user);
            echo $result_user["email_id"];
            $row_user=$result_user->fetch_array(MYSQLI_ASSOC);
            $formated_date=date("l F jS, Y",strtotime($row["timestamp"]));
            //echo $formated_date;
            $formated_time_am_pm=date("h:i A",strtotime($row["timestamp"]));
                        if ($temp_time == $formated_time_am_pm and $row["from_user_id"] == $temp_user_id) {


                            if ($row["message_type"] == "message") {
                                $attach_div = $attach_div . "<div class=\"message_display_sub the_whole_message_sub\" > <div class=\"message_sub\" id=\"" . htmlspecialchars($row["dr_message_id"]) . "_div\">" . htmlspecialchars($row["message"]) . " <br> ";
                            }
                            if ($row["message_type"] == "codesnip") {

                                $attach_div = $attach_div . "<div class=\"message_display_sub the_whole_message_sub\" > <div class=\"message_sub\" id=\"" . htmlspecialchars($row["dr_message_id"]) . "_div\"><pre><code>" . htmlspecialchars($row["message"]) . " </code></pre><br> ";
                            }
                            if ($row["message_type"] == "image_link") {

                                $attach_div = $attach_div . "<div class=\"message_display_sub the_whole_message_sub\" > <div class=\"message_sub\" id=\"" . htmlspecialchars($row["dr_message_id"]) . "_div\"><a href=\"" . htmlspecialchars($row["message"]) . " \">" . htmlspecialchars($row["message"]) . "</a><br><img height=\"200\" width=\"200\" src=\"" . htmlspecialchars($row["message"]) . "\"\><br> ";

                            }
                            if ($row["message_type"] == "picture") {

                                $attach_div = $attach_div . "<div class=\"message_display_sub the_whole_message_sub\" > <div class=\"message_sub\" id=\"" . htmlspecialchars($row["dr_message_id"]) . "_div\"><img height=\"200\" width=\"200\" src=\"" . htmlspecialchars($row["message"]) . "\"\><br> ";

                            }



                            $attach_div = $attach_div . "</div>";
                            if ($row_channel_status["archieved_status"] == "unarchieved") {

                            }
                            $attach_div = $attach_div . "</div>";

                        } else {

                            $temp_user_id = $row["from_user_id"];
                            $temp_time = $formated_time_am_pm;
                            date_default_timezone_set("America/New_York");

                            $date_current = new DateTime();
                            $date_yesterday = new DateTime();
                            $date_current_format = $date_current->format('d.m.Y');
                            $date_yesterday->sub(new DateInterval('P1D'));
                            $date_yesterday_format = $date_yesterday->format('d.m.Y');
                            $msg_date = date('d.m.Y', strtotime($row["timestamp"]));

                            $check_br = 0;
                            if ($date_current_format == $msg_date and $counter_today == 0) {
                                //echo "DATE";
                                $attach_div = $attach_div . "<div class=\"row\"><hr class=\"left_hr col-md-4\"> <span class=\"today_text col-lg-2\">today</span> <hr class=\"right_hr col-md-4\"></div>";
                                $counter_today++;
                                $check_br = 1;
                            } else if ($counter_yesterday == 0 and $date_yesterday_format == $msg_date) {
                                $attach_div = $attach_div . "<div class=\"row\"><hr class=\"left_hr col-md-4\"> <span class=\"today_text col-lg-2\">yesterday</span> <hr class=\"right_hr col-md-4\"></div>";
                                $counter_yesterday++;
                                $check_br = 1;
                                // echo "test failed";
                            } else if ($temp_time_month != $formated_date and $counter_yesterday != 1) {
                                if ($counter_today != 1) {
                                    $attach_div = $attach_div . "<div class=\"row\"><hr class=\"left_hr col-md-4\"> <span class=\"date_msg_text col-lg-2\">$formated_date</span> <hr class=\"right_hr col-md-4\"></div>";
                                    $temp_time_month = $formated_date;
                                    $check_br = 1;
                                }
                            }


                            $attach_div = $attach_div . "<div class=\"row\">";
                            $attach_div = $attach_div . "<div class=\"the_whole_message\">";
                            $attach_div = $attach_div . "<div class=\"image_div col-xs-1\"><img class=\"message_user_image\" src=\"" . $row_user["picture"] . "\"</img></div>";
                            $attach_div = $attach_div . "<div class=\" col-lg-10 \">";
                            $attach_div = $attach_div . "<div class=\"message_user_full_name\"><span class=\"fullname_msg_span\" \>" . $row_user['full_name'] . " </span>" . $formated_time_am_pm . "</div>";
                            if ($row["message_type"] == "message") {
                                $attach_div = $attach_div . "<div class=\"message_display \" id=\"" . htmlspecialchars($row["dr_message_id"]) . "_div\"><div class=\"only_message\">" . htmlspecialchars($row["message"]) . "  </div>  ";
                            }
                            if ($row["message_type"] == "picture") {

                                $attach_div = $attach_div . "<div class=\"message_display \" id=\"" . htmlspecialchars($row["dr_message_id"]) . "_div\"><div class=\"only_message\"><img height=\"200\" width=\"200\" src=\"" . htmlspecialchars($row["message"]) . "\"\>  </div>  ";

                            }
                            if ($row["message_type"] == "image_link") {


                                $attach_div = $attach_div . "<div class=\"message_display \" id=\"" . htmlspecialchars($row["dr_message_id"]) . "_div\"><div class=\"only_message\"><a href=\"" . htmlspecialchars($row["message"]) . " \">" . htmlspecialchars($row["message"]) . "</a><br><img height=\"200\" width=\"200\" src=\"" . htmlspecialchars($row["message"]) . "\"\>  </div>  ";

                            }

                            if ($row["message_type"] == "codesnip") {

                                $attach_div = $attach_div . "<div class=\"message_display \" id=\"" . htmlspecialchars($row["dr_message_id"]) . "_div\"><div class=\"only_message\"><pre> <code>" . htmlspecialchars($row["message"]) . " </code></pre> </div>  ";

                            }

                            $attach_div = $attach_div . "</div></div> ";
                            $attach_div = $attach_div . "</div>";
                            $attach_div = $attach_div . "</div>";
                            if ($row_channel_status["archieved_status"] == "unarchieved") {
                            }


                        }
                        mysqli_close($conn);



        }

        return $attach_div;
    }
}



