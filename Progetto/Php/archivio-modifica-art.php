<?php
require_once 'bootstrap.php';

$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
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

require 'template/modifica-art.php';
?>