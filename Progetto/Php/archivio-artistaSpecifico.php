<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["artistaSpecifico"] = $dbh->getQuadriByArtista($_GET["artistaA"]);
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);

//var_dump($templateParams);
require 'template/artistaSpecifico.php';
?>