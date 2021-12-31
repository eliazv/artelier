<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "ArtElier - Quadri";
$templateParams["nome"] = "";
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);

$templateParams["quadri"] = $dbh->getQuadri();
//var_dump($templateParams);
require 'template/quadri.php';
?>