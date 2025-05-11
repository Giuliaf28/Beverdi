<?php
if (!isset($_SESSION)) 
    session_start();

require_once '../log/conn.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['id_utente'])) {
    header("Location: ../log/login.php?msg=Sessione non valida!");
    exit();
}

$username = $_POST['username'];
$currentPassword = md5($_POST['currentPassword']);
$nuovaPassword = $_POST['nuovaPassword'];
$dataNascita = $_POST['dataNascita'];
$fotoProfilo = $_POST['fotop'];

// Recupero dati utente
$q = "SELECT * FROM utenti WHERE username=? AND id=?";
$stmt = $conn->prepare($q);
$stmt->bind_param("si", $_SESSION["username"], $_SESSION['id_utente']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $stmt->close();
    header("Location: profilo.php?msg=Utente non trovato!");
    exit();
}

$datiUtente = $result->fetch_assoc();
$stmt->close();

// Verifica password attuale
if ($currentPassword !== $datiUtente['password']) {
    header("Location: profilo.php?msg=Password errata!");
    exit();
}

// Modifica username
if ($username != "" && $username != $_SESSION['username']) {
    $q = "UPDATE utenti SET username=? WHERE id=?";
    $stmt = $conn->prepare($q);
    $stmt->bind_param("si", $username, $datiUtente['id']);
    $stmt->execute();
    $_SESSION['username'] = $username;
    $stmt->close();
}

// Modifica password
if ($nuovaPassword != "" && md5($nuovaPassword) != $datiUtente['password']) {
    $nuovaPasswordHashed = md5($nuovaPassword);
    $q = "UPDATE utenti SET password=? WHERE id=?";
    $stmt = $conn->prepare($q);
    $stmt->bind_param("si", $nuovaPasswordHashed, $datiUtente['id']);
    $stmt->execute();
    $stmt->close();
}

// Modifica data di nascita
if ($dataNascita != "" && $dataNascita != $_SESSION['dataNascita']) {
    $q = "UPDATE utenti SET dataNascita=? WHERE id=?";
    $stmt = $conn->prepare($q);
    $stmt->bind_param("si", $dataNascita, $datiUtente['id']);
    $stmt->execute();
    $_SESSION['dataNascita'] = $dataNascita;
    $stmt->close();
}

// Modifica foto profilo
if ($fotoProfilo != "" && $fotoProfilo != $_SESSION['pfp']) {
    $q = "UPDATE utenti SET pfp=? WHERE id=?";
    $stmt = $conn->prepare($q);
    $stmt->bind_param("si", $fotoProfilo, $datiUtente['id']);
    $stmt->execute();
    $_SESSION['pfp'] = $fotoProfilo;
    $stmt->close();
}

// Redirect finale
header("Location: profilo.php?msg=Modifiche effettuate con successo!");
exit();
?>
