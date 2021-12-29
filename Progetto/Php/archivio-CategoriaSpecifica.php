<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["correnteSpecifica"] = $dbh->getQuadritByCategoria($_GET["nomec"]);
$templateParams["informazioniCategoria"] = $dbh->getSpecificCategory($_GET["nomec"]);

//var_dump($templateParams);
require 'template/CategoriaSpecifica.php';
?>