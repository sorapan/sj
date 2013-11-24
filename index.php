<?php

date_default_timezone_set('Asia/Bangkok');

require "config.php";

function __autoload($class){

    require LIBS.$class.".php";

}

$app = new Bootstrap();



