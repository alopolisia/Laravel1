<?php
	$servername = "localhost";
  $dbname   = "videoclub";
	$username = "alopolisia";
	$password = "sushi123";		
	
	$nombre    = $_POST['nombre'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		//die("Connection failed: " . $conn->connect_error);
	} 	
	

	$sql = "INSERT INTO socio (nombre, direccion, telefono)
	VALUES ('$nombre', '$direccion', '$telefono')";

	if ($conn->query($sql) === TRUE) {
		//echo "Registro Insertado de Manera Exitosa"."\n";
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	//die ('Finalizando...');
 
?>
