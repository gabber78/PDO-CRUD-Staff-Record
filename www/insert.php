<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../db.php';

    if(isset($_POST['insertData'])){
      $name = $_POST['name'];
      $position = $_POST['position'];
      $email = $_POST['email'];
      $startDate = $_POST['startDate'];

      $db = new DB();
      $db->insertData($name, $position, $email, $startDate);
      header('Location: index.php');
    }


?>
