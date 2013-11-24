<!DOCTYPE html>
<html>
<head>
    <title>Hello</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />

    <link rel="stylesheet" href="<?php echo URL ?>public/css/style1.css">

    <script src="<?php echo URL ?>public/js/jquery.js"></script>
    <script src="<?php echo URL ?>public/js/PageControl.js"></script>
    <script src="<?php echo URL ?>public/js/Plgin_public.js"></script>

    <?php

    if(isset($this->css)){
        foreach($this->css as $css){
            echo  '<link rel="stylesheet" href="'.URL.'app/views/'.$css.'">';
        }
    }

    if(isset($this->js)){
        foreach($this->js as $js){
            echo  '<script src="'.URL.'app/views/'.$js.'"></script>';
        }
    }

    ?>


</head>
<body>

<div id="header">
    <div id="sign"><img src="<?php echo URL ?>public/img/logo.jpg"></div>
    สงขลาเจริญการช่าง : Insurance System
</div>

<div id="blogtop_menu">
    <div id="top_menu">
        <a class="button_navi" href="<?php echo URL?>"><div class="button">Main</div></a>
        <a class="button_navi" href="<?php echo URL?>post"><div class="button">Post</div></a>
        <a class="button_navi" href="<?php echo URL?>logout"><div class="button">Logout</div></a>
    </div>
</div>

<div id="midgard">

<!--    Include the layout_lib.inc.php for call the view to display.-->
<?php require "public/layout/layout_engine/Layout_bootstrap.php"; ?>

</div>

</body>
</html>