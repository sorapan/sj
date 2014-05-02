<style>
    #mbx_msg{
        color:rgb(150,150,150);
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