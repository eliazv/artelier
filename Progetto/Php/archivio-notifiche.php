<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["notifica"] = $dbh->getNotifiche();

//var_dump($templateParams);
require 'template/notifiche.php';
?>