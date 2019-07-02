<?php
  include "conexion.php";

  $orden = $_POST['orden'];
  $result = "";

  //Cargar todas las ubicaciones 
  if($orden == "cargarLeaderBoard"){

      $sql = "SELECT * FROM scores ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           echo $row["id"]. "," . $row["nombre"]. "," . $row["aciertos"]. "," . $row["fecha"]. "\n";
        }   
      } else {
        echo "0";
      }
  }

  $conn->close();
	die ('');
 
?>
