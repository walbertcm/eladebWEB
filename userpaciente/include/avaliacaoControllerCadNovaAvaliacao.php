<?php
    header("Content-Type: application/json; charset=UTF-8");

//Classe para conexão com o DB
    include('../../controller/conexaoDataBaseV2.php');

//Variaveis
    $idAvaliacao         = 99;
    $idCenario           = 99;
    $idTerapeuta         = 99;
    $idPaciente          = 99;
    $etapa               = 99;
    $numquestao          = 99;
    $resultado           = 99;
    $grupoPontuacao      = 99;
    $avaliacaoRealizada  = 99;

//Arquivo Json chega e é tratado para referenciar as variaveis
$jsonAavaliacao =  json_decode($_POST['novaQuestao'], false);

//Atribuição das variaveis->json
    $idAvaliacao         = $jsonAavaliacao->idAvaliacao;
    $idCenario           = $jsonAavaliacao->idCenario;
    $idTerapeuta         = $jsonAavaliacao->idTerapeuta;
    $idPaciente          = $jsonAavaliacao->idPaciente;
    $etapa               = $jsonAavaliacao->etapa;
    $numquestao          = $jsonAavaliacao->numquestao;
    $resultado           = $jsonAavaliacao->resultado;
    $grupoPontuacao      = $jsonAavaliacao->grupoPontuacao;
    $avaliacaoRealizada  = $jsonAavaliacao->avaliacaoRealizada;

//Insert no banco de dados -> ELADEB>Avaliação
if(!empty($idPaciente)){  
   $sqlA= "INSERT INTO `avaliacao`(`idavaliacao`, `idcenario`, `idterapeuta`, `idpaciente`, `etapa`, `numquestao`, `resultado`, `grupopontuacao`, `datahora`, `avaliacaoRealizada`) VALUES ('$idAvaliacao ','$idCenario','$idTerapeuta','$idPaciente','$etapa','$numquestao','$resultado','$grupoPontuacao',CURRENT_TIMESTAMP,'$avaliacaoRealizada')";
   $queryA = mysqli_query($conn, $sqlA);
}

?>