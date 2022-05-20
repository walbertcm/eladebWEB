<?php
//Metodo para iniciar a sessao
session_start();
include('../controller/conexaoDataBaseV2.php');

$idterapeuta = $_GET["idt"];
$idpaciente = $_GET["idpc"];
$idavaliacao = $_GET["idav"];

$t1 = $_POST["tipoAjudaF1"];
$c1 = $_POST["configAjudaG1"];

$t2 = $_POST["tipoAjudaF2"];
$c2 = $_POST["configAjudaG2"];

$t3 = $_POST["tipoAjudaF3"];
$c3 = $_POST["configAjudaG3"];

$t4 = $_POST["tipoAjudaF4"];
$c4 = $_POST["configAjudaG4"];

$t5 = $_POST["tipoAjudaF5"];
$c5 = $_POST["configAjudaG5"];

$t6 = $_POST["tipoAjudaF6"];
$c6 = $_POST["configAjudaG6"];

$t7 = $_POST["tipoAjudaF7"];
$c7 = $_POST["configAjudaG7"];

$t8 = $_POST["tipoAjudaF8"];
$c8 = $_POST["configAjudaG8"];

$t9 = $_POST["tipoAjudaF9"];
$c9 = $_POST["configAjudaG9"];

$t10 = $_POST["tipoAjudaF10"];
$c10 = $_POST["configAjudaG10"];

$t11 = $_POST["tipoAjudaF11"];
$c11 = $_POST["configAjudaG11"];

$t12 = $_POST["tipoAjudaF12"];
$c12 = $_POST["configAjudaG12"];

$t13 = $_POST["tipoAjudaF13"];
$c13 = $_POST["configAjudaG13"];

$t14 = $_POST["tipoAjudaF14"];
$c14 = $_POST["configAjudaG14"];

$t15 = $_POST["tipoAjudaF15"];
$c15 = $_POST["configAjudaG15"];

$t16 = $_POST["tipoAjudaF16"];
$c16 = $_POST["configAjudaG16"];

$t17 = $_POST["tipoAjudaF17"];
$c17 = $_POST["configAjudaG17"];

$t18 = $_POST["tipoAjudaF18"];
$c18 = $_POST["configAjudaG18"];

$t19 = $_POST["tipoAjudaF19"];
$c19 = $_POST["configAjudaG19"];

$t20 = $_POST["tipoAjudaF20"];
$c20 = $_POST["configAjudaG20"];

$vetorA = array($t1,$t2,$t3,$t4,$t5,$t6,$t7,$t8,$t9,$t10,$t11,$t12,$t13,$t14,$t15,$t16,$t17,$t18,$t19,$t20);
$vetorB = array($c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10,$c11,$c12,$c13,$c14,$c15,$c16,$c17,$c18,$c19,$c20);

//$cenarioNome = $_POST['nomeCenario'];
//$idPergunta = $_POST['perguntasArray'];

function updateAvaliacao($idpacienteA,$idAvaliacaoA,$tipoAjudaA,$configAjudaA, $numQuestaoA ){
    include('../controller/conexaoDataBaseV2.php');
   $sqlB = "UPDATE `avaliacao` SET `configAjuda` = '$configAjudaA', `tipoajuda` = '$tipoAjudaA'  WHERE `avaliacao`.`numquestao` = $numQuestaoA AND `avaliacao`.`idavaliacao` = $idAvaliacaoA AND `avaliacao`.`idpaciente` = $idpacienteA AND `avaliacao`.`etapa` = 1 ";
   mysqli_query($conn,$sqlB);
}

for($i=0; $i<20; $i++){
    $tipoAjuda   = $vetorA[$i];
    $configAjuda = $vetorB[$i];
    $n = $i+1;
    updateAvaliacao($idpaciente,$idavaliacao,$tipoAjuda,$configAjuda,$n);
    if($n==20){header("Location: ".$_SERVER['HTTP_REFERER']."");}

}



?>

