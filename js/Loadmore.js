$(function(){

    Loadmore();

    function Loadmore(){

        var content = $(' #content');
        var loadmore = $(' #loadmore');


        $(window).scroll(function(){

            if($(window).scrollTop()+$(window).height() > 5+content.height()+$(" #header").height()+$(" #top_menu").height() ){


                setTimeout(function(){

                    loadmore.html("<h2>Please wait...</h2>");

                } , 500);


                setTimeout(function(){

                    $.ajax({
                        url : "controller/",
                        type : "",
                        data : {

                        }

                    });

                } , 1000);


            }else{

                loadmore.html("<h2>Loadmore</h2>");

            }



        });

    }

});