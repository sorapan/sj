$(function(){

    var carimg = [];
    var timestamp = null;
    var firsttimeFetch = 1;

    Cycle();
    function Cycle(){

        $.ajax({
            url:"index/fetchMessage",
            type:"POST",
            data:{
                timestamp:timestamp,
                firsttimeFetch:firsttimeFetch
            },
            dataType:"JSON",
            success: function(data){

                for(i=0 ; i<data.msg.length ; i++){
//                    $.rb_Reply({
//                        date : data.last_update[i],
//                        header : data.hdr[i],
//                        message : data.msg[i],
//                        url : "http://patel/topic/id/"+data.topicID[i]
//                    },"ap");

                    $.rb_Reply({
                        status: data.status[i],
                        header: data.hdr[i],
                        user: data.user[i],
                        date: data.date[i],
                        last_update: data.last_update[i],
                        topicid: data.topicID[i],
                        verify: data.verify[i],
                        detail: data.detail[i]
                    },"ap");

                }
                timestamp = parseInt(data.now_time);
                firsttimeFetch = data.firsttimeFetch;

            },
            complete: function(){
                CycleUpdate();
            }
        });
    }

    function CycleUpdate(){

        $.ajax({
            url:"index/fetchMessage",
            type:"POST",
            data:{
                timestamp:timestamp,
                firsttimeFetch:firsttimeFetch
            },
            dataType:"JSON",
            success: function(data){

                $.rb_Reply({
                    status: data.status,
                    header: data.hdr,
                    user: data.user,
                    date: data.date,
                    detail: data.detail,
                    last_update: data.last_update,
                    topicid: data.topicID,
                    verify: data.verify
                },"pre");

                timestamp = parseInt(data.now_time);
                firsttimeFetch = data.firsttimeFetch;
            },
            complete : function(){
                CycleUpdate();
            }
        });
    }

    function ifimg(){

        return $(this).remove();

    }

    function ifOne($num){

        if($num != "1") return $num;
        else return "";

    }

});