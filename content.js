$(function(){

    Cycle();

    function Cycle(){

        var timestamp = null;

        $.ajax({

            url:"controller/fetch.php",
            type:"POST",
            data:{

                timestamp:timestamp

            },
            dataType:"JSON",
            success: function(data){


                var content = $(" div#content");

                for(i=0 ; i<data.msg.length ; i++){

                    content.append('<div class="reply">'+
                    '<div class="head"><div class="head_msg">'+ data.date[i] +'</div></div>'+
                    '<div class="message">'+
                        '<div class="message_hdr">'+ data.hdr[i] +'<hr></div>'+
                        '<div class="message_msg">'+ data.msg[i] +'</div>'+
                        '</div>'+
                    '</div>');

                }

                timestamp = parseInt(data.crrt_time);

                //Cycle();

            }

        });

    }

    function getData(){

    }

});