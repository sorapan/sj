

<div id="bigbox-left">
    <h1>Create New User</h1><br>
    <form method="POST" action="<?php echo URL;?>users/insert">

        <label for="username">Username</label><input type="text" id="username" name="username"><br>
        <label for="password">Password</label><input type="password" id="password" name="password"><br>
        <label for="class">Class</label><select id="class" name="class">
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="owner">Owner</option>
        </select><br><br>
        <input type="submit" value="OK">

    </form>
</div>


<div id="bigbox-right">
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
</div>