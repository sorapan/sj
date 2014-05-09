$(function(){

    var carimg = [];
    var timestamp = null;
    var firsttimeFetch = 1;

    $(document).on('click',".tp_del",function(){

        var a = confirm('คุณแน่ใจที่จะลบกระทู้ใช่หรือไม่');
        if(a) return true;
        else return false;

    });

    $(document).on('click',".tp_edit",function(){

        var a = confirm('คุณแน่ใจที่จะแก้ไขกระทู้ใช่หรือไม่');
        if(!a) return false;


    });

    Cycle();
    function Cycle(){

        ajx = $.ajax({
            url:"index/fetchMessage",
            type:"POST",
            data:{
                timestamp:timestamp,
                firsttimeFetch:firsttimeFetch,
            },
            dataType:"JSON",
            success: function(data){

                for(i=0 ; i<data.msg.length ; i++){

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

        ajx = $.ajax({
            url:"index/fetchMessage",
            type:"POST",
            data:{
                timestamp:timestamp,
                firsttimeFetch:firsttimeFetch,
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

    function nonCycle(){

            $.ajax({
            url:"index/fetchMessagenonLoop",
            type:"POST",
            data:{
                show:fig
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
            }
        });

    }

});