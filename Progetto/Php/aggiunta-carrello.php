<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);
$email = $_SESSION["email"];
$quantita = $_POST['quantita'];
$titolo = $templateParams["quadroSpecifico"][0]["titolo"];
$prezzo = $templateParams["quadroSpecifico"][0]["prezzo"];
$quantitaDisp = $templateParams["quadroSpecifico"][0]["quantita"];
$templateParams["quantitaPrecedente"]= $dbh->getQuadroInCarrello($email, $titolo);
$qprecedente=$templateParams["quantitaPrecedente"][0]["quantita"];

if(isset($_SESSION['email'])){
    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);
    $templateParams["elemCarrello"]= $dbh->getNumberOfPortrait($_SESSION['email']);
}

//se gia presente aumenta quantità
if (isset($_POST["btnAggCarrello"])) {

    //se esaurita la quantità 
    if($quantitaDisp < $quantita || $quantitaDisp < ($qprecedente + $quantita)){
        //errore quantità
        $_SESSION["errQuantita"]="Quantità non disponibile.";
        header("location: ./archivio-articolo.php?titoloq=$titolo"); 
    }
    //aggiunge alla quantità precedente DA TESTARE
    else if($qprecedente != NULL || $qprecedente != 0){
        $qprecedente = $qprecedente + $quantita;
        $dbh->updateQuantitaInCarrello($email, $titolo, $qprecedente);
        header("location: ./archivio-carrello.php"); 

    }
    //altrimenti inserisci
    else{
        $dbh->insertInCarrello($email, $titolo, $quantita);
        header("location: ./archivio-carrello.php"); 

    }
}

if (isset($_POST["btnBuyNow"])) {

    if($quantitaDisp < $quantita){
        $_SESSION["errQuantita"]="Quantità non disponibile.";
        header("location: ./archivio-articolo.php?titoloq=$titolo"); 
    }    
    else{
        $_SESSION["bnquadro"]=$titolo;
        $_SESSION["bnquantita"]=$quantita;
        $_SESSION["bnprezzo"]=$prezzo;
    
        header("location: ./archivio-pagamento.php");  
    }
    
}
    
?>