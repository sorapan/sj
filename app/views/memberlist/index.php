<div style="margin: 30px">

    <table id="mbl_table">
    <tr>
        <th>Username</th>
        <th>Chat</th>
    </tr>
<?php

    foreach($this->mbl as $list){

        if($list['username'] != Session::get('username')){

            echo '<tr>';
            echo '<td>'.$list['username'].'</td>';
<<<<<<< HEAD
            echo '<td><a class="chatlink" href="'.URL.'memberlist/chat/'.$list['id'].'">click</a></td>';
=======
            echo '<td><a href="'.URL.'memberlist/chat/'.$list['id'].'">click</a></td>';
>>>>>>> origin/new_layout
            echo '</tr>';

        }

    }

?>
    </table>

</div>