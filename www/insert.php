<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//include('validate.php');

require_once '../db.php';

    if(isset($_POST['insertData'])){
      $name = $_POST['name'];
        if(!preg_match("/^[a-zA-Z-][a-zA-Z -]*$/",$name)) { die ("invalid characters");}
      $position = $_POST['position'];
        if(!preg_match("/^[a-zA-Z'-]+$/",$position)) { die ("invalid position name");}
      $email = $_POST['email'];
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) === false) { die ("invalid  email");}
      $startDate = $_POST['startDate'];

      $db = new DB();
      $db->insertData($name, $position, $email, $startDate);
      header('Location: index.php');
    }


?>
