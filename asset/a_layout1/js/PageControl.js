$(function(){

    CheckUrlNButtonValue();

    function CheckUrlNButtonValue(){

        var str=location.href.toLowerCase();
        var button = $(" a.button_navi ");

        button.each(function() {

            if (str == this.href.toLowerCase()) { //if (str.indexOf(this.href.toLowerCase()) > -1) {

                $(this).css({

                    'color' : 'rgb(85,85,85)',
                    'background-color' : 'rgb(200,200,200)'
//                    'border-bottom': '4px solid gold'

                });

            }

        });

    }

});