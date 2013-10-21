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

                loadmore.html("<h2>Please wait...</h2>");

                }, 500);

                setTimeout(function(){

                    responseData();
                    offset += 5;
                    $(window).data('ajaxready', true);
                    loadmore.html("<h2>Loadmore</h2>");

                } , 1000);

            }

        });

    }

    function responseData(){

        $.ajax({

            url : 'controller/loadmore.php',
            type : 'POST',
            data : {

                offset : offset

            },
            dataType : 'Json',
            success : function(data){

                if(typeof data.msg != 'undefined'){

                    for(i=0 ; i<data.msg.length ; i++){

                        $.replyElement({

                            date : data.date[i],
                            header : data.hdr[i],
                            message : data.msg[i]

                        });

                    }

                }else{

                    offset -= 5;
                    loadmore.html("<h2>END</h2>");

                }



            }

        });

    }

});