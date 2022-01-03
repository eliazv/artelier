<?php
require_once 'bootstrap.php';


//Base Template
$templateParams["titolo"] = "ArtElier - Pagamento";
$templateParams["carrello"] = $dbh->getCarrello($_SESSION["email"]); //prendi email utente loggato 


//svuota carrello e fai l'ordine
if (isset($_POST["btnConfPaym"])) {
          $dbh->insertOrder($_SESSION["email"], date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), 0);   
          $templateParams["lastorder"] = $dbh->getLastOrder($_SESSION["email"]);

          $lastOrder = $templateParams["lastorder"][0]["codOrdine"];

          foreach($templateParams["carrello"] as $carrello){        
               $dbh->insertOrderedPainting($lastOrder, $carrello["titolo"], $carrello["quantita"]);     
          }

          $dbh->deleteCart($_SESSION["email"]);
          header("location: ./archivio-ordini.php");   

}


//var_dump($_GET);
require 'template/pagamento.php';
?>