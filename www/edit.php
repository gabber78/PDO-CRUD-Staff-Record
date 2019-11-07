<?php
include('search.php');

require_once '../db.php';

    if(isset($_POST['editData'])){
      $id = $_POST['id'];
      $name = $_POST['name'];
      $position = $_POST['position'];
      $email = $_POST['email'];
      $startDate = $_POST['startDate'];

      $db = new DB();
      $db->editData($id, $name, $position, $email, $startDate);
      header('Location: index.php');
    }


 ?>

 <h3>Edit employee</h3>
   <form class="" action="edit.php" method="post">
       <!-- do not show the edit fields until no search results, $_GET data coming from search.php because search.php included -->
       <?php if (isset($_GET['search'])) {
         foreach($data as $row) ?>

             <input type="text" name="id" value="<?php echo $row['id'];?>" placeholder="Id">
             <input type="text" name="name" placeholder="Name" value="<?php echo $row['name'];?>">
             <input type="text" name="position" placeholder="Position" value="<?php echo $row['position'];?>">
             <input type="text" name="email" placeholder="email" value="<?php echo $row['email'];?>">
             <input type="date" name="startDate" placeholder="Start Date" value="<?php echo $row['startDate'];?>">

             <input type="submit" name="editData" value="Submit Changes">


       <?php }
          ?>
   </form>
