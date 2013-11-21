(function($){

    $.rb_Reply = function(a,q){

        var data = $.extend({

            date: "",
            header: "",
            message: ""

        },a);

        function aptemplate(){

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

        function pretemplate(){

            var content = $("#content");

            content.prepend(''+
                '<div class="reply">'+
                '<div class="head"><div class="head_msg">'+ data.date +'</div></div>'+
                '<div class="message">'+
                '<div class="message_hdr">'+ PreventHtmlTag(data.header) +'</div>'+
                '<div class="message_msg">'+ PreventHtmlTag(data.message) +'</div>'+
                '</div>'+
                '</div>');

        }

        if(q=="ap")return aptemplate();
        else if(q=="pre")return pretemplate();

        return false;

    };


    /////////////////////////////////////////// PRIVATE ///////////////////////////////////////////

    function PreventHtmlTag(prob){

        return prob.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');

    }




})(jQuery);