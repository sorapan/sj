<div id="head">แก้ไขกระทู้ : <?php echo $this->topicid?></div>
<div id="debug"></div>
<div id="form">

    <label for="post_header">หมายเลขทะเบียน : </label>
    <input type="text" id="post_header" value="<?php echo $this->info['header']?>"><br>
    <label for="post_note">หมายเหตุ : </label><br>
    <textarea id="post_note"><?php echo $this->info['header']?></textarea><br><br><br>

    <div class="upload_section" id="grom">
        <span class="label_upload1">กรมธรรม์ : </span><br>
        <div class="in_drop_div"></div>
        <input id="file_gromtun" class="ip_upload1" type="file">
    </div><br>

    <div class="upload_section" id="crame">
        <span class="label_upload1">ใบเคลม : </span><br>
        <div class="in_drop_div"></div>
        <input id="file_crame" class="ip_upload1" type="file">
    </div><br>

    <div class="upload_section" id="drive">
        <span class="label_upload1">สำเนาใบขับขี่ : </span><br>
        <div class="in_drop_div"></div>
        <input id="file_drive" class="ip_upload1" type="file">
    </div><br>

    <div class="upload_section" id="cussy" >
        <span class="label_upload1">เลขคัสซี : </span><br>
        <div class="in_drop_div"></div>
        <input id="file_cussy" class="ip_upload1" type="file">
    </div><br>

    <div id="upload_box">
        <span style="font-size: 18px">รูปรถครั้งที่ 1</span>
        <div class="result" id="0">
            <div id="add_upload_div"></div>
            <a href="" class="car_img_upload_btn" id="add">Add</a> <a href="" class="car_img_upload_btn" id="del">Del</a>
        </div>
    </div>

    <br><br>

<?php

    if($this->info['status'] == "2" or $this->info['status'] == "3"){
        echo 'อัพเดทครั้งที่ 2<br>';
        echo '<label for="post_note2">หมายเหตุ : </label><br>';
        echo '<textarea id="post_note2">'.$this->info['note2'].'</textarea><br><br><br>';
        echo '<div id="upload_box2">';
        echo '<span style="font-size: 18px">รูปรถครั้งที่ 2</span>';
        echo '<div class="result2" id="0">';
        echo '<div id="add_upload_div2"></div>';
        echo '<a href="" class="car_img_upload_btn2" id="add2">Add</a> <a href="" class="car_img_upload_btn2" id="del2">Del</a>';
        echo '</div>';
        echo '</div>';
        echo '<br><br>';

    }

    if($this->info['status'] == "3"){

        echo 'อัพเดทครั้งที่ 3<br>';
        echo '<label for="post_note3">หมายเหตุ : </label><br>';
        echo '<textarea id="post_note3" >'.$this->info['note3'].'</textarea><br><br><br>';
        echo '<div id="upload_box3">';
        echo '<span style="font-size: 18px">รูปรถครั้งที่ 3</span>';
        echo '<div class="result3" id="0">';
        echo '<div id="add_upload_div3">';
        echo '</div>';
        echo '<a href="" class="car_img_upload_btn3" id="add3">Add</a> <a href="" class="car_img_upload_btn3" id="del3">Del</a>';
        echo '</div>';
        echo '</div>';
        echo '<br><br>';

    }
?>

    <a href="" id="submit">โพสกระทู้</a>

</div>