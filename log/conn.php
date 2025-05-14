<?php
$conn = new mysqli('localhost', 'root', '', database: 'beverdì');
if($conn->connect_error){
    die("Connessione fallita: ".$conn->connect_error);
}
?>