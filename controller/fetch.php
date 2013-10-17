<?php

date_default_timezone_set('Asia/Bangkok');
include "../access_data/content_lib.php";

$LastTime = isset($_POST['timestamp']) ? $_POST['timestamp'] : 0;
$NewLastTime = NewTimeStamp();


ini_set('max_execution_time', 31);
$timeout = 280; //300

while($timeout > 0){


    if($LastTime >= $NewLastTime){

        $timeout--;
        $NewLastTime = NewTimeStamp();

        clearstatcache();
        flush();
        usleep(100000);


    }else{

        break;

    }


}
fetchIt();


function fetchIt(){

    echo callClass("fetchReply");

}

function NewTimeStamp(){

    return callClass("Timestamp");

}




function callClass($method_name){

    $instant = new Content();
    return $instant->$method_name();

}


