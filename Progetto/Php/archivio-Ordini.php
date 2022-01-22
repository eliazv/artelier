<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["ordine"] = $dbh->getOrders($_SESSION["email"]);
$templateParams["ordiniArrivati"] = $dbh->getDeliveredOrders($_SESSION["email"]);
$templateParams["ordini"] = $dbh->getAllOrdersFromUser($_SESSION["email"]);
$templateParams["ordiniShip"] = $dbh->getShipOrdersFromUser($_SESSION["email"]);

if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}
//var_dump($templateParams);
require 'template/Ordini.php';
?>