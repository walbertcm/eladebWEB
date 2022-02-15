<?php
//Metodo para iniciar a sessao
    session_start();

//Avalia se a sessao tem valores, foi definida, caso nao retorna o user para o login
    if(!isset($_SESSION["emailUsuario"]) AND !isset($_SESSION["idUsuarioLogin"]) ){
        header("Location: ../index.html");
        die();
    }else{
        $emailUsuario   = $_SESSION["emailUsuario"];
        $idUsuarioLogin = $_SESSION["idUsuarioLogin"];    
        $idPaciente     = $_SESSION["idpaciente"];
        $idAvaliacao    = $_SESSION["idavaliacao"];
    }


/* function calculaNumQuestoesTotal($idPacienteB, $idAvaliacaoB){
    include('../../controller/conexaoDataBaseV2.php');
    $sqlB = "SELECT `idavaliacao` FROM `avaliacao` where `idpaciente` = '$idPacienteB' AND `idavaliacao` = '$idAvaliacaoB' ";
    $queryB = mysqli_query($conn, $sqlB);
    $numQuestoes = mysqli_num_rows($queryB);
    return $numQuestoes;
}
$numeroQuestoesTotais = calculaNumQuestoesTotal($idPaciente,$idAvaliacao); */

/* function calculaNumQuestoesRespondidas($idPacienteC, $idAvaliacaoC){
    include('../../controller/conexaoDataBaseV2.php');
    $sqlC = "SELECT `idavaliacao` FROM `avaliacao` where `idpaciente` = '$idPacienteC' AND `idavaliacao` = '$idAvaliacaoC' AND  `avaliacaoRealizada` = '1'";
    $queryC = mysqli_query($conn, $sqlC);
    $numQuestoesResolvidas = mysqli_num_rows($queryC);
    return $numQuestoesResolvidas;
} */

    function calculaNumQuestoesNaoRespondidasNivelA($idPacienteD, $idAvaliacaoD){
        include('../../controller/conexaoDataBaseV2.php');
        $numQuestoesNaoResolvidas=0;
        $sqlD   = "SELECT `idavaliacao` FROM `avaliacao` where `idpaciente` = '$idPacienteD' AND `idavaliacao` = '$idAvaliacaoD' AND `etapa` = 1 AND `avaliacaoRealizada` = 0 ";
        $queryD = mysqli_query($conn, $sqlD);
        $numQuestoesNaoResolvidas = mysqli_num_rows($queryD);
        return $numQuestoesNaoResolvidas;
    }

//Calcula o total de paginas
    $totalPaginasNaoRespNivelA = calculaNumQuestoesNaoRespondidasNivelA($idPaciente, $idAvaliacao);

    if($totalPaginasNaoRespNivelA == 0){
        header("Location: ../avaliacaoB/avaliacaoNivelB.php");
    }

//Obter o valor da paginação por GET
    if(isset($_GET['pag'])){
        $numeroQuestaoExibir = $_GET['pag'];
    }else{
        $numeroQuestaoExibir = 1;
        //Numero da questão para exibir
    }

//Paginacao, é uma forma de exibir 1 elemento por vez, trata direto no SQL LIMIT
    $numeroQuestoesPagina = 1; //Numero de questões por pagina
//Formula da paginação //// LIMIT 0,1 /// LIMIT $numeroQuestaoExibir , $numeroQuestoesPagina
    $numeroQuestaoExibir  = ($numeroQuestaoExibir-1) * $numeroQuestoesPagina;

//echo $totalPaginasNaoResp;
//echo $numeroQuestaoExibir;

//Seleciona as perguntas do paciente para um determinado cenario
    include('../../controller/conexaoDataBaseV2.php');
    $sqlA = "SELECT * FROM `avaliacao` a RIGHT JOIN perguntas p ON a.`numquestao` = p.idperguntas where `idpaciente` = '$idPaciente' AND `idavaliacao` = '$idAvaliacao' AND `avaliacaoRealizada` = 0 AND `etapa` = 1 ORDER BY id LIMIT 0, 1 ";
    $queryA = mysqli_query($conn, $sqlA);

?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>           
    </head>
    <body>      
    <div class="container" >
    <div class="row justify-content-md-center"> 
        <br><br>
                        <?php 
                            while($dadosA=mysqli_fetch_array($queryA)){ 
                                $tituloQuestao = $dadosA['numquestao'];
                                $imagemQuestao = $dadosA['imagem'];
                                echo $tituloQuestao;
                        ?>  
                        <script>
                                var idQuestao          = "<?php echo $dadosA['id'];?>";
                                var idAvaliacao        = "<?php echo $dadosA['idavaliacao'];?>";
                                var idCenario          = "<?php echo $dadosA['idcenario'];?>";
                                var idTerapeuta        = "<?php echo $dadosA['idterapeuta'];?>";
                                var idPaciente         = "<?php echo $dadosA['idpaciente'];?>";
                                var etapa              = 2;
                                var numQuestao         = "<?php echo $dadosA['numquestao'];?>";
                                var resultado          = 0;
                                var grupoPontuacao     = 0;
                                var avaliacaoRealizada = 0;
                       </script> 
    <br><br><br>
    </div>
    <div class="row justify-content-md-center">
        <div class="col"><br></div>
        <div class="col-md-auto"><?php echo '<img width="400" height="400" src="data:image/jpeg;charset=utf8;base64,'.base64_encode( $imagemQuestao).'"/>';  } ?> <br><br><br></div>
        <div class="col"> <br><br></div>
    </div>
    <div class="row justify-content-around" >
        <div class="col-md-auto"></div>
        <div class="col-md-auto"><button type="button"  onclick="qnp(); paginacaoAvaliacao()" id="botaoAA" value="0" name="nproblema" class="btn btn-success btn-lg ">NÃO PROBLEMA</button></div>
        <div class="col-md-auto"><button type="button"  onclick="qp(); cadNovaQuestao(); paginacaoAvaliacao()"  id="botaoAB" value="1" name="problema" class="btn btn-warning btn-lg ">PROBLEMA</button></div>
        <div class="col-md-auto"></div>
    </div>
    <script src="../../js/gameEladeb.js"></script>  
  
    <script>
        function qnp(){
            questoesProblemaAA(idQuestao, idPaciente, idAvaliacao, numQuestao);
        }
        function qp(){
            questoesProblemaAB(idQuestao, idPaciente, idAvaliacao, numQuestao);
        }
        
        function cadNovaQuestao(){
            cadastraQuestaoNovoNivel(idAvaliacao, idCenario, idTerapeuta, idPaciente, etapa, numQuestao)
        }

        function paginacaoAvaliacao(){            
            window.open('<?php  echo "?pag=".($numeroQuestaoExibir + 1) ; ?>','_self');} 
    </script>  
    </body>
</html>



