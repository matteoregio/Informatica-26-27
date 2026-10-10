<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$cognome = isset($POST['cognome']) ? trim($_POST['cognome']) : '';
		$nome = isset($POST['nome']) ? trim($_POST['nome']) : '';
		$email = isset($POST['email']) ? trim($_POST['email']) : '';
		$corso = isset($POST['select']) ? trim($_POST['select']) : '';
		$livello = isset($POST['livello']) ? trim($_POST['livello']) : '';
		$messaggio = isset($POST['messaggio']) ? trim($_POST['messaggio']) : '';
		$email = isset($POST['email']) ? trim($_POST['email']) : '';
	}

?>

