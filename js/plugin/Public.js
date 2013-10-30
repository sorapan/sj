(function($){

    $.replyElement = function(a){

        var data = $.extend({

            date: "",
            header: "",
            message: ""

        },a);

        function template(){

            var content = $("#content");

            content.append(''+
                '<div class="reply">'+
                '<div class="head"><div class="head_msg">'+ data.date +'</div></div>'+
                '<div class="message">'+
                '<div class="message_hdr">'+ data.header +'</div>'+
                '<div class="message_msg">'+ data.message +'</div>'+
                '</div>'+
                '</div>');

        }

        return template();

    };




})(jQuery);