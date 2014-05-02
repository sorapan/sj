

<div id="bigbox">

    <div id="menu">

        <a class="btn_menu1" id="backuplink" href="<?php echo URL?>users/backup">ส่งออกฐานข้อมูล</a>

    </div>

    <div id="content">
        <span style="font-size: 20px">Users Table</span>
        <table id="usertable">
            <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Class</th>
            <th>Tools</th>
            </tr>
            <?php
                foreach($this->data as $key=>$val){
                    echo"<tr>";
                    echo"<td>".$val['id']."</td>";
                    echo"<td>".$val['username']."</td>";
                    echo"<td>".$val['class']."</td>";
                    echo"<td><span><a href='".URL."users/edit/".$val['id']."'>EDIT</a> <a href='".URL."users/delete/".$val['id']."'>DEL</a></span></td>";
                    echo"</tr>";
                }
            ?>
        </table>
    </div>

</div>