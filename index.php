<?php

date_default_timezone_set('Asia/Bangkok');

require "config.php";


function __autoload($class){

    $dir = LIBS.$class.".php";

    if(file_exists($dir)){

        require $dir;

    }

}

$app = new Bootstrap();



