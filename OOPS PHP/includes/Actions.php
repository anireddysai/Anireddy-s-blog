<?php
/**
 * User: Anireddy
 * Date: 4/22/14
 * Time: 12:19 PM
 * To change this template use File | Settings | File Templates.
 */
include('session.php');

class Actions
{
    var  $action_url;
    function Actions()
    {
        global $session,$database,$errors;

        //$this->action_url = isset($_POST['user_submit_post']) ? $_POST['user_submit_post'] : 'logout';
       // echo $this->action_url;

        if(isset($_POST['user_submit_post']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $is_logged_in = $session->login($username,$password);
            if ($is_logged_in == true)
            {
                header("Location:".$session->last_referred);
            }
            else{
                header("Location:".$session->last_referred);
            }

        }

        else if(isset($_POST['new_user_post']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];

            $username = $_POST['username'];
            $password = $_POST['password'];
            $is_valid = $session->add_user($username,$password,$email,$name);

            header("Location:".$session->last_referred);


        }
        else
        {
            echo "Logout";
            $session->logout();
            header("Location:".$session->last_referred);
        }
    }
}

$action = new Actions;