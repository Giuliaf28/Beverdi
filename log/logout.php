<?php

session_unset(); // Rimuove tutte le variabili di sessione
session_destroy(); // Distrugge la sessione
header("Location: ../index.php?msg=Logout effettuato con successo!"); // Reindirizza alla pagina principale con un messaggio di logout
?></php>