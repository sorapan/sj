<div id="bigbox">
    <h1>Edit User Infomation</h1>
<form method="POST" action="<?php echo URL?>users/editsave/<?php echo $this->target['id'];?>">

    <label for="username">Username</label><input type="text" name="username" id="username" value="<?php echo $this->target['username']; ?>"><br>
    <label for="password">Password</label><input type="password" name="password" id="password"><br>
    <label for="class">Class</label><select id="class" name="class" >
        <option value="user"  <?php if($this->target['class'] == 'user') echo "selected"; ?>>User</option>
        <option value="admin"  <?php if($this->target['class'] == 'admin') echo "selected"; ?>>Admin</option>
        <option value="owner"  <?php if($this->target['class'] == 'owner') echo "selected"; ?>>Owner</option>
    </select><br><br>
    <input type="submit" value="OK">

</form>
</div>