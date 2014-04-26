<style>
    #mbx_msg{
        color:white;
        text-indent: 30px;
    }
</style>

<div id="mbx_msg">
    Welcome,
<?php

Session::init();
echo Session::get('username')

?>
</div>