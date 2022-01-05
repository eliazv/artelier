<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);
if(isset($_SESSION['email'])){

    $templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);

    $email = $_SESSION["email"];
}

  
//$quantita = $_POST['quantita'];
       
$titolo = $templateParams["quadroSpecifico"][0]["titolo"];

require 'template/articolo.php';
?>