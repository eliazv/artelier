<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["ordtracciamento"] = $dbh->getOrders($_SESSION["email"]);


//var_dump($templateParams);
require 'template/tracciamento.php';
?>