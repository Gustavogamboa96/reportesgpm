<!DOCTYPE html>
<html lang="en">
   <head>  
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>

table td[class*=col-], table th[class*=col-] {
    position: static;
    display: table-cell;
    float: none;
}
td{
height:49px; 
width:324px;
}
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

    $servername = "localhost";
    $username = "admin";
    $password = "Gustra1013!";

    // Create MySQL connection
    $conn = mysqli_connect($servername, $username, $password, "reportesgpm");
    $date = date("Y-m-d H:i:s");

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);


    while($row = $result->fetch_assoc()){

       $sql = "SELECT reporte_tid, reporte, created_date FROM reportes WHERE user_tid = ".$row["user_tid"]." ORDER BY created_date DESC" ;
       $reporte = $conn->query($sql);
       

    echo "<div class=\"container\">\n";
    echo "  <h2>".$row['fname'] ." ". $row['lname']."<br>"."</h2>\n";
    echo "  <table class=\"table\">\n";
    echo "    <thead>\n";
    echo "      <tr>\n";
    echo "        <th>Reporte</th>\n";
    echo "        <th>Archivos</th>\n";
    echo "        <th>Fecha</th>\n";
    echo "      </tr>\n";
    echo "    </thead>\n";
    echo "    <tbody>\n";
           
       while($rpt = $reporte->fetch_assoc()){

               $snippet = substr($rpt['reporte'], 0, 16);
	       
               echo "      <tr>\n";
               echo "        <td class=\"col-lg\" ><a href='reportecompleto.php?id=".$rpt["reporte_tid"]."'>".$snippet."</a></td>\n";
               echo "        <td class=\"col-lg\" >hello</td>\n";
	       echo "        <td class=\"col-lg\" >".$rpt['created_date']."</td>\n";
               echo "      </tr>\n";

       }
    echo "    </tbody>\n";
    echo "  </table>\n";
    echo "</div>";

    
    }
?>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
