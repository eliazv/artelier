<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);

if (isset($_POST["btnAggCarrello"])) {

    //if(gia presente) -> aumenta quantita

    $email= $_SESSION["email"];
    $titolo = $templateParams["quadroSpecifico"][0]["titolo"];
    $quantita = $_POST['quantita'];
    

    
           
    $dbh->insertInCarrello($email, $titolo, $quantita);
   
}
var_dump($_GET);
require 'template/articolo.php';
?>