<div id="bigbox">
    <h1>Create New User</h1><br>
    <form method="POST" action="<?php echo URL;?>users/insert">

        <label for="username">Username</label><input type="text" id="username" name="username"><br>
        <label for="password">Password</label><input type="password" id="password" name="password"><br>
        <label for="class">Class</label><input type="text" id="class" name="class"><br>
        <input type="submit" value="OK">

    </form>
</div>