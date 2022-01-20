<?php
require_once 'bootstrap.php';

$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
$templateParams["quadri"] = $dbh->getQuadriNonEliminati();
$templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);
$titolo = $templateParams["quadroSpecifico"][0]["titolo"];
$prezzo = $templateParams["quadroSpecifico"][0]["prezzo"];

//se gia presente aumenta quantità
if (isset($_POST["btnElimina"])) {
    
        $dbh->deleteQuadro($titolo);
        $templateParams["quadri"] = $dbh->getQuadriNonEliminati();

}



if (isset($_POST["btnModifica"])) {

}
require 'template/modifica-art.php';
?>