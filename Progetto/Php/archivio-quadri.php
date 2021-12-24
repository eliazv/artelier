<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "ArtElier - Quadri";
$templateParams["nome"] = "";

$templateParams["quadri"] = $dbh->getQuadri();
//var_dump($templateParams);
require 'template/quadri.php';
?>