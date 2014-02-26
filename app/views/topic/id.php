

<a style="margin: 20px" id="link" href="<?php echo URL ?>">Back</a><br>

<div id="blog_topic_content">

<div id="content">

<span id="header"><?php echo $this->info['header']?></span><br><br>
<span id="detail">Author: <a href=""><?php echo $this->info['username']?><a> On: <?php echo date('d/m/Y - h:i A',(int)$this->info['date'])?></span>
<br><span style="float:left;font-size: 16px"><?php echo $this->info['content']?></span>
    <br><br>
<?php
foreach( $this->img as $arr){
?>

<img class="doc" src="<?php echo URL?>file/<?php echo $arr['topic_id']?>/<?php echo $arr['img_name'] ?>">
<br>

<?php
}
?>

</div>

<a id="update" href="">อัพเดทรูประหว่างซ่อม</a>


</div>
