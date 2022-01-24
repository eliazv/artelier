<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["datiArtista"] = $dbh->getArtista($_GET["artistaA"]);
$templateParams["artistaSpecifico"] = $dbh->getQuadriByArtista($_GET["artistaA"]);

if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}
//var_dump($templateParams);
require 'template/artistaSpecifico.php';
?>