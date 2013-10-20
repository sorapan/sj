$(function(){

    var offset = 5;
    var busy = false;
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
                busy = true;

                loadmore.html("<h2>Please wait...</h2>");

                setTimeout(function(){

                    responseData();
                    offset += 5;
                    $(window).data('ajaxready', true);

                } , 2000);

            }else{

                busy = false;
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
            success : function(data){

                alert("fuck");

                var content = $("#content");
                content.append(data);

            }

        });

    }

});