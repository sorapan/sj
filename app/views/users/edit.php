<div id="edituser">
    <br>
<span style="font-size: 20px">แก้ไขข้อมูลของ : <?php echo $this->target['username']; ?></span><br><br>
<form method="POST" action="<?php echo URL?>users/editsave/<?php echo $this->target['id'];?>">

    <label for="username">Username</label><input style="background-color:rgb(210,210,210)" readonly="on" type="text" name="username" id="username" value="<?php echo $this->target['username']; ?>"><br>
    <label for="password">Password</label><input type="text" name="password" id="password" value="<?php echo $this->target['password']; ?>"><br>
    <label for="class">Class</label><select id="class" name="class" >
        <option value="user"  <?php if($this->target['class'] == 'user') echo "selected"; ?>>User</option>
        <option value="admin"  <?php if($this->target['class'] == 'admin') echo "selected"; ?>>Admin</option>
        <option value="owner"  <?php if($this->target['class'] == 'owner') echo "selected"; ?>>Owner</option>
    </select><br><br>
    <input type="submit" value="OK">

</form>
</div>