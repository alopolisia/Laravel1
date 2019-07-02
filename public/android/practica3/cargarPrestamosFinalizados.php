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
	
	$sql = "SELECT p.id, p.id_socio, p.id_cinta, p.fecha_prestamo, p.fecha_devuelto, s.nombre as socio FROM prestamo p JOIN socio s WHERE id_socio = s.id AND fecha_devuelto IS NOT NULL ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			//echo "id: " . $row["id"]. " - Name: " . $row["nombre"]. " " . $row["apellidop"]. " " . $row["apellidom"]. "\n";
			echo $row["id"].",". $row["id_socio"].",". $row["id_cinta"].",". $row["fecha_prestamo"]. ",". $row["fecha_devuelto"]. ",". $row["socio"]. "\n";
		}
    
	} else {
		echo "0 results";
	}	
	
	$conn->close();
	//die ('Finalizando...');
	die ('');

 
?>
