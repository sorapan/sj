$(function(){

    var header = $(" #post_header");
    var note = $(" #post_note");
    var detail = $(" #post_detail");

    $(" #submit").click(function(e){
        e.preventDefault();
        if(header.val() !== "" && note.val() !== ""){
            $(this).attr("disabled", "disabled");
            $.ajax({
                url: 'post/PushData',
                type: 'POST',
                data: {
                    header: header.val(),
                    note: note.val(),
                    detail: detail.val()
                },
                charset: 'UTF-8',
                success:(function(d){
                    window.location = "../";
                })
            });
        }else{
            alert("textfield is empty");
        }
    });
});
