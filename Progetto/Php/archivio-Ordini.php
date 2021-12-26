<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["ordine"] = $dbh->getOrders();
$templateParams["ordiniArrivati"] = $dbh->getDeliveredOrders();

//var_dump($templateParams);
require 'template/Ordini.php';
?>