<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "ArtElier - Quadri";
$templateParams["nome"] = "";
if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}
$templateParams["quadri"] = $dbh->getQuadri();
//var_dump($templateParams);
require 'template/quadri.php';
?>