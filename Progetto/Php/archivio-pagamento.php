<?php
require_once 'bootstrap.php';


//Base Template
$templateParams["titolo"] = "ArtElier - Pagamento";
$templateParams["carrello"] = $dbh->getCarrello($_SESSION["email"]); //prendi email utente loggato 

//compra intero carrello
if (isset($_POST["btnConfPaym"]) && $_SESSION["bnquadro"] == NULL ) {
     $dataConsegna = date("Y-m-d H:i:s");
     //$totPaziale=(($templateParams["quadro"][0]["prezzo"]) * ($carrello["quantita"]));   //SERVE??
     $dbh->insertOrder($_SESSION["email"], date("Y-m-d H:i:s"), date("Y-m-d 10:00:00", strtotime($dataConsegna. ' + 7 days')),
           0, $_SESSION["somma"]);
     $templateParams["lastorder"] = $dbh->getLastOrder($_SESSION["email"]);

     $lastOrder = $templateParams["lastorder"][0]["codOrdine"];

     foreach($templateParams["carrello"] as $carrello){
          $dbh->insertOrderedPainting($lastOrder, $carrello["titolo"], $carrello["quantita"]);     
     }

     $dbh->deleteCart($_SESSION["email"]);

     $dbh->decreaseQuantità($carrello["quantita"], $carrello["titolo"]);

     if($dbh->getQuadroByTitolo($carrello["titolo"])[0]["quantità"] <= 0){
          foreach($dbh->getAdmins() as $admin){
               $dbh->insertNotifica("".$carrello["titolo"]." è Sold Out", 
               "Il quadro \"".$carrello["titolo"]."\" è terminato, tornerà disponibile prossimamente. Clicca qui per vedere altre opere.",
               "archivio-quadri.php", date("Y-m-d H:i:s"), 0, $admin["email"]);
          }
     }

     $dbh->insertNotifica("Acquisto  #$lastOrder completato", "Transazione autorizzata. L'acquisto relativo all'ordine # $lastOrder  è stato completato. 
     Clicca qui per tracciare il tuo pacco.","archivio-Ordini.php",
     date("Y-m-d H:i:s"), 0, $_SESSION['email']);

     mail("zavattaelia@gmail.com","Ordine confermato","Il tuo ordine è stato confermato");//non funziona 
     
     header("location: ./archivio-ordini.php");   

}

//Compra ora
if(isset($_POST["btnConfPaym"]) && $_SESSION["bnquadro"] != NULL ){
     $prezzotot=$_SESSION["bnprezzo"] * $_SESSION["bnquantita"];
     $dataConsegna = date("Y-m-d H:i:s");
     $dbh->insertOrder($_SESSION["email"], date("Y-m-d H:i:s"), date("Y-m-d 10:00:00", strtotime($dataConsegna. ' + 7 days')), 
          0, $prezzotot);

     $templateParams["lastorder"] = $dbh->getLastOrder($_SESSION["email"]);

     $lastOrder = $templateParams["lastorder"][0]["codOrdine"]; 
     
     $dbh->insertOrderedPainting($lastOrder, $_SESSION["bnquadro"], $_SESSION["bnquantita"]);   
     
     $dbh->decreaseQuantità($_SESSION["bnquantita"], $_SESSION["bnquadro"]);

     if($dbh->getQuadroByTitolo($_SESSION["bnquadro"])[0]["quantità"] <= 0){
          foreach($dbh->getAdmins() as $admin){
               $dbh->insertNotifica("".$_SESSION["bnquadro"]." è Sold Out", 
               "Il quadro \"".$_SESSION["bnquadro"]."\" è terminato, tornerà disponibile prossimamente. Clicca qui per vedere altre opere.",
               "archivio-quadri.php", date("Y-m-d H:i:s"), 0, $admin["email"]);
          }
     }

     //cancello variabili
     $_SESSION["bnquadro"]=NULL;
     $_SESSION["bnquantita"]=NULL;
     $_SESSION["bnprezzo"]=NULL;


     $dbh->insertNotifica("Acquisto #$lastOrder completato", "L'acquisto relativo all'ordine # $lastOrder è stato completato. 
     Clicca qui per tracciare il tuo pacco.","archivio-Ordini.php",
     date("Y-m-d H:i:s"), 0, $_SESSION['email']);
     
     header("location: ./archivio-ordini.php");   
  
}


//var_dump($_GET);
require 'template/pagamento.php';
?>