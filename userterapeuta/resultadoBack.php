<?php
//Metodo para iniciar a sessao
session_start();
//Avalia se a sessao tem valores, foi definida, caso nao retorna o user para o login
if(!isset($_SESSION["emailUsuario"]) AND !isset($_SESSION["idUsuarioLogin"]) AND !isset($_SESSION["idTerapeuta"])){
    header("Location: ../index.html");
    die();
}else{
    $emailUsuario = $_SESSION["emailUsuario"];
    $idUsuarioLogin = $_SESSION["idUsuarioLogin"];
    $idTerapeuta = $_SESSION["idTerapeuta"];
}

include('../controller/conexaoDataBaseV2.php');

$idterapeuta = $_GET["idt"];
$idpaciente = $_GET["idpc"];
$idavaliacao = $_GET["idav"];

$tipoAjuda = $_GET["idtaju"];
$configAjuda = $_GET["idconfAju"];

//$cenarioNome = $_POST['nomeCenario'];
//$idPergunta = $_POST['perguntasArray'];

/* function updateAvaliacao($idpaciente,$idAvaliacao,$resultadoAvaliacao){
    include('../controller/conexaoDataBaseV2.php');
    $sqlB = "SELECT `idcenario`, `nomecenario`, `idterapeuta` FROM `cenario` WHERE `nomecenario` = '$cenarioNomeA';  ";
    $queryB=mysqli_query($conn,$sqlB);
    while($dado = mysqli_fetch_array($queryB)){
        $idcenarioX = $dado['idcenario'];
        return  $idcenarioX;
    } */



?>