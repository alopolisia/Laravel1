<?php
	$servername = "localhost";
  $dbname   = "videoclub";
	$username = "alopolisia";
	$password = "sushi123";		
	
	$id = $_POST['id'];	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 	
	
	$sql = "SELECT nombre, direccion, telefono FROM socio where id = '$id' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			//echo "id: " . $row["id"]. " - Name: " . $row["nombre"]. " " . $row["apellidop"]. " " . $row["apellidom"]. "\n";
			echo $row["nombre"].",". $row["direccion"].",". $row["telefono"]. "\n";
		}
    
	} else {
		echo "0 results";
	}	
	
	$conn->close();
	//die ('Finalizando...');
	die ('');

 
?>
