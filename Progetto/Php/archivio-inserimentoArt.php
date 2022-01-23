<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
//$templateParams["quadro"] = $dbh->getQuadroByTitolo("Guernica");
//$templateParams['utente'] = $_SESSION['email'];
if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}

if (isset($_POST['btnInserisciQuadro'])) {
    if( empty($_POST['titolo']) ||   empty($_POST['artista']) ||  empty($_POST['dimensione']) || empty($_POST['prezzo']) || empty($_POST['immagineT']) || empty($_POST['corrente']) || empty($_POST['descrizione'])){
        $templateParams["erroreQuadri"] = "Errore nell'inserimento per i dati di un quadro!";
    } else {

    $titolo = $_POST['titolo'];
    $artista = $_POST['artista'];
    $dimensione = $_POST['dimensione'];
    $prezzo = $_POST['prezzo'];
    $corrente = $_POST['corrente'];
    $quantita = $_POST['quantita'];
    $immagine = $_POST['immagineT'];  
    
    $codQuadro = $dbh->getMaxCodQuadro()[0]["codQuadro"]+1;
            
    $dbh->insertQuadro($titolo, $immagine, $dimensione, $artista, $prezzo, $corrente, $quantita,0, $codQuadro);

    $dbh->insertNotifica("Quadro inserito", "abbiamo aggiunto al nostro catalogo il nuovo articolo ". $titolo, "archivio-articolo.php?titoloq=$titolo",
    date("Y-m-d H:i:s"), 0, $_SESSION['email']);
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);


    $output .= '
        <div class="alert alert_default">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p><strong>"Quadro Inserito con Successo!"</strong><br>
            
        </div>
        ';

    echo $output;
    }        
}

    if (isset($_POST['btnInserisciArtista'])) {
        if( empty($_POST['nome']) || empty($_POST['cognome']) || empty($_POST['immagineT']) || empty($_POST['descrizione'])){
            $templateParams["erroreArtista"] = "Errore nell'inserimento per i dati di un artista!";
        } else {
    
                        $cognome = $_POST['cognome'];
                        $nome = $_POST['nome'];
                        $immagine = $_POST['immagineT'];
                        $descrizione = $_POST['descrizione'];
                        
    
                        
                               
                        $dbh->insertArtista($cognome, $nome, $immagine, $descrizione);   
                        
                        $dbh->insertNotifica("Artista inserito", "abbiamo aggiunto al nostro catalogo il nuovo artista ".$cognome . " ". "$nome", "archivio-artistaSpecifico.php?artistaA=$cognome",
                        date("Y-m-d H:i:s"), 0, $_SESSION['email']);
                        $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);

        }
    }

        if (isset($_POST['btnInserisciCategoria'])) {
            if(empty($_POST['nome']) || empty($_POST['immagineT']) || empty($_POST['descrizione'])){
                $templateParams["erroreCategoria"] = "Errore nell'inserimento per i dati di una categoria!";
            } else {
        
                            $nome = $_POST['nome'];
                            $immagine = $_POST['immagineT'];
                            $descrizione = $_POST['descrizione'];
                            
                
                            $dbh->insertCategoria($nome, $immagine,$descrizione );       
                            $dbh->insertNotifica("Categoria inserita", "abbiamo aggiunto al nostro catalogo la nuova categoria ".$nome, "archivio-CategoriaSpecifica.php?nomec=$nome",
                            date("Y-m-d H:i:s"), 0, $_SESSION['email']);    
                            $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
            
            }
        }



//var_dump($templateParams);
require 'template/inserimentoArticoli.php';
?>