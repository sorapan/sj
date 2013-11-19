<?php

date_default_timezone_set('Asia/Bangkok');

require "config/paths.php";
require "config/database.php";
require "config/constants.php";

function __autoload($class){

    require LIBS.$class.".php";

}

$app = new Bootstrap();



