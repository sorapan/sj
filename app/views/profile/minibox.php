<style>
    #mbx_msg{
        color: rgb(130,130,130);
        padding-left: 30px;
        background-color: gold;
    }
    .res{
        color: black;
    }
</style>

<div id="mbx_msg">
    คุณ,
<span class="res">
<?php
Session::init();
echo Session::get('username')
?>
</span>
สถานะ,
<span class="res">
<?php
echo Session::get('role')
?>
</span>
</div>
