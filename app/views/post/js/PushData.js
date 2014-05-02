$(function(){

    var header = $(" #post_header");
    var note = $(" #post_note");

    $(" #submit").click(function(e){
        e.preventDefault();
        if(header.val() !== "" && note.val() !== ""){
            $(this).attr("disabled", "disabled");
            $.ajax({
                url: 'post/PushData',
                type: 'POST',
                data: {
                    header: header.val(),
                    note: note.val()
                },
                charset: 'UTF-8',
                success:(function(){
                    window.location = "../";
                })
            });
        }else{
            alert("textfield is empty");
        }
    });
});
