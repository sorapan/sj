<?php

date_default_timezone_set('Asia/Bangkok');
include "../access_data/content_lib.php";

$LastTime = isset($_POST['timestamp']) ? $_POST['timestamp'] : 0;
$firsttimeFetch = isset($_POST['firsttimeFetch']) ? $_POST['firsttimeFetch'] : 0;

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

if($firsttimeFetch == 1)fetchIt();
else fetchLastest();



function fetchIt(){

    echo callContent()->fetchReply();

}

function fetchLastest(){

    echo callContent()->fetchReplyLastest();

}

function NewTimeStamp(){

    return callContent()->Timestamp();

}

function callContent(){

    $instant = new Content();
    return $instant;

}


