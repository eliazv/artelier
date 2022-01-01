<?php
require_once 'bootstrap.php';

//var_dump($templateParams);
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
$templateParams["utente"] = $dbh->getUtente($_SESSION['email']);


require 'template/utente.php';
?>