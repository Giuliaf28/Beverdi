<?php
$conn=new mysqli("localhost","root","","beverdì");

if($conn->connect_error){
    die("Connessione fallita: ".$conn->connect_error);
}
?>