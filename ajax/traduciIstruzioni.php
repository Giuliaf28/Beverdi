<?php
require_once '../classi/gestoreAPI.php';
require_once '../classi/gestoreRicetta.php';
session_start();
$gestoreAPI = new gestoreAPI();
$gestoreRicetta = new gestoreRicetta();

if(!isset($_GET['id']) || !isset($_GET['lingua']) ){
    $ret = [];
    $ret["status"] = "ERR";
    $ret["msg"] = "devi passare i parametri lingua e istruzioni";
    echo json_encode($ret);
    die();

}
$idCocktail = $_GET['id'];
$lingua = $_GET['lingua'];
$datascocktail = $gestoreAPI->searchById($idCocktail);


/*cosa devo fare:
1. richiamare il metodo per avere le istruzioni in una lingua
2. buildare il return 
3. mandarlo con le istruzioni giuste*/
$istruzioniTradotte = $gestoreRicetta->getIstruzioniCocktail($datascocktail, $lingua);
$ret = [];
$ret["status"] = "OK";
$ret["istruzioni"] = $istruzioniTradotte;
echo json_encode($ret);
die();
?>