$(function(){

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

                    $("#content").append('<div class="reply">'+
                        '<span class="rep_status">'+data.status[i]+'</span>'+
                        '<span class="head">'+data.hdr[i]+'</span><br>'+
                        '<span class="descrip">สร้างโดย : </span>'+data.user[i]+'<br>'+
                        '<span class="descrip">อัพเดท : </span>'+data.last_update[i]+'<br>'+
                        '<span class="descrip">วันที่สร้าง : </span>'+data.date[i]+'<br><br>'+
                        '<div>'
                    '</div>'
                    '</div>');

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
                    date : data.date,
                    header : data.hdr,
                    message : data.msg,
                    url : "http://patel/topic/id/"+data.topicID
                },"pre");
                timestamp = parseInt(data.now_time);
                firsttimeFetch = data.firsttimeFetch;
            },
            complete : function(){
                CycleUpdate();
            }
        });
    }

    function fetchIMG(arr){
        for(var i in arr){



        }
    }

});