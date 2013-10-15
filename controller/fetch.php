<?php

include "../access_data/content_lib.php";

date_default_timezone_set('Asia/Bangkok');
$time_current = isset($_POST['timestamp']) ? $_POST['timestamp'] : 0;



fetchIt();

function fetchIt(){

    echo callClass("fetchReply");

}




function callClass($method_name){

    $instant = new Content();
    return $instant->$method_name();

}


