<?php
require_once 'bootstrap.php';

$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
$templateParams["utente"] = $dbh->getUtente($_SESSION['email']);
$templateParams["ordine"] = $dbh->getAllOrders();

require 'template/admin-ordini.php';
?>