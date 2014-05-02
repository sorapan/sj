

<a style="margin: 20px" id="link" href="<?php echo URL ?>">Back</a><br>

<div id="blog_topic_content">

<div id="content">

<span id="header"><?php echo $this->info['header']?></span><br><br>
<span id="detail">Author: <a href=""><?php echo $this->info['username']?><a> On: <?php echo date('d/m/Y - h:i A',(int)$this->info['date'])?></span>
<?php echo "หมายเหตุ : ".$this->info['note']?>
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
    <span class="box_in_head">รูปภาพรถอัพเดทครั้งที่ 1 : <span class="arrow">▼</span></span><br><br>
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

<?php

if(!empty($this->carimg2)){

    echo 'อัพเดทครั้งที่ 2 <br>';
    echo "หมายเหตุ : ".$this->info['note2']."<br><br>";
    echo '<div class="box_in_content">';
    echo '<span class="box_in_head">รูปภาพรถอัพเดทครั้งที่ 2 : <span class="arrow">▼</span></span><br><br>';
    foreach( $this->carimg2 as $arr){
        echo '<img class="doc" src="'.URL.'file/'.$arr['topic_id'].'/'.$arr['type'].'2/'.$arr['img_name'].'">';
        echo '<br>';
    }
    echo '</div>';
    echo '<br>';
}


if(!empty($this->carimg3)){

    echo 'อัพเดทครั้งที่ 3 <br>';
    echo "หมายเหตุ : ".$this->info['note3']."<br><br>";
    echo '<div class="box_in_content">';
    echo '<span class="box_in_head">รูปภาพรถอัพเดทครั้งที่ 3 : <span class="arrow">▼</span></span><br><br>';
    foreach( $this->carimg3 as $arr){
        echo '<img class="doc" src="'.URL.'file/'.$arr['topic_id'].'/'.$arr['type'].'3/'.$arr['img_name'].'">';
        echo '<br>';
    }
    echo '</div>';
    echo '<br>';
}

?>

    </div>

<?php
$a = explode("/",$_SERVER['REQUEST_URI']);

switch($this->info['status']){
    case '1':
        echo '<a id="update" href='.URL.'post_update/id/'.$a[3].'>อัพเดทรูประหว่างซ่อมครั้งที่ 2</a>';
        break;
    case '2':
        echo '<a id="update" href='.URL.'post_update/id/'.$a[3].'>อัพเดทรูประหว่างซ่อมครั้งที่ 3</a>';
        break;
    case '3':
        break;

}
?>

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