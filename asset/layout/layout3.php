<!DOCTYPE html>
<html>
<head>

    <title>สงขลาเจริญการช่าง</title>

    <meta charset="utf-8">

    <link rel="shortcut icon" type="image/jpeg" href="<?php echo URL ?>asset/img/sj2.jpg"/>

    <link rel="stylesheet" href="<?php echo URL ?>asset/css/reset.css">
    <link rel="stylesheet" href="<?php echo URL ?>asset/css/fontface.css">
    <link rel="stylesheet" href="<?php echo URL ?>asset/a_layout1/css/style_layout1.css">

    <script src="<?php echo URL ?>asset/js/jquery.js"></script>


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

        <?php require "asset/layout/layout_engine/Layout_bootstrap.php"; ?>


</body>
</html>