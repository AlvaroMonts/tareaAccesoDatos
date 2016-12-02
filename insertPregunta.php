	<?php
	$servername = "localhost";
	$user = "root";
	$password = "";
	$dbname = "bbddmaquinarefrescos";
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
	
	$usuario = $_POST ['txtUsuario'];
	$pregunta = $_POST ['txtPregunta'];
	$ip = getRealIP ();
	$fechaIn = "";
	$abierta = 0;
	$fechaFin = "";
	
	echo "Mi ip es: " . $ip;
	
	if ($usuario != "" && $pregunta != "") {
		if (isset ( $usuario ) && isset ( $pregunta ) && isset ( $ip ) && isset ( $fechaIn )) {
			// insert a json
		} else {
			echo "Falta algun dato (oculto) para realizar una nueva pregunta: ";
			echo "La IP del usuario es: " . $ip;
			echo "La fecha actual es: " . $fechaIn;
		}
	} else {
		echo "Inserte todos los datos posibles";
	}
	?>
