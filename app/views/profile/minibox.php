<style>
    #mbx_msg{
        color:black;
        padding-left: 30px;
        background-color: rgb(130,130,150);
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