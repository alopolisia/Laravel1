<?php
	$servername = "localhost";
  $dbname   = "videoclub";
	$username = "alopolisia";
	$password = "sushi123";		
	
	$id = $_POST['id'];
  $nombre = $_POST['nombre'];
	$id_director = $_POST['id_director'];
	$id_genero = $_POST['id_genero'];	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	
	

	//$sql = "INSERT INTO TablaAlumnos (Nombre, ApellidoP, ApellidoM)
	//VALUES ('$nombre', '$apellidop', '$apellidom')";
	$sql = "UPDATE pelicula SET nombre='$nombre', id_director='$id_director', id_genero='$id_genero' WHERE id='$id'";

	if ($conn->query($sql) === TRUE) {
		//echo "Registro Actualizado de Manera Exitosa"."\n";
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	//die ('Finalizando...');

 
?>