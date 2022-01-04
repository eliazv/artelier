<?php
require_once 'bootstrap.php';

if(isset($_POST["email"]) && isset($_POST["password"])){

    $login_result = $dbh->getUtente($_POST["email"]);
    if(count($login_result)!=0 && password_verify($_POST["password"], $login_result[0]["passwordd"])){

        registerLoggedUser($login_result[0]);
    }
    else{
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
        
    }
}

if(isUserLoggedIn()){
    $templateParams["titolo"] = "ArtElier";
    $templateParams["nome"] = "home2.php";
    header("location: home2.php");  
}
else{
    $templateParams["titolo"] = "ArtElier - Login";
    $templateParams["nome"] = "login-form.php";
    require 'template/login-form.php';
}


?>