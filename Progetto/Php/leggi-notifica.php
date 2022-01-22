<?php
require_once 'bootstrap.php';

if ($_GET["codiceNotifica"]==NULL) {
    $dbh->leggiTutteNotifiche($_SESSION["email"]);
    header("location: archivio-notifiche.php");
}

if(isset($_GET["codiceNotifica"])){
    if($dbh->statoNotifica($_GET["codiceNotifica"]) == 0){
        $dbh->leggiNotifica($_GET["codiceNotifica"]);
    }

    $templateParams["notifica"] = $dbh->getNotifica($_GET["codiceNotifica"]); 
    $linkNotifica=$templateParams["notifica"][0]["link"];

    header("location: $linkNotifica");
}
?>