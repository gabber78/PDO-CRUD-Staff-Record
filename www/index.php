<?php

 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Company staff record</title>
   </head>
   <body>
     <h1>Add new staff member</h1>
      <form class="" action="insert.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="position" placeholder="Position">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="startDate" placeholder="Start Date">
        <input type="submit" name="insertData" value="Add new member">
      </form>

     <h1>Edit staff member</h1>
     <form class="" action="edit.php" method="post">
       <input type="text" name="name" placeholder="Name">
       <input type="text" name="position" placeholder="Position">
       <input type="text" name="email" placeholder="email">
       <input type="text" name="startDate" placeholder="Start Date">
       <input type="submit" name="editData" value="Submit Changes">
     </form>

     <h1>Delete staff</h1>
      <form method="post">
        <input type="text" name="id" placeholder="Id">
        <input type="submit" name="deleteData" value="Delete record">

      </form>
     <h1>Search staff</h1>
     <h1>List of current staff</h1>
   </body>
 </html>