<?php
        /*$email = $_POST['email'];

        // Remove all illegal characters from email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Validate e-mail
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("$email is a valid email address");
        } else {
            echo("$email is not a valid email address");
        }*/

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Email validator</title>
      <form action="../www/validate.php" method="post">
        email address<input type="text" name="email" placeholder="email">
        <input type="submit" name="submit">

      </form>
  </head>
  <body>

  </body>
</html>
