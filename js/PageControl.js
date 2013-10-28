$(function(){

    CheckUrlNButtonValue();

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