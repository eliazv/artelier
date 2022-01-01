<?php
require_once 'bootstrap.php';


//Base Template
$templateParams["titolo"] = "ArtElier - Pagamento";
$templateParams["carrello"] = $dbh->getCarrello($_SESSION["email"]); //prendi email utente loggato 

//svuota carrello e fai l'ordine



//var_dump($_GET);
require 'template/pagamento.php';
?>