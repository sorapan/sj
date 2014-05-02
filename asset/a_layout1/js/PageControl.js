$(function(){

    CheckUrlNButtonValue();

    function CheckUrlNButtonValue(){

        var str=location.href.toLowerCase();
        var button = $(" a.button_navi ");

        button.each(function() {

            if (str == this.href.toLowerCase()) { //if (str.indexOf(this.href.toLowerCase()) > -1) {

                $(this).css({

                    'color' : 'white',
                    'background-color' : 'rgb(150,150,150)'
//                    'border-bottom': '4px solid gold'

                });

            }

        });

    }

});