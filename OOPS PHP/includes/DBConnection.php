<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Anireddy
 * Date: 4/11/14
 * Time: 2:11 AM
 * To change this template use File | Settings | File Templates.
 */
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","tutorial");

include('config.php');
class DBConnection {

    var $connection;         //The MySQL database connection
    /* Note: call getNumMembers() to access $num_members! */

    /* Class constructor */
    function DBConnection(){
        /* Make connection to database */
        $this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die(mysql_error());
        mysql_select_db(DB_NAME, $this->connection) or die(mysql_error());
    }


    /**
     * usernameTaken - Returns true if the username has
     * been taken by another user, false otherwise.
     */
    function usernameTaken($username){
        if(!get_magic_quotes_gpc()){
            $username = addslashes($username);
        }
        $q = "SELECT username FROM ".USERS." WHERE username = '$username'";
        $result = mysql_query($q, $this->connection);
        return (mysql_numrows($result) > 0);
    }

    function check_user_credentials($username,$password)
    {
    if(!get_magic_quotes_gpc()){
        $username = addslashes($username);
    }
    $password = md5($password);
    $q = "SELECT count(*) as count FROM users where username = '$username' and password = '$password'";
    $result = $this->query($q);

    $row = mysql_fetch_array($result);

    if($row['count'] > 0)
        return 1; // true
    else
        return 0; // false;
    }

    function add_user($username,$password,$email,$name)
    {
        $password = md5($password);
        $date = date('dd/mm/yyyy');

        $q = "INSERT INTO  `users` (`username` , `password` , `email` , `last_logged_in` ,`name`)
              VALUES ('$username','$password','$email','$date','$name')";

        return $this->query($q);
    }

    function get_user_details($username)
    {
        $q = "SELECT * FROM users where username = '$username'";
        $result = $this->query($q);
        $row = mysql_fetch_array($result);
        return $row;

    }

    /**
     * query - Performs the given query on the database and
     * returns the result, which may be false, true or a
     * resource identifier.
     */
    function query($query){
        return mysql_query($query, $this->connection);
    }

}

$database = new DBConnection;