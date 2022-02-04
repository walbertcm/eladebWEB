<?php

//Metodo para iniciar a sessao
session_start();

//Avalia se a sessao tem valores, foi definida, caso nao retorna o user para o login
if(!isset($_SESSION["emailUsuario"]) AND !isset($_SESSION["idUsuarioLogin"])){
    header("Location: ../index.html");
    die();
}else{
    $emailUsuario = $_SESSION["emailUsuario"];
    $idUsuarioLogin = $_SESSION["idUsuarioLogin"];
}

    include('../controller/conexaoDataBaseV2.php');
    include('Avaliacao.php');

    $avaliacaoId = $_GET['idav'];
    $pacienteId = $_GET['idpc'];
    
function selecionaQuestoesPrimeiraEtapa($idPacienteA, $idAvaliacaoA){
    include('../controller/conexaoDataBaseV2.php');
    $sqlE = "SELECT `idavaliacao`, `avaliacaoRealizada`, `etapa`, `numquestao`  FROM `avaliacao` WHERE `idpaciente` = '$idPacienteA' AND  `idavaliacao`='$idAvaliacaoA' AND `etapa` = 1 AND `avaliacaoRealizada` = 0";
    $queryE = mysqli_query($conn, $sqlE);
    while($dadosE=mysqli_fetch_array($queryE)){
       $idAvaliacaoR = $dadosE['idavaliacao'];
       $idNumeQuestao = $dadosE['numquestao'];
       return array($idAvaliacaoR, $idNumeQuestao );
    }
  }

?>

<html>
<head></head>
<body>
    <?php  
        $a = selecionaQuestoesPrimeiraEtapa($pacienteId, $avaliacaoId); 

        foreach($a as $k=>$v){
            echo "\a[$k]=>$v.\n";
            
        }
        
        
    
    ?>
</body>
</html>