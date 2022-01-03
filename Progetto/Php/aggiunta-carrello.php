<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);

$email = $_SESSION["email"];
  
$quantità = $_POST['quantità'];
       
$titolo = $templateParams["quadroSpecifico"][0]["titolo"];


    //if(gia presente) -> aumenta quantita
    if (isset($_POST["btnAggCarrello"])) {
        $dbh->insertInCarrello($email, $titolo, 1);
    }
    //require "archivio-quadri.php"//da modificare
    var_dump($email);

    var_dump($quantità);
    var_dump($titolo);

?>