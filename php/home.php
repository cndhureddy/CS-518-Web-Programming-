<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="../css/home.css">
<!--    <link rel='stylesheet' type='text/css' href='../css/homecss.php' />
--> <script src="https://use.fontawesome.com/383a6f63f0.js"></script>
</head>
<body>


<?php
/**
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
}

//echo $_SESSION['email'];

//echo $_SESSION['work_space_name'];
?>

<div class="vertical-div">

    <!--

    <div tabindex="0" class="top-user-button onclick-menu">

    <div class="onclick-menu-content ">

        <div id="username-display-in-div"> </div>
        <div id="fullname-display-in-div"> </div>
        <br>
        <!--<button class="user-dropdown" onclick="alert("hello dude");" > Set a Status</button>
        <button class="user-dropdown" >Profile & account</button>

        <form   action="logout.php" method="post">
            <input id="submit-button"  type="submit" value="Sign Out"/>

        </form>-->
        <!--<li><button >Look, mom</button></li>
        <li><button >no JavaScript!</button></li>
        <li><button >Pretty nice, right?</button></li>-->




<!--
    </div>
        <div id="username-display"> </div>
-->

    <?php include("home_page_services.php"); ?>


    <div class="dropdown-menu_home ">

        <div tabindex="0" id="display_info_home"><?php echo $_SESSION['work_space_name']; ?> <i class="fa fa-angle-down" aria-hidden="true"></i> <br> <span id="dis_user_name"><?php echo $_SESSION["display_name"];?></span></div>
        <ul>

            <img class="dp_home" src="<?php echo $image?>"/>

            <div>
                <?php echo $_SESSION['display_name'];?> <br>
               <span class="full_name_display"> <?php echo $_SESSION['full_name'];?></spanclass>
            </div>


            <input  class="submit-button"  type="button" value="Set a Status"/>
            <input  class="submit-button"  type="button" value="Profile & account"/>

            <form  action="logout.php" method="post">
                <input  class="submit-button"  type="submit" value="Sign Out of <?php print $_SESSION['work_space_name']; ?>" />

            </form>
        </ul>

    </div>

   <!-- <form  action="logout.php" method="post">
        <input    type="submit" value="Sign Out"/>

    </form>

-->
    <div class="all_threads"><i class="fa fa-comments-o " aria-hidden="true"></i> All Threads </div>

    <div id="channels_tag_div"><a href="" id="channels_tag"> Channels </a> <button id="channels_tag_button"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></div>


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

          if ($channel_id) {
              echo '<div class="top_channel_display" > #' . $_GET['channel_name'] . '</div>';

          }
      }
          else{


              include("default_channel.php");
      if ($channel_id) {
          echo '<div class="top_channel_display" > # general</div>';
      }




          }
      ?>

    </div>


    <div class="chat_area">

        <?php include("retrieve_messages.php"); ?>

    </div>


<form method="post" action="message_post.php">
    <input type="text" name="message" class="message_post" contenteditable="true" placeholder="Message" >
    <input type="hidden" name="user_id" value="<?php echo $user_id ?>"/>
        <input type="hidden" name="channel_id" value="<?php echo $channel_id ?>"/>
    </input>
   <!--<input type="text" class="message_post" contenteditable="true" type="text"/>
-->
    <input class="message_submit" type="submit"  >
</form>









</body>
</html>