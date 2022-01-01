

<?php
require_once 'bootstrap.php';

//var_dump($templateParams);
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
$templateParams["utente"] = $dbh->getUtente($_SESSION['email']);


if (isset($_POST['btnModifica'])) {
    
    $password = $_POST['vecchiaPassword'];
    $nuovaPassword = $_POST['nuovaPassword'];
    $indirizzo = $_POST['indirizzo'];
    $paese = $_POST['paese'];
    $cap = $_POST['cap'];

    var_dump($password);
    if($indirizzo!=$templateParams["utente"][0]["indirizzo"]){
        $dbh->updateIndirizzo($_SESSION['email'], $indirizzo);
    }
    if($paese!=NULL){
        $dbh->updatePaese($_SESSION['email'], $paese);
    }

    if($cap!=NULL){
        $dbh->updateCap($_SESSION['email'], $cap);
    }
    if($password!=NULL && $nuovaPassword!=NULL ){
        if($templateParams["utente"][0]["passwordd"] == $password){
            $dbh->updatePassword($_SESSION['email'], $nuovaPassword);
        }
        else{
            echo "Errore Password";
        }
        
    }
}
require 'template/utente.php';
?>

