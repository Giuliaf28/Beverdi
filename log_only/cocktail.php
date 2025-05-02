<?php
if(!isset($_SESSION))
    session_start();

if(!isset($_SESSION['username'])) {
    header("Location: log/login.php?msg=Accedi per visualizzare la ricetta!");
    exit();
}

if(isset($_GET['msg'])) {
    echo "<h1 class=msg>" . $_GET['msg'] . "</h1>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricetta cocktail</title>
</head>
<body>
    
</body>
</html>