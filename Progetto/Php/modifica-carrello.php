<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "ArtElier - Carrello";
$templateParams["carrello"] = $dbh->getQuadroInCarrello($_SESSION["email"], $_GET["titoloq"]); //prendi email utente loggato 
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
$templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);


if($_GET["bin"]==1){
    $dbh->deletePaintingInCart($_SESSION["email"], $_GET["titoloq"]);
}

if($_GET["bin"]==0)
{
    //if($_GET["quantitaq"])
    $quantitamod = $templateParams["carrello"][0]["quantita"] + $_GET["quantitaq"];
    $qquadro=$templateParams["quadroSpecifico"][0]["quantita"];

    //se la quantità risultante è zero elimina l'oggetto dal carrello
    if($quantitamod==0){
        $dbh->deletePaintingInCart($_SESSION["email"], $_GET["titoloq"]);
    }
    else{
        if($qquadro>=$quantitamod){
            $dbh->updateQuantitaInCarrello($_SESSION["email"], $_GET["titoloq"], $quantitamod);
        }
    }
}



header("location: ./archivio-carrello.php");   


//var_dump($templateParams);
require 'template/carrello.php';
?>