<?php
require_once 'bootstrap.php';


//Base Template
$templateParams["titolo"] = "ArtElier - Carrello";
$templateParams["carrello"] = $dbh->getCarrello($_SESSION["email"]); //prendi email utente loggato 
$templateParams["utente"] = $dbh->getUtente($_SESSION["email"]); //prendi email utente loggato 

if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}

//var_dump($_GET);
require 'template/checkout.php';
?>