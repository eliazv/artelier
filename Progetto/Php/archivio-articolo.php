<?php
require_once 'bootstrap.php';


//Base Template
$templateParams["titolo"] = "ArtElier - Checkout";
$templateParams["carrello"] = $dbh->getCarrello($_SESSION["email"]); //prendi email utente loggato 
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);

//var_dump($_GET);
require 'template/articolo.php';
?>