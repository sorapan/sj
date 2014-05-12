<div style="margin: 5% 0 0 20%">

    <table id="mbl_table">
    <tr>
        <th>ชื่อผู้ใช้งาน</th>
        <th>แชท</th>
        <th>ข้อความใหม่</th>
    </tr>
<?php

    foreach($this->mbl as $list){

        if($list['username'] != Session::get('username')){

            echo '<tr>';
            echo '<td>'.$list['username'].'</td>';
            echo '<td><a class="chatlink" href="'.URL.'memberlist/chat/'.$list['id'].'">click</a></td>';
            echo '<td><span id="'.$list['id'].'">0</span></td>';
            echo '</tr>';

        }

    }

?>
    </table>

</div>