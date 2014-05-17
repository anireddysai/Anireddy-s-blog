<div class="login-form">
<form action="includes/Actions.php" method="post">
    <div class='error'><?php echo $errors->show_error("error"); ?></div>
    <div class="form">
    <label for="username">Username :</label>
    <input type="text" class="input-text" id="username"  value="<?php echo $errors->show_value('username') ?>" name="username" placeholder="Enter Username" >
    <br />
    <label for="password">Password :</label><input type="password" value='<?php echo $errors->show_value('password') ?>' class="input-text" id="password" name="password" placeholder="Enter Password"><br />
    <input type="submit" class="input-btn" name="user_submit_post" value="Login">
    </div>
</form>
<a href="register.php">New User</a>
</div>