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
function getRealIP() {
	if (isset ( $_SERVER ["HTTP_CLIENT_IP"] )) {
		return $_SERVER ["HTTP_CLIENT_IP"];
	} elseif (isset ( $_SERVER ["HTTP_X_FORWARDED_FOR"] )) {
		return $_SERVER ["HTTP_X_FORWARDED_FOR"];
	} elseif (isset ( $_SERVER ["HTTP_X_FORWARDED"] )) {
		return $_SERVER ["HTTP_X_FORWARDED"];
	} elseif (isset ( $_SERVER ["HTTP_FORWARDED_FOR"] )) {
		return $_SERVER ["HTTP_FORWARDED_FOR"];
	} elseif (isset ( $_SERVER ["HTTP_FORWARDED"] )) {
		return $_SERVER ["HTTP_FORWARDED"];
	} else {
		return $_SERVER ["REMOTE_ADDR"];
	}
}

$datos = $_POST ['json'];
$json = json_decode ( $datos, true );
$usuario = $json ['usuario'];
$pregunta = $json ['pregunta'];

$ip = getRealIP () . "";
$abierta = 1;
$fechaFin = "";
$hoy = getdate ();
$fechaIn = $hoy ['year'] . "-" . $hoy ['mon'] . "-" . $hoy ['mday'] . " " . $hoy ['hours'] . ":" . $hoy ['minutes'] . ":" . $hoy ['seconds'];

// $stringjson = file_get_contents('php://input');
// $json = json_decode($stringjson);

if ($usuario != "" && $pregunta != "") {
	if (isset ( $usuario ) && isset ( $pregunta ) && isset ( $ip ) && isset ( $fechaIn )) {
		$sql = "INSERT INTO listaespera.peticiones (direccionIP, usuario, texto, abierta, fechaInicio, fechaFin) VALUES ('" . $ip . "', '" . $usuario . "', '" . $pregunta . "', " . $abierta . ", '" . $fechaIn . "', '" . $fechaFin . "');";
		if ($conn->query ( $sql ) === TRUE) {
			echo "Nueva pregunta realizada correctamente<br>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		echo "Falta algun dato (oculto) para realizar una nueva pregunta: ";
		echo "La IP del usuario es: " . $ip;
		echo "La fecha actual es: " . $fechaIn;
	}
} else {
	echo "Inserte todos los datos posibles";
}
?>