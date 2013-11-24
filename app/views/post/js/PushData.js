$(function(){

    var header = $(" #post_header");
    var content = $(" #post_content");


    $(" button#submit").click(function(){

        if(header.val() !== "" && content.val() !== ""){

            $(this).attr("disabled", "disabled");

            $.ajax({

                url: 'post/PushData',
                type: 'POST',
                data: {

                    header: header.val(),
                    content: content.val()

                },
                charset: 'UTF-8',
                complete:(function(){

                    window.location = "../";

                })
            });

        }else{

            alert("textfield is empty");

        }

    });

});
