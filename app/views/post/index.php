<div id="head">สร้างกระทู้</div>

<div id="form">

    <span style="font-size: 18px">อัพเดตครั้งแรก</span><br>
    <label for="post_header">หมายเลขทะเบียน : </label><input type="text" id="post_header"><br><br>

    <div class="upload_section">
    <span class="label_upload1">กรมธรรม์ : </span><br>
    <div class="drop_div" onclick="$(' #file_gromtun').click();"></div>
    <input id="file_gromtun" class="ip_upload1" type="file"><br>
    </div><br>

    <div class="upload_section">
    <span class="label_upload1">ใบเคลม : </span><br>
    <div class="drop_div" onclick="$(' #file_crame').click();"></div>
    <input id="file_crame" class="ip_upload1" type="file"><br>
    </div><br>

    <div class="upload_section">
    <span class="label_upload1">สำเนาใบขับขี่ : </span><br>
    <div class="drop_div" onclick="$(' #file_drive').click();"></div>
    <input id="file_drive" class="ip_upload1" type="file"><br>
    </div><br>

    <div class="upload_section">
    <span class="label_upload1">เลขคัสซี : </span><br>
    <div class="drop_div" onclick="$(' #file_cussy').click();"></div>
    <input id="file_cussy" class="ip_upload1" type="file"><br>
    </div><br>

    <div id="upload_box">
    <span style="font-size: 18px">อัพโหลดรูประหว่างซ่อม</span>

    <div class="result" id="0"><input type="file" class="file" name="file" id="0"></div>

    </div>

    <a href="" id="add">Add</a> <a href="" id="del">Del</a>

    <br><br>
    <button id="submit">โพสกระทู้</button>

</div>