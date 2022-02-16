<?php
/*
Background para processamento da avaliação do paciente.
Recebe o identificador do cenário
Recebe o identicador do paciente
A partir do identificador do cenário, seleciona-se o conjunto de perguntas
Insere na tabela avaliação o conjunto de perguntas para o paciente em questão
OBS- A avaliação somente é construida para o NivelA - os outros niveis serão construidos dinamicamente
durante a avaliação.
*/

//Metodo para iniciar a sessao
    session_start();

//Avalia se a sessao tem valores, foi definida, caso nao retorna o user para o login
    if(!isset($_SESSION["emailUsuario"]) AND !isset($_SESSION["idUsuarioLogin"]) AND !isset($_SESSION["idTerapeuta"])){
        header("Location: ../index.html");
        die();
    }else{
        $emailUsuario   = $_SESSION["emailUsuario"];
        $idUsuarioLogin = $_SESSION["idUsuarioLogin"];
        $idTerapeuta    = $_SESSION["idTerapeuta"];
    }

        $idCenario  = $_GET['idcen']; //Id do cenário
        $idPaciente = $_GET['idpc'];  //Id do Paciente

//Calcula o identificador para a nova avaliação do paciente em questão
    function calculaIdAvaliacao($idPacienteX){
        include('../controller/conexaoDataBaseV2.php');
        $sqlX = "SELECT MAX(`idavaliacao`) as idAvaliacao FROM `avaliacao` WHERE `idpaciente` = $idPacienteX";
        $queryX=mysqli_query($conn,$sqlX);
        while($dadoX = mysqli_fetch_array($queryX)){
            $novoIdAvaliacaoX = $dadoX['idAvaliacao'];
            return  ($novoIdAvaliacaoX + 1);
        }
    }

    //Identificado para a nova avaliação, usando a função
    $novoIdAvaliacaoY = calculaIdAvaliacao($idPaciente);
/*
O terapeuta associa um cenário a um paciente
O sistema obrigatoriamente gera o cenário para o nivel A e o nivel C
estes sao obrigatorios
O nivel B e o nivel D são relativos as respostas de A e C
*/ 

//Insere a nova avaliação nivel A
    function insereAvaliacaoNivelA($idAvaliacaoA, $idCenarioA, $idTerapeutaA, $idPacienteA, $numQuestaoA){
        include('../controller/conexaoDataBaseV2.php');
        $sqlA = "INSERT INTO `avaliacao`(`idavaliacao`, `idcenario`, `idterapeuta`, `idpaciente`, `etapa`, `numquestao`, `resultado`, `avaliacaoRealizada`) VALUES ('$idAvaliacaoA','$idCenarioA','$idTerapeutaA','$idPacienteA',1,'$numQuestaoA',0,0)  ";
        $queryA=mysqli_query($conn,$sqlA);
    }

//Insere a nova avaliação nivel C
function insereAvaliacaoNivelC($idAvaliacaoC, $idCenarioC, $idTerapeutaC, $idPacienteC, $numQuestaoC){
    include('../controller/conexaoDataBaseV2.php');
    $sqlC = "INSERT INTO `avaliacao`(`idavaliacao`, `idcenario`, `idterapeuta`, `idpaciente`, `etapa`, `numquestao`, `resultado`, `avaliacaoRealizada`) VALUES ('$idAvaliacaoC','$idCenarioC','$idTerapeutaC','$idPacienteC',3,'$numQuestaoC',0,0)  ";
    $queryC=mysqli_query($conn,$sqlC);
}

//Processamento para construção da avaliação
    include('../controller/conexaoDataBaseV2.php');
    //Seleciona as perguntas do cenario
    $sqlB = "SELECT `idcenario`,`idpergunta` FROM `cenarioPerguntas` WHERE `idcenario` = $idCenario;  ";
    $queryB=mysqli_query($conn,$sqlB);
    while($dadoB = mysqli_fetch_array($queryB)){
        $idperguntaX = $dadoB['idpergunta'];
        //Insere as perguntas do cenario na avaliação do paciente
        insereAvaliacaoNivelA($novoIdAvaliacaoY, $idCenario, $idTerapeuta, $idPaciente, $idperguntaX);
        insereAvaliacaoNivelC($novoIdAvaliacaoY, $idCenario, $idTerapeuta, $idPaciente, $idperguntaX);
    }

//Retorna para a pagina principal do terapeuta
    header("Location: ../userterapeuta/principalterapeuta.php?");
?>