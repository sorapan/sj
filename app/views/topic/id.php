

<a style="margin: 20px" id="link" href="<?php echo URL ?>">Back</a><br>

<div id="blog_topic_content">

<div id="content">

<span id="header"><?php echo $this->info['header']?></span><br><br>
<span id="detail">Author: <a href=""><?php echo $this->info['username']?><a> On: <?php echo date('d/m/Y - h:i A',(int)$this->info['date'])?></span>
<span style="float:left;font-size: 16px;width: 100%"><?php echo $this->info['note']?></span>
    <br><br>
<?php
foreach( $this->img as $arr){
?>
<div class="box_in_content">
    <?php

        echo '<span class="box_in_head">'.headername($arr['type']).' : <span class="arrow">▼</span></span><br><br>';
        echo '<img class="doc" src="'.URL.'file/'.$arr['topic_id'].'/'.$arr['type'].'/'.$arr['img_name'].'">';

    ?>
</div>
<br>
<?php
}
?>
<div class="box_in_content">
    <span class="box_in_head">รูปภาพรถ : <span class="arrow">▼</span></span><br><br>
<?php
foreach( $this->carimg as $arr){

    echo '<img class="doc" src="'.URL.'file/'.$arr['topic_id'].'/'.$arr['type'].'/'.$arr['img_name'].'">';

    ?>
<br>
<?php
}
?>
</div>
    <br>
</div>
<?php

$a = explode("/",$_SERVER['REQUEST_URI']);

?>
<a id="update" href="<?php echo URL?>post_update/id/<?php echo $a[3]?>">อัพเดทรูประหว่างซ่อม</a>

</div>
<?php

function headername($type){

    switch($type){
        case "cussy":
            return "เลขคัซซี";
            break;
        case "crame":
            return "ใบเคลม";
            break;
        case "drive":
            return "ใบขับขี่";
            break;
        case "grom":
            return "กรมธรรม์";
            break;
        case "img":
            return "รูปภาพรถ";
            break;
    }
    return false;
}

?>