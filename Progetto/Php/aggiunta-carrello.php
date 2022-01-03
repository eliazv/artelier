<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);



$email = $_SESSION["email"];
  
$quantita = $_POST['quantita'];
       
$titolo = $templateParams["quadroSpecifico"][0]["titolo"];
$templateParams["quantitaPrecedente"]= $dbh->getQuadroInCarrello($email, $titolo);
//(gia presente) -> aumenta quantita
//se gia presente aumenta quantità

$qprecedente=$templateParams["quantitaPrecedente"][0]["quantita"];


if($qprecedente != NULL || $qprecedente != 0){
    $qprecedente = $qprecedente + $quantita;
    $dbh->updateQuantitaInCarrello($email, $titolo, $qprecedente);
}
//altrimenti inserisci
else{
    $dbh->insertInCarrello($email, $titolo, $quantita);
}

//if (isset($_POST["btnAggCarrello"])) {
    
//}
//require "archivio-quadri.php"//da modificare

var_dump($email);
var_dump($quantita);
var_dump($titolo);

var_dump($qprecedente);
var_dump($templateParams["quantitaPrecedente"][0]["quantita"]);
header("location: archivio-articolo.php?titoloq=$titolo&paginaPrec=aggiunta-carrello.php");  //    PERCORSO POTREBBE VARIARE  
   
    
?>