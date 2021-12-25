<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "ArtElier - Carrello";
$templateParams["compone"] = $dbh->getCompone(1); //1 come lo prendo?? da carrello


//var_dump($templateParams);
require 'template/carrello.php';
?>