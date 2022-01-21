<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "ArtElier - Artisti";
$templateParams["4Quadri"] = $dbh->getRandomQuadri(4);
$templateParams["3Artisti"] = $dbh->getRandomArtisti(3);
$templateParams["3Categorie"] = $dbh->getRandomCategorie(3);

if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}
//var_dump($templateParams);
require 'template/home.php';
?>