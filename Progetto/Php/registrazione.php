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
                        $password = $_POST['password'];
                        
                        $indirizzo = $_POST['indirizzo'];
                        $paese = $_POST['paese'];
                        $cap = $_POST['cap'];

                        
                               
                        $dbh->insertUser($email, $password, $nome, $cognome, $indirizzo, $paese, $cap);
                       
                    
                    }




//var_dump($templateParams);
require 'template/registrazione-form.php';
?>