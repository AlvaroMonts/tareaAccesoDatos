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

$hoy = getdate ();
$fechaFin = $hoy ['year'] . "-" . $hoy ['mon'] . "-" . $hoy ['mday'] . " " . $hoy ['hours'] . ":" . $hoy ['minutes'] . ":" . $hoy ['seconds'];

$datos = $_POST ['json'];
$json = json_decode ( $datos, true );
$id = $json ['id'];
if (isset ( $id )) {
	$sql = "UPDATE `listaespera`.`peticiones` SET abierta = 0, fechaFin ='" . $fechaFin . "' WHERE idPeticion = '" . $id . "';";
	if ($conn->query ( $sql ) === TRUE) {
		echo "Pregunta cerrada correctamente<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
} else {
	echo "Inserte la id de la pregunta";
}
?>