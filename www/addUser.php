<?php

  include('header.php');

  require_once('../db.php');
  $db = new DB();

?>

<style>

    .container{
      text-align: center;
	  padding-bottom: 20px;
     }

    .form {
      text-align: center;
      margin-top: 10px;
      }

    .header  {
      background-image: linear-gradient(rgba(106, 104, 104, 0.44), rgba(0, 0, 0, 0.7)), url(img/happy-employees.jpg); 
      background-size:cover;               
      background-position: center;            
      height: 90.5vh;                          
      background-attachment: fixed; 			
    }
	
	h3,p {
		color: white;
	}
</style>

<div class="header">
	<div class="container">

	   <h3>Add new employee</h3><br>
		 <form action="insert.php" method="post" position="center">
			<input class="form" type="text" name="name" placeholder="Name"><br>
			<input class="form" type="text" name="position" placeholder="Position"><br>
			<input class="form" type="text" name="email" placeholder="email"><br>
			<p class="form">Start date</p>
			<input class="form" type="date" name="startDate" placeholder="Start Date"><br>
			<input class="form" type="submit" name="insertData" value="Submit"><br>
		  </form>
	</div>
</div>
