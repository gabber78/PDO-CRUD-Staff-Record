<?php

//debug
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('header.php');
require_once('../db.php');
$db = new DB();

//collect errors in an error array
$errors = array(
    'email' => null,
    'name' => null,
    'position' => null
);


//if(!preg_match("/^[a-zA-Z-][a-zA-Z -]*$/",$name)) { die ("invalid characters");} <-- ez mukodik
if (!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['position'])) {
    $errors['general'] = 'All property is required <br />';
}
if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])) {
    $errors['name'] = "Name must be letters and spaces <br />";
}
if (empty($_POST['position']) && !preg_match("/^[a-zA-Z'-]+$/", $_POST['position'])) {
    $errors['position'] = "invalid position name";
}
if (empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
    $errors['email'] = "invalid  email";
}
//ITT ELMENTJUK Az adatokat, ha nincs hiba
if (is_null(array_values($errors))) {
    //add to database
    $db = new DB();
    $db->insertData($_POST['name'], $_POST['position'], $_POST['email'], $_POST['startdate']);
    header('Location: index.php');
}


//testing more advanced validation
/*
if (isset($_POST['submit'])) { //if submit does not work use insertData
//check name
    if (empty($_POST['name'])) {
        $errors['name'] = "A name required";
    } else {
        $name = $_POST['name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            $errors['name'] = "Name must be letters and spaces <br />";
        }
    }
//check position
    if (empty($_POST['position'])) {
        $errors['position'] = "A position required";
    } else {
        $position = $_POST['position'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $position)) {
            $errors['position'] = "Position must be letters and spaces <br />";
        }
    }
//check mail
    if (empty($_POST['$email'])) {
        $errors['email'] = "An email is required <br />";
    } else {
        $email = ($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email must be a valid email address!";
        }
    }
}
*/

?>
<style>
    .container {
        text-align: center;
        padding-bottom: 20px;
    }
    .form {
        text-align: center;
        margin-top: 10px;
    }
    .header {
        background-image: linear-gradient(rgba(106, 104, 104, 0.44), rgba(0, 0, 0, 0.7)), url(img/happy-employees.jpg);
        background-size: cover;
        background-position: center;
        height: 90.5vh;
        background-attachment: fixed;
    }
    h3, p {
        color: white;
    }
</style>
<div class="header">
    <div class="container">
        <h3>Add new employee</h3><br>
        <form action="addUser.php" method="post" position="center">
            <?php if (isset($errors['general'])): ?>
                <div> <?php echo $errors['general']; ?></div>
            <?php endif; ?>
            <input class="form" type="text" name="name" placeholder="Name"><br>
            <?php if (!is_null($errors['name'])): ?>
                <div> <?php echo $errors['name']; ?></div>
            <?php endif; ?>
            <input class="form" type="text" name="position" placeholder="Position" required><br>
            <?php if (!is_null($errors['position'])): ?>
                <div> <?php echo $errors['position']; ?></div>
            <?php endif; ?>
            <input class="form" type="text" name="email" placeholder="email" required><br>
            <?php if (!is_null($errors['email'])): ?>
                <div> <?php echo $errors['email']; ?></div>
            <?php endif; ?>
            <p class="form">Start date</p>
            <input class="form" type="date" name="startDate" placeholder="Start Date"><br>
            <input class="form" type="submit" name="insertData" value="Submit"><br>
        </form>
    </div>
</div>
