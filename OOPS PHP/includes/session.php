<?php
/**
 * User: Anireddy
 * Date: 4/11/14
 * Time: 1:58 AM
 * To change this template use File | Settings | File Templates.
 */
include("includes.php");
//include('config.php');

class Session
{
    var $is_logged_in;
    var $username;
    var $url_to_refer;
    var $last_referred;
    var $user_details = array();
    var $form_error = array();
    var $form_values = array();

    function Session()
    {
        global $database;
        session_start();
        $this->is_logged_in = $this->check_is_logged_in();

        if($this->is_logged_in)
        {
            $this->user_details = $database->get_user_details($this->username);
        }

        $this->check_is_errors_occur();
        $this->check_is_values_submitted();

        /* Set last visited  page */
        if(isset($_SESSION['url']))
        {
            $this->last_referred = $_SESSION['url'];
        }
        else
        {
            $this->last_referred = "/";
        }
        /* Set current url */
        $this->url_to_refer = $_SESSION['url'] = $_SERVER['PHP_SELF'];

    }

    function check_is_logged_in()
    {
       if(isset($_SESSION['username']))
       {
           $this->username = $_SESSION['username'];
           return 1;
       }
       else
       {
       return 0;
       }
    }

    function login($user, $password)
    {
        global $database,$errors;
       /* Checks that username is in database and password is correct */
        $user = stripslashes($user);
        $this->set_form_values($_POST);
        $result = $database->check_user_credentials($user,$password);

        /* Username and password correct, register session variables */
        if($result > 0)
        {
            $this->username  = $_SESSION['username'] = $user;
            $this->is_logged_in = true;
            return true;
        }
        else
        {
            $field = "error";
            $this->set_form_error($field, "No user found");
            return false;
        }


        /* Login completed successfully */
//        return true;
    }

    function add_user($name,$email,$username,$password)
    {
        global $database;
        $error_count = 0;
        if(trim($name) == '')
        {
            $error_count++;
            $this->set_form_error('name','Name Required');
        }
        if(trim($email) == '')
        {
            $error_count++;
            $this->set_form_error('email','Email Required');
        }
        if(trim($username) == '')
        {
            $error_count++;
            $this->set_form_error('username','Username Required');
        }
        if(trim($password) == '')
        {
            $error_count++;
            $this->set_form_error('password','Password Required');
        }

        if($error_count > 0)
        {
            return false;
        }
        $this->set_form_values($_POST);
        $return = $database->add_user($name,$email,$username,$password);
        if(!$return)
        {
            $this->set_form_error('error','Error in adding details');
            return false;
        }
        $this->set_form_values([]);
        return true;
    }
    function logout()
    {
        unset($_SESSION['username']);
        $this->is_logged_in = false;
    }

    function set_form_error($field, $value)
    {
        $this->form_error[$field] = $_SESSION['form_errors'][$field] =  $value;
    }
    function check_is_errors_occur()
    {
        if(isset($_SESSION['form_errors']))
        {
            $this->form_error = $_SESSION['form_errors'];
            unset($_SESSION['form_errors']);
        }
    }

    function check_is_values_submitted()
    {
        if(isset($_SESSION['form_values']))
        {
            $this->form_values = $_SESSION['form_values'];
            unset($_SESSION['form_values']);
        }
    }
    function set_form_values($values)
    {
        $this->form_values = $_SESSION['form_values'] = $values ;
    }
    function form_has_errors()
    {
        if(isset($_SESSION['form_errors']))
        {
            $this->form_error = $_SESSION['form_errors'];
            $this->form_values = $_SESSION['form_values'];
            return true;
        }
        return false;
    }
};

?>