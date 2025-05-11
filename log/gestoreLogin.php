<?php
session_start(); // 1. Mancava questo!

require_once 'conn.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

// Controllo query
$stmt = $conn->prepare("SELECT * FROM utenti WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

$result = $stmt->get_result();

// Qui serve prendere la riga!
$user = $result->fetch_assoc();
print_r($user); // Debug: mostra l'array associativo
$stmt->close();

// Controlli
if (!$user) {
    // Nessun utente trovato
    header("Location: login.php?msg=Credenziali non trovate");
    //echo "Credenziali non trovate: $username / $password";
    exit();
} else {
    // Utente trovato
    $_SESSION['username'] = $user['username'];
    $_SESSION['id_utente'] = $user['id'];
    $_SESSION['dataNascita'] = $user['data_nascita'];
    $_SESSION['pfp'] = $user['pfp'];
    header("Location: ../free_access/allCockails.php?msg=Benvenuto $username !");
    //echo "Benvenuto " . $_SESSION['username'];
    exit();
}