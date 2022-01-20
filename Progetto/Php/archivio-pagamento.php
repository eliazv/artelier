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

     $dbh->insertNotifica("Acquisto completato", "L'acquisto relativo all'ordine # $lastOrder  è stato completato. 
     Clicca qui per tracciare il tuo pacco.",
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
     
     //cancello variabili
     $_SESSION["bnquadro"]=NULL;
     $_SESSION["bnquantita"]=NULL;
     $_SESSION["bnprezzo"]=NULL;


     $dbh->insertNotifica("Acquisto completato", "L'acquisto relativo all'ordine # $lastOrder è stato completato. 
     Clicca qui per tracciare il tuo pacco.",
     date("Y-m-d H:i:s"), 0, $_SESSION['email']);
     
     header("location: ./archivio-ordini.php");   
  
}


//var_dump($_GET);
require 'template/pagamento.php';
?>