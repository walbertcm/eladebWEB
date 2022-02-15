<?php
   header("Content-Type: application/json; charset=UTF-8");

//Classe para conexão com o DB
   include('../../controller/conexaoDataBaseV2.php');

//Variaveis
   $idavaliacao       = 99;
   $idcenario         = 99;
   $idpaciente        = 99;
   $idfisioterapeuta  = 99;
   $etapa             = 99;
   $numQuestao        = 99;
   $resultado         = 99;
   $grupoPontuacao    = 99;

   $jsonA =  json_decode($_POST['questao'], false);

   $idQuestao       = $jsonA->idQuestao; 
   $idpaciente      = $jsonA->paciente;
   $idavaliacao     = $jsonA->avaliacao;
   $resultado       = $jsonA->resultado;
   $grupoPontuacao  = $jsonA->grupoPontuacao;
   $etapa           = $jsonA->etapa;

//UPDATE no banco de dados -> ELADEB>Avaliação
if(!empty($idpaciente)){  
   $sqlA= "UPDATE `avaliacao` SET etapa='$etapa', resultado='$resultado', `grupopontuacao`= '$grupoPontuacao',`avaliacaoRealizada`= 1 WHERE `idavaliacao` = '$idavaliacao' AND `idpaciente` = '$idpaciente' AND `id` = '$idQuestao'  ";
   $queryA = mysqli_query($conn, $sqlA);
}

?>