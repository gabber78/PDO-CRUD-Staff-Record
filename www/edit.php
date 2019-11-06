<?php
include('header.php');

require_once '../db.php';

    if(isset($_POST['editData'])){
      $id = $_POST['id'];
      $name = $_POST['name'];

      $db = new DB();
      $db->editData($id, $name);
      header('Location: index.php');
    }


 ?>

 <h3>Edit employee</h3>
 <form class="" action="edit.php" method="post">
   <input type="text" name="id" placeholder="Id">
   <input type="text" name="name" placeholder="Name">
   <!--<input type="text" name="position" placeholder="Position">
   <input type="text" name="email" placeholder="email">
   <input type="date" name="startDate" placeholder="Start Date"> -->
   <input type="submit" name="editData" value="Submit Changes">
 </form>
