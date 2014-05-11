<div id="nav">
    <a href="<?php echo URL?>" style="color:white;margin-left: 20px">หน้าหลัก</a>
    <span id="search_ip">
        <label for="search">ค้นหา : </label><input type="text" id="search">
        <button id="x_btn">X</button>
    </span>
    <span id="choice">
        ค้นหาจาก :
        <select id="var">
            <option value="header">ป้ายทะเบียน</option>
            <option value="detail">รายละเอียด</option>
            <option value="all">แสดงทั้งหมด</option>
        </select>
         แสดงกระทู้ :
        <select id="veri">
            <option value="all">แสดงทั้งหมด</option>
            <option value="no">แสดงกระทู้ที่ยังไม่เสร็จ</option>
            <option value="yes">แสดงกระทู้ที่เสร็จแล้ว</option>
        </select>
    </span>
</div>
<div id="result">
</div>
