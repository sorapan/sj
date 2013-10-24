$(function(){

    //FollowThePage(" #top_menu, #menu1");
    FollowThePage(" #menu1");
    CheckUrlNButtonValue();


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

    function CheckUrlNButtonValue(){

        var str=location.href.toLowerCase();
        var button = $(" .button_navi ");

        button.each(function() {

            if (str.indexOf(this.href.toLowerCase()) > -1) {

                $(this).find(" div").css({

                    'color' : 'rgb(85,85,85)',
                    'border-bottom': '4px solid gold'

                });

            }

        });

    }

});

