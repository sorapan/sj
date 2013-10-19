$(function(){


    var offset = 5;
    var busy = false;
    var loadmore = $(' #loadmore');

    Loadmore();

    function Loadmore(){

        var content = $(' #content');



        $(window).scroll(function(){

            if($(window).scrollTop()+$(window).height()+loadmore.height() > $(document).height()){

                // 140 is header + topmenu height

                //setTimeout(function(){loadmore.html("<h2>Please wait...</h2>");} , 500);

                busy = true;

                loadmore.html("<h2>Please wait...</h2>");

                setTimeout(function(){

                    responseData();
                    offset += 5;

                } , 500);


            }



        });

    }

    function responseData(){


        $.post("controller/loadmore.php", {

            offset        : offset

        },function(data) {

            var content = $("#content");
            content.append(data);

        });

    }

});