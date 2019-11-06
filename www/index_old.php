<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../db.php');
$db = new DB();

//search data
if (isset($_GET['search'])) {
  $data = $db->searchData($_GET['search']);
}else {
  $data = $db->getData();
}

//delete data

if (isset($_POST['deleteData'])) {
  //echo $_POST['id'];
  $id = $_POST['id'];
  $db->deleteData($id);
}


?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Company staff record</title>
   </head>
   <body>
     <h1>Add new staff member</h1>
      <form action="insert.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="position" placeholder="Position">
        <input type="text" name="email" placeholder="email">
        <input type="date" name="startDate" placeholder="Start Date">
        <input type="submit" name="insertData" value="Add new member">
      </form>

     <h1>Edit staff member</h1>
     <form class="" action="edit.php" method="post">
       <input type="text" name="id" placeholder="Id">
       <input type="text" name="name" placeholder="Name">
       <!--<input type="text" name="position" placeholder="Position">
       <input type="text" name="email" placeholder="email">
       <input type="date" name="startDate" placeholder="Start Date"> -->
       <input type="submit" name="editData" value="Submit Changes">
     </form>

     <h1>Delete staff</h1>
      <form method="post">
        <input type="text" name="id" placeholder="Id">
        <input type="submit" name="deleteData" value="Delete record">

      </form>

     <h1>Search staff</h1>
      <form method="get">
        <input type="text" placeholder="Search" name="search"
        value="<?php if (isset($_GET['search'])) {
                echo $_GET['search'];
              }?>">
        <input type="submit" value="Search">
      </form>

     <h1>List of current staff</h1>
     <?php
        foreach ($data as $userdata) {
        echo $userdata['id'] . " " . $userdata['name'] . " - " . $userdata ['position'] . " - " . $userdata['email'] . " - " . $userdata['startDate'] . "<br>";
       }
     ?>

   </body>
 </html>
