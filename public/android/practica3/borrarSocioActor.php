<?php
	$servername = "localhost";
  $dbname   = "videoclub";
	$username = "alopolisia";
	$password = "sushi123";		
	
	$id_socio = $_POST['id'];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		//die("Connection failed: " . $conn->connect_error);
	} 	
	

	$sql = "DELETE FROM socio_actor WHERE id_socio ='$id_socio'";

	if ($conn->query($sql) === TRUE) {
		//echo "Registro Insertado de Manera Exitosa"."\n";
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	//die ('Finalizando...');
 
?>
