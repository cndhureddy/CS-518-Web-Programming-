$( document ).ready(function() {

    /*

    $(".older_messages").on("click",function (event) {
    //$document.on('click','.older_messages',function(){
        var retrieve_channel_id=this.id;
        var count_div=$(".fa-reply").length;
        $.ajax({

            type: "POST",
            url: "../php/controller.php",
            data: {retrieve_channel_id: retrieve_channel_id,count_div:count_div},
            dataType: 'text',
            async: false,
            success: function (data) {
                $(".chat_area").html("");
                $(".chat_area").html(data);

            }
        });








    });
    */
    $(document).on('click','.older_messages_direct',function(){
        var retrieve_channel_id=this.id;
        var total_count=$(".only_message").length;
        var total_count_add=$(".message_sub").length;
        var total_count=total_count+total_count_add;

        //var divs_check= $(".message_display ")[0].id;
        var count_div= $(this).attr( 'message_id' );

        //console.log(divs_check[0]);

        //count_div= parseInt(divs_check.substring(0,divs_check.indexOf('_')));
        //console.log(count_div);
        //console.log(total_count);
        if($(this).attr("from_user_id")){
            var from_user_id=$(this).attr("from_user_id");
            var to_user_id=$(this).attr("to_user_id");
            console.log(to_user_id);
            $.ajax({

                type: "POST",
                url: "../php/controller.php",
                data: {from_user_id: from_user_id, to_user_id:to_user_id,count_div: count_div,total_count:total_count},
                dataType: 'text',
                async: false,
                success: function (data) {
                    // $(".chat_area").html("");
                    $(".older_messages").remove();
                    $(".chat_area").prepend(data);

                }
            });




        }
        /*else {
            $.ajax({

                type: "POST",
                url: "../php/controller.php",
                data: {from_user_id: from_user_id, to_user_id:to_user_id,count_div: count_div},
                dataType: 'text',
                async: false,
                success: function (data) {
                    // $(".chat_area").html("");
                    $(".older_messages").remove();
                    $(".chat_area").prepend(data);

                }
            });
        }
*/






    });



});