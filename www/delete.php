<?php

//include('header.php');
include('search.php');

require_once('../db.php');
$db = new DB();

if (isset($_POST['deleteData'])) {
      //echo $_POST['id'];
      $id = $_POST['id'];
      $db->deleteData($id);
    }

 ?>
 
<h3>Delete employee from database</h3>
 <form method="post" action="delete.php">
   <input type="text" name="id" placeholder="Id">
   <input type="submit" name="deleteData" value="Delete">

 </form>
