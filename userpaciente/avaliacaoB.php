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

    $idPaciente =  $_SESSION["idpaciente"];
    $idAvaliacao = $_SESSION["idavaliacao"];
}


function calculaNumQuestoesTotal($idPacienteA, $idAvaliacaoA){
    include('../controller/conexaoDataBaseV2.php');
    $sqlB = "SELECT `idavaliacao` FROM `avaliacao` where `idpaciente` = '$idPacienteA' AND `idavaliacao` = '$idAvaliacaoA' ";
    $queryB = mysqli_query($conn, $sqlB);
    $numQuestoes = mysqli_num_rows($queryB);
    return $numQuestoes;
}
//echo calculaNumQuestoesTotal($idPaciente,$idAvaliacao);

function calculaNumQuestoesRespondidas($idPacienteA, $idAvaliacaoA){
    include('../controller/conexaoDataBaseV2.php');
    $sqlC = "SELECT `idavaliacao` FROM `avaliacao` where `idpaciente` = '$idPacienteA' AND `idavaliacao` = '$idAvaliacaoA' AND  `avaliacaoRealizada` = '1'";
    $queryC = mysqli_query($conn, $sqlC);
    $numQuestoesResolvidas = mysqli_num_rows($queryC);
    return $numQuestoesResolvidas;
}


//Seleciona as perguntas do paciente para um determinado cenario
include('../controller/conexaoDataBaseV2.php');

$sqlA = "SELECT * FROM `avaliacao` a RIGHT JOIN perguntas p ON a.`numquestao` = p.pergunta where `idpaciente` = '$idPaciente' AND `idavaliacao` = '$idAvaliacao'";
$queryA = mysqli_query($conn, $sqlA);

while($dadosA=mysqli_fetch_array($queryA)){
    $numQuestaoAvaliacao = $dadosA['numquestao'];
    $imagemQuestao = $dadosA['imagem'];
} 

?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
         <!--Css Bootstrap5 Renderização --> 
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Css --> 
        <!--<link rel="stylesheet" type="text/css" href="css/avaliacao.css">-->
        <!--Css Bootstrap5 --> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
       <!--<script src="../js/eladeb.js"></script>  -->
      
               
    </head>
    <body >   
    <div class="container-fluid container-md mt-3 border">
        <h2 style="color: white;">Carta Número: <h1 id="counter-label" class="text-left" style="color: red;"> 0 </h1> </h2><br>                   
        <img id="images" width="400" height="400" class="mx-auto d-block"></img><br>
        <div class="text-center">
            <button type="button" onclick="questoesProblemaA()" id="botaoA" value="0" name="problema" class="btn btn-success btn-lg ">NÃO PROBLEMA</button>
            <button type="button" onclick="questoesProblemaB()" id="botaoB" value="1" name="problema" class="btn btn-warning btn-lg ">PROBLEMA</button>            
            <br><br>
        </div>
    </div>
    <script src="../js/eladeb.js"></script>  
    <script type="text/javascript">
        //recebePaciente(idfisioterapeuta_javascript, idpaciente_javascript,idavaliacao_javascript);
        nextImage();
    </script>  
    </body>
</html>