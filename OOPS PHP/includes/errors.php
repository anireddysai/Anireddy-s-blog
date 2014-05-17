<?php
/**
 * Class Form
 * This class display's errors on form, which produce on form submit.
 */
class Errors
{

   var $values = array();
   var $errors = array();

   /* Class constructor */
   function Errors(){
      /**
       * Get form value and error arrays, used when there
       * is an error with a user-submitted form.
       */
      global $session;
      if($session->form_has_errors()){

         $this->values = $session->form_values;
         $this->errors = $session->form_error;
         $this->num_errors = count($this->errors);

      }
      else
      {
         $this->num_errors = 0;
      }
   }

   function show_value($field){
       global $session;
      if(array_key_exists($field,$session->form_values))
      {
         return htmlspecialchars(stripslashes($session->form_values[$field]));
      }
      else
      {
         return "";
      }
   }

   function show_error($err){
    global $session;
      if(array_key_exists($err,$session->form_error))
      {
         return $session->form_error[$err];
      }
      else
      {
          return '';
      }
   }

};
$session = new Session;
$errors = new Errors;

?>
