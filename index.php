<?php
if($_GET)
{
    $metodo = $_GET["metodo"];
    $controle = $_GET["controle"];
    
    require_once "controllers/" . $controle .".class.php";
    $obj = new $controle();
    $obj->$metodo();
    //estamos dizendo quem é o controle e quem é o metodo que usuario quer entrar

     
}
else{

    require_once "controllers/inicioController.class.php";
    $obj = new inicioController();
    $obj->inicio();
}