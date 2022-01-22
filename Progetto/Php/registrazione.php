<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
//$templateParams["quadro"] = $dbh->getQuadroByTitolo("Guernica");

    //if( (! empty($_POST['titolo'])) &&  (! empty($_POST['artista'])) &&  (! empty($_POST['dimensione'])) && 
                    //(! empty($_POST['prezzo'])) && (! empty($_POST['immagineT'])) && (! empty($_POST['corrente'])) &&
                   // (! empty($_POST['descrizione']))){
                    if (isset($_POST['btnRegistra'])) {

                        $nome = $_POST['nome'];
                        $cognome = $_POST['cognome'];
                        $email = $_POST["email"];
                        $venditore = 0;
                        
                        //$hash = hash('sha256',  $_POST['password']);
                        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

                        $città = $_POST['città'];
                        $indirizzo = $_POST['indirizzo'];
                        $paese = $_POST['paese'];
                        $cap = $_POST['cap'];

                        
                               
                        $dbh->insertUser($email, $hash, $nome, $cognome, $venditore, $indirizzo, $città, $paese, $cap); 
                        
                        if($dbh->getUtente($email) != NULL){
                            $dbh->insertNotifica("Benvenuto in ArtElier.", "Grazie per aver scelto il nostro sito, buona navigazione.". $titolo,"home2.php",
                            date("Y-m-d H:i:s"), 0, $email);
                           
                            $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
                            
                            header("location: ./login.php");                           
                        }
                            
                        
                    }




//var_dump($templateParams);
require 'template/registrazione-form.php';
?>