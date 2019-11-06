<?php

include('header.php');

require_once('../db.php');
$db = new DB();

//search data
if (isset($_GET['search'])) {
  $data = $db->searchData($_GET['search']);
}else {
  $data = $db->getData();
}

?>

<!-- search form -->
<form method="get">
  <input type="text" placeholder="Search Name" name="search"
  value="<?php if (isset($_GET['search'])) {
          echo $_GET['search'];
        }?>">
  <input type="submit" value="Search">
</form>

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
          if (isset($_GET['search'])) {
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
        }
         ?>


      </tbody>
    </table>
