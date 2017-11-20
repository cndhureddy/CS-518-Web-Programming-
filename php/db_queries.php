<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 11/14/2017
 * Time: 12:03 AM
 */

//namespace db_queries;


class db_queries
{

    public function retrieve_messages_query($channel_id,$count){


        $query = "select * from (SELECT * FROM `channel_messages` where channel_id='" . $channel_id . "' ORDER BY timestamp DESC LIMIT " . $count . ")a order by timestamp ASC";

        return $query;
    }
public function get_channel_msg_count($channel_id){

        $query="select count(*) from channel_messages where channel_id='".$channel_id."'";

        return $query;

    }

public function get_user_details($user_id){

        $query="select * from users where user_id='".$user_id."'";

        return $query;

    }
public function  get_likes($message_id){

        $query="SELECT count(*) as count FROM `message_reaction` WHERE message_id='".$message_id."' and reaction=1";
        return $query;

    }
public function get_dislikes($message_id){

        $query="SELECT count(*) as count FROM `message_reaction` WHERE message_id='".$message_id."' and reaction=2";
        return $query;
    }
public function get_thread_count($message_id){

        $query="select count(*) from thread where message_id='".$message_id."'";;
        return $query;

    }
    public function insert_message($channel_id,$user_id,$message_final,$current_date,$smiley_status,$message_type){

        $query="insert into channel_messages values(DEFAULT,'$channel_id','$user_id','$message_final','$current_date','$smiley_status','$message_type') ";
        return $query;

    }
    public function get_file_name(){

        $query="select message_id from channel_messages order by message_id DESC LIMIT 1;";
        return $query;


    }





}