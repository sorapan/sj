$(function(){

    //FollowThePage(" #top_menu, #menu1");
    FollowThePage(" #menu1");


    function FollowThePage(targ){

        var target = $(targ);

        var offset = target.offset();

        $(window).scroll(function () {
            var scrollTop = $(window).scrollTop(); // check the visible top of the browser

            if(offset.top<scrollTop){

                target.css({
                    'position' : 'fixed',
                    'top' : '0'
                });

            }
            else{

                target.css({
                    'position' : 'relative'
                });

            }

        });
    }

});
