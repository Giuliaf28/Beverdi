<?php
require_once("conn.php");
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
header("Location: ../profilo.php?msg=Registrazione avvenuta con successo!!");
exit;
?>