<?php
require_once("conn.php");
if (!isset($_SESSION)) {
    session_start();
}
$username = $_POST['username'];
$password =MD5($_POST['password']);
$dataNascita = $_POST['dataNascita'];
$foto = $_POST['fotop'];


$q="SELECT * FROM utenti WHERE username = '$username' AND password = '$password'";
$result = $conn->query($q);
if($result->num_rows > 0) {
    header("Location: login.php?msg=Credenziali già in uso, accedi!");
    exit();
}

$stmt = $conn->prepare("INSERT INTO utenti (username, password, data_nascita, pfp) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $password, $dataNascita, $foto);
$stmt->execute();
$stmt->close();

$_SESSION['username'] = $username;
$_SESSION['dataNascita'] = $dataNascita;
$_SESSION['pfp'] = $foto;
$_SESSION['id_utente'] = $conn->insert_id; // Ottieni l'ID dell'utente appena registrato

header("Location: ../log_only/profilo.php?msg=Registrazione avvenuta con successo!!");
exit;
?>