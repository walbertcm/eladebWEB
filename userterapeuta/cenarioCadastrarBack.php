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

$cenarioNome = $_POST['nomeCenario'];
$idPergunta = $_POST['perguntasArray'];

$idTerapeutaA =  $idTerapeuta;//"1";

function cadastrarCenario($cenarioNomeA, $terapeutaId){
    include('../controller/conexaoDataBaseV2.php');
    $sqlA = "INSERT INTO `cenario` ( `nomecenario`, `dtcadastro`, `idterapeuta`) VALUES ( '$cenarioNomeA', CURRENT_TIMESTAMP, '$terapeutaId');";
    $queryA=mysqli_query($conn,$sqlA);
}

function selecionarCenario($cenarioNomeA){
    include('../controller/conexaoDataBaseV2.php');
    $sqlB = "SELECT `idcenario`, `nomecenario`, `idterapeuta` FROM `cenario` WHERE `nomecenario` = '$cenarioNomeA';  ";
    $queryB=mysqli_query($conn,$sqlB);
    while($dado = mysqli_fetch_array($queryB)){
        $idcenarioX = $dado['idcenario'];
        return  $idcenarioX;
    }
}

function cadastrarPerguntasCenario($idCenarioA, $idQuestaoA, $nomeCenarioB){
    include('../controller/conexaoDataBaseV2.php');
    $sqlC = "INSERT INTO `cenarioPerguntas` ( `idcenario`, `idpergunta`, `nomecenario` ,`dataHora`) VALUES ( '$idCenarioA', '$idQuestaoA', '$nomeCenarioB',CURRENT_TIMESTAMP);";
    $queryC=mysqli_query($conn,$sqlC);
}
//Execucao das funções
cadastrarCenario($cenarioNome, $idTerapeutaA);

$cenarioId = selecionarCenario($cenarioNome);


foreach ($idPergunta as $idPerguntaA=>$value) {
    cadastrarPerguntasCenario($cenarioId, $value, $cenarioNome );
    header("Location: ../userterapeuta/cenarioExibir.php?");
    //echo "ID : ".$value."<br />";
}

?>