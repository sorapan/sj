$(function(){

    var timestamp = null;
    var firsttimeFetch = 1;

    Cycle();
    Loadmore();

    function Cycle(){

        $.ajax({

            url:"controller/fetch.php",
            type:"POST",
            data:{

                timestamp:timestamp,
                firsttimeFetch:firsttimeFetch

            },
            dataType:"JSON",
            success: function(data){


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

                timestamp = parseInt(data.now_time);
                firsttimeFetch = data.firsttimeFetch;


            },
            complete: function(){

                CycleUpdate();

            }

        });

    }

    function CycleUpdate(){


        $.ajax({

            url:"controller/fetch.php",
            type:"POST",
            data:{

                timestamp:timestamp,
                firsttimeFetch:firsttimeFetch

            },
            dataType:"JSON",
            success: function(data){


                var content = $(" div#content");

                content.prepend('<div class="reply">'+
                    '<div class="head"><div class="head_msg">'+ data.date +'</div></div>'+
                    '<div class="message">'+
                    '<div class="message_hdr">'+ data.hdr +'<hr></div>'+
                    '<div class="message_msg">'+ data.msg +'</div>'+
                    '</div>'+
                    '</div>');

                timestamp = parseInt(data.now_time);
                firsttimeFetch = data.firsttimeFetch;

            },
            complete : function(){

                CycleUpdate();

            }

        });

    }

    function Loadmore(){

        var content = $(' #content');
        var loadmore = $(' #loadmore');


        $(window).scroll(function(){

            if($(window).scrollTop()+$(window).height() > 5+content.height()+$(" #header").height()+$(" #top_menu").height() ){


                setTimeout(function(){

                    loadmore.css({
                        'background-color' : 'red'
                    });

                    loadmore.html("<h2>fuck</h2>");

                } , 500);

            }



        });

    }


});