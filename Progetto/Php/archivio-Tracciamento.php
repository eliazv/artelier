<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["ordtracciamento"] = $dbh->getSpecifiedPaintingFromOrders($_SESSION["email"], $_GET["titoloq"]);


//var_dump($templateParams);
require 'template/tracciamento.php';
?>