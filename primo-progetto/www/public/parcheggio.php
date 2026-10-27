<?php

// Il veicolo arriva da GET (prima visita) oppure da POST (campo hidden dopo l'invio)
$veicolo = $_GET['veicolo'] ?? $_POST['veicolo'] ?? '';

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Prenotazione parcheggio</title>
</head>
<body>
    <h1>Prenotazione parcheggio</h1>
    <p>Veicolo selezionato: <b><?php echo htmlspecialchars($veicolo); ?></b></p>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'] ?? '';
    $ore  = $_POST['ore'] ?? '';

    // Controllo campi vuoti
    if(empty($nome) || empty($ore)){
        echo "<p>Errore, compila tutti i campi</p>";
    }
    // Controllo che il veicolo sia valido
    elseif($veicolo != "Automobile" && $veicolo != "Motocicletta"){
        echo "<p>Errore, tipologia di veicolo non valida</p>";
    }
    else {
        // Tariffa in base al veicolo
        if($veicolo == "Automobile"){
            $tariffa = 2;
        } else {
            $tariffa = 1;
        }

        $totale = $tariffa * (int)$ore;

        echo "<h2>Riepilogo della prenotazione</h2>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><td>Nome cliente</td><td>" . htmlspecialchars($nome) . "</td></tr>";
        echo "<tr><td>Tipologia di veicolo</td><td>" . htmlspecialchars($veicolo) . "</td></tr>";
        echo "<tr><td>Numero di ore</td><td>" . htmlspecialchars($ore) . "</td></tr>";
        echo "<tr><td>Costo orario</td><td>$tariffa euro</td></tr>";
        echo "<tr><td><b>Costo totale</b></td><td><b>$totale euro</b></td></tr>";
        echo "</table>";
        echo "<p>Prenotazione effettuata correttamente!</p>";
    }
}

?>

    <form method="POST" action="parcheggio.php">
        <p>
            Nome:
            <input type="text" name="nome">
        </p>

        <p>
            Numero di ore:
            <select name="ore">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </p>

        <!-- Mantiene il veicolo durante l'invio del modulo -->
        <input type="hidden" name="veicolo" value="<?php echo htmlspecialchars($veicolo); ?>">

        <input type="submit" value="Calcola prezzo">
    </form>

    <p><a href="home.php">Torna alla home</a></p>
</body>
</html>
