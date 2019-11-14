<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//add variables to avoid errors first run the page (input fields)
$name = $email = $position = '';

//collect errors in an error array
$errors = array('email'=>'','name'=>'','position'=>'');

require_once '../db.php';

    if(isset($_POST['insertData'])){
      $name = $_POST['name'];
        if(!preg_match("/^[a-zA-Z-][a-zA-Z -]*$/",$name)) { die ("invalid characters");}
      $position = $_POST['position'];
        if(!preg_match("/^[a-zA-Z'-]+$/",$position)) { die ("invalid position name");}
      $email = $_POST['email'];
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) === false) { die ("invalid  email");}
      $startDate = $_POST['startDate'];


    //new better validation soliton
    if (isset($_POST['submit'])) { //if submit does not work use insertData

      //check name
      if (empty($_POST['name'])) {
        $errors['name'] = "A name required";
      }else {
        $name = $_POST['name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
					$errors['name'] = "Name must be letters and spaces <br />";
				}
      }

      //check position
      if (empty($_POST['position'])) {
        $errors['position'] = "A position required";
      }else {
        $name = $_POST['position'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $position)) {
					$errors['position'] = "Position must be letters and spaces <br />";
				}
      }

      //check mail
      if (empty($_POST['$email'])) {
          $errors['email'] = "An email is required <br />";
        }else {
          $email = ($_POST['email']);
    				if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    					$errors['email'] = "Email must be a valid email address!";
    				}
          }



    }


      $db = new DB();
      $db->insertData($name, $position, $email, $startDate);
      header('Location: index.php');
    }


?>
