<?php
/**
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/4/2017
 * Time: 5:37 PM
 */
 include("connect.php");
$email = $_SESSION['email'];

    function retrieve_image($conn,$email)
        {
            $query = mysqli_query($conn, "select * from users where email_id='" . mysqli_real_escape_string( $conn,$email) . "'");

            $res = mysqli_fetch_row($query);
            $image = $res[11];
            return $image;
        }

$image=retrieve_image($conn,$email);

    function get_channels($conn,$email)
        {

            $query = mysqli_query($conn,"select channels.channel_name from channels,channel_users,users where channels.channel_id=channel_users.channel_id and channel_users.user_id=users.user_id and users.work_space_url=channels.work_space_url and users.email_id='".mysqli_real_escape_string($conn,$email)."'");
           $channels =array();
           if(mysqli_num_rows($query)>0) {

               while ($res = mysqli_fetch_assoc($query)) {

                   $channels[]=$res["channel_name"];

               }
           }

            return $channels;



        }




$channels = get_channels($conn,$email);



