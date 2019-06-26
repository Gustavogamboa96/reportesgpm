<!DOCTYPE html>
<html lang="en">
   <head>  
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   </head>
   <body>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
	  <?php
    		$servername = "localhost";
    		$username = "admin";
    		$password = "Gustra1013!";

    		// Create MySQL connection
    		$conn = mysqli_connect($servername, $username, $password, "reportesgpm");


    		$sql1 = "SELECT fname, lname, role, t2.user_tid FROM users LEFT JOIN passwords t2 ON users.user_tid = t2.user_tid WHERE t2.user_tid = ".$_COOKIE['Session'];

   		$result1 = $conn->query($sql1);
   		$row1 = $result1->fetch_assoc();
	  ?>
	  <h1 class="display-4" class="text-center">Bienvenido <?php echo $row1['fname'] ." ". $row1['lname']; ?></h1>
  </div>
</div>

<div class="text-center">
      <a href=reporte.html class="btn btn-primary btn-lg btn-block">Nuevo Reporte</a>
      <a href=salir.php class="btn btn-primary btn-lg btn-block">Salir</a>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
