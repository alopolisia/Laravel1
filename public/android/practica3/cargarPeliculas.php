<?php
	$servername = "localhost";
  $dbname   = "videoclub";
	$username = "alopolisia";
	$password = "sushi123";		
	
	//echo "Hello, World!"."\n";	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	
	
	$sql = "SELECT * FROM pelicula ORDER BY nombre";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			//echo "id: " . $row["id"]. " - Name: " . $row["nombre"]. " " . $row["apellidop"]. " " . $row["apellidom"]. "\n";
			echo $row["id"].",". $row["nombre"].",". $row["id_director"].",". $row["id_genero"]. "\n";
		}
    
	} else {
		echo "0 results";
	}	
	
	$conn->close();
	//die ('Finalizando...');
	die ('');

 
?>