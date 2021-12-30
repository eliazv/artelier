<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["ordine"] = $dbh->getOrders($_SESSION["email"]);
$templateParams["ordiniArrivati"] = $dbh->getDeliveredOrders($_SESSION["email"]);

//var_dump($templateParams);
require 'template/Ordini.php';
?>