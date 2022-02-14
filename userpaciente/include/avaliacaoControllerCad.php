<?php
header("Content-Type: application/json; charset=UTF-8");
include('../../controller/conexaoDataBaseV2.php');

//Variaveis
$idavaliacao = 99;
$idcenario = 99;
$idpaciente = 99;
$idfisioterapeuta = 99;
$etapa = 99;
$numQuestao = 99;
$resultado = 99;
$grupoPontuacao=99;

$jsonA =  json_decode($_POST['questao'], false);
//$idterapeuta = $jsonA->terapeuta;
$idQuestao = $jsonA->idQuestao; 
$idpaciente = $jsonA->paciente;
$idavaliacao = $jsonA->avaliacao;
$resultado = $jsonA->resultado;
$grupoPontuacao  = $jsonA->grupoPontuacao;
//$avaliacaoRealizada = $jsonA->avaliacaoRealizada;
$etapa      = $jsonA->etapa;

//Condição para tratar o SQL e realizar o insert no banco de dados
if(!empty($idpaciente)){  
   
   $sqlA= "UPDATE `avaliacao` SET etapa='$etapa', resultado='$resultado', `grupopontuacao`= '$grupoPontuacao',`avaliacaoRealizada`= 1 WHERE `idavaliacao` = '$idavaliacao' AND `idpaciente` = '$idpaciente' AND `id` = '$idQuestao'  ";
   
   $queryA = mysqli_query($conn, $sqlA);
}

?>