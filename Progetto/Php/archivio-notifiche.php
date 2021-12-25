<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["notifica"] = $dbh->getNotifica();

//var_dump($templateParams);
require 'template/notifiche.php';
?>