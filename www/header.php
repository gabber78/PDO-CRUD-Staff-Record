<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once('../db.php');
    $db = new DB();

    //search
    if (isset($_GET['search'])) {
        $data = $db->searchData($_GET['search']);
      }else {
        $data = $db->getData();
    }

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <title>Company employee database</title>
   </head>

   <body>
     <!-- NAVBAR -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <a class="navbar-brand" href="index.php">Company Employee Database</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
           <a class="nav-link" href="insert.php">Add<span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item active">
           <a class="nav-link" href="edit.php">Edit<span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item active">
           <a class="nav-link" href="delete.php">Delete<span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item active">
            <a class="nav-link" href="search.php">Search<span class="sr-only">(current)</span></a>
         </li>

       </ul>
   </nav>

   </body>
 </html>
