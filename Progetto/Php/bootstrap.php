<?php
session_start();
define("UPLOAD_DIR", "../Immagini/");
require_once("utils/function.php");
require_once("database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "artelier",3306);
?>
