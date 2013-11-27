$(function(){

    var count_row = 1;

    $(" button#add").click(function(){

        $(" div#upload_box").append("<label for='post_upload' id='label_upload'>Upload </label><input type='file' class='"+count_row+"' id='post_upload'><br>");
        count_row++;

    });

    $(document).on('click', ' button#del', function(){

        if(count_row>1){

            $(" div#upload_box ").find(" br").last().remove();
            $(" #label_upload ").last().remove();
            $(" #post_upload ").last().remove();
            count_row--;

        }

    });

});