<?php

date_default_timezone_set('Asia/Bangkok');

require "config/paths.php";
require "config/database.php";
require "config/constants.php";

function __autoload($class){

    require LIBS.$class.".php";

}

//require "libs/Bootstrap.php";
//require "libs/Model.php";
//require "libs/Controller.php";
//require "libs/View.php";
//
//require "libs/Database.php";
//require "libs/Session.php";
//require "libs/Hash.php";

$app = new Bootstrap();



