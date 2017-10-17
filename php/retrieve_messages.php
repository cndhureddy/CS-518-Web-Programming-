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
    //$message_array = array();
   // $num_rows=count($result);
    //$count=0;
    $temp_time="";
    $temp_time_month="";
    $counter_today=0;
    $counter_yesterday=0;
    while($row=$result->fetch_array(MYSQLI_ASSOC))
    {
        echo "<br>";
            $user_id=$row["user_id"];

            $query_user="select * from users where user_id='".$user_id."'";
            $result_user=$conn->query($query_user);

            $row_user=$result_user->fetch_array(MYSQLI_ASSOC);
            $formated_date=date("l F jS, Y",strtotime($row["timestamp"]));
            //echo $formated_date;

            $formated_time_am_pm=date("h:i A",strtotime($row["timestamp"]));
           // echo $row["timestamp"];


            if($temp_time==$formated_time_am_pm) {

               /* echo "<div><img class=\" message_user_image\" src=\"" . $row_user["picture"] . "\"</img></div>";


                echo "<div class=\"message_user_full_name\"><span class=\"fullname_msg_span\" \>" . $row_user['full_name'] . " </span>" . $formated_time_am_pm . "</div>";

               */

                echo "<div class=\"message_display\">" . htmlspecialchars($row["message"]) . "</div>";


            }
            else{
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

                if($date_current_format== $msg_date and $counter_today==0){
                    //echo "DATE";
                    echo "<hr class=\"left_hr\"> <span class=\"today_text\">today</span> <hr class=\"right_hr\">";
                    $counter_today++;
                }
                else if($counter_yesterday==0 and $date_yesterday_format== $msg_date ){
                    echo "<hr class=\"left_hr\"> <span class=\"today_text\">yesterday</span> <hr class=\"right_hr\">";
                    $counter_yesterday++;

                   // echo "test failed";
                }
                else if($temp_time_month!=$formated_date and $counter_yesterday!=1)
                {
                    if($counter_today!=1) {
                        echo "<hr class=\"left_hr\"> <span class=\"date_msg_text\">$formated_date</span> <hr class=\"right_hr\">";
                        $temp_time_month = $formated_date;
                    }

                }



                echo "<div><img class=\" message_user_image\" src=\"" . $row_user["picture"] . "\"</img></div>";


                echo "<div class=\"message_user_full_name\"><span class=\"fullname_msg_span\" \>" . $row_user['full_name'] . " </span>" . $formated_time_am_pm . "</div>";


                echo "<div class=\"message_display\">" . htmlspecialchars($row["message"]) . "</div>";




            }

    }


}

retrieving_messages($conn,$channel_id);

mysqli_close($conn);