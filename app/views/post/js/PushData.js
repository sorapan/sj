$(function(){

    $(" input#submit").click(function(){

        $(this).attr("disabled", "disabled");

        $.ajax({

            url: 'post/PushData',
            type: 'POST',
            data: {

                header: $(" #post_header").val(),
                content: $(" #post_content").val()

            },
            charset: 'UTF-8',
            complete:(function(){

                window.location = "../";

            })
        });

    });

});
