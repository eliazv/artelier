<?php
require_once 'bootstrap.php';
if(isset($_GET["codiceNotifica"])){
    if($dbh->statoNotifica($_GET["codiceNotifica"]) == 0){
        $dbh->leggiNotifica($_GET["codiceNotifica"]);
    }
    //$notifyLink = $dbh->getNotificationLink($_GET["codiceNotifica"]);

    $templateParams["notifica"] = $dbh->getNotifica($_GET["codiceNotifica"]); 
    $linkNotifica=$templateParams["notifica"][0]["link"];

    header("location: $linkNotifica");
}
?>