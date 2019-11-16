<?php

include('header.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../db.php';
$db = new DB();

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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Company Staff Database</title>
  </head>
  <body>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Position</th>
          <th scope="col">eMail</th>
          <th scope="col">Start Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $data = $db->getData();
          foreach($data as $row) {
          ?>
          <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['position'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['startDate'];?></td>
          </tr>


          <?php
          }
         ?>


      </tbody>
    </table>
  </body>
</html>
