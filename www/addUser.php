<?php
  //debug
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('header.php');

    require_once('../db.php');
    $db = new DB();

  //collect errors in an error array
    $name= $position= $email= '';
    $errors = array();

    //add form data to database

    if(isset($_POST['insertData'])){

      if(empty($_POST['name'])){
        $errors['name'] =  'A name is required <br />';
      } else{
          $name=$_POST['name'];
          if(!preg_match("/^[a-zA-Z-][a-zA-Z -]*$/",$name)) {
            $errors['name'] = "Name must be letters and spaces <br />";
          }
      }


      if (empty($_POST['position'])) {
        $errors['position'] =  'A position is required <br />';
      }else {
        $position = $_POST['position'];
        if(!preg_match("/^[a-zA-Z'-]+$/",$position)) {
          $errors['position'] = 'Invalid position name';
        }
      }


      if (empty($_POST['email'])) {
          $errors['email'] =  'Email is required <br />';
      }else {
        $email = $_POST['email'];
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) === false) {$errors['email'] = 'Invalid email';}
      }

        $startDate = $_POST['startDate'];

    //debug
    //echo '<pre>'; print_r($errors); echo '</pre>';
    //die();
}



?>


<style>

    .container{
      text-align: center;
	  padding-bottom: 20px;
    }

    .form {
      text-align: center;
      margin-top: 10px;
    }

    .header  {
      background-image: linear-gradient(rgba(106, 104, 104, 0.44), rgba(0, 0, 0, 0.7)), url(img/happy-employees.jpg);
      background-size:cover;
      background-position: center;
      height: 90.5vh;
      background-attachment: fixed;
    }

	h3,p {
		color: white;
    }

  .error-text {
    color: red;
    }

</style>

<div class="header">
	<div class="container">

	   <h3>Add new employee</h3><br>
		 <form action="addUser.php" method="post">
			<input class="form" type="text" name="name" placeholder="Name" value="<?php echo htmlspecialchars($name); ?>"><br>
      <div class="error-text"> <?php if (!empty($errors['name'])) { echo $errors['name']; } ?></div>

      <input class="form" type="text" name="position" placeholder="Position" value="<?php echo htmlspecialchars($position); ?>"><br>
      <div class="error-text"> <?php if (!empty($errors['position'])) { echo $errors['position']; } ?></div>

      <input class="form" type="text" name="email" placeholder="email" value="<?php echo htmlspecialchars($email); ?>"><br>
      <div class="error-text"> <?php if (!empty($errors['email'])) { echo $errors['email']; } ?></div>

      <p class="form">Start date</p>
			<input class="form" type="date" name="startDate" placeholder="Start Date"><br>
			<input class="form" type="submit" name="insertData" value="Submit"><br>
		  </form>
	</div>
</div>


<?php

    //add to database but before check if insertData set and any errors
    if (isset($_POST['insertData']) && !count($errors)) {

    $db = new DB();
    $db->insertData($name, $position, $email, $startDate);

    header('Location: index.php');
    }

  ?>
