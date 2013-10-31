<?php

include "../access_data/loadmore_lib.inc";

$offsetit = isset($_POST['offset']) ? $_POST['offset'] : 0;

fetchLoadmore($offsetit);


function fetchLoadmore($offset){

    echo  Loadmore::fetchLoadmore($offset);

}
