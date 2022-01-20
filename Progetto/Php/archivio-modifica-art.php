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
        $dbh->removeQuadroFromAllCart($titolo);

}



if (isset($_POST["btnModifica"])) {
    $nuovoPrezzo = $_POST["prezzo"];
    $dbh->updatePrezzo($nuovoPrezzo, $titolo);
    $templateParams["quadri"] = $dbh->getQuadriNonEliminati();
}

require 'template/modifica-art.php';
?>