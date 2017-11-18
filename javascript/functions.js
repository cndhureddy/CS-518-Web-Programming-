
//function insert_like_dislike() {


/*
function insert_tread(message_id,user_id)
{

    console.log(message_id);
    console.log(user_id);
    insert_input_message=$(".thread_input").val();

    console.log(insert_input_message);
    console.log("hello");
    $.ajax({

        type: "POST",
        url: "../php/thread_insert.php",
        data: { message_id: message_id, user_id: user_id, message: insert_input_message},
        dataType: 'text',
        success: function (data) {

            var object = JSON.parse(data);
            //console.log(object[0]);
            $(".appended_message").remove();
            $(".thread_input").val('');


            object.forEach(function(entry){


                console.log(entry);

                $append_tag='<div class=\"appended_message\"><div class="combine_append"><div><img class=\"appended_image\"src=\"'+ entry["user_thread_picture"] +'\"/></div><div class=\"appended_username\" >'+ entry["user_name_thread"] +'</div><div class=\"appended_thread_time\">'+ entry["time"] +'</div> </div><br> <div class=\"appended_thread_message\">'+ entry["thread_message"] +'</div></div>';

                $(".thread_start").append($append_tag);
            });


        }}
    );



}
*/


$( document ).ready(function() {
//    console.log( "ready!" );



/*

    $("#thread_count").click(function () {


        var user_id = $("#test").attr("user_id");
        var message_id = $(this).val();
        var button_name=this.id;
            console.log(user_id);
            console.log(message_id);







        $(".thread_management").remove();

        $(".chat_area").css("width", "67%");

        $(".message_post").css("width", "67%");

        $(".message_sub").css("width","88%");
        $(".only_message").css("width","88%");
        $(".message_display").css("width","90%");
        $(".message_reactions_with_user").css("margin-top","-2%");

        $('body').append('<div class=\"thread_management\" > <div class=\"thread_top_bar\"> <b style="margin-left: 5%; margin-top: 40%"> Thread</b><button  class=\"close_button\"><i class="fa fa-times" aria-hidden="true"></i></button></div> <div class=\"thread body\"> </div> </div>');




        $.ajax({
            type: "POST",
            url: "../php/threads.php",
            data: {type_like: button_name, message_id: message_id, user_id: user_id},
            dataType: 'text',
            success: function (data) {

                var obj = JSON.parse(data);
                // console.log(obj);
                //console.log(obj1);
                //var obj = obj1[0];
                $channel_name=$(".top_channel_display").text();

                var $thread_tag_check = $(".the_thread_for_a_message");

                if($thread_tag_check[0]) {
                    $(".the_thread_for_a_message").remove();
                    $thread_tag = '<div class=\"the_thread_for_a_message\">  <div class=\"thread_start\"> <div class=\"thread_one_to_messages\"><div > <img class=\"thread_user_image\" src=' + obj["picture"] + '>  </div> <div class=\"thread_message_username\" ><div> ' + obj["user_name"] + '</div><div>  in ' + $channel_name + '</div></div></div><div class=\"thread_time\"> &nbsp; ' + obj["time"] + '</div> <br><div class=\"thread_message\">' + (obj["message"]) + ' </div> </div> <div class=\"form_thread\" message_id=\"'+obj["message_id"]+'\" user_id =\"'+obj["user_id"]+'\" > <textarea class=\"thread_input\" id=\"id_text\" type="text"> </textarea><button class=\"thread_submit\" id=\"thread_message_submit\" value=\"Send\"> Send </button> </div>  </div>';

                    $('.thread_management').append($thread_tag);
                }
                else{

                    $thread_tag = '<div class=\"the_thread_for_a_message\">  <div class=\"thread_start\"> <div class=\"thread_one_to_messages\"><div > <img class=\"thread_user_image\" src=' + obj["picture"] + '>  </div> <div class=\"thread_message_username\" ><div> ' + obj["user_name"] + '</div><div>  in ' + $channel_name + '</div></div></div><div class=\"thread_time\"> &nbsp; ' + obj["time"] + '</div> <br><div class=\"thread_message\">' + (obj["message"]) + ' </div> </div> <div class=\"form_thread\" message_id=\"'+obj["message_id"]+'\" user_id =\"'+obj["user_id"]+'\" > <textarea class=\"thread_input\" id=\"id_text\" type="text"> </textarea><button class=\"thread_submit\" id=\"thread_message_submit\"  value=\"Send\"> Send </button> </div></div>';

                    $('.thread_management').append($thread_tag);



                }


                var object =  obj[0];
                console.log(obj);//JSON.parse(data);
                console.log(object);

                $(".thread_input").val('');


                object.forEach(function(entry){


                    console.log(entry);

                    $append_tag='<div class=\"appended_message\"><div class="combine_append"><div><img class=\"appended_image\"src=\"'+ entry["user_thread_picture"] +'\"/></div><div class=\"appended_username\" >'+ entry["user_name_thread"] +'</div><div class=\"appended_thread_time\">'+ entry["time"] +'</div> </div><br> <div class=\"appended_thread_message\">'+ entry["thread_message"] +'</div></div>';

                    $(".thread_start").append($append_tag);
                });




            }
        });







        $(".close_button").click(  function()
            {
                $(".chat_area").css("width", "87%");

                $(".message_post").css("width", "87%");


                $(".thread_management").remove();
            }


        );

















        }
    );

*/



    $(document).on('click', '#thread_message_submit', function(){



        message_id=$(".form_thread").attr("message_id");
        user_id=$(".form_thread").attr("user_id");
        console.log(message_id);
        console.log(user_id);
        insert_input_message=$(".thread_input").val();

        console.log(insert_input_message);
        console.log("hello");
        $.ajax({

            type: "POST",
            url: "../php/thread_insert.php",
            data: { message_id: message_id, user_id: user_id, message: insert_input_message},
            dataType: 'text',
            async:false,
            success: function (data) {

                var object = JSON.parse(data);
                //console.log(object[0]);
                $(".appended_message").remove();
                $(".thread_start").find('br').remove();
                $( ".thread_time").after( "<br>" );
                $(".thread_input").val('');


                object.forEach(function(entry){


                    console.log(entry);

                    $append_tag='<div class=\"appended_message\"><div class="combine_append"><div><img class=\"appended_image\"src=\"'+ entry["user_thread_picture"] +'\"/></div><div class=\"appended_username\" >'+ entry["user_name_thread"] +'</div><div class=\"appended_thread_time\">'+ entry["time"] +'</div> </div><br> <div class=\"appended_thread_message\">'+ entry["thread_message"] +'</div></div><br>';

                    $(".thread_start").append($append_tag);
                });


            }}
        );




    $.ajax({

        type:"POST",
        url:"../php/thread_count_ajax.php",
        data:{message_id: message_id},
        dataType: 'json',
        async:false,
        success: function (data) {
            console.log(data);

            var $tag_check = $(".unique_count_"+message_id);
                console.log($tag_check);
                if (data > 0) {
                    if($tag_check[0]) {
                    $text_count = data + " replies";
                    $param = "#thread_count_"+ message_id;
                    $($param).text($text_count);
                    console.log("checking");

                }
                else{

                        $append_button='<div class=\"unique_count_'+message_id+'"><button id=\"thread_count_'+message_id+'\" value=\"'+message_id+'\">'+data+' Replies </button><div>' ;
                        $(".thread_count_div_"+message_id).append($append_button);
                    }

            }
            else{


                    $(".thread_count_div_"+message_id).remove();


            }

        }



    });














    });










    $(document).on('click', "button", function(){

   // $("button").click(function() {
        var fired_button = $(this).val();
        var button_name= this.id;


   var message_id = parseInt(fired_button);
    var user_id=$("#test").attr("user_id");
        //console.log(fired_button);
        //console.log(button_name);
       //console.log(message_id);
      // console.log(user_id);

          //button_name='dis_like'

   if(button_name=="thread_message" )
   {
        $(".thread_management").remove();

       $(".chat_area").css("width", "67%");

       $(".message_post").css("width", "67%");

       $(".message_sub").css("width","88%");
       $(".only_message").css("width","88%");
        $(".message_display").css("width","90%");
      //  $(".message_reactions_with_user").css("margin-top","-2%");

       $('body').append('<div class=\"thread_management\" > <div class=\"thread_top_bar\"> <b style="margin-left: 5%; margin-top: 40%"> Thread</b><button  class=\"close_button\"><i class="fa fa-times" aria-hidden="true"></i></button></div> <div class=\"thread body\"> </div> </div>');




       $.ajax({
           type: "POST",
           url: "../php/threads.php",
           data: {type_like: button_name, message_id: message_id, user_id: user_id},
           async:false,
           dataType: 'text',
           success: function (data) {

               var obj = JSON.parse(data);
          var  image_variable = obj["picture"];
               //console.log(obj1);
                //var obj = obj1[0];
               $channel_name=$(".top_channel_display").text();

               var $thread_tag_check = $(".the_thread_for_a_message");

               if($thread_tag_check[0]) {
                   $(".the_thread_for_a_message").remove();
                   $thread_tag = '<div class=\"the_thread_for_a_message\">  <div class=\"thread_start\"> <div class=\"thread_one_to_messages\"><div > <img class=\"thread_user_image\" src=\"' + image_variable+ '\">  </div> <div class=\"thread_message_username\" ><div> ' + obj["user_name"] + '</div><div>  in ' + $channel_name + '</div></div></div><div class=\"thread_time\"> &nbsp; ' + obj["time"] + '</div> <br><div class=\"thread_message\">' + (obj["message"]) + ' </div> </div> <div class=\"form_thread\" message_id=\"'+obj["message_id"]+'\" user_id =\"'+user_id+'\" > <textarea class=\"thread_input\" id=\"id_text\" type="text"> </textarea><button class=\"thread_submit\" id=\"thread_message_submit\" value=\"Send\"> Send </button> </div>  </div>';

                   $('.thread_management').append($thread_tag);
               }
               else{

                   $thread_tag = '<div class=\"the_thread_for_a_message\">  <div class=\"thread_start\"> <div class=\"thread_one_to_messages\"><div > <img class=\"thread_user_image\" src=\"' + image_variable + '\">  </div> <div class=\"thread_message_username\" ><div> ' + obj["user_name"] + '</div><div>  in ' + $channel_name + '</div></div></div><div class=\"thread_time\"> &nbsp; ' + obj["time"] + '</div> <br><div class=\"thread_message\">' + (obj["message"]) + ' </div> </div> <div class=\"form_thread\" message_id=\"'+obj["message_id"]+'\" user_id =\"'+user_id+'\" > <textarea class=\"thread_input\" id=\"id_text\" type="text"> </textarea><button class=\"thread_submit\" id=\"thread_message_submit\"  value=\"Send\"> Send </button> </div></div>';

                   $('.thread_management').append($thread_tag);



               }


               var object =  obj[0];
              // console.log(obj);//JSON.parse(data);
               //console.log(object);

               $(".thread_input").val('');


               object.forEach(function(entry){


                   console.log(entry);

                   $append_tag='<div class=\"appended_message\"><div class="combine_append"><div><img class=\"appended_image\"src=\"'+ entry["user_thread_picture"] +'\"/></div><div class=\"appended_username\" >'+ entry["user_name_thread"] +'</div><div class=\"appended_thread_time\">'+ entry["time"] +'</div> </div><br> <div class=\"appended_thread_message\">'+ entry["thread_message"] +'</div></div> <br>';

                   $(".thread_start").append($append_tag);
               });




           }
       });







        $(".close_button").click(  function()
        {
            $(".chat_area").css("width", "87%");

       $(".message_post").css("width", "87%");

       $(".only_message").css("width","120% !important");

            $(".thread_management").remove();
        }


        );
   } else {



       if(button_name=="thread_count_"+message_id){


//console.log("into check");


           var user_id = $("#test").attr("user_id");
           var message_id = $(this).val();
           var button_name=this.id;
         //  console.log(user_id);
           //console.log("in thread count");
           //console.log(message_id);







           $(".thread_management").remove();

           $(".chat_area").css("width", "67%");

           $(".message_post").css("width", "67%");

           $(".message_sub").css("width","88%");
           $(".only_message").css("width","88%");
           $(".message_display").css("width","90%");
           $(".message_reactions_with_user").css("margin-top","-2%");

           $('body').append('<div class=\"thread_management\" > <div class=\"thread_top_bar\"> <b style="margin-left: 5%; margin-top: 40%"> Thread</b><button  class=\"close_button\"><i class="fa fa-times" aria-hidden="true"></i></button></div> <div class=\"thread body\"> </div> </div>');

            console.log(user_id);


           $.ajax({
               type: "POST",
               url: "../php/threads.php",
               data: {type_like: button_name, message_id: message_id, user_id: user_id},
               async:false,
               dataType: 'text',
               success: function (data) {

                   var obj = JSON.parse(data);
                   console.log("thread_count_message_count");
                   console.log(obj);
                   //var obj = obj1[0];
                   $channel_name=$(".top_channel_display").text();

                   var $thread_tag_check = $(".the_thread_for_a_message");

                   if($thread_tag_check[0]) {
                       $(".the_thread_for_a_message").remove();
                       $thread_tag = '<div class=\"the_thread_for_a_message\">  <div class=\"thread_start\"> <div class=\"thread_one_to_messages\"><div > <img class=\"thread_user_image\" src=\"' + obj["picture"] + '\">  </div> <div class=\"thread_message_username\" ><div> ' + obj["user_name"] + '</div><div>  in ' + $channel_name + '</div></div></div><div class=\"thread_time\"> &nbsp; ' + obj["time"] + '</div> <br><div class=\"thread_message\">' + (obj["message"]) + ' </div> </div> <div class=\"form_thread\" message_id=\"'+obj["message_id"]+'\" user_id =\"'+user_id+'\" > <textarea class=\"thread_input\" id=\"id_text\" type="text"> </textarea><button class=\"thread_submit\" id=\"thread_message_submit\" value=\"Send\"> Send </button> </div>  </div>';

                       $('.thread_management').append($thread_tag);
                   }
                   else{

                       $thread_tag = '<div class=\"the_thread_for_a_message\">  <div class=\"thread_start\"> <div class=\"thread_one_to_messages\"><div > <img class=\"thread_user_image\" src=\"' + obj["picture"] + '\">  </div> <div class=\"thread_message_username\" ><div> ' + obj["user_name"] + '</div><div>  in ' + $channel_name + '</div></div></div><div class=\"thread_time\"> &nbsp; ' + obj["time"] + '</div> <br><div class=\"thread_message\">' + (obj["message"]) + ' </div> </div> <div class=\"form_thread\" message_id=\"'+obj["message_id"]+'\" user_id =\"'+user_id+'\" > <textarea class=\"thread_input\" id=\"id_text\" type="text"> </textarea><button class=\"thread_submit\" id=\"thread_message_submit\"  value=\"Send\"> Send </button> </div></div>';

                       $('.thread_management').append($thread_tag);



                   }


                   var object =  obj[0];
                   console.log(obj);//JSON.parse(data);
                   console.log(object);

                   $(".thread_input").val('');


                   object.forEach(function(entry){


                       console.log(entry);

                       $append_tag='<div class=\"appended_message\"><div class="combine_append"><div><img class=\"appended_image\"src=\"'+ entry["user_thread_picture"] +'\"/></div><div class=\"appended_username\" >'+ entry["user_name_thread"] +'</div><div class=\"appended_thread_time\">'+ entry["time"] +'</div> </div><br> <div class=\"appended_thread_message\">'+ entry["thread_message"] +'</div></div><br>';

                       $(".thread_start").append($append_tag);
                   });




               }
           });







           $(".close_button").click(  function()
               {
                   $(".chat_area").css("width", "87%");

                   $(".message_post").css("width", "87%");


                   $(".thread_management").remove();
               }


           );

       }
       else
       {
           console.log(button_name);
           console.log(message_id);
           //console.log(user_id);
           //user_id=$("#test").attr("user_id");
           console.log(user_id);
       $.ajax({
           type: "POST",
           url: "../php/likes.php",
           data: {type_like: button_name, message_id: message_id, user_id: user_id},
           async:false,
           dataType: 'json',
           success: function (data) {

               //message_id_str=String(message_id);
               message_id_str_like = String(message_id) + "_like";
               // console.log(message_id_str);
               message_id_str_dislike = String(message_id) + "_dislike";
               var $i_tag_like = $("#" + message_id_str_like);

               var $i_tag_dislike = $("#" + message_id_str_dislike)

               message_id_div = String(message_id) + "_div";

               if (data[0] > 0) {
                   if ($i_tag_like[0]) {

                       $("#" + message_id_str_like).text(data[0]);

                   }
                   else {

                       like_no = data[0];

                       var tag = '<i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"  id=\"' + String(message_id) + '_like\" >' + like_no + '</i>';
                       $("#" + message_id_div).append(tag);
                   }
               }
               else {

                   $("#" + message_id_str_like).remove();

               }


               if (data[1] > 0) {
                   if ($i_tag_dislike[0]) {

                       $("#" + message_id_str_dislike).text(data[1]);

                   }
                   else {

                       dislike_no = data[1];

                       var tag = '<i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"  id=\"' + String(message_id) + '_dislike\" >' + dislike_no + '</i>';
                       $("#" + message_id_div).append(tag);
                   }
               }
               else {

                   $("#" + message_id_str_dislike).remove();

               }


           }


       });


   }

   }




    });

});
