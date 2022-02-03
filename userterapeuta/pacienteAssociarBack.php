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

$idCenario = $_GET['idcen'];
$idPaciente = $_GET['idpc'];

//Calcula o id da Avaliação
function calculaIdAvaliacao($idPacienteA){
    include('../controller/conexaoDataBaseV2.php');
    $sqlC = "SELECT MAX(`idavaliacao`) as idAvaliacao FROM `avaliacao` WHERE `idpaciente` = $idPacienteA";
    $queryC=mysqli_query($conn,$sqlC);
    while($dadoC = mysqli_fetch_array($queryC)){
        $idAvaliacaoX = $dadoC['idAvaliacao'];
        return  ($idAvaliacaoX + 1);
    }
}

//Constroi avaliação
function insereAvaliação($idAvaliacaoA, $idCenarioA, $idTerapeutaA, $idPacienteA, $numQuestaoA){
    include('../controller/conexaoDataBaseV2.php');
    $sqlD = "INSERT INTO `avaliacao`(`idavaliacao`, `idcenario`, `idterapeuta`, `idpaciente`, `etapa`, `numquestao`, `resultado`, `avaliacaoRealizada`) VALUES 
    ('$idAvaliacaoA','$idCenarioA','$idTerapeutaA','$idPacienteA',1,'$numQuestaoA',0,0)  ";
    $queryD=mysqli_query($conn,$sqlD);
}

//Seleciona as perguntas do cenario
//function selecionaPerguntasCenario($idCenarioA){}

include('../controller/conexaoDataBaseV2.php');

$idAvaliacaoY = calculaIdAvaliacao($idPaciente);

$sqlB = "SELECT `idcenario`,`idpergunta` FROM `cenarioPerguntas` WHERE `idcenario` = $idCenario;  ";

$queryB=mysqli_query($conn,$sqlB);

while($dadoB = mysqli_fetch_array($queryB)){
    $idperguntaX = $dadoB['idpergunta'];
    insereAvaliação($idAvaliacaoY, $idCenario, $idTerapeuta, $idPaciente, $idperguntaX);
}
header("Location: ../userterapeuta/principalterapeuta.php?");
?>