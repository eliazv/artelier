<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "ArtElier - Quadri";
$templateParams["nome"] = "lista-quadri.php";
$templateParams["quadri"] = $dbh->getQuadri();

require 'template/quadri.php';
?>