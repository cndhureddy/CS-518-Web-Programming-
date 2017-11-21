$( document ).ready(function() {

    $("body").on('click',function () {
        $(".Suggestions").empty();
    });

    $(".Search").keyup(function() {

dat=$(".enter_username").val();
//console.log(dat);

        $.ajax({

            type: "POST",
            url: "../php/user_query_onselect.php",
            data: {"key": dat},
            dataType: 'json',
            async: false,
            success: function (data) {
                // $(".chat_area").html("");
                //$(".older_messages").remove();
                //$(".chat_area").prepend(data);
                //console.log(data);
                $(".Suggestions").empty();
                str="<ul class=\"Suggestions_ul\">"

                for (i in data) {
                    //$(".Suggestions").append("<li id="+data[i]["user_id"]+">"+ data[i]["display_name"] +"</li>");
                str=str+"<a id="+data[i]["user_id"]+" href=\" ..\\php\\get_profiles.php?user_id="+data[i]["user_id"]+"\">"+ data[i]["display_name"] +"</a><br>";
                }
                str=str+"</ul>";
                $(".Suggestions").append(str);
            }
        });

    });


/*    $(document).on('click', "ul.Suggestions_ul li", function() {



    });
*/


});