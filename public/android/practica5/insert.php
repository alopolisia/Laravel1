<?php
  include "conexion.php";

  $orden = $_POST['orden'];
  $result = "";

  //Insertar una nueva Ubicación
  if($orden == "agregarScore"){
      $nombre = $_POST['nombre'];
      $aciertos = $_POST['aciertos'];
      $fecha = date('Y-m-d G:i:s');
      
      $sql = "INSERT INTO scores (nombre, aciertos, fecha) VALUES ('$nombre', '$aciertos', '$fecha')";
      $result = $conn->query($sql);
    
      if ($result === TRUE) {
        //echo "Registro Insertado de Manera Exitosa"."\n";
      } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  $conn->close();
 
?>
