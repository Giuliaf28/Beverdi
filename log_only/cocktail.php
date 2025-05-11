<?php
require_once '../classi/gestoreAPI.php';
require_once '../classi/gestoreRicetta.php';
require_once '../log/conn.php';

if (!isset($_SESSION))
    session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../log/login.php?msg=Accedi per visualizzare la ricetta!");
    exit();
}

if (isset($_GET['msg'])) {
    echo "<h1 class=msg>" . $_GET['msg'] . "</h1>";
}

$gestoreAPI = new gestoreAPI();
$gestoreRicetta = new gestoreRicetta();
$_SESSION["idCocktail"] = $_GET['id'];
$idCocktail = $_SESSION["idCocktail"];
$datascocktail = $gestoreAPI->searchById($idCocktail);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricetta cocktail</title>
    <script>
        async function traduci(lingua, idCocktail) {
            let url = "../ajax/traduciIstruzioni.php?lingua=" + lingua + "&id=" + idCocktail;
            let response = await fetch(url);
            if (!response.ok) {
                throw new Error("non sono riuscito a fare la fetch!");
            }

            let txt = await response.text();
            console.log(txt);
            let datiRicevuti = JSON.parse(txt);
            if (datiRicevuti["status"] == "ERR") {
                alert(datiRicevuti["msg"]);
                return false;
            } else {
                document.getElementById("strIstruzioni").innerHTML = datiRicevuti["istruzioni"];
            }
        }

    </script>
    <link rel="stylesheet" href="../css/cocktailStyle.css">
</head>

<body>
    <div id="container">
        <?php
        //qui c'il nome e l'immagine
        $nomeCocktail = $gestoreRicetta->getNomeCocktail($datascocktail);
        $img = $gestoreRicetta->getImgCocktail($datascocktail);

        echo "<h1 class='nomeCocktail'>$nomeCocktail</h1>";
        echo "<img class='imgCocktail' src='$img' alt='Immagine di $nomeCocktail' style='width: 300px; height: 300px;'>";
        ?>



        <div id="infoCockatail">
            <?php
            //qui ci sono gli ingredienti, le quantità e se è alcolico o meno
            //tabella per gli ingredienti e le quantità
            //label per alcolico o no e categoria
            $ingredientiCocktail = $gestoreRicetta->getIngredientiCocktail($datascocktail);
            $quantitaIngredientiCocktail = $gestoreRicetta->getQuantitaIngredientiCocktail($datascocktail);
            $categoriaCocktail = $gestoreRicetta->getCategoriaCocktail($datascocktail);
            $isAlcolico = $gestoreRicetta->isAlcolico($datascocktail);
            $bicchiereCocktail = $gestoreRicetta->getBicchiere($datascocktail);
            ?>

            <table id="tabellaIngredienti">
                <tr>
                    <th>Quantità</th>
                    <th>Ingredienti</th>
                    <th></th>
                </tr>
                <?php
                
                for ($i = 0; $i < count($ingredientiCocktail); $i++) {

                    echo "<tr>";
                    echo "<td>";
                    if (isset($quantitaIngredientiCocktail[$i]) && $quantitaIngredientiCocktail[$i] != "") {
                        echo $quantitaIngredientiCocktail[$i];
                    } else {
                        echo "";
                    }
                    echo "</td>";
                    echo "<td>" . $ingredientiCocktail[$i] . "</td>";
                    echo "<td>" . "<img src='" . $gestoreRicetta->getImgIngrediente($ingredientiCocktail[$i]) . "'>" . "</td>";
                    echo "</tr>";
                }
                ?>

            </table>

            <label for="">Bicchiere: </label><span><?php echo $bicchiereCocktail; ?></span><br>
            <label for="">Categoria: </label><span><?php echo $categoriaCocktail; ?></span><br>
            <label for="">Alcolico: </label><span><?php if ($isAlcolico=="Alcoholic")
                echo "Sì";
            else echo "No"; ?></span><br>
        </div>



        <div id="istruzioni">

            <?php //qui ci sono le istruzioni e il bicchiere da usare
            $istruzioniCocktail = $gestoreRicetta->getIstruzioniCocktail($datascocktail, "IT"); ?>

            <h2>Istruzioni</h2>
            <p id="strIstruzioni"><?php echo $istruzioniCocktail; ?></p>
            <button class="lingua" id="IT" onclick="traduci('IT', <?php echo $idCocktail; ?>)"><img
                    src="../img/icons/italy.png" alt="it"></button>
            <button class="lingua" id="DE" onclick="traduci('DE', <?php echo $idCocktail; ?>)"><img
                    src="../img/icons/german.png" alt="ger"></button>
            <button class="lingua" id="ES" onclick="traduci('ES', <?php echo $idCocktail; ?>)"><img
                    src="../img/icons/spain.png" alt="sp"></button>
            <button class="lingua" id="EN" onclick="traduci('EN', <?php echo $idCocktail; ?>)"><img src="../img/icons/uk.png"
                    alt="uk"></button>


        </div>

        <a href="../free_access/allCockails.php"><button>Torna alla home</button></a>
    </div>
</body>

</html>