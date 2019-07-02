<?php
	$servername = "localhost";
  $dbname   = "videoclub";
	$username = "alopolisia";
	$password = "sushi123";		
	
	$id_pelicula = $_POST['id_pelicula'];	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	
	
	$sql = "SELECT * FROM cinta where id_pelicula = ('$id_pelicula') AND estado = 0 ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			//echo "id: " . $row["id"]. " - Name: " . $row["nombre"]. " " . $row["apellidop"]. " " . $row["apellidom"]. "\n";
			echo $row["id"]. "\n";
		}
    
	} else {
		echo "No hay disponibilidad". "\n";
	}	
	
	$conn->close();
	//die ('Finalizando...');
	die ('');

 
?>
