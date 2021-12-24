<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "ArtElier - Artisti";
$templateParams["artisti"] = $dbh->getArtisti();
//var_dump($templateParams);
require 'template/artisti.php';
?>