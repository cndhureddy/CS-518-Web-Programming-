
//function insert_like_dislike() {

$( document ).ready(function() {
//    console.log( "ready!" );


    $("button").click(function() {
        var fired_button = $(this).val();
        var button_name= this.id;


   var message_id = parseInt(fired_button);
    var user_id=$("#test").attr("user_id");

    console.log(fired_button);
        console.log(button_name);
        console.log(message_id);
        console.log(user_id);

   //if(button_name=="like" ){

      $.ajax({
           type: "POST",
          async: false,
           url: "../php/likes.php",
           data: {type_like:button_name , message_id: message_id, user_id: user_id},
          dataType:'json',
           success: function(data) {

               //message_id_str=String(message_id);
               message_id_str_like=String(message_id)+"_like";
              // console.log(message_id_str);
                message_id_str_dislike=String(message_id)+"_dislike";
               var $i_tag_like = $("#"+message_id_str_like);

                var $i_tag_dislike= $("#"+message_id_str_dislike)

               message_id_div = String(message_id) + "_div";

                if(data[0]>0) {
                    if ($i_tag_like[0]) {

                        $("#" + message_id_str_like).text(data[0]);

                    }
                    else {

                        like_no = data[0];

                        var tag = '<i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"  id=\"' + String(message_id) + '_like\" >' + like_no + '</i>&nbsp;';
                        $("#" + message_id_div).append(tag);
                    }
                }
                else{

                    $("#" + message_id_str_like).remove();

                }



               if(data[1]>0) {
                   if ($i_tag_dislike[0]) {

                       $("#" + message_id_str_dislike).text(data[1]);

                   }
                   else {

                       dislike_no = data[1];

                       var tag = '<i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"  id=\"' + String(message_id) + '_like\" >' + dislike_no + '</i>&nbsp;';
                       $("#" + message_id_div).append(tag);
                   }
               }
               else{

                   $("#" + message_id_str_dislike).remove();

               }




    //        if($i_tag_like.length) {








               /*
                if (data[0] > 0) {
                   // console.log("entered");
                    //console.log(message_id_str);

                    message_id_div = String(message_id);
                    message_id_div = message_id_div + "_div";

                    if($i_tag_like){

                        $("#" + message_id_str_like).text(data[0]);

                    }
                    else {

                        like_no=data[0];

                        var tag = '<i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"  id=\"'+String(message_id)+'_like\" >'+ like_no +'</i>&nbsp;';
                        $("#"+message_id_div).append(tag);

                    }
                }
                else {
                    $("#"+message_id_str_like).remove();

                }


               if (data[1] > 0) {
                   // console.log("entered");
                   //console.log(message_id_str);



                   if($i_tag_dislike){

                       $("#" + message_id_str_dislike).text(data[1]);

                   }
                   else {

                       dislike_no=data[1];

                       var tag = '<i class=\"fa fa-thumbs-o-down\" aria-hidden=\"true\"  id=\"'+String(message_id)+'_dislike\" >'+ dislike_no +'</i>';
                       $("#"+message_id_div).append(tag);

                   }
               }
               else {
                   $("#"+message_id_str_dislike).remove();

               }
                */




           }
       });






    });

});
//}