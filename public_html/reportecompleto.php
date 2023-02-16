<!DOCTYPE html>
<html lang="en">
   <head>  
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
p {padding:1em ;
  text-align: left;word-wrap: break-word;
  margin: -1em}


td a{
  display: block;
  padding:1em ;
  text-align: left;
  margin: -1em
}
</style>
   </head>
   <body>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4" class="text-center">Reportes GPM</h1>
  </div>
</div>


<?php

    $servername = "";
    $username = "";
    $password = "!";

    // Create MySQL connection
    $conn = mysqli_connect($servername, $username, $password, "reportesgpm");
    $date = date("Y-m-d H:i:s");

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    $reportes = array();


    while($row = $result->fetch_assoc()){
//    foreach ($_COOKIE['Reporte'] as $name => $value) {
//    $pieces = explode("%2C", $value);
//    $reporte_tid = $pieces[0];
    //$counter = $pieces[1];
//    echo $_COOKIE['Reporte'];
//    }
       if(isset($_GET['id'])){
        $sql1 = "SELECT reporte, reportes.created_date, t2.fname, t2.lname FROM reportes LEFT JOIN users t2 ON reportes.user_tid = t2.user_tid WHERE t2.user_tid = ".$row['user_tid']." AND reporte_tid=".$_GET['id']." ORDER BY t2.created_date DESC";
	$reporte = $conn->query($sql1);
  
	$sql2 = "SELECT path FROM archivos WHERE reporte_tid=".$_GET['id'];
	$archivo_result = $conn->query($sql2);

          if($reporte->num_rows == 1){	      
	     $this_row = $reporte->fetch_assoc();      
             echo '<div class="container">';
             echo '<h4>'.$this_row['fname'].' '.$this_row['lname'].'<small>  '.$this_row['created_date'].'</small></h4><br><br>';
             echo '<p>'.$this_row['reporte'].'</p><br><br>';
             echo '<h4>Archivos</h4><br>';
	     while($path_to_file = $archivo_result->fetch_assoc() ){
		     $nospacesname = str_replace(' ', '_', $path_to_file['path']);
		     $archivo_name = substr($nospacesname, 54);
		     $nospaces = str_replace(' ', '%20', $path_to_file['path']);
		     $archivo_path = substr($nospaces, 40);
		     echo '<a  href='.$archivo_path.' download='.$archivo_name.'  >'.$archivo_name.'</a><br>';
	     }
             echo '</div>';
          }
       }
    }
    
?>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
