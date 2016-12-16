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


print_r(json_encode($array));

?>


	