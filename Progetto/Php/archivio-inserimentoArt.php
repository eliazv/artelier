<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
//$templateParams["quadro"] = $dbh->getQuadroByTitolo("Guernica");

if (isset($_POST['btnInserisci'])) {
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

                        $templateParams["inserimentoQuadro"] = $dbh->insertQuadro($titolo, $immagine, $dimensione, $artista,
                                                    $prezzo, $corrente, $descrizione);
                    }
               // }




//var_dump($templateParams);
require 'template/inserimentoArticoli.php';
?>