<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);

$templateParams["paginaPrec"]= $_GET["paginaPrec"];

require 'template/articolo.php';
?>