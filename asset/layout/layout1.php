<!DOCTYPE html>
<html>
<head>
    <title>Hello</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />

    <link rel="stylesheet" href="<?php echo URL ?>asset/css/reset.css">
    <link rel="stylesheet" href="<?php echo URL ?>asset/css/fontface.css">
    <link rel="stylesheet" href="<?php echo URL ?>asset/a_layout1/css/style_layout1.css">

    <script src="<?php echo URL ?>asset/js/jquery.js"></script>
    <script src="<?php echo URL ?>asset/a_layout1/js/PageControl.js"></script>
    <script src="<?php echo URL ?>asset/js/Plgin_public.js"></script>

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
    <div id="sign"><img src="<?php echo URL ?>asset/img/logo.jpg"></div>
    สงขลาเจริญการช่าง : Insurance System
</div>

<!--<div id="blogtop_menu">-->

    <div id="top_menu">
        <?php require "asset/layout/profile_layout_engine/profile_Layout_bootstrap.php"; ?>
        <a class="button_navi" href="<?php echo URL?>">หน้าหลัก</a>
        <a class="button_navi" href="<?php echo URL?>post">โพสกระทู้</a>
        <a class="button_navi" href="<?php echo URL?>users">จัดการสมาชิก</a>
        <a class="button_navi" href="<?php echo URL?>logout">Logout</a>
    </div>

<!--</div>-->

<div id="midgard">

<!--    Include the layout_lib.inc.php for call the view to display.-->
<?php require "asset/layout/layout_engine/Layout_bootstrap.php"; ?>

</div>

</body>
</html>