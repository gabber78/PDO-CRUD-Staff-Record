<?php
//debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

  include('header.php');

  require_once('../db.php');
  $db = new DB();

//collect errors in an error array
$name= $position= $email= '';
$errors = array('email'=>'','name'=>'','position'=>'');


    //add form data to database

if(isset($_POST['submit'])){

    $name = $_POST['name'];
   //if(!preg_match("/^[a-zA-Z-][a-zA-Z -]*$/",$name)) { die ("invalid characters");} <-- ez mukodik
    if(empty($_POST['name'])){
        $errors['name'] = 'A title is required <br />';
    } else{
        $title=$_POST['name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            $errors['name'] = "Name must be letters and spaces <br />";
        }
    }



    $position = $_POST['position'];
    if(!preg_match("/^[a-zA-Z'-]+$/",$position)) { die ("invalid position name");}

    $email = $_POST['email'];
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) === false) { die ("invalid  email");}
    $startDate = $_POST['startDate'];
}

//testing more advanced validation
/*
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
        $position= $_POST['position'];
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
*/


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
</style>

<div class="header">
	<div class="container">

	   <h3>Add new employee</h3><br>
		 <form action="addUser.php" method="post" position="center">
			<input class="form" type="text" name="name" placeholder="Name" value="<?php echo htmlspecialchars($name); ?>"><br>
             <div> <?php echo $errors['name']; ?></div>
			<input class="form" type="text" name="position" placeholder="Position" required><br>
			<input class="form" type="text" name="email" placeholder="email" required><br>
			<p class="form">Start date</p>
			<input class="form" type="date" name="startDate" placeholder="Start Date"><br>
			<input class="form" type="submit" name="insertData" value="Submit"><br>
		  </form>
	</div>
</div>


<?php
//add to database

$db = new DB();
$db->insertData($name, $position, $email, $startDate);
header('Location: index.php');
?>

