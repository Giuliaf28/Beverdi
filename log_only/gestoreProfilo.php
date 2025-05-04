<?php

if(!isset($_SESSON))
    session_start();

require_once '../log/conn.php';

$username=$_POST['username'];
$currentPassword=md5($_POST['currentPassword']);
$nuovaPassword=$_POST['nuovaPassword'];
$dataNascita=$_POST['dataNascita'];
$fotoProfilo=$_POST['fotop'];

$q="SELECT * FROM utenti WHERE username=? AND id=?";
$stmt=$conn->prepare($q);

$stmt->bind_param("si", $_SESSION["username"], $_SESSION['id']);
$stmt->execute();

$result=$stmt->get_result();
if($result->num_rows==0){
    header("Location: profilo.php?msg=Password errata!");
    exit();
}

print_r($result);
$datiUtente=$result->fetch_assoc();
print_r($datiUtente);
$stmt->close();


if($username != "" && $username != $_SESSION['username']){
    $q="UPDATE utenti SET username=? WHERE id=?";
    $stmt=$conn->prepare($q);
    $stmt->bind_param("si", $username, $datiUtente['id']);
    $stmt->execute();
    $_SESSION['username']=$username;
    $stmt->close();
}

if($nuovaPassword != "" && $nuovaPassword != $_POST['currentPassword'] && $currentPassword != ""){
    $nuovaPassword=md5($nuovaPassword);
    $q="UPDATE utenti SET password=? WHERE id=?";
    $stmt=$conn->prepare($q);
    $stmt->bind_param("si", $nuovaPassword, $datiUtente['id']);
    $stmt->execute();
    $stmt->close();
}

if($dataNascita != "" && $dataNascita != $_SESSION['dataNascita']){
    $q="UPDATE utenti SET dataNascita=? WHERE id=?";
    $stmt=$conn->prepare($q);
    $stmt->bind_param("si", $dataNascita, $datiUtente['id']);
    $stmt->execute();
    $_SESSION['dataNascita']=$dataNascita;
    $stmt->close();
}

if($fotoProfilo != "" && $fotoProfilo != $_SESSION['pfp']){
    $q="UPDATE utenti SET pfp=? WHERE id=?";
    $stmt=$conn->prepare($q);
    $stmt->bind_param("si", $fotoProfilo, $datiUtente['id']);
    $stmt->execute();
    $_SESSION['pfp']=$fotoProfilo;
    $stmt->close();
}

echo "controllare le modifiche!";

$q="SELECT * FROM utenti WHERE username=?";
$stmt=$conn->prepare($q);
$stmt->bind_param("s", $username);
$stmt->execute();

$result=$stmt->get_result();
$dati=$result->fetch_assoc();
print_r($dati);
$stmt->close();

header("Location: profilo.php?msg=Modifiche effettuate con successo!");
?>