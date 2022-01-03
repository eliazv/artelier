<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);
$email = $_SESSION["email"];
$quantita = $_POST['quantita'];
$titolo = $templateParams["quadroSpecifico"][0]["titolo"];
$prezzo = $templateParams["quadroSpecifico"][0]["prezzo"];
$templateParams["quantitaPrecedente"]= $dbh->getQuadroInCarrello($email, $titolo);
$qprecedente=$templateParams["quantitaPrecedente"][0]["quantita"];

//se gia presente aumenta quantità
if (isset($_POST["btnAggCarrello"])) {
    if($qprecedente != NULL || $qprecedente != 0){
        $qprecedente = $qprecedente + $quantita;
        $dbh->updateQuantitaInCarrello($email, $titolo, $qprecedente);
    }
    //altrimenti inserisci
    else{
        $dbh->insertInCarrello($email, $titolo, $quantita);
    }
    header("location: ./archivio-carrello.php"); //archivio-articolo.php?titoloq=$titolo");  //    PERCORSO POTREBBE VARIARE  ./archivio-carrello.php

}

if (isset($_POST["btnBuyNow"])) {
    $_SESSION["bnquadro"]=$titolo;
    $_SESSION["bnquantita"]=$quantita;
    $_SESSION["bnprezzo"]=$prezzo;
    
    header("location: ./archivio-pagamento.php");  
}
//require "archivio-quadri.php"//da modificare

   
    
?>