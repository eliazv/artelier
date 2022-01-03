<?php
require_once 'bootstrap.php';

//Base Template
//$templateParams["titolo"] = "ArtElier - Articolo";
$templateParams["quadroSpecifico"] = $dbh->getQuadroByTitolo($_GET["titoloq"]);
$templateParams["notifiche"] = $dbh->countNotifiche($_SESSION['email']);

/*
if (isset($_POST["btnAggCarrello"])) {
    $titolo2 = $_POST['titolo'];
    //if(gia presente) -> aumenta quantita

    $dbh->insertInCarrello($email, $titolo2, $quantita);
   
}
//$dbh->insertInCarrello("elia@ciao.com","Incubo",1);


if (isset($_POST["btnBuyNow"])) {

    $dbh->insertInCarrello("elia@ciao.com","Incubo",1);//$email, $titolo, $quantita);
   
}
*/
require 'template/articolo.php';
?>