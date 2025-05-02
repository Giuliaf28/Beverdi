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
    <link rel="stylesheet" href="css/indexStyle.css">
   <script src="ajax/main.js"></script>

</head>

<body>
    <h1>Benvenuto al Beverdì</h1>
    <h3>Qui troverai un quantitativo sufficiente di cockatail per sceglierne uno diverso dal Gin Lemon</h3>
    <label for="">Accedi per poter (salvare i tuoi cocktail preferiti e )per sbloccare la modalità party </label><a href="log/login.php"><button>ACCEDI!</button></a><br>
    <label for="">Non hai un account? </label> <a href="log/registrati.php"><button>REGISTRATI!</button></a><br>
    <div id="container"></div>
    <a href="free_access/allCockails.php"><button>see more</button></a>
</body>

</html>