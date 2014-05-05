<div id="content">

    <span id="update_header" style="font-size: 22px"></span><br><br
    <label for="post_note">หมายเหตุ : </label><br>
    <textarea id="post_note"></textarea><br><br>

    <?php

    if($this->status == "2"){
        echo '<div class="upload_section" id="fin">';
        echo '<span class="label_upload1">ใบรับรถ : </span><br>';
        echo '<div class="in_drop_div"></div>';
        echo '<input id="file_drive" class="ip_upload1" type="file">';
        echo '</div><br>';
    }

    ?>

    <div id="upload_box">
        <span style="font-size: 18px">อัพโหลดรูปรถ</span>
        <br>
        <div class="result" id="0">
            <div id="add_upload_div">
                <div class="wrapall" id="w0">
                    <div class="wait_car_img">+</div>
                    <input type="file" class="car_file" name="file">
                </div><br>
            </div>
            <a href="" class="car_img_upload_btn" id="add">Add</a> <a href="" class="car_img_upload_btn" id="del">Del</a>
        </div>

    </div><br>
    <a href="" id="submit">อัพเดท</a>

</div>