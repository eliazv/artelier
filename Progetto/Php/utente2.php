

<?php
require_once 'bootstrap.php';

//var_dump($templateParams);
if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}
$templateParams["utente"] = $dbh->getUtente($_SESSION['email']);


if (isset($_POST['btnModifica'])) {
    
    $vecchiaPassword = $_POST['vecchiaPassword'];
    $nuovaPassword = $_POST['nuovaPassword'];
    $indirizzo = $_POST['indirizzo'];
    $citta = $_POST['citta'];
    $paese = $_POST['paese'];
    $cap = $_POST['cap'];

    if($indirizzo!=""){
        $dbh->updateIndirizzo($_SESSION['email'], $indirizzo);
        $dbh->insertNotifica("Modifica indirizzo", "Hai modificato le tue credenziali. Clicca qui per vedere i tuoi dati.","utente2.php",
        date("Y-m-d H:i:s"), 0, $_SESSION['email']);
    }
    if($paese!=""){
        $dbh->updatePaese($_SESSION['email'], $paese);
        $dbh->insertNotifica("Modifica paese", "Hai modificato le tue credenziali. Clicca qui per vedere i tuoi dati.","utente2.php",
        date("Y-m-d H:i:s"), 0, $_SESSION['email']);
    }
    if($citta!=""){
        $dbh->updateCitta($_SESSION['email'], $citta);
        $dbh->insertNotifica("Modifica citta", "Hai modificato le tue credenziali. Clicca qui per vedere i tuoi dati.","utente2.php",
        date("Y-m-d H:i:s"), 0, $_SESSION['email']);
    }

    if($cap!=""){
        $dbh->updateCap($_SESSION['email'], $cap);
        $dbh->insertNotifica("Modifica CAP", "Hai modificato le tue credenziali. Clicca qui per vedere i tuoi dati.","utente2.php",
        date("Y-m-d H:i:s"), 0, $_SESSION['email']);
    }
    if($vecchiaPassword!="" && $nuovaPassword!=""){
        //if($templateParams["utente"][0]["passwordd"] == $vecchiaPassword){
        if(password_verify($vecchiaPassword, $templateParams["utente"][0]["passwordd"])){
            $dbh->updatePassword($_SESSION['email'], password_hash($nuovaPassword, PASSWORD_DEFAULT));
            $dbh->insertNotifica("Modifica password", "Hai modificato le tue credenziali. Clicca qui per vedere i tuoi dati.","utente2.php",
                    date("Y-m-d H:i:s"), 0, $_SESSION['email']);
        }
        else{
            echo "Errore Password";
        }
        
    }
    header("Refresh:0");
    var_dump($templateParams["utente"][0]["passwordd"]); 
}
require 'template/utente.php';
?>

