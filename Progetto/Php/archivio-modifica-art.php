<?php
require_once 'bootstrap.php';

$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
$templateParams["quadri"] = $dbh->getQuadri();

require 'template/modifica-art.php';
?>