<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["artistaSpecifico"] = $dbh->getQuadriByArtista($_GET["artistaA"]);

//var_dump($templateParams);
require 'template/artistaSpecifico.php';
?>