<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["notifica"] = $dbh->getNotifiche($_SESSION["email"]);
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);

//var_dump($templateParams);
require 'template/notifiche.php';
?>