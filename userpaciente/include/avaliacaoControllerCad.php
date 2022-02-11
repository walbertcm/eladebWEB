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
echo $idQuestao = $jsonA->idQuestao; 
$idpaciente = $jsonA->paciente;
$idavaliacao = $jsonA->avaliacao;
$resultado = $jsonA->resultado;
$grupoPontuacao  = $jsonA->grupoPontuacao;
//$avaliacaoRealizada = $jsonA->avaliacaoRealizada;
$etapa      = $jsonA->etapa;


//Condição para tratar o SQL e realizar o insert no banco de dados
if(!empty($idpaciente)){  
   
   $sqlA= "UPDATE `avaliacao` SET etapa='$etapa', resultado='$resultado', `grupopontuacao`= '$grupoPontuacao',`avaliacaoRealizada`= 1
   WHERE `idavaliacao` = '$idavaliacao' AND `idpaciente` = '$idpaciente' AND `id` = '$idQuestao'  ";
   
   //$sqlA = "INSERT INTO `avaliacao` (`id`, `idavaliacao`, `idcenario`, `idfisioterapeuta`, `idpaciente`, `etapa`, `numquestao`, `resultado`, `grupopontuacao`, `datahora`) 
   //VALUES (NULL, '$idavaliacao', '$idcenario', '$idfisioterapeuta', '$idpaciente', '$etapa', '$numQuestao', '$resultado', '$grupoPontuacao',current_timestamp());";

   $queryA = mysqli_query($conn, $sqlA);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php echo $idQuestao?>
</body>
</html>
