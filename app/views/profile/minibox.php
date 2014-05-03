<style>
    #mbx_msg{
        color:white;
        padding-left: 30px;
        background-color: rgb(100,100,100);
    }
</style>

<div id="mbx_msg">
    คุณ,
<?php
Session::init();
echo Session::get('username')
?>
<br>
สถานะ,
<?php
echo Session::get('role')
?>
</div>