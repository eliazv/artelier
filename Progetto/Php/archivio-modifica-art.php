<?php
require_once 'bootstrap.php';

if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}
$templateParams["quadri"] = $dbh->getQuadriNonEliminati();


//se gia presente aumenta quantita
if (isset($_POST["btnElimina"])) {
    
    $templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);
    $titolo = $templateParams["quadroSpecifico"][0]["titolo"];
    $prezzo = $templateParams["quadroSpecifico"][0]["prezzo"];
        $dbh->deleteQuadro($titolo);
        $templateParams["quadri"] = $dbh->getQuadriNonEliminati();
        $dbh->removeQuadroFromAllCart($titolo);

}



if (isset($_POST["btnModifica"])) {
    if(empty($_POST["quantita"]) || empty($_POST["prezzo"]) || !is_numeric($_POST["quantita"]) || !is_numeric($_POST["prezzo"])){
        $templateParams["errore"] = "Errore nei dati da modificare!";
    } else {
        $templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);
        $titolo = $templateParams["quadroSpecifico"][0]["titolo"];
        $prezzo = $templateParams["quadroSpecifico"][0]["prezzo"];  
        $nuovoPrezzo = $_POST["prezzo"];
        $quantita = $_POST["quantita"];
        if($prezzo!=""){
            $dbh->updatePrezzo($nuovoPrezzo, $titolo);
        }
        if(($quantita!="")){
            $dbh->updatequantita($quantita, $titolo);
        }
    
        $templateParams["quadri"] = $dbh->getQuadriNonEliminati();
    }
}

require 'template/modifica-art.php';
?>