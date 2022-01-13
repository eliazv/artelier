<?php
require_once 'bootstrap.php';
if(isset($_GET["codiceNotifica"])){
    if($dbh->statoNotifica($_GET["codiceNotifica"]) == 0){
        $dbh->leggiNotifica($_GET["codiceNotifica"]);
    }
    //$notifyLink = $dbh->getNotificationLink($_GET["codiceNotifica"]);

    $templateParams["notifica"] = $dbh->getNotifica($_GET["codiceNotifica"]); 

    if($templateParams["notifica"][0]["titolo"]=="Acquisto completato"){  //notifica di acquisto allora vai in ordini
        header("location: archivio-Ordini.php");
    }
    else if($templateParams["notifica"][0]["titolo"]=="Ordine Spedito"){  
        header("location: archivio-Tracciamento.php");
    }
    else if(strpos($templateParams["notifica"][0]["titolo"], "Modifica") !== false){
        header("location: utente2.php");
    }
    else{
        header("location: archivio-notifiche.php");
    }
}
?>