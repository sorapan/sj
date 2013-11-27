<div id="bigbox">
    <h1>Edit User Infomation</h1>
<form>

    <label for="username">Username</label><input type="text" id="username" value="<?php echo $this->target['username']; ?>"><br>
    <label for="password">Password</label><input type="password" id="password"><br>
    <label for="class">Class</label><input type="text" id="class" value="<?php echo $this->target['class']; ?>"><br><br>
    <input type="submit" value="OK">

</form>
</div>