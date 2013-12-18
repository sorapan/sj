$(function(){

    var formdata = false;



    $(document).on("change"," .file",function(event){

//        event.preventDefault();

        var thisid = $(this).attr("id");

        formdata = new FormData;

        formdata.append("img",$(this)[0].files[0]);

        if(formdata){

            $.ajax({

                xhr: function()
                {
                    var xhr = new window.XMLHttpRequest();
                    //Upload progress
                    xhr.upload.addEventListener("progress", function(evt){
                        if (evt.lengthComputable) {

                            var percentComplete = evt.loaded / evt.total;
                            $(" .result#"+thisid+" ").html(percentComplete*100);

                        }
                    }, false);

                    return xhr;
                },

                url: "post/uploadImg",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success:function(data){

//                    var result = $(" #result");

                    $(" .result#"+thisid+" ").html("" +
                        "<img class='img_upload_show' src='"+data+"'></img><a href='' class='del_img'>X</a>" +
                        "");

                }

            });

        }

    });

    $(document).on("click"," .del_img",function(event){

        event.preventDefault();

        var id =$(this).parent().attr("id");

        $.ajax({

            url: "post/delImg",
            type: "POST",
            data:{

                del: $(" .result#"+id+" img").attr("src")

            },
            success:function(data){

                $(" .result#"+id+"").remove();
//                $(" div#upload_box ").find(" br").last().remove();
                $(" .result#"+id+" img").remove();

            }

        });

    });

});