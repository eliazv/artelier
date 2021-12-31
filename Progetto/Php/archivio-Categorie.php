<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["correnteartistica"] = $dbh->getCategories();
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);

//var_dump($templateParams);
require 'template/Categorie.php';
?>