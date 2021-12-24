<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["correnteSpecifica"] = $dbh->getQuadritByCategoria("Espressionismo");

//var_dump($templateParams);
require 'template/CategoriaSpecifica.php';
?>