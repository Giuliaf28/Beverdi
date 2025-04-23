<?php
if(!isset($_SESSION))
    session_start();

    if(isset($_GET['msg'])){
        echo "<h1 class=msg>".$_GET['msg']."</h1>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beverdì</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="ajax/main.js"></script>

</head>

<body>
    <h1>Benvenuto al Beverdì</h1>
    <h3>Qui troverai un quantitativo sufficiente di cockatail per sceglierne uno diverso dal Gin Lemon</h3>
    <a href="log/login.php"><button>Crea la tua ricetta !</button></a>
    <div id="container"></div>
</body>

</html>