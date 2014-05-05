<!DOCTYPE html>
<html>
<head>

<title>สงขลาเจริญการช่าง</title>

    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo URL ?>asset/css/reset.css">
    <link rel="stylesheet" href="<?php echo URL ?>asset/css/fontface.css">
    <link rel="stylesheet" href="<?php echo URL ?>asset/css/style_layout2.css">


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
<div id="headerer"><img src="<?php echo URL ?>asset/img/logo.jpg"></div>


    <div id="contenter">
        <div id="in_content">
            <?php require "asset/layout/layout_engine/Layout_bootstrap.php"; ?>
        </div>
    </div>


</body>
</html>