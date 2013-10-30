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
                '<div class="message_hdr">'+ PreventHtmlTag(data.header) +'</div>'+
                '<div class="message_msg">'+ PreventHtmlTag(data.message) +'</div>'+
                '</div>'+
                '</div>');

        }

        return template();

    };


    /////////////////////////////////////////// PRIVATE ///////////////////////////////////////////

    function PreventHtmlTag(prob){

        return prob.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');

    }




})(jQuery);