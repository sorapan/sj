(function($){

    /**
     *
     * @param a is a data
     * @param q method is How to add reply to the board(append,prepend)
     * @returns {*}
     *
     * 
     */

    $.rb_Reply = function(a,q){

        var data = $.extend({
            date: "",
            header: "",
            message: "",
            url: ""
        },a);

        function aptemplate(){

            var content = $("#content");
            content.append(''+
                '<a href="'+ data.url +'">'+
                '<div class="reply">'+
                '<div class="head"><div class="head_msg">'+ data.date +'</div></div>'+
                '<div class="message">'+
                '<div class="message_hdr">'+ PreventHtmlTag(data.header) +'</div>'+
                '<div class="message_msg">'+ PreventHtmlTag(data.message) +'</div>'+
                '</div>'+
                '</a>'+
                '</div>');

        }

        function pretemplate(){

            var content = $("#content");
            content.prepend(''+
                '<a href="'+ data.url +'">'+
                '<div class="reply">'+
                '<div class="head"><div class="head_msg">'+ data.date +'</div></div>'+
                '<div class="message">'+
                '<div class="message_hdr">'+ PreventHtmlTag(data.header) +'</div>'+
                '<div class="message_msg">'+ PreventHtmlTag(data.message) +'</div>'+
                '</div>'+
                '</a>'+
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