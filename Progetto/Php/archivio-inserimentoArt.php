<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
//$templateParams["quadro"] = $dbh->getQuadroByTitolo("Guernica");

if (isset($_POST['btnInserisciQuadro'])) {
    //if( (! empty($_POST['titolo'])) &&  (! empty($_POST['artista'])) &&  (! empty($_POST['dimensione'])) && 
                    //(! empty($_POST['prezzo'])) && (! empty($_POST['immagineT'])) && (! empty($_POST['corrente'])) &&
                   // (! empty($_POST['descrizione']))){

                    $titolo = $_POST['titolo'];
                    $artista = $_POST['artista'];
                    $dimensione = $_POST['dimensione'];
                    $prezzo = $_POST['prezzo'];
                    $corrente = $_POST['corrente'];
                    $descrizione = $_POST['descrizione'];
                    $immagine = $_POST['immagineT'];

                    
                           
                    $dbh->insertQuadro($titolo, $immagine, $dimensione, $artista, $prezzo, $corrente, $descrizione);

                    $dbh->insertNotifica("Nuovo Articolo disponibile", "abbiamo aggiunto al nostro catalogo un nuovo articolo, dacci un'occhiata",
                    date("Y-m-d H:i:s"), 0, "elia@ciao.com");
                   
    }

    if (isset($_POST['btnInserisciArtista'])) {
        //if( (! empty($_POST['titolo'])) &&  (! empty($_POST['artista'])) &&  (! empty($_POST['dimensione'])) && 
                        //(! empty($_POST['prezzo'])) && (! empty($_POST['immagineT'])) && (! empty($_POST['corrente'])) &&
                       // (! empty($_POST['descrizione']))){
    
                        $cognome = $_POST['cognome'];
                        $nome = $_POST['nome'];
                        $immagine = $_POST['immagineT'];
                        $descrizione = $_POST['descrizione'];
                        
    
                        
                               
                        $dbh->insertArtista($cognome, $nome, $immagine, $descrizione);                       
        }


        if (isset($_POST['btnInserisciCategoria'])) {
            //if( (! empty($_POST['titolo'])) &&  (! empty($_POST['artista'])) &&  (! empty($_POST['dimensione'])) && 
                            //(! empty($_POST['prezzo'])) && (! empty($_POST['immagineT'])) && (! empty($_POST['corrente'])) &&
                           // (! empty($_POST['descrizione']))){
        
                            $nome = $_POST['nome'];
                            $immagine = $_POST['immagineT'];
                            $descrizione = $_POST['descrizione'];
                            
                
                            $dbh->insertCategoria($nome, $immagine,$descrizione );                       
            }




//var_dump($templateParams);
require 'template/inserimentoArticoli.php';
?>