<?php
header("Content-Type: application/json; charset=UTF-8");
require_once('../controller/dataBaseController.php');

//Variaveis
$idavaliacao = 1;
$idcenario = 1;
$idpaciente = 1;//$_POST["countryId"];
$idfisioterapeuta = 1;
$etapa = 99;
$numQuestao = 99;
$resultado = 99;

$jsonA =  json_decode($_POST['x'], false);
//$etapa = $jsonA->nq;
$numQuestao = $jsonA->nq; 
$resultado  = $jsonA->status;
$etapa      = $jsonA->etapa;

//Instancia do banco de dados
$db_handle = new DBController();

//Condição para tratar o SQL e realizar o insert no banco de dados
if(!empty($idpaciente)){  
   $sqlA = "INSERT INTO `avaliacao` (`id`, `idavaliacao`, `idcenario`, `idfisioterapeuta`, `idpaciente`, `etapa`, `numquestao`, `resultado`, `datahora`) 
   VALUES (NULL, '$idavaliacao', '$idcenario', '$idfisioterapeuta', '$idpaciente', '$etapa', '$numQuestao', '$resultado', current_timestamp());";

   $results = $db_handle->runQuerySingle($sqlA);
}
