$(function(){

    var count_row = 1;
    var result = $(" .result ");

    $(" a#add").click(function(e){

        e.preventDefault();
        $(" div#upload_box").append('<div class="result" id="'+count_row+'" ><input type="file" class="file" name="file" id="'+count_row+'"></div>');
        count_row++;

    });

    $(document).on('click', ' a#del', function(e){

        e.preventDefault();
        if(count_row>1){

            if($(" .result:last ").children().attr("class") !== "img_upload_show"){

                $(" div#upload_box ").find(" br").last().remove();
                $(" .file ").last().remove();
                $(" .result:last ").last().remove();

                count_row--;

            }

        }

    });

    $(document).on("click"," .del_img",function(event){

        event.preventDefault();

        count_row--;


    });

});