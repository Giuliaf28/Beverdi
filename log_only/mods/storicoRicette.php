<?php
if (!isset($_SESSION))
    session_start();
require_once '../../log/conn.php';
require_once '../../classi/gestoreAPI.php';

$gestoreApi = new gestoreAPI();

$idUtente = $_SESSION['id_utente'];

$query = "SELECT * FROM ricette WHERE id_utente = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idUtente);
$stmt->execute();
$result = $stmt->get_result();

$listaCategorie = $gestoreApi->getListaCategorie();
$listaBicchieri = $gestoreApi->getListaBicchieri();
$listaAlcolici = $gestoreApi->getListaAlcolici();
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Storico Ricette</title>
    <link rel="stylesheet" href="../../css/storico.css">
</head>

<body>
    <h1>Le tue ricette</h1>

    <?php
    if (isset($_GET['msg'])) {
        echo "<p class='messaggio'>" . $_GET['msg'] . "</p>";
    }

    while ($ricetta = $result->fetch_assoc()) {
        echo "<div class='ricetta' id='ricetta-" . $ricetta['id'] . "'>";
        
        // Form modifica
        echo "<form action='gestisciRicetta.php' method='post'>";
        echo "<input type='hidden' name='id_ricetta' value='" . $ricetta['id'] . "'>";
        echo "<input type='hidden' name='azione' value='modifica'>";

        echo "Nome: <input type='text' name='nome' value='" . $ricetta['nome'] . "'><br>";

        // Select categoria
        echo "Categoria: ";
        echo "<select name='categoria'>";
        echo "<option value=''>Seleziona per modificare</option>";
        foreach ($listaCategorie["drinks"] as $c) {
            $selected = ($c["strCategory"] == $ricetta['categoria']) ? "selected" : "";
            echo "<option value='" . $c["strCategory"] . "' $selected>" . $c["strCategory"] . "</option>";
        }
        echo "</select> (Attuale: " . $ricetta['categoria'] . ")<br>";

        // Select bicchiere
        echo "Bicchiere: ";
        echo "<select name='bicchiere'>";
        echo "<option value=''>Seleziona per modificare</option>";
        foreach ($listaBicchieri["drinks"] as $bicchiere) {
            $selected = ($bicchiere["strGlass"] == $ricetta['bicchiere']) ? "selected" : "";
            echo "<option value='" . $bicchiere["strGlass"] . "' $selected>" . $bicchiere["strGlass"] . "</option>";
        }
        echo "</select> (Attuale: " . $ricetta['bicchiere'] . ")<br>";

        // Select livello alcolico
        echo "Livello alcolico: ";
        echo "<select name='livello_alcool'>";
        echo "<option value=''>Seleziona per modificare</option>";
        foreach ($listaAlcolici["drinks"] as $a) {
            $selected = ($a["strAlcoholic"] == $ricetta['livello_alcool']) ? "selected" : "";
            echo "<option value='" . $a["strAlcoholic"] . "' $selected>" . $a["strAlcoholic"] . "</option>";
        }
        echo "</select> (Attuale: " . $ricetta['livello_alcool'] . ")<br>";

        // Ingredienti
        echo "Ingredienti:<br><textarea name='ingredienti' rows='5' cols='50'>";
        echo str_replace(";", "\n", rtrim($ricetta['ingredienti'], ";"));
        echo "</textarea><br>";

        echo "<button type='submit'>Salva modifiche</button>";
        echo "</form>";

        // Form elimina
        echo "<form action='gestisciRicetta.php' method='post' onsubmit='return confirm(\"Sei sicuro di voler eliminare questa ricetta?\")'>";
        echo "<input type='hidden' name='id_ricetta' value='" . $ricetta['id'] . "'>";
        echo "<input type='hidden' name='azione' value='cancella'>";
        echo "<button type='submit'>Elimina</button>";
        echo "</form>";

        echo "</div>";
    }
    ?>

    <h2>Vuoi creare una nuova ricetta?</h2>
    <a href="creaRicetta.php"><button>Crea</button></a>
    <a href="../profilo.php"><button>Torna al profilo</button></a>
    <a href="../../free_access/allCockails.php"><button>Torna alla home</button></a>
</body>

</html>