<?php
include('includes/session.php');
global $session,$database;
if(!$session->is_logged_in)
{
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
<div id="page-wrapper">
    <div class="register-form">
<form action="includes/Actions.php"  method="post">
    <span class="error"><?php echo $errors->show_error('error'); ?></span>
    <label for="name">Name : </label>
    <input type="text" id="name" value="<?php echo $errors->show_value('name') ?>" class="input-text" name="name" placeholder="Enter Name" >
    <span class="error"><?php echo $errors->show_error('name'); ?></span><br />

    <label for="email">Email :</label>
    <input type="text" name="email" value="<?php echo $errors->show_value('email') ?>" class="input-text" placeholder="Enter Email">
    <span class="error"><?php echo $errors->show_error('email'); ?></span><br />

    <label for="username"> Username :</label>
    <input type="text" id="username" value="<?php echo $errors->show_value('username') ?>" class="input-text" name="username" placeholder="Enter Username" >
    <span class="error"><?php echo $errors->show_error('username'); ?></span><br />

    <label for="password">Password :</label>
    <input type="password" class="input-text" value="<?php echo $errors->show_value('password') ?>" name="password" placeholder="Enter Password">
    <span class="error"><?php echo $errors->show_error('password'); ?></span><br />

    <input type="submit" class="input-btn" name="new_user_post" value="Register">
</form>
        <a href="index.php">Login</a>
        </div>

</div>
</body>
</html>

<?php
}
else
{
// Used in automaticlly Login when register
header('index.html');
}
?>