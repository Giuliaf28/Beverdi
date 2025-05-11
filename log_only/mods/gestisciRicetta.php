<?php
require_once '../../log/conn.php';

session_start();
$idUtente = $_SESSION['id_utente'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $azione = $_POST['azione'];
    $idRicetta = $_POST['id_ricetta'];

    if ($azione === 'modifica') {
        // Recupera i dati attuali della ricetta
        $query = "SELECT * FROM ricette WHERE id = ? AND id_utente = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $idRicetta, $idUtente);
        $stmt->execute();
        $result = $stmt->get_result();
        $ricetta = $result->fetch_assoc();
        $stmt->close();
        
        if (!$ricetta) {
            header("Location: storicoRicette.php?msg=Ricetta non trovata");
            exit;
        }
        
        // Inizializza le variabili con i valori attuali
        $nome = $ricetta["nome"];
        $categoria = $ricetta["categoria"];
        $livelloAlcolico = $ricetta["livello_alcool"];
        $bicchiere = $ricetta["bicchiere"];
        $ingredienti = $ricetta["ingredienti"];
        
        // Aggiorna solo i campi che sono stati effettivamente modificati
        if (!empty($_POST['nome']) && $_POST['nome'] !== '--') {
            $nome = $_POST['nome'];
        }
        
        if (!empty($_POST['categoria']) && $_POST['categoria'] !== '--') {
            $categoria = $_POST['categoria'];
        }
        
        if (!empty($_POST['livello_alcool']) && $_POST['livello_alcool'] !== '--') {
            $livelloAlcolico = $_POST['livello_alcool'];
        }
        
        if (!empty($_POST['bicchiere']) && $_POST['bicchiere'] !== '--') {
            $bicchiere = $_POST['bicchiere'];
        }
        
        // Per gli ingredienti, utilizziamo il nuovo valore solo se è stato fornito
        if (!empty($_POST['ingredienti'])) {
            // Formatta gli ingredienti aggiungendo il separatore ';'
            $ingredienti = str_replace("\n", ";", $_POST['ingredienti']);
            // Assicurati che ci sia sempre un ';' alla fine
            if (substr($ingredienti, -1) !== ';') {
                $ingredienti .= ';';
            }
        }

        // Prepara la query di aggiornamento
        $query = "UPDATE ricette SET nome = ?, categoria = ?, livello_alcool = ?, bicchiere = ?, ingredienti = ? WHERE id = ? AND id_utente = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssii", $nome, $categoria, $livelloAlcolico, $bicchiere, $ingredienti, $idRicetta, $idUtente);
        $stmt->execute();
        $stmt->close();

        // Redirect con messaggio di successo
        header("Location: storicoRicette.php?msg=Ricetta modificata con successo");
        exit;
    } elseif ($azione === 'cancella') {
        // Elimina la ricetta
        $query = "DELETE FROM ricette WHERE id = ? AND id_utente = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $idRicetta, $idUtente);
        $stmt->execute();
        $stmt->close();

        // Redirect con messaggio di successo
        header("Location: storicoRicette.php?msg=Ricetta eliminata con successo");
        exit;
    }
}
?>