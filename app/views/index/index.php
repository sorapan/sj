<script>
    $(".tp_del").click(function(){

        var a = confirm('คุณแน่ใจที่จะลบกระทู้ใช่หรือไม่');
        if(a){return true;
        else return false;

    });
</script>

<div id="sub_menu">

    <div id="search">
        <a class="button_1" href="<?php echo URL?>search" style="margin:0;" id="search_button">ค้นหา</a>
        <a class="button_1" href="<?php echo URL?>post">สร้างกระทู้</a>
    </div>

</div>

<div id="blogmenu1">
<!--    <div id="menu1"></div>-->
</div>


<div id="blog_content">
    <div id="content"></div>

    <div id="loadmore">Loadmore</div>

</div>

<div id="up">Up</div>

