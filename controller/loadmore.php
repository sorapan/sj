<?php

include "../access_data/loadmore_lib.php";

$offsetit = isset($_POST['offset']) ? $_POST['offset'] : 0;

fetchLoadmore($offsetit);


function fetchLoadmore($offset){

    echo  Loadmore::fetchLoadmore($offset);

}
