
archivioinerimento
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
    
    $codQuadro = $dbh->getMaxCodQuadro()[0]["codQuadro"]+1;
            
    $dbh->insertQuadro($titolo, $immagine, $dimensione, $artista, $prezzo, $corrente, $descrizione,0, $codQuadro);

    $dbh->insertNotifica("Quadro inserito", "abbiamo aggiunto al nostro catalogo il nuovo articolo ". $titolo,
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

    if (isset($_POST['btnInserisciArtista'])) {
        //if( (! empty($_POST['titolo'])) &&  (! empty($_POST['artista'])) &&  (! empty($_POST['dimensione'])) && 
                        //(! empty($_POST['prezzo'])) && (! empty($_POST['immagineT'])) && (! empty($_POST['corrente'])) &&
                       // (! empty($_POST['descrizione']))){
    
                        $cognome = $_POST['cognome'];
                        $nome = $_POST['nome'];
                        $immagine = $_POST['immagineT'];
                        $descrizione = $_POST['descrizione'];
                        
    
                        
                               
                        $dbh->insertArtista($cognome, $nome, $immagine, $descrizione);   
                        
                        $dbh->insertNotifica("Artista inserito", "abbiamo aggiunto al nostro catalogo il nuovo artista ".$cognome . " ". "$nome",
                        date("Y-m-d H:i:s"), 0, $_SESSION['email']);
                        $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);

        }


        if (isset($_POST['btnInserisciCategoria'])) {
            //if( (! empty($_POST['titolo'])) &&  (! empty($_POST['artista'])) &&  (! empty($_POST['dimensione'])) && 
                            //(! empty($_POST['prezzo'])) && (! empty($_POST['immagineT'])) && (! empty($_POST['corrente'])) &&
                           // (! empty($_POST['descrizione']))){
        
                            $nome = $_POST['nome'];
                            $immagine = $_POST['immagineT'];
                            $descrizione = $_POST['descrizione'];
                            
                
                            $dbh->insertCategoria($nome, $immagine,$descrizione );       
                            $dbh->insertNotifica("Categoria inserita", "abbiamo aggiunto al nostro catalogo la nuova categoria ".$nome,
                            date("Y-m-d H:i:s"), 0, $_SESSION['email']);    
                            $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
            
            }




//var_dump($templateParams);
require 'template/inserimentoArticoli.php';
?>