<?php
require_once("../../log/conn.php");
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_GET["nomeRicetta"]) || $_GET["nomeRicetta"] == "") {
    header("Location: creaRicetta.php?msg=Non hai inserito il nome della ricetta");
    exit();
}

$datiNuovoCocktail = []; ///vettore per gli ingredienti selezionati

foreach ($_GET as $key => $elemento)  //for per filtrare i campi vuoti da quelli inseriti
    if ($elemento != "")
        $datiNuovoCocktail[$key] = $elemento;

//print_r($datiNuovoCocktail);

$nomeRicetta = $datiNuovoCocktail["nomeRicetta"]; // nome della ricetta
$categoria = $datiNuovoCocktail["categorie"]; // categoria della ricetta
$alcool = $datiNuovoCocktail["alcool"]; // alcolico della ricetta
$bicchiere = $datiNuovoCocktail["bicchieriDisponibili"]; // bicchiere della ricetta
$ingredienti=""; // array per gli ingredienti

//for per salvare SOLO gli ingredienti
foreach ($datiNuovoCocktail as $key => $valore) {
    if (in_array($key, ["nomeRicetta", "categorie", "alcool", "bicchieriDisponibili"])) {
        continue;
    }
    // Salva nella forma valore:chiave;
    $ingredienti .= $valore . ":" . $key . ";";
}

//print($ingredienti);

$q="INSERT INTO ricette (nome, categoria, livello_alcool, bicchiere, ingredienti, id_utente) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($q);
$stmt->bind_param("sssssi", $nomeRicetta, $categoria, $alcool, $bicchiere, $ingredienti, $_SESSION["id_utente"]);
$stmt->execute();
$stmt->close();

header("Location: ../profilo.php?msg=Ricetta creata con successo");
exit;
?>