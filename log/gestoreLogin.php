<?php
require_once 'conn.php';
$username = $_POST['username'];
$password = $_POST['password'];


//controllo query
$stmt = $conn->prepare("SELECT * FROM utenti WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();


$result = $stmt->get_result();
$stmt->close();

if ($result->num_rows == 0) {

    header("Location: login.php?msg=Credenziali non trovate, registrati <a href=registrati.php>qui</a> !");
    exit();
} else {
    $_SESSION['username'] = $username;
    header("Location: ../profilo.php?msg=Benvenuto $username !");
    exit;
}


?>