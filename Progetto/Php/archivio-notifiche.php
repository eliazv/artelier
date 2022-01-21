<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["notifica"] = $dbh->getNotifiche($_SESSION["email"]);
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);

require 'template/notifiche.php';
?>