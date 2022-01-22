<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["correnteartistica"] = $dbh->getCategories();
if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}
//var_dump($templateParams);
require 'template/Categorie.php';
?>