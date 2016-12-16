<?php
$servername = "localhost";
$user = "root";
$password = "root";
$dbname = "listaespera";
$conn = new mysqli ( $servername, $user, $password, $dbname );
// Check connection
if ($conn->connect_error) {
	die ( "Error: " . $conn->connect_error );
}

$id = $_POST ['id'];

if (isset ( $id )) {
	$sql = "UPDATE `listaespera`.`peticiones` SET abierta = 1 WHERE id = '" . $id . "';";
	if ($conn->query ( $sql ) === TRUE) {
		echo "Nueva pregunta realizada correctamente<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
} else {
	echo "Inserte la id de la pregunta";
}
?>