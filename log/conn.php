<?php
$conn=new mysqli("localhost","root","","beverd__");

if($conn->connect_error){
    die("Connessione fallita: ".$conn->connect_error);
}
?>