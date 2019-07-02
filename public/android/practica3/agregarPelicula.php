<?php
	$servername = "localhost";
  $dbname   = "videoclub";
	$username = "alopolisia";
	$password = "sushi123";		
	
	$nombre    = $_POST['nombre'];
	$id_director = $_POST['id_director'];
	$id_genero = $_POST['id_genero'];	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		//die("Connection failed: " . $conn->connect_error);
	} 	
	

	$sql = "INSERT INTO pelicula (nombre, id_director, id_genero)
	VALUES ('$nombre', '$id_director', '$id_genero')";

	if ($conn->query($sql) === TRUE) {
		//echo "Registro Insertado de Manera Exitosa"."\n";
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	//die ('Finalizando...');
 
?>
