

<div id="bigbox">

    <div id="menu">
        <a id="" class="btn_menu1" href="<?php echo URL?>users">จัดการสมาชิก</a><br><br>
        <a id="createlink" class="btn_menu1" href="<?php echo URL?>users/createuser">สร้างบัญชีสมาชิก</a><br><br>
        <a id="backuplink" class="btn_menu1" href="<?php echo URL?>users/backup">ส่งออกฐานข้อมูล</a>
    </div>
    <div id="content">
        <span style="font-size: 20px">ตารางจัดการบัญชีสมาชิก</span>
        <table id="usertable">
            <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Class</th>
            <th>Tools</th>
            </tr>
            <?php
            Session::init();
                foreach($this->data as $key=>$val){
                    if(Session::get('role')=='owner'){
                        echo"<tr>";
                        echo"<td>".$val['id']."</td>";
                        echo"<td>".$val['username']."</td>";
                        echo"<td>".$val['class']."</td>";
                        echo"<td><span><a class='edit' href='".URL."users/edit/".$val['id']."'>แก้ไข</a> | ";
                        if(Session::get('user_id') != $val['id']){
                            echo"<a class='del' href='".URL."users/delete/".$val['id']."'>ลบ</a></span></td>";
                        }
                        echo"</tr>";
                    }else if(Session::get('role')!='owner'){
                        if($val['class'] != 'owner'){
                            echo"<tr>";
                            echo"<td>".$val['id']."</td>";
                            echo"<td>".$val['username']."</td>";
                            echo"<td>".$val['class']."</td>";
                            echo"<td><span><a class='edit' href='".URL."users/edit/".$val['id']."'>แก้ไข</a> | ";
                            if(Session::get('user_id') != $val['id']){
                                echo"<a class='del' href='".URL."users/delete/".$val['id']."'>ลบ</a></span></td>";
                            }
                            echo"</tr>";
                        }
                    }
                }
            ?>
        </table>
    </div>

</div>