<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";

//$templateParams["quadro"] = $dbh->getQuadroByTitolo("Guernica");

    //if( (! empty($_POST['titolo'])) &&  (! empty($_POST['artista'])) &&  (! empty($_POST['dimensione'])) && 
                    //(! empty($_POST['prezzo'])) && (! empty($_POST['immagineT'])) && (! empty($_POST['corrente'])) &&
                   // (! empty($_POST['descrizione']))){
                    
                    
                    if (isset($_POST['btnRegistra'])) {
                        if(empty($_POST['nome']) || empty($_POST['cognome']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['città']) || empty($_POST['indirizzo']) || empty($_POST['paese']) || empty($_POST['cap'])){
                            $templateParams["errore"] = "Errore! Non sono stati inseriti alcuni dati";
                        }
                        elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                            $templateParams["errore"] = "Errore! la mail non è giusta";
                        } elseif(!is_numeric($_POST["cap"])) {
                            $templateParams["errore"] = "Errore! hai inserito un CAP non valido";
                        } else {
                    
                    
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
                        
                    }




//var_dump($templateParams);
require 'template/registrazione-form.php';
?>