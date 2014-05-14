<!DOCTYPE html>
<html>
<head>
    <title>สงขลาเจริญการช่าง</title>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />

    <link rel="shortcut icon" type="image/jpeg" href="<?php echo URL ?>asset/img/sj2.jpg"/>

    <link rel="stylesheet" href="<?php echo URL ?>asset/css/reset.css">
    <link rel="stylesheet" href="<?php echo URL ?>asset/css/fontface.css">
    <link rel="stylesheet" href="<?php echo URL ?>asset/a_layout1/css/style_layout1.css">

    <script src="<?php echo URL ?>asset/js/jquery.js"></script>
    <script src="<?php echo URL ?>asset/a_layout1/js/PageControl.js"></script>

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
<div id="showpic"></div>
<div id="modal"></div>
<span id="closepic">ปิดหน้าต่าง</span>

<!--<div id="header">-->
<!--    <div id="sign"><img src="--><?php //echo URL ?><!--asset/img/logo.jpg"></div>-->
<!--</div>-->

<!--<div id="blogtop_menu">-->

    <div id="top_menu">
        <div style="width: 100%;height: 60px;background-color: gold">
            <img style="float:left;height:100%" src="<?php echo URL ?>asset/img/logo.jpg">
            <span style="float:left;font-size:16px;height:60px;line-height: 60px;text-align:center;color:white">สงขลาเจริญการช่าง</span>
        </div>
        <?php require "asset/layout/profile_layout_engine/profile_Layout_bootstrap.php"; ?>
        <a class="button_navi" href="<?php echo URL?>">หน้าหลัก</a>
        <a class="button_navi" href="<?php echo URL?>post">สร้างกระทู้</a>
        <a class="button_navi" href="<?php echo URL?>memberlist">ส่งข้อความ</a>
        <a class="button_navi" href="<?php echo URL?>search">ค้นหา</a>
        <?php

            if(Session::get('role') == 'admin' || Session::get('role') == "owner"){
                echo '<a style="color:gold" class="button_navi" href="'.URL.'users">แอดมิน</a>';
            }

        ?>
        <a class="button_navi" href="<?php echo URL?>logout">ออกจากระบบ</a>
    </div>

<!--</div>-->

<div id="midgard">

<!--    Include the layout_lib.inc.php for call the view to display.-->
<?php require "asset/layout/layout_engine/Layout_bootstrap.php"; ?>

</div>

</body>
</html>