<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="../css/home.css">
<!--    <link rel='stylesheet' type='text/css' href='../css/homecss.php' />
--> <script src="https://use.fontawesome.com/383a6f63f0.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="../javascript/functions.js"></script>
    <script src="../javascript/pagination.js"></script>





</head>
<body>


<?php
/*
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/1/2017
 * Time: 12:30 AM
 */


session_start();

if($_SESSION['email'])
{

}
else{
    header('location:../index.php');
    die();
}

//echo $_SESSION['email'];

//echo $_SESSION['work_space_name'];
?>

<div class="vertical-div">



    <?php include("home_page_services.php");

    $q_check_user_id_1=mysqli_query($conn,"select * from users where email_id='".mysqli_real_escape_string($conn,$_SESSION['email']) ."'");
    $res_check_user_id_1=mysqli_fetch_row($q_check_user_id_1);
    $_SESSION["user_id"]=$res_check_user_id_1[0];


    ?>


    <div class="dropdown-menu_home ">

        <div tabindex="0" id="display_info_home"><?php echo $_SESSION['work_space_name']; ?> <i class="fa fa-angle-down" aria-hidden="true"></i> <br> <span id="dis_user_name"><?php echo $_SESSION["display_name"];?></span></div>
        <ul>

            <img class="dp_home" src="<?php echo $image?>"/>

            <div>
                <?php echo $_SESSION['display_name'];?> <br>
               <span class="full_name_display"> <?php echo $_SESSION['full_name'];?></spanclass>
            </div>


            <input  class="submit-button"  type="button" value="Set a Status"/>
            <form method="post" action="userprofile.php">
            <input  class="submit-button"  type="submit" value="Profile & account" />
            </form>
            <form  action="logout.php" method="post">
                <input  class="submit-button"  type="submit" value="Sign Out of <?php print $_SESSION['work_space_name']; ?>"  />

            </form>
        </ul>

    </div>

   <!-- <form  action="logout.php" method="post">
        <input    type="submit" value="Sign Out"/>

    </form>

-->
    <div class="all_threads" ><i class="fa fa-comments-o " aria-hidden="true"></i> All Threads </div>

    <form action="profiles.php" method="post"><input class="channel_name" name="hello" type="submit" value="Profiles_page"/> </form>

    <div id="channels_tag_div"><a href="" id="channels_tag"> Channels </a> <form style="float: right;margin-right: 10%;" action="channel_creation.php" method="post"><button type="submit" id="channels_tag_button" value=""><i class="fa fa-plus-circle" aria-hidden="true"></i></input></form></div>


    <?php

    foreach ($channels as $value)
        echo '<form action="channel_submit.php" method="post"><input class="channel_name" name="hello" type="submit" value="# '.$value.'"/> </form>';

    //button class="channel_names" value="hello"></button>
    ?>


    </div >





    <div class="home-top-nav">


      <?php



      if(array_key_exists( 'channel_id',$_GET)) {
          $channel_id = $_GET['channel_id'];

          $user_id = $_GET['user_id'];
          $channel_name =$_GET['channel_name'];
           // echo $channel_id;
          
          
          include ("connect.php");

          $q_check_user_id=mysqli_query($conn,"select * from users where email_id='".mysqli_real_escape_string($conn,$_SESSION['email']) ."'");
          $res_check_user_id=mysqli_fetch_row($q_check_user_id);

          if($res_check_user_id[0]==$user_id)
          {
                
              
               $q_check_user_id_a=mysqli_query($conn,"select * from channel_users where user_id='$user_id' and channel_id='$channel_id'");
              // $res_check_user_id=mysqli_fetch_row($q_check_user_id);

              if(mysqli_fetch_row($q_check_user_id_a))
              {

              }
              else
              {
                  mysqli_close($conn);
                  header('location:home.php#test');
                  die();

              }

              
              
              
              
          }
          else{
              mysqli_close($conn);
              header('location:home.php#test');
              die();
          }
          
          
          
          
          
          if ($channel_id) {
              echo '<div class="top_channel_display" > #' . htmlspecialchars($_GET['channel_name']) . '</div>';


             //   include ("connect.php");

              $query_channel_check = mysqli_query($conn,"select * from channels where channel_name='".mysqli_real_escape_string($conn,$_GET['channel_name'] )."'");
              //echo $query_channel_check;
//$res_e = mysqli_query($conn,$query);
              $res=mysqli_fetch_row($query_channel_check);

              if($res[3]=="public"){

                  echo "<form action=\"invite_members.php\" method=\"post\"><input type=\"hidden\" name=\"channel_name\" value=\"$channel_name\"/><input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\"/><input type=\"submit\" value=\"invite_members\" /></form>";


              }
              if($res[3]=="private"){

                    if($user_id==$res[5]){

                        echo "<form action=\"invite_members.php\" method=\"post\"><input type=\"hidden\" name=\"channel_name\" value=\"$channel_name \"/><input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\"/><input type=\"submit\" value=\"invite_members\" /></form>";


                    }


              }





          }
      }
          else{


              include("default_channel.php");
      if ($channel_id) {

          echo '<div class="top_channel_display" > # general</div>';

          echo "<form action=\"invite_members.php\" method=\"post\"><input type=\"hidden\" name=\"channel_name\" value=\"general\"/><input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\"/><input type=\"submit\" value=\"invite_members\" /></form>";
      }




          }
      ?>

    </div>


    <div class="chat_area" >

        <?php include("retrieve_messages.php");

        ?>
        <div id="test"   user_id="<?php echo $user_id ?>"></div>

    </div>

<div class="message_post">
<form method="post" action="message_post.php">
    <textarea type="text" class="input_message" name="message"  contenteditable="true" placeholder="Message" ></textarea>
    <input type="hidden" name="user_id" value="<?php echo $user_id ?>"/>
        <input type="hidden" name="channel_id" value="<?php echo $channel_id ?>"/>
    <input type="hidden" name="channel_name" value="<?php echo $channel_name ?>">
    </input>
   <!--<input type="text" class="message_post" contenteditable="true" type="text"/>
-->
    <button class="submit_button_message" type="submit" value=""> <i class="fa fa-paper-plane lg" aria-hidden="true"></i> </button>
</form>

</div>








</body>
</html>
