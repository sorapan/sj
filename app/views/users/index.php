<div id="bigbox">
<h1>Users Table</h1>

<table border="1">

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
        echo"<td><span><a href='".URL."users/edit/".$val['id']."'>EDIT</a> <a href=''>DEL</a></span></td>";
        echo"</tr>";

    }


?>

</table>
<br>
<a href="<?php echo URL?>users/create">Create New User</a>

</div>