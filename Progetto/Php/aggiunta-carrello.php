<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);
$email = $_SESSION["email"];
$quantita = $_POST['quantita'];
$titolo = $templateParams["quadroSpecifico"][0]["titolo"];
$prezzo = $templateParams["quadroSpecifico"][0]["prezzo"];
$quantitaDisp = $templateParams["quadroSpecifico"][0]["quantita"];
$templateParams["quantitaPrecedente"]= $dbh->getQuadroInCarrello($email, $titolo);
$qprecedente=$templateParams["quantitaPrecedente"][0]["quantita"];

if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}

//se gia presente aumenta quantità
if (isset($_POST["btnAggCarrello"])) {

    //se esaurita la quantità torna alla pagina precedente NON VA
    if($quantitaDisp < $quantita){
        header("location: ./archivio-quadri.php"); 
        //header("location:javascript://history.go(-1)"); 
    }

    //aggiunge alla quantità precedente DA TESTARE
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

    //se esaurita la quantità torna alla pagina precedente NON VA
    if($quantitaDisp < $quantita){
        header("location: ./archivio-quadri.php"); 
        //header("location:javascript://history.go(-1)"); 
    }    
    $_SESSION["bnquadro"]=$titolo;
    $_SESSION["bnquantita"]=$quantita;
    $_SESSION["bnprezzo"]=$prezzo;
    
    header("location: ./archivio-pagamento.php");  
}
//require "archivio-quadri.php"//da modificare

   
    
?>