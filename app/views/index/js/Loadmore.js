$(function(){

    var offset = 5;
    var loadmore = $(' #loadmore');
    var content = $(' #content');

    Loadmore();
    function Loadmore(){

        $(window).data('ready', true).on('scroll',function() {
            if($(window).data('ready') == false) return;
            if($(window).scrollTop()+$(window).height()+loadmore.height()+60 > $(document).height()){

                // 140 is header + topmenu height
                //setTimeout(function(){loadmore.html("<h2>Please wait...</h2>");} , 500);

                $(window).data('ready', false);
                setTimeout(function(){
                    loadmore.html("Please wait...");
                }, 500);
                setTimeout(function(){
                    responseData();
                    offset += 5;
                    $(window).data('ready', true);
                    loadmore.html("Loadmore");
                } , 1000);
            }
        });
    }

    function responseData(){

        $.ajax({
            url : 'index/Loadmore',
            type : 'POST',
            data : {
                offset : offset
            },
            dataType : 'Json',
            success : function(data){
                if(typeof data.msg != 'undefined'){
                    for(var i=0 ; i<data.msg.length ; i++){
                        $.rb_Reply({
                            status: data.status[i],
                            header: data.hdr[i],
                            user: data.user[i],
                            date: data.date[i],
                            last_update: data.last_update[i],
                            topicid: data.topicID[i],
                            verify: data.verify[i]
                        },"ap");
                    }
                }else{
                    offset -= 5;
                    loadmore.html("END");
                }
            }
        });
    }
});