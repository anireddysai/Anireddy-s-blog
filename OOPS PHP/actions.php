<?php
/**
 * User: Anireddy
 * Date: 4/22/14
 * Time: 12:19 PM
 * To change this template use File | Settings | File Templates.
 */
include('includes/session.php');

class Actions
{
    function Actions()
    {
        global $session,$database;
        if(isset($_POST['user_submit_post']))
        {

            echo "Login";
        }
        else
        {
            echo "logout";
        }

//        if($action_url == 'user_login_submit')
//        {
//            $username = $_POST['username'];
//            $password = $_POST['password'];
//            $is_valid = $session->login($username,$password);
//
//            if($is_valid)
//            {
//                header("Location:".$session->url_to_refer);
//            }
//        }
//        else if($action_url == 'new_user_post')
//        {
//            $name = $_POST['name'];
//            $username = $_POST['username'];
//            $password = $_POST['password'];
//            $email = $_POST['email'];
//            $image = $_POST['image'] || "default.jpg";
//            $is_valid = $database->add_user($username,$password,$email,$name,$image);
//
//            if($is_valid)
//            {
//                header("Location:".$session->url_to_refer);
//            }
//        }
//        else if($action_url == 'logout')
//        {
//            echo $session->url_to_refer;
//            $session->logout();
//            header("Location:".$session->url_to_refer);
//        }
    }
};

$action = new Actions;