
<div>
    <br>
    <h1><span style="font-size:xx-large;margin-bottom: 30px">เข้าสู่ระบบ</span></h1><br><br>
<form method="POST" action="login/CheckLogin">
    <label for="username">ชื่อผู้ใช้งาน :</label><input type="text" name="user" id="username"><br><br>
    <label for="password">รหัสผ่าน :</label><input type="password" name="pass" id="password"><br><br>
    <button id="">เข้าสู่ระบบ</button>
</form>
    <span style="float:left;color:red;text-align: center;width: 100%">
    <?php

    echo Session::get('logmes');
    Session::set('logmes',"");

    ?>
    </span>
</div>