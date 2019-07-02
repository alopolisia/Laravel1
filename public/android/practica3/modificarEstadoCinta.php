<?php
	$servername = "localhost";
  $dbname   = "videoclub";
	$username = "alopolisia";
	$password = "sushi123";		
	
	$id = $_POST['id'];
  $estado = $_POST['estado'];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	
	

	//$sql = "INSERT INTO TablaAlumnos (Nombre, ApellidoP, ApellidoM)
	//VALUES ('$nombre', '$apellidop', '$apellidom')";
	$sql = "UPDATE cinta SET estado='$estado' WHERE id='$id'";

	if ($conn->query($sql) === TRUE) {
		//echo "Registro Actualizado de Manera Exitosa"."\n";
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	//die ('Finalizando...');

 
?>