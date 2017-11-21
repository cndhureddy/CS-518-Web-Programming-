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
    <script src="../javascript/picture_upload_preview.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>


<?php

include('connect.php');
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
session_start();

if($_SESSION['admin']=="yes")
{

}
else{
    header('location:../index.php');
    die();
}
if($_GET["user_id"]!="18")
{

    header('location:../index.php');
    die();
}

//echo $_SESSION['email'];

//echo $_SESSION['work_space_name'];
?>

<div class="vertical-div">



    <?php //include("home_page_services.php");

   // $q_check_user_id_1=mysqli_query($conn,"select * from users where email_id='".mysqli_real_escape_string($conn,$_SESSION['email']) ."'");
    //$res_check_user_id_1=mysqli_fetch_row($q_check_user_id_1);
    //$_SESSION["user_id"]=$res_check_user_id_1[0];


    $query = mysqli_query($conn,"select channels.channel_name from channels");
    $channels =array();
    if(mysqli_num_rows($query)>0) {

        while ($res = mysqli_fetch_assoc($query)) {

            $channels[]=$res["channel_name"];

        }
    }




    ?>




    <div class="dropdown-menu_home ">

        <div tabindex="0" id="display_info_home"><?php echo "slack cs odu." ?> <i class="fa fa-angle-down" aria-hidden="true"></i> <br> <span id="dis_user_name"><?php echo "Admin";?></span></div>
        <ul>

            <img class="dp_home" src="../images/admin.png"/>

            <div>
                <?php echo "admin"?> <br>
                <span class="full_name_display"> <?php echo "admin";?></spanclass>
            </div>


            <input  class="submit-button"  type="button" value="Set a Status"/>
            <!--<form method="post" action="userprofile.php">
                <input  class="submit-button"  type="submit" value="Profile & account" />
            </form>-->
            <form  action="logout.php" method="post">
                <input  class="submit-button"  type="submit" value="Sign Out of <?php print "slack cs odu."; ?>"  />

            </form>
        </ul>

    </div>

    <!-- <form  action="logout.php" method="post">
         <input    type="submit" value="Sign Out"/>

     </form>

 -->
    <div class="all_threads" ><i class="fa fa-comments-o " aria-hidden="true"></i> All Threads </div>

  <!--  <form action="profiles.php" method="post"><input class="channel_name" name="hello" type="submit" value="Profiles_page"/> </form>
-->
    <div id="channels_tag_div"><a href="" id="channels_tag"> Channels </a> <form style="float: right;margin-right: 10%;" action="channel_creation_admin.php" method="post"><button type="submit" id="channels_tag_button" value=""><i class="fa fa-plus-circle" aria-hidden="true"></i></input></form></div>


    <?php

    foreach ($channels as $value)
        echo '<form action="channel_submit_admin.php" method="post"><input class="channel_name" name="hello" type="submit" value="# '.$value.'"/> </form>';

    //button class="channel_names" value="hello"></button>
    ?>


</div >





<div class="home-top-nav">


    <?php



    if(array_key_exists( 'channel_id',$_GET)) {
        //echo"hello";
        $channel_id = $_GET['channel_id'];

        $user_id = $_GET['user_id'];
        $channel_name =$_GET['channel_name'];
        // echo $channel_id;


        include ("connect.php");

       // $q_check_user_id=mysqli_query($conn,"select * from users where email_id='".mysqli_real_escape_string($conn,$_SESSION['email']) ."'");
       // $res_check_user_id=mysqli_fetch_row($q_check_user_id);

      ///  if($res_check_user_id[0]==$user_id)
       /*{


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

*/



        if ($channel_id) {
            echo '<div class="top_channel_display" > #' . htmlspecialchars($_GET['channel_name']) . '</div>';


            //   include ("connect.php");

          //  $query_channel_check = mysqli_query($conn,"select * from channels where channel_name='".mysqli_real_escape_string($conn,$_GET['channel_name'] )."'");
            //echo $query_channel_check;
//$res_e = mysqli_query($conn,$query);
          //  $res=mysqli_fetch_row($query_channel_check);

            //if($res[3]=="public"){

              //  echo "<form action=\"invite_members.php\" method=\"post\"><input type=\"hidden\" name=\"channel_name\" value=\"$channel_name\"/><input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\"/><input type=\"submit\" value=\"invite_members\" /></form>";

            include ("connect.php");

            $query="select * from channels where channel_id='".$channel_id."'";

            $result_user=$conn->query($query);
            $row_user=$result_user->fetch_array(MYSQLI_ASSOC);
            if($row_user["archieved_status"]=="unarchieved")
            {
                echo "<form action=\"archieve.php\" method=\"post\"><input type=\"hidden\" name=\"channel_name\" value=\"$channel_name\"/><input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\"/><input type=\"submit\" value=\"Archieve\" /></form>";
                echo "<form style=\"margin-left: 6%;margin-top: -1.6%;\"action=\"admin_channel_membership.php\" method=\"post\"><input type=\"hidden\" name=\"channel_name\" value=\"$channel_name\"/><input type=\"hidden\" name=\"clicked\" value=\"clicked\"/><input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\"/><input type=\"submit\" value=\"Edit channel Membership\" /></form>";

            }
            else{

                echo "<form action=\"unarchieve.php\" method=\"post\"><input type=\"hidden\" name=\"channel_name\" value=\"$channel_name\"/><input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\"/><input type=\"submit\" value=\"Unarchieve\" /></form>";

            }
            mysqli_close($conn);
         //   }
         //   if($res[3]=="private"){

          //      if($user_id==$res[5]){

               //     echo "<form action=\"invite_members.php\" method=\"post\"><input type=\"hidden\" name=\"channel_name\" value=\"$channel_name \"/><input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\"/><input type=\"submit\" value=\"invite_members\" /></form>";


        //        }
//

        //    }





        }
    }
    else{


        //include("default_channel.php");


      //  if ($channel_id) {
        //$channel_id=1;
            echo '<div class="top_channel_display" > # general</div>';

            echo "<form action=\"invite_members.php\" method=\"post\"><input type=\"hidden\" name=\"channel_name\" value=\"general\"/><input type=\"hidden\" name=\"channel_id\" value=\"1\"/><input type=\"submit\" value=\"invite_members\" /></form>";
        //}




    }
    ?>

</div>


<div class="chat_area" >


    <?php include("admin_retrieve_msgs.php");

    ?>
    <div id="test"   user_id="<?php echo $user_id; ?>"></div>

</div>






<div class="message_post">
    <?php
    include ("connect.php");

    $query="select * from channels where channel_id='".$channel_id."'";

    $result_user=$conn->query($query);
    $row_user=$result_user->fetch_array(MYSQLI_ASSOC);
    if($row_user["archieved_status"]=="unarchieved")
    {
        echo "<form method=\"post\" action=\"controller.php\">
        <textarea type=\"text\" class=\"input_message\" name=\"message\"  contenteditable=\"true\" placeholder=\"Message\" ></textarea>
        <input type=\"hidden\" name=\"user_id\" value=\"$user_id\"/>
        <input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\"/>
        <input type=\"hidden\" name=\"channel_name\" value=\"$channel_name\">
        </input>
       
        <button class=\"submit_button_message\" type=\"submit\" value=\"\"> <i class=\"fa fa-paper-plane lg\" aria-hidden=\"true\"></i> </button>



        <div class=\"class_modal\" style=\"\">
            <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#codesnip\" style=\"

    
\" >
                <i class=\"fa fa-code\" aria-hidden=\"true\"></i>
            </button>
        </div>




        <div style=\"
    /* margin-left: 64%; */
    float: right;
    margin-right: -5.3%;
\">
            <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#uploadPic\" style=\"

    /* margin-left: 242%; */
    /* margin-bottom: 37%; */
    /* height: 181%; */
    /* width: 12%; */
\">
                <i class=\"fa fa-upload\" aria-hidden=\"true\"></i>
            </button>
        </div>

        <div style=\"
    /* margin-left: 64%; */
    float: right;
    margin-right: -8.0%;
\">
            <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#imglink\" style=\"

    /* margin-left: 242%; */
    /* margin-bottom: 37%; */
    /* height: 181%; */
    /* width: 12%; */
\">
                <i class=\"fa fa-link\" aria-hidden=\"true\"></i>
            </button> </div> </form>";

    }

    mysqli_close($conn);
    ?>




</div>





<!-- Modal -->
<div class="modal fade" id="codesnip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Code snippet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="controller.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="comment">Code:</label>
                        <textarea class="form-control" rows="15" name="codesnip_value"></textarea>
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
                        <input type="hidden" name="channel_id" value="<?php echo $channel_id ?>"/>
                        <input type="hidden" name="channel_name" value="<?php echo $channel_name ?>">
                        <input type="hidden" name="message_type" value="codesnip"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button  type="submit" class="btn btn-primary" id="message_code_snip">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="imglink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Image Link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="controller.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="comment">image url:</label>
                        <textarea class="form-control" rows="5" name="img_link_content"></textarea>
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
                        <input type="hidden" name="channel_id" value="<?php echo $channel_id ?>"/>
                        <input type="hidden" name="channel_name" value="<?php echo $channel_name ?>">
                        <input type="hidden" name="message_type" value="image_link"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="message_img_link">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadPic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="controller.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Upload Image</label>
                                <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" id="imgInp" name="fileToUpload">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
                    <input type="hidden" name="channel_id" value="<?php echo $channel_id ?>"/>
                    <input type="hidden" name="channel_name" value="<?php echo $channel_name ?>">
                </span>
            </span>
                                    <input type="text" class="form-control" readonly>
                                </div>
                                <img id='img-upload'/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="message_upload_pic" name="submit" value="end">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>




</body>
</html>
