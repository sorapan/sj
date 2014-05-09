<div id="nav">
    <a href="<?php echo URL?>" style="color:white;margin-left: 20px">หน้าหลัก</a>
    <span id="search_ip">
        <label for="search">ค้นหา : </label><input type="text" id="search">
        <button id="x_btn">X</button>
    </span>
    <span id="choice">
        ค้นหาจาก
        <select id="var">
            <option value="header">ป้ายทะเบียน</option>
            <option value="detail">รายละเอียด</option>
        </select>
        <input checked type="radio" name="aa" value="header" class="radio" id="header"><label for="header"> : ป้ายทะเบียน</label>
        <input type="radio" name="aa" value="detail" class="radio" id="detail"><label for="detail"> : รายละเอียด</label>
    </span>
</div>
<div id="result">
</div>
