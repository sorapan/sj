$(function(){

    var timestamp = null;
    var firsttimeFetch = 1;

    Cycle();

    function Cycle(){

        $.ajax({

            url:"controller/fetch.php",
            type:"POST",
            data:{

                timestamp:timestamp,
                firsttimeFetch:firsttimeFetch

            },
            dataType:"JSON",
            success: function(data){



                for(i=0 ; i<data.msg.length ; i++){

                    $.rb_replyElementObject({

                        date : data.date[i],
                        header : data.hdr[i],
                        message : data.msg[i]

                    });


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

            url:"controller/fetch.php",
            type:"POST",
            data:{

                timestamp:timestamp,
                firsttimeFetch:firsttimeFetch

            },
            dataType:"JSON",
            success: function(data){

                $.rb_replyElementObject({

                    date : data.date,
                    header : data.hdr,
                    message : data.msg

                });

                timestamp = parseInt(data.now_time);
                firsttimeFetch = data.firsttimeFetch;

            },
            complete : function(){

                CycleUpdate();

            }

        });

    }


});