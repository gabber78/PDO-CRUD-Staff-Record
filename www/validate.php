<?php
include('insert.php');

/*function validate_mail($email){
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("$email is a valid email address");
    } else {
        echo("$email is not a valid email address");
    }
}*/

//$email = $_POST['email'];
      // Remove all illegal characters from email
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);

      // Validate e-mail
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo("$email is a valid email address");
      } else {
          echo("$email is not a valid email address");
      }


?>