<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["correnteSpecifica"] = $dbh->getQuadritByCategoria($_GET["nomec"]);
$templateParams["informazioniCategoria"] = $dbh->getSpecificCategory($_GET["nomec"]);
if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}
//var_dump($templateParams);
require 'template/CategoriaSpecifica.php';
?>