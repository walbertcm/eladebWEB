<?php
header("Content-Type: application/json; charset=UTF-8");
require_once('../controller/dataBaseController.php');

//Variaveis
$idavaliacao = 99;
$idcenario = 1;
$idpaciente = 99;
$idfisioterapeuta = 99;
$etapa = 99;
$numQuestao = 99;
$resultado = 99;

$jsonA =  json_decode($_POST['x'], false);
$idfisioterapeuta = $jsonA->fisioterapeuta;
$idavaliacao = $jsonA->avaliacao;
$idpaciente = $jsonA->paciente;
$numQuestao = $jsonA->nq; 
$resultado  = $jsonA->status;
$etapa      = $jsonA->etapa;
$grupoPontuacao = $jsonA->gp;

//Instancia do banco de dados
$db_handle = new DBController();

//Condição para tratar o SQL e realizar o insert no banco de dados
if(!empty($idpaciente)){  
   $sqlA = "INSERT INTO `avaliacao` (`id`, `idavaliacao`, `idcenario`, `idfisioterapeuta`, `idpaciente`, `etapa`, `numquestao`, `resultado`, `grupopontuacao`, `datahora`) 
   VALUES (NULL, '$idavaliacao', '$idcenario', '$idfisioterapeuta', '$idpaciente', '$etapa', '$numQuestao', '$resultado', '$grupoPontuacao',current_timestamp());";

   $results = $db_handle->runQuerySingle($sqlA);
}
