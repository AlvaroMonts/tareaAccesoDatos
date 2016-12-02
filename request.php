	<?php
	$servername = "localhost";
	$user = "root";
	$password = "";
	$dbname = "listaespera";
	$conn = new mysqli ( $servername, $user, $password, $dbname );
	// Check connection
	if ($conn->connect_error) {
		die ( "Error: " . $conn->connect_error );
	}
	
	$array = array ();
	$sql = "SELECT * FROM listaespera.peticiones ORDER BY idPeticion";
	$result = $conn->query ( $sql );
	if ($result->num_rows > 0) {
		while ( $row = $result->fetch_assoc () ) {
			$arr = array (
					"idPeticion" => $row ["idPeticion"],
					"direccionIP" => $row ["direccionIP"],
					"usuario" => $row ["usuario"],
					"texto" => $row ["texto"],
					"abierta" => $row ["abierta"],
					"fechaInicio" => $row ["fechaInicio"],
					"fechaFin" => $row ["fechaFin"]
			);
			array_push ( $array, $arr );
		}
	} else {
		echo "0 results";
	}

	echo "<div align='center'>";
	echo "<table><th>ID Peticion</th><th>Texto</th><th>Usuario</th><th>IP</th><th>Abierta</th><th>Hora Inicio</th><th>Hora Fin</th>";
	for($a = 0; $a < count ( $array ); $a ++) {
		echo "<tr onclick=\"funcionClickar(this);\"> ";
		echo "<td>" . json_encode ( $array [$a] ["idPeticion"] ) . "</td>";
		echo "<td>" . json_encode ( $array [$a] ["direccionIP"] ) . "</td>";
		echo "<td>" . json_encode ( $array [$a] ["usuario"] ) . "</td>";
		echo "<td>" . json_encode ( $array [$a] ["texto"] ) . "</td>";
		echo "<td>" . json_encode ( $array [$a] ["abierta"] ) . "</td>";
		echo "<td>" . json_encode ( $array [$a] ["fechaInicio"] ) . "</td>";
		echo "<td>" . json_encode ( $array [$a] ["fechaFin"] ) . "</td>";
		echo "</tr>";
	}
	echo "</table></div>";
	
	?>


