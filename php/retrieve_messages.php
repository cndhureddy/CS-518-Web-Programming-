<?php
/*
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/10/2017
 * Time: 2:05 AM
 */
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
include("connect.php");



function retrieving_messages($conn,$channel_id){
   // echo $channel_id;

     echo "this is retrieve messages.php file1";

   $query = "select  * from channel_messages where channel_id='" . $channel_id . "'";

    $result =$conn->query($query);
    //$message_array = array();
   // $num_rows=count($result);
    //$count=0;
    $temp_time="";
    $temp_time_month="";
    $counter_today=0;
    $counter_yesterday=0;
        echo "this is retrieve messages.php file2";
    $query_message_id="select message_id,reaction,count(*) from message_reaction group by message_id,reaction";
   echo $query_message_id;
   // $result_message_id=$conn->query($query_message_id);
   $result_message_id=mysqli_query($conn,$query_message_id)
     echo "test";
   
    print_r($result_message_id);
    //$row_message_id=$result_message_id->fetch_all();
   
   $row_message_id=mysqli_fetch_all ($result_message_id, MYSQLI_ASSOC)
   
   echo "//////////////////////////////////////////////////////////////////////////////////";
    print_r($row_message_id);
     echo "this is retrieve messages.php file3";


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
            if($temp_time==$formated_time_am_pm) {

               
               echo "this is retrieve messages.php file";

                echo "<div class=\"message_display_sub the_whole_message_sub\" > <div class=\"message_sub\" id=\"".htmlspecialchars($row["message_id"])."_div\">" . htmlspecialchars($row["message"]) ." <br> " ;


                if($count_like>0)
                {
                    echo "<i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\" id=\"". htmlspecialchars($row["message_id"]). "_like\">".$count_like."</i> &nbsp;";

                }
                if($count_dislike>0)
                {

                    echo   "<i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"  id=\"". htmlspecialchars($row["message_id"]). "_dislike\"  >".$count_dislike."</i>&nbsp;";
                }
                echo "</div>";

               echo "<div class=\"message_reactions_sub\" ><button id=\"like\"  class=\"like_dislike\" value=\" ". htmlspecialchars($row["message_id"]). "\"><i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"></i></button><button id=\"dis_like\"   class=\"like_dislike\"  value=\" ". htmlspecialchars($row["message_id"]). "\"> <i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"></i></button></div> </div>";
            

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




                echo " <div class=\"the_whole_message\">";

                echo "<div class=\"image_div\"><img class=\" message_user_image\" src=\"" . $row_user["picture"] . "\"</img></div>";


                echo "<div class=\"message_user_full_name\"><span class=\"fullname_msg_span\" \>" . $row_user['full_name'] . " </span>" . $formated_time_am_pm . "</div>";


                echo "<div class=\"message_display \" id=\"".htmlspecialchars($row["message_id"])."_div\"><div class=\"only_message\">".htmlspecialchars($row["message"])."  </div>  ";



                if($count_like>0)
                {
                    echo "<i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"  id=\"".htmlspecialchars($row["message_id"])."_like\"  >".$count_like."</i> &nbsp;";

                }
                if($count_dislike>0)
                {

                    echo   "<i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\" id=\"".htmlspecialchars($row["message_id"])."_dislike\" >".$count_dislike."</i>&nbsp;";
                }
                echo "</div></div> ";


                echo "<div class=\"message_reactions\"><button id=\"like\"  class=\"like_dislike\" value=\"".htmlspecialchars($row["message_id"])."\"><i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"></i></button><button id=\"dis_like\"   class=\"like_dislike\"  value=\"".htmlspecialchars($row["message_id"])."\"> <i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"></i></button></div>";



            }

    }


}

retrieving_messages($conn,$channel_id);

mysqli_close($conn);


   
 
