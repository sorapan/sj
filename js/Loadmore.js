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

                loadmore.html("<h2>Please wait...</h2>");

                setTimeout(function(){

                    responseData();
                    offset += 5;
                    $(window).data('ajaxready', true);

                } , 2000);

            }else{

                loadmore.html("<h2>Loadmore</h2>");

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

                var content = $("#content");

                for(i=0 ; i<data.msg.length ; i++){

                    content.append(''+
                        '<div class="reply">'+
                        '<div class="head"><div class="head_msg">'+ data.date[i] +'</div></div>'+
                        '<div class="message">'+
                        '<div class="message_hdr">'+ data.hdr[i] +'<hr></div>'+
                        '<div class="message_msg">'+ data.msg[i] +'</div>'+
                        '</div>'+
                        '</div>');


                }

            }

        });

    }

});