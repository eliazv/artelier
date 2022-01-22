<?php
require_once 'bootstrap.php';

$templateParams["utente"] = $dbh->getUtente($_SESSION['email']);
$templateParams["ordine"] = $dbh->getAllOrders();

if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}

require 'template/admin-ordini.php';
?>