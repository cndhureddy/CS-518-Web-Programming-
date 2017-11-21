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
    $(document).on('click','.older_messages',function(){
        var retrieve_channel_id=this.id;
        var total_count=$(".fa-reply").length;

       //var divs_check= $(".message_display ")[0].id;
       var count_div= $(this).attr( 'message_id' );

        //console.log(divs_check[0]);

        //count_div= parseInt(divs_check.substring(0,divs_check.indexOf('_')));
        console.log(count_div);
        console.log(total_count);
        if($(this).attr("user_id")){
            var user_id=$(this).attr("user_id");
            $.ajax({

                type: "POST",
                url: "../php/controller.php",
                data: {retrieve_channel_id: retrieve_channel_id, count_div: count_div, total_count: total_count,user_id:user_id},
                dataType: 'text',
                async: false,
                success: function (data) {
                    // $(".chat_area").html("");
                    $(".older_messages").remove();
                    $(".chat_area").prepend(data);

                }
            });




        }else {
            $.ajax({

                type: "POST",
                url: "../php/controller.php",
                data: {retrieve_channel_id: retrieve_channel_id, count_div: count_div, total_count: total_count},
                dataType: 'text',
                async: false,
                success: function (data) {
                    // $(".chat_area").html("");
                    $(".older_messages").remove();
                    $(".chat_area").prepend(data);

                }
            });
        }







    });



});