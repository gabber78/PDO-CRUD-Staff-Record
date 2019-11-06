<?php

include('header.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../db.php');
$db = new DB();

 ?>

<style>

.container{
  text-align: center;
  margin: 20px 20px auto;
  padding-bottom: 20px;
  padding-top: 20px;
}

.form {
  text-align: center;
  margin-top: 10px;
  }

</style>

<div class="container">

   <h3>Submit </h3><br>
     <form action="insert.php" method="post" position="center">
        <input class="form" type="text" name="name" placeholder="Name"><br>
        <input class="form" type="text" name="position" placeholder="Position"><br>
        <input class="form" type="text" name="email" placeholder="email"><br>
        <p class="form">Start date</p>
        <input class="form" type="date" name="startDate" placeholder="Start Date"><br>
        <input class="form" type="submit" name="insertData" value="Add new employee"><br>
      </form>
</div>
