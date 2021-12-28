<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["ordtracciamento"] = $dbh->getOrders();

//var_dump($templateParams);
require 'template/tracciamento.php';
?>