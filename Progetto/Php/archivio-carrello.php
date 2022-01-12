<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "ArtElier - Carrello";
$templateParams["carrello"] = $dbh->getCarrello($_SESSION["email"]); //prendi email utente loggato 
$templateParams["nquadri"] = $dbh->getNumberOfPortrait($_SESSION["email"]); //prendi email utente loggato 
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
//$dbh->deletePaintingInCart($_SESSION["email"], $_GET["titoloq"]);



//var_dump($templateParams);
require 'template/carrello.php';
?>