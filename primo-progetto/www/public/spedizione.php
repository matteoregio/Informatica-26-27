<?php

$tipo = $_GET['tipo'] ?? $_POST['tipo'] ?? '';
$nome = '';
$peso = '';
$aereo = '';
$errore = '';
$riepilogo = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$nome = $_POST['nome'] ?? '';
	$peso = $_POST['peso'] ?? '';
	$aereo = $_POST['aereo'] ?? '';

	if(empty($nome) || empty($peso)){
		$errore = "Attenzione: compilare tutti i campi.";
	} else {
		if($tipo == "Espressa"){
			$costo = 5;
		} else {
			$costo = 3;
		}

		if(!empty($aereo)){
			$supplemento = 10;
		} else {
			$supplemento = 0;
		}

		$totale = $costo * (int)$peso + $supplemento;
		$riepilogo = true;
	}
}

?>
<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<title>Spedizione</title>
</head>
<body>
	<h1>Richiesta di spedizione</h1>
	<p>Tipologia di spedizione selezionata: <b><?php echo htmlspecialchars($tipo); ?></b></p>

	<?php if($errore != ''){ ?>
		<p style="color:red"><b><?php echo $errore; ?></b></p>
	<?php } ?>

	<form method="POST" action="spedizione.php">
		<p>
			Nome del cliente:
			<input type ="text" name = "nome" value="<?php echo htmlspecialchars($nome); ?>">
		</p>

		<p>
			Peso del pacco (kg):
			<select name="peso">
				<option value=""></option>
				<?php for($i = 1; $i <= 6; $i++){ ?>
					<option value="<?php echo $i; ?>" <?php if($peso == $i){ echo "selected"; } ?>><?php echo $i; ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			Invio aereo:
			<input type = "checkbox" name="aereo" value="si" <?php if(!empty($aereo)){ echo "checked"; } ?>> Sì (costo aggiuntivo)
		</p>

		<input type = "hidden" name = "tipo" value="<?php echo htmlspecialchars($tipo); ?>">

		<input type ="submit" value ="Calcola prezzo">
	</form>

	<p><a href="home-spedizione.php">Torna alla home</a></p>

	<?php if($riepilogo){ ?>
		<h1>Riepilogo della richiesta di spedizione</h1>
		<table border="1" cellpadding="5">
			<tr><td>Nome del cliente</td><td><?php echo htmlspecialchars($nome); ?></td></tr>
			<tr><td>Tipologia di spedizione</td><td><?php echo htmlspecialchars($tipo); ?></td></tr>
			<tr><td>Peso del pacco</td><td><?php echo htmlspecialchars($peso); ?> kg</td></tr>
			<tr><td>Costo per chilogrammo</td><td><?php echo $costo; ?> euro</td></tr>
			<?php if($supplemento > 0){ ?>
				<tr><td>Supplemento aereo</td><td><?php echo $supplemento; ?> euro</td></tr>
			<?php } ?>
			<tr><td><b>Costo totale</b></td><td><b><?php echo $totale; ?> euro</b></td></tr>
		</table>
		<p>Richiesta di spedizione <b>effettuata correttamente!</b></p>
	<?php } ?>
</body>
</html>