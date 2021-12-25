<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["artistaSpecifico"] = $dbh->getQuadriByArtista("Van Gogh");

//var_dump($templateParams);
require 'template/artistaSpecifico.php';
?>