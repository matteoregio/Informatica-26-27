<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$user = $_POST['user'] ?? '';
	$pass = $_POST['pass'] ?? '';

	if(empty($user) || empty($pass)){
		die("<p>Errore, compila tutti i campi</p>");
	}

	//controllo lunghezza stringa, se c'è una lettera maiuscola e se c'è un numero
	if(strlen($pass) < 8 || !preg_match('/[A-Z]/', $pass) || !preg_match('/\d/',$pass)){
		die("<p>Errore, la password non rispetta i criteri</p>");
	}

	echo "<h1>Area Riservata</h1>";
	echo "<p>Accesso effetuato con successo!!!</p>";
	echo "<p>Ciao</p>".htmlspecialchars($user);
}


?>
