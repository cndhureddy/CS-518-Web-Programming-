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



});