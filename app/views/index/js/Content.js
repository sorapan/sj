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

                    $.rb_Reply({

                        date : data.date[i],
                        header : data.hdr[i],
                        message : data.msg[i]

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

                    date : data.date,
                    header : data.hdr,
                    message : data.msg

                },"pre");

                timestamp = parseInt(data.now_time);
                firsttimeFetch = data.firsttimeFetch;

            },
            complete : function(){

                CycleUpdate();

            }

        });

    }


});