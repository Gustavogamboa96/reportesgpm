<?php
   if(isset($_COOKIE['Session'])){
      $servername = "localhost";
      $username = "admin";
      $password = "Gustra1013!";

    // Create MySQL connection
      $conn = mysqli_connect($servername, $username, $password, "reportesgpm");



      $reporte = nl2br($_POST['reporte']);
      $user_tid = $_COOKIE['Session'];
      $url = $_COOKIE['rol'];

      $sql = "INSERT INTO reportes (REPORTE, USER_TID) VALUES ('".$reporte."', '$user_tid')";
      $conn->query($sql);

      $sql = "SELECT user_name FROM users WHERE user_tid = '$user_tid'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

      $get_reporte_tid_sql = "SELECT reporte_tid FROM reportes WHERE reporte = '$reporte' AND user_tid = '$user_tid'";
      $reporte_tid_result = $conn->query($get_reporte_tid_sql);
      $reporte_tid = $reporte_tid_result->fetch_row();


      $total = count($_FILES['fileToUpload']['name']);

      $target_dir = "/var/www/html/reportesgpm.ga/public_html/uploads/".$row["user_name"]."/";
   
      for( $i=0 ; $i < $total ; $i++ ) {
   
         $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
     
         move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file);
	 $sql1 = "INSERT INTO archivos (PATH, USER_TID, REPORTE_TID) VALUES ('$target_file', '$user_tid', '$reporte_tid[0]')";
	 $conn->query($sql1);
      }

      include("reporte_enviado.html");


      header( "refresh:2 url='$url'" );
//****************Send Email****************************
//      $to = "gustavo.gamboa96@gmail.com";
//      $subject = "Nuevo reporte añadido";
//      $txt = "probando 123";
//      $headers = "From: webmaster@example.com";

//      mail($to,$subject,$txt,$headers);
//******************************************************

   }else{
   echo "no cookie";
   }

?>
