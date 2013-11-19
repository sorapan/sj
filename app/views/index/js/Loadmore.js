$(function(){

    var offset = 5;
    var loadmore = $(' #loadmore');
    var content = $(' #content');


    Loadmore();


    function Loadmore(){

        $(window).data('ajaxready', true).scroll(function() {

            if($(window).data('ajaxready') == false) return;

            if($(window).scrollTop()+$(window).height()+loadmore.height()+60 > $(document).height()){

                // 140 is header + topmenu height
                //setTimeout(function(){loadmore.html("<h2>Please wait...</h2>");} , 500);

                $(window).data('ajaxready', false);

                setTimeout(function(){

                loadmore.html("Please wait...");

                }, 500);

                setTimeout(function(){

                    responseData();
                    offset += 5;
                    $(window).data('ajaxready', true);
                    loadmore.html("Loadmore");

                } , 1000);

            }

        });

    }

    function responseData(){

        $.ajax({

            url : 'index/Loadmore',
            type : 'POST',
            data : {

                offset : offset

            },
            dataType : 'Json',
            success : function(data){

                if(typeof data.msg != 'undefined'){

                    for(i=0 ; i<data.msg.length ; i++){

                        $.rb_replyElementObject({

                            date : data.date[i],
                            header : data.hdr[i],
                            message : data.msg[i]

                        });

                    }

                }else{

                    offset -= 5;
                    loadmore.html("END");

                }

            }

        });

    }

});