<!DOCTYPE html>
<html>
<head>
    <title>Hello</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />

    <link rel="stylesheet" href="css/style1.css">

    <script src="js/jquery/jquery.js"></script>
    <script src="js/index_page/PageController.js"></script>
    <script src="js/plugin/Public.js"></script>


</head>
<body>

<div id="header">
    <div id="sign"><img src="img/logo.jpg"></div>
    <h2>สงขลาเจริญการช่าง - Insurance System</h2>
</div>

<div id="blogtop_menu">
    <div id="top_menu">
        <a class="button_navi" href="/patel/main"><div class="button">Main</div></a>
        <a class="button_navi" href="/patel/post"><div class="button">Post</div></a>
    </div>
</div>


<?php

$page = $_GET['page'];

if(!empty($page)){

    if(file_exists("../".$page.".php")){

        @include "../".$page.".php";

    }else{

        echo "Something is Wrong";

    }


}else{

    echo "Something is Wrong";

}

?>

</body>
</html>