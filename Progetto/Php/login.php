<?php
require_once 'bootstrap.php';

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    $templateParams["titolo"] = "ArtElier";
    $templateParams["nome"] = "home2.php";
    require 'home2.php';
}
else{
    $templateParams["titolo"] = "ArtElier - Login";
    $templateParams["nome"] = "login-form.php";
    require 'template/login-form.php';
}


?>