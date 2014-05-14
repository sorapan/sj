$(function(){

    CheckUrlNButtonValue();

    $(document).on('click',".show_upload,.show_car_upload,.doc",function(){

        window.scrollTo(0, 0);
        $("#showpic").html('<img src="'+$(this).attr('src')+'">');
        $("#showpic").css({
            'display':'block',
        });
        $("#modal").show();
        $("#closepic").show();

    });

    $(document).on('click',"#closepic",function(){

        $("#showpic").hide();
        $("#modal").hide();
        $("#closepic").hide();

    });

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