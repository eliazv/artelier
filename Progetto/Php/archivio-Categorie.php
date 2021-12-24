<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["correnteartistica"] = $dbh->getCategories();

//var_dump($templateParams);
require 'template/Categorie.php';
?>