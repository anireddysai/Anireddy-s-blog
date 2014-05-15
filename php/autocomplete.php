<?php

$val = $_POST['suggest'];
$connect = mysql_connect('localhost','root','');
mysql_select_db('autocomplete',$connect); //die(mysql_error());

$q = "select `firstname`,`lastname` from users where firstname LIKE '%$val%' OR lastname LIKE '%$val%'";
$result = mysql_query($q);
$users = array();
while($row = mysql_fetch_object($result))
{
    $users[] =  $row;
}

print_r(json_encode($users));
?>