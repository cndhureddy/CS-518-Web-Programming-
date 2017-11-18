<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 11/13/2017
 * Time: 11:18 PM
 */

// get_more_messages;
include_once('db_queries.php');


class get_more_messages
{


public function retrieve_next_messages($channel_id,$count){
    include ("connect.php");

    $temp_time="";
    $temp_time_month="";
    $counter_today=0;
    $counter_yesterday=0;
    $temp_user_id="";
    $check_count=$count;
    $count=$count+15;
        $db_object=new db_queries();

        $query=$db_object->retrieve_messages_query($channel_id,$count);

        $result_set=$conn->query($query);

        $query_count=$db_object->get_channel_msg_count($channel_id);

        $result_count=$conn->query($query_count);

        $row_count=$result_count->fetch_array(MYSQLI_ASSOC);
        $attach_div="";
        if($row_count["count(*)"]>=$count) {
            $attach_div="<div><label class=\"older_messages\" id=\"$channel_id\">older messages</label></div>";

        }else{
            $attach_div="<div><label class=\"the_end\" id=\"$channel_id\">End of channel messages</label></div>";
        }

        while($row=$result_set->fetch_array(MYSQLI_ASSOC)){
            //echo "<br>";
            $attach_div=$attach_div."<br>";
            $user_id=$row["user_id"];
            $query_user_details=$db_object->get_user_details($user_id);
            $result_user_details=$conn->query($query_user_details);
            $row_user=$result_user_details->fetch_array(MYSQLI_ASSOC);
            $formated_date=date("l F jS, Y",strtotime($row["timestamp"]));
            $formated_time_am_pm=date("h:i A",strtotime($row["timestamp"]));
            $message_id_for_likes=$row["message_id"];

            $query_message_id_like=$db_object->get_likes($message_id_for_likes);
            $result_message_id_like=$conn->query($query_message_id_like);
            if(mysqli_num_rows($result_message_id_like)>0) {
                $row_message_id_like=$result_message_id_like->fetch_array(MYSQLI_ASSOC);
                $count_like=$row_message_id_like["count"];
                // print_r($row_message_id);
            }
            $query_message_id_dislike=$db_object->get_dislikes($message_id_for_likes);

            $result_message_id_dislike=$conn->query($query_message_id_dislike);
            if(mysqli_num_rows($result_message_id_dislike)>0) {
                $row_message_id_dislike = $result_message_id_dislike->fetch_array(MYSQLI_ASSOC);
                $count_dislike=$row_message_id_dislike["count"];

            }



            // echo $row["user_id"];
            //   echo $temp_user_id;

            if($temp_time==$formated_time_am_pm and $row["user_id"]==$temp_user_id) {


                $attach_div=$attach_div."<div class=\"message_display_sub the_whole_message_sub \" > <div class=\"message_sub\" id=\"".htmlspecialchars($row["message_id"])."_div\">" .htmlspecialchars($row["message"]) ." <br> ";

                $query_thread_count=$db_object->get_thread_count($row["message_id"]);

                $result_thread_count =$conn->query($query_thread_count);

                $row_count=$result_thread_count->fetch_array(MYSQLI_ASSOC);

                if($count_like>0)
                {
                    $attach_div=$attach_div."<i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\" id=\"". htmlspecialchars($row["message_id"]). "_like\">".$count_like."</i> &nbsp;";

                }
                if($count_dislike>0)
                {

                    $attach_div=$attach_div."<i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"  id=\"". htmlspecialchars($row["message_id"]). "_dislike\"  >".$count_dislike."</i>&nbsp;";
                }
                $attach_div=$attach_div. "</div>";

                $attach_div=$attach_div. "<div  class=\"thread_count_div_".htmlspecialchars($row["message_id"])."\">";
                if($row_count["count(*)"]>0)
                {
                    $attach_div=$attach_div. "<div class=\"unique_count_".htmlspecialchars($row["message_id"])."  \">";
                    $attach_div=$attach_div. "<button id=\"thread_count_".htmlspecialchars($row["message_id"])."\"   value=\" ". htmlspecialchars($row["message_id"]). "\"   >".  $row_count["count(*)"] ." replies </button>";
                    $attach_div=$attach_div. "</div>";
                }
                $attach_div=$attach_div. "</div>";
                $attach_div=$attach_div. "<div class=\"message_reactions_sub\" ><button id=\"like\"  class=\"like_dislike\" value=\" ". htmlspecialchars($row["message_id"]). "\"><i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"></i></button><button id=\"dis_like\"   class=\"like_dislike\"  value=\" ". htmlspecialchars($row["message_id"]). "\"> <i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"></i></button> <button id=\"thread_message\"   class=\"like_dislike\"  value=\" ". htmlspecialchars($row["message_id"]). "\"> <i class=\"fa fa-reply\" aria-hidden=\"true\"></i></button> </div> </div>";
                //  echo "</div>";

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
                    $attach_div=$attach_div."<div class=\"row col-lg-5\"><hr class=\"left_hr col-lg-4\"> <span class=\"today_text col-lg-2\">today</span> <hr class=\"right_hr col-lg-4\"></div>";
                    $counter_today++;
                    $check_br=1;
                }
                else if($counter_yesterday==0 and $date_yesterday_format== $msg_date ){
                    $attach_div=$attach_div. "<div class=\"row\"><hr class=\"left_hr col-lg-4\"> <span class=\"today_text col-lg-2\">yesterday</span> <hr class=\"right_hr col-lg-4\"></div>";
                    $counter_yesterday++;
                    $check_br=1;

                    // echo "test failed";
                }
                else if($temp_time_month!=$formated_date and $counter_yesterday!=1)
                {
                    if($counter_today!=1) {
                        $attach_div=$attach_div. "<div class=\"row\"><hr class=\"left_hr col-lg-4\"> <span class=\"date_msg_text col-lg-2\">$formated_date</span> <hr class=\"right_hr col-lg-4\"></div>";
                        $temp_time_month = $formated_date;
                       $check_br=1;
                    }

                }

                if($check_br==1)
                {
                    // echo "<br><div class=\"gap\"></div>";
                }
                else
                {
                    $attach_div=$attach_div. "<div class=\"gap\"></div>";
                }



                $attach_div=$attach_div."<div class=\"row\">";

                $attach_div=$attach_div. " <div class=\"the_whole_message\">";

                $attach_div=$attach_div. "<div class=\"image_div col-xs-1\"><img class=\"message_user_image\" src=\"" . $row_user["picture"] . "\"</img></div>";


                $attach_div=$attach_div. "<div class=\" col-lg-10 \"><div class=\"message_user_full_name\"><span class=\"fullname_msg_span\" \>" . $row_user['full_name'] . " </span>" . $formated_time_am_pm . "</div>";


                $attach_div=$attach_div. "<div class=\"message_display \" id=\"".htmlspecialchars($row["message_id"])."_div\"><div class=\"only_message\">".htmlspecialchars($row["message"])." ";


                $query_thread_count=$db_object->get_thread_count($row["message_id"]);

                $result_thread_count =$conn->query($query_thread_count);

                $row_count=$result_thread_count->fetch_array(MYSQLI_ASSOC);


                if($count_like>0)
                {
                    $attach_div=$attach_div. "<br><i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"  id=\"".htmlspecialchars($row["message_id"])."_like\"  >".$count_like."</i> &nbsp;";

                }
                if($count_dislike>0)
                {

                    $attach_div=$attach_div. "<i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\" id=\"".htmlspecialchars($row["message_id"])."_dislike\" >".$count_dislike."</i>&nbsp; ";
                }

                $attach_div=$attach_div. "<div  style=\"margin-left: 0%;\" class=\"thread_count_div_".htmlspecialchars($row["message_id"])."\">";
                if($row_count["count(*)"]>0) {
                    $attach_div=$attach_div. "<div class=\"unique_count_".htmlspecialchars($row["message_id"])."\">";
                    $attach_div=$attach_div. " <button  id=\"thread_count_".htmlspecialchars($row["message_id"])."\" value=\" ". htmlspecialchars($row["message_id"]). "\"    >" . $row_count["count(*)"] . " replies</button>";
                    $attach_div=$attach_div. "</div>";
                }
                $attach_div=$attach_div. "</div></div> ";
                $attach_div=$attach_div. "</div> </div></div> ";


                $attach_div=$attach_div. "<div class=\"message_reactions_with_user col-md-1\"><button id=\"like\"  class=\"like_dislike\" value=\"".htmlspecialchars($row["message_id"])."\"><i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"></i></button><button id=\"dis_like\"   class=\"like_dislike\"  value=\"".htmlspecialchars($row["message_id"])."\"> <i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"></i></button> <button id=\"thread_message\"   class=\"like_dislike\"  value=\" ". htmlspecialchars($row["message_id"]). "\"> <i class=\"fa fa-reply\" aria-hidden=\"true\"></i></button> </div>";
                $attach_div=$attach_div."</div>";


            }


            $attach_div=$attach_div. " <div id=\"test\"   user_id=\"$user_id\"></div>";

        }

    return $attach_div;



    }



}