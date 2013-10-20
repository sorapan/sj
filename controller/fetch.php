<?php

include "../access_data/content_lib.php";

$LastTime = isset($_POST['timestamp']) ? $_POST['timestamp'] : 0;

$NewLastTime = NewTimeStamp();

ini_set('max_execution_time', 31);
$timeout = 260; //300

while($timeout > 0){


    if($NewLastTime <= $LastTime){

        $timeout--;
        $NewLastTime = NewTimeStamp();

        clearstatcache();
        flush();
        usleep(100000);


    }else{

        break;

    }

}

if($timeout > 0){

    if($_POST['firsttimeFetch'] == 1)fetchIt();
    else fetchLastest();

}

function fetchIt(){

    echo Content::fetchReply();

}

function fetchLastest(){

    echo Content::fetchReplyLastest();

}

function NewTimeStamp(){

    return Content::Timestamp();

}


