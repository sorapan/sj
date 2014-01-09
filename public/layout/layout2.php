<!DOCTYPE html>
<html>
<head>

<title></title>

    <link rel="stylesheet" href="<?php echo URL ?>public/css/style_layout2.css">


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

<div id="content">
<?php require "public/layout/layout_engine/Layout_bootstrap.php"; ?>
</div>

</body>
</html>