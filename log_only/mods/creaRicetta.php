<?php
if (!isset($_SESSION))
    session_start();
require_once("../../classi/gestoreAPI.php");
$gestoreApi = new gestoreAPI();

$listaCategorie = $gestoreApi->getListaCategorie(); // 
$listaIngredienti = $gestoreApi->getListaIngredienti(); //
$listaAlcool = $gestoreApi->getListaAlcolici();
$listaBicchieri = $gestoreApi->getListaBicchieri();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea la tua ricetta</title>
    <link rel="stylesheet" href="../../css/newRicetta.css">
</head>

<body>
    <div id="container">
        <h1>Crea la tua ricetta</h1><br><br>
        <form action="nuovaRicetta.php" method="get">

            <label for="">Nome ricetta: </label><br><input type="text" name="nomeRicetta" id="nomeRicetta">


            <div id="selects">
                <h2>Categorie Cocktail</h2>
                <select name="categorie" id="categorie">
                    <?php
                    foreach ($listaCategorie["drinks"] as $c) {
                        echo "<option>" . $c["strCategory"] . "</option>";
                    }
                    ?>
                </select>

                <h2>Alcolico</h2>
                <select name="alcool" id="alcool">
                    <?php
                    foreach ($listaAlcool["drinks"] as $a) {
                        echo "<option>" . $a["strAlcoholic"] . "</option>";
                    }
                    ?>
                </select>

                <h2>Bicchiere</h2>
                <select id="bicchieriDisponibili" name="bicchieriDisponibili">
                    <?php
                    foreach ($listaBicchieri["drinks"] as $bicchiere) {

                        echo "<option>" . $bicchiere["strGlass"] . "</option><br>";
                    }

                    ?>
                </select>
            </div>

            <h2>Ingredienti disponibili</h2>
            <div id="ingredientiDisponibili">

                <?php
                foreach ($listaIngredienti["drinks"] as $ingrediente) {
                    $nome = $ingrediente["strIngredient1"];
                    echo "<div id=$nome>";
                    echo "<label>" . $nome . "</label>";
                    echo " - quantità: <input type=number name=$nome id=$nome min=0 max=500> cl";
                    echo "</div>";
                }

                ?>
            </div>

            <input type="submit" value="Crea!">

        </form>
        <a href="../../free_access/allCockails.php"><button>Torna alla home</button></a><a
            href="../profilo.php"><button>Torna al profilo</button></a>
    </div>
</body>

</html>