<?php
	$servername = "localhost";
  $dbname   = "videoclub";
	$username = "alopolisia";
	$password = "sushi123";		
	
	$id_socio    = $_POST['id_socio'];
	$id_cinta = $_POST['id_cinta'];
	$fecha_prestamo = $_POST['fecha_prestamo'];	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		//die("Connection failed: " . $conn->connect_error);
	} 	
	

	$sql = "INSERT INTO prestamo (id_socio, id_cinta, fecha_prestamo)
	VALUES ('$id_socio', '$id_cinta', '$fecha_prestamo')";

	if ($conn->query($sql) === TRUE) {
		//echo "Registro Insertado de Manera Exitosa"."\n";
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	//die ('Finalizando...');
 
?>
