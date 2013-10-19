<?php

include "../access_data/content_lib.php";

$offsetit = isset($_POST['offset']) ? $_POST['offset'] : 0;

fetchLoadmore($offsetit);


function fetchLoadmore($offset){

    $god =  callMethod()->fetchLoadmore($offset);


    if(!empty($god)){

        for($i=0; $i< count($god) ; $i++){

            echo '<div class="reply">';
            echo '<div class="head"><div class="head_msg">'. $god['date'][$i] .'</div></div>';
            echo '<div class="message">';
            echo '<div class="message_hdr">'. $god['hdr'][$i] .'<hr></div>';
            echo '<div class="message_msg">'. $god['msg'][$i] .'</div>';
            echo '</div>';
            echo '</div>';

        }


    }else{

        echo "";

    }




}

function callMethod(){

    $instance = new Content;
    return $instance;

}