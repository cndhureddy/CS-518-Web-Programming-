<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ODU CS Slack</title>
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
<!--    <link rel='stylesheet' type='text/css' href='../css/homecss.php' />
--> <script src="https://use.fontawesome.com/383a6f63f0.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="../javascript/functions.js"></script>
    <script src="../javascript/pagination.js"></script>
    <script src="../javascript/pagination_direct_user.js"></script>
    <script src="../javascript/picture_upload_preview.js"></script>
    <script src="../javascript/onchange_jquery.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>


<?php
/*
 * Created by PhpStorm.
 * User: ssangam
 * Date: 10/1/2017
 * Time: 12:30 AM
 */

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
session_start();

if($_SESSION['email'] )
{
    $channel_id=0;
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

    <form action="../help.php" method="post"><input class="channel_name" name="hello" type="submit" value="Help"/> </form>

    <form action="profiles.php" method="post"><input class="channel_name" name="hello" type="submit" value="Profiles_page"/> </form>

    <div id="channels_tag_div"><a href="" id="channels_tag"> Channels </a> <form style="float: right;margin-right: 10%;" action="channel_creation.php" method="post"><button type="submit" id="channels_tag_button" value=""><i class="fa fa-plus-circle" aria-hidden="true"></i></input></form></div>


    <?php

    foreach ($channels as $value)
        echo '<form action="channel_submit.php" method="post"><input class="channel_name" name="hello" type="submit" value="# '.$value.'"/> </form>';

    //button class="channel_names" value="hello"></button>
    ?>
    <label class="channel_name" > <b>Search </b></label>
    <div class="Search"><input type="text" class="enter_username" autofill="off"/> </div>
    <div class="Suggestions">


    </div>
    <label class="channel_name" > <b>Direct Messages </b></label>
    <?php
    include ("connect.php");

    $sql_query="select * from users where work_space_url='slack.cs.odu.edu'";
    $user_details =$conn->query($sql_query);
    //$row_count=$user_details->fetch_array(MYSQLI_ASSOC);
    //print_r($row_count["display_name"]);
    $total_user_rows=mysqli_num_rows (  $user_details );
    //echo $total_user_rows;
    $i=0;
    while($i<$total_user_rows-1)
    {
        $result_user_names=$user_details->fetch_array(MYSQLI_ASSOC);
       #echo "hello".$result_user_names ;
        if($result_user_names["user_id"]==$_SESSION["user_id"]){



        }else {
            echo '<form action="user_submit.php" method="post"><input class="channel_name" name="display_name" type="submit" value="@ ' . $result_user_names["display_name"] . '"/><input type="hidden" name="to_user_id" value="' . $result_user_names["user_id"] . '"/> </form>';
            // echo '<form action="channel_submit.php" method="post"><input class="channel_name" name="hello" type="submit" value="@ ' . $result_user_names["display_name"] . '"/> </form>';
            $i = $i + 1;
        }
    }
    //button class="channel_names" value="hello"></button>
    ?>
</div >

    <div class="home-top-nav"><?php



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

              $query_channel_check = mysqli_query($conn, "select * from channels where channel_name='" . mysqli_real_escape_string($conn, $_GET['channel_name']) . "'");
              //echo $query_channel_check;
//$res_e = mysqli_query($conn,$query);
              $res = mysqli_fetch_row($query_channel_check);


              $query_channel_status = "select * from channels where channel_id='" . $channel_id . "'";

              $result_channel_status = $conn->query($query_channel_status);
              $row_channel_status = $result_channel_status->fetch_array(MYSQLI_ASSOC);
              if ($row_channel_status["archieved_status"] == "unarchieved"){
                  if ($res[3] == "public") {

                      echo "<form action=\"invite_members.php\" method=\"post\"><input type=\"hidden\" name=\"channel_name\" value=\"$channel_name\"/><input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\"/><input type=\"submit\" value=\"invite_members\" /></form>";


                  }
              if ($res[3] == "private") {

                  if ($user_id == $res[5]) {

                      echo "<form action=\"invite_members.php\" method=\"post\"><input type=\"hidden\" name=\"channel_name\" value=\"$channel_name \"/><input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\"/><input type=\"submit\" value=\"invite_members\" /></form>";


                  }


              }
          }
          else{

                  echo "<b>Archieved</b>";
          }





          }
      }
          else{


           //   include("default_channel.php");
      /*if ($channel_id) {

          echo '<div class="top_channel_display" > # general</div>';

          echo "<form action=\"invite_members.php\" method=\"post\"><input type=\"hidden\" name=\"channel_name\" value=\"general\"/><input type=\"hidden\" name=\"channel_id\" value=\"$channel_id\"/><input type=\"submit\" value=\"invite_members\" /></form>";
      }*/




          }

          if(isset($_GET["to_user_id"])){

              $check_1=$_GET["user_id"];
              $check_2=$_GET["to_user_id"];
             // echo $check_1;
             // echo $check_2;
              if(isset($_GET["to_user_id"])){
                  $temp_user_id=$_GET["to_user_id"];
                  $temp_name=substr($_GET["channel_name"],2);

                  $query="select display_name from users where user_id='$temp_user_id'";
                  $result_set=$conn->query($query);
                  //mysqli_close($conn);
                  $row=$result_set->fetch_array(MYSQLI_ASSOC);
                  $user_name_check=$row["display_name"];
                  //echo $temp_name;
                  //echo "\n";
                  //echo $user_name_check;

                  if($temp_name!=$user_name_check){
                      //header("location: home.php?#test");
                      //echo "hello";
                     // header("location: home.php?#test");
                      die();
                  }

                  //echo $temp_name;
                  //echo $temp_user_id;



              }

              if($check_1==$check_2){

                  //header("location: home.php?#test");
                  die();
              }
                  echo '<div class="top_channel_display" > ' . htmlspecialchars($_GET['channel_name']) . '</div>';

          }


      ?>

    </div>


    <div class="chat_area" >

        <?php
        if($channel_id) {
            include("retrieve_messages.php");
        }
       if(isset($_GET["to_user_id"])){
           $temp_user_id=$_GET["to_user_id"];
           $temp_name=substr($_GET["channel_name"],2);
           $to_func_user_id=$_GET["user_id"];
           $query="select display_name from users where user_id='$temp_user_id'";
           $result_set=$conn->query($query);
           //mysqli_close($conn);
           $row=$result_set->fetch_array(MYSQLI_ASSOC);
           $user_name_check=$row["display_name"];
            //echo $temp_name;
            //echo "\n";
            //echo $user_name_check;
           //header("location: home.php?#test");
           if($temp_name!=$user_name_check){
               //header("location: home.php?#test");
               //echo "hello";
               die();
           }
           else{

               include("retrieve_direct_messages.php");
           }

           //echo $temp_name;
           //echo $temp_user_id;



       }
        ?>
        <div id="test"   user_id="<?php echo $user_id ?>"></div>

    </div>



<?php

//include("default_channel.php");
include ("connect.php");
$query_channel_status="select * from channels where channel_id='".$channel_id."'";

$result_channel_status=$conn->query($query_channel_status);
$row_channel_status=$result_channel_status->fetch_array(MYSQLI_ASSOC);
mysqli_close($conn);

if($row_channel_status["archieved_status"]=="unarchieved") {
    echo "<div class=\"message_post\">
<form method=\"post\" action=\"controller.php\">
    <textarea type=\"text\" class=\"input_message\" name=\"message\"  contenteditable=\"true\" placeholder=\"Message\" ></textarea>
    <input type=\"hidden\" name=\"user_id\" value=\"".$user_id."\"/>
        <input type=\"hidden\" name=\"channel_id\" value=\"".$channel_id."\"/>
    <input type=\"hidden\" name=\"channel_name\" value=\"".$channel_name."\">
    </input>
   <!--<input type=\"text\" class=\"message_post\" contenteditable=\"true\" type=\"text\"/>
-->
    <button class=\"submit_button_message\" type=\"submit\" value=\"\"> <i class=\"fa fa-paper-plane lg\" aria-hidden=\"true\"></i> </button>



    <div class=\"class_modal\" style=\"
    /* margin-left: 64%; */
\">
        <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#codesnip\" style=\"

    /* margin-left: 242%; */
    /* margin-bottom: 37%; */
    /* height: 181%; */
    /* width: 12%; */
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
        </button>
    </div>

</form>




</div>
";

}

if($_GET["to_user_id"]){
    $check_1=$_GET["user_id"];
    $check_2=$_GET["to_user_id"];
    //echo $check_1;
    //echo $check_2;

    if($check_1==$check_2){

        header("location: home.php?#test");
        die();
    }
   // if($_GET[""])
$user_id=$_GET["user_id"];

    echo "<div class=\"message_post\">
<form method=\"post\" action=\"controller.php\">
    <textarea type=\"text\" class=\"input_message\" name=\"message\"  contenteditable=\"true\" placeholder=\"Message\" ></textarea>
    <input type=\"hidden\" name=\"user_id\" value=\"".$user_id."\"/>
        <input type=\"hidden\" name=\"to_user_id\" value=\"".$_GET["to_user_id"]."\"/>
    <input type=\"hidden\" name=\"to_display_name\" value=\"".$_GET["channel_name"]."\">
    </input>
   <!--<input type=\"text\" class=\"message_post\" contenteditable=\"true\" type=\"text\"/>
-->
    <button class=\"submit_button_message\" type=\"submit\" value=\"\"> <i class=\"fa fa-paper-plane lg\" aria-hidden=\"true\"></i> </button>



    <div class=\"class_modal\" style=\"
    /* margin-left: 64%; */
\">
        <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#codesnip\" style=\"

    /* margin-left: 242%; */
    /* margin-bottom: 37%; */
    /* height: 181%; */
    /* width: 12%; */
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
        </button>
    </div>

</form>




</div>
";


}

?>


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
                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>"/>
                        <?php

                        if(isset($_GET["to_user_id"])){
                            $to_user_id=$_GET["to_user_id"];
                            echo "<input type=\"hidden\" name=\"to_user_id\" value=\"$to_user_id\"/>";
                        }

                        ?>
                        <input type="hidden" name="channel_id" value="<?php echo $channel_id ?>"/>
                        <input type="hidden" name="channel_name" value="<?php echo $_GET["channel_name"] ?>">
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
                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>"/>
                        <?php

                        if(isset($_GET["to_user_id"])){
                            $to_user_id=$_GET["to_user_id"];
                            echo "<input type=\"hidden\" name=\"to_user_id\" value=\"$to_user_id\"/>";
                        }

                        ?>
                        <input type="hidden" name="channel_id" value="<?php echo $channel_id ?>"/>
                        <input type="hidden" name="channel_name" value="<?php echo $_GET["channel_name"] ?>">
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
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>"/>

                    <?php

                    if(isset($_GET["to_user_id"])){
                        $to_user_id=$_GET["to_user_id"];
                        echo "<input type=\"hidden\" name=\"to_user_id\" value=\"$to_user_id\"/>";
                    }

                    ?>

                    <input type="hidden" name="channel_id" value="<?php echo $channel_id ?>"/>
                    <input type="hidden" name="channel_name" value="<?php echo $_GET["channel_name"] ?>">
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
