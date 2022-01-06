<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["notifica"] = $dbh->getNotifiche($_SESSION["email"]);
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);

//non va 
function markAsRead($codNotifica, $visualizzato){
    require_once 'bootstrap.php';
    if($visualizzato==0){
        $dbh->updateNotifica($codNotifica,$_SESSION["email"]);
    }
}

//var_dump($templateParams);
require 'template/notifiche.php';
?>