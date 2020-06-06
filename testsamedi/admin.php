<?php
 session_start();

 if(!isset($_SESSION["login"])|| $_SESSION['login']!==true){

    header("location:index.php");
 
 exit;
 }
// ON RECOMPOSE LE CODE HTML
// AVEC LES 3 FICHIERS PHP
require_once "php/view/header.php";
require_once "php/view/section-admin.php";
require_once "php/view/api-ajax.php";
require_once "php/view/footer.php";