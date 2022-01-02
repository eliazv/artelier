

<?php
require_once 'bootstrap.php';

//var_dump($templateParams);
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
$templateParams["utente"] = $dbh->getUtente($_SESSION['email']);


if (isset($_POST['btnModifica'])) {
    
    $vecchiaPassword = $_POST['vecchiaPassword'];
    $nuovaPassword = $_POST['nuovaPassword'];
    $indirizzo = $_POST['indirizzo'];
    $paese = $_POST['paese'];
    $cap = $_POST['cap'];

    if($indirizzo!=""){
        $dbh->updateIndirizzo($_SESSION['email'], $indirizzo);
    }
    if($paese!=""){
        $dbh->updatePaese($_SESSION['email'], $paese);
    }

    if($cap!=""){
        $dbh->updateCap($_SESSION['email'], $cap);
    }
    if($vecchiaPassword!="" && $nuovaPassword!=""){
        if($templateParams["utente"][0]["passwordd"] == $vecchiaPassword){
            $dbh->updatePassword($_SESSION['email'], $nuovaPassword);
        }
        else{
            echo "Errore Password";
        }
        
    }
}
require 'template/utente.php';
?>

