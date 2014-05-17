<?php
include('includes/session.php');
global $session,$form,$database;
?>
<html>
<head>
   <title>::OOps PHP example::</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css" >
</head>
<body>
<div id="page-wrapper">
<?php
if(!$session->is_logged_in)
{
    include('login.php');
}
else
{
include('main.php');
}
?>
</div>
</body>
</html>



