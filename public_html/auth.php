<?php
if(isset($_COOKIE['Session'])){

      setcookie("Session", "", time()-3600, "/");


      $servername = "";
    $username = "";
    $password = "";

    // Create MySQL connection
    $conn = mysqli_connect($servername, $username, $password, "reportesgpm");

$username = $_POST["user_name"];
    $pwd = $_POST["password"];
    $date = date("Y-m-d H:i:s");

    $sql1 = "SELECT fname, lname, role, t2.user_tid FROM users LEFT JOIN passwords t2 ON users.user_tid = t2.user_tid WHERE t2.password = '$pwd' AND users.user_name ='$username'";


   $result1 = $conn->query($sql1);
   $row1 = $result1->fetch_assoc();
   $user_tid = $row1["user_tid"] ;



   if($result1->num_rows == 1 ){
      setcookie("Session", $user_tid, time()+3600);
      //header( "refresh:5 ;url=reporte.html" );
      if($row1["role"] == 'vendedor' ){

	      setcookie("rol", "bienvenido.php", time()+3600);
              header("Location: bienvenido.php");
              die();

      }else if($row1["role"] == 'supervisor'){

	      setcookie("rol", "bienvenidosupervisor.php", time()+3600);
	      header("Location: bienvenidosupervisor.php");
              die();

      }
    }else{
      include("wrong.html");

    }

}else{
    $servername = "";
    $username = "";
    $password = "!";

    // Create MySQL connection
    $conn = mysqli_connect($servername, $username, $password, "reportesgpm");

    $username = $_POST["user_name"];
    $pwd = $_POST["password"];
    $date = date("Y-m-d H:i:s");

    $sql1 = "SELECT fname, lname, role, t2.user_tid FROM users LEFT JOIN passwords t2 ON users.user_tid = t2.user_tid WHERE t2.password = '$pwd' AND users.user_name ='$username'";

   $result1 = $conn->query($sql1);
   $row1 = $result1->fetch_assoc();
   $user_tid = $row1["user_tid"] ;



   if($result1->num_rows == 1 ){
      setcookie("Session", $user_tid, time()+3600);
      //header( "refresh:5 ;url=reporte.html" );
      if($row1["role"] == 'vendedor' ){

              setcookie("rol", "bienvenido.php", time()+3600);
              header("Location: bienvenido.php");
              die();

      }else if($row1["role"] == 'supervisor'){

              setcookie("rol", "bienvenidosupervisor.php", time()+3600);
              header("Location: bienvenidosupervisor.php");
              die();

      }
    }else{
      include("wrong.html");

    }


}


?>
