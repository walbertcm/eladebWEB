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


    function calculaNumQuestoesNaoRespondidasNivelB($idPacienteD, $idAvaliacaoD){
        include('../../controller/conexaoDataBaseV2.php');
        $numQuestoesNaoResolvidas=0;
        $sqlD = "SELECT `idavaliacao` FROM `avaliacao` where `idpaciente` = '$idPacienteD' AND `idavaliacao` = '$idAvaliacaoD' AND `etapa` = 2 AND `avaliacaoRealizada` = 0 ";
        $queryD = mysqli_query($conn, $sqlD);
        $numQuestoesNaoResolvidas = mysqli_num_rows($queryD);
        return $numQuestoesNaoResolvidas;
    }

//Recebe o retorno da função
$totalPaginasNaoRespNivelB = calculaNumQuestoesNaoRespondidasNivelB($idPaciente, $idAvaliacao);

    if($totalPaginasNaoRespNivelB == 0){
        header("Location: ../avaliacaoB/avaliacaoNivelC.php");
    }

//Obter o valor da paginação por GET
    if(isset($_GET['pag'])){
        $numeroQuestaoExibir = $_GET['pag'];
    }else{
        $numeroQuestaoExibir = 1;
        //Numero da questão para exibir
    }

    $numeroQuestoesPagina = 1; 

    $numeroQuestaoExibir  = ($numeroQuestaoExibir-1) * $numeroQuestoesPagina;

//Seleciona as perguntas do paciente para a etapa 02
    include('../../controller/conexaoDataBaseV2.php');
    $sqlA = "SELECT * FROM `avaliacao` a RIGHT JOIN perguntas p ON a.`numquestao` = p.idperguntas where `idpaciente` = '$idPaciente' AND `idavaliacao` = '$idAvaliacao' AND `avaliacaoRealizada` = 0 AND `etapa` = 2   ORDER BY id LIMIT 0, 1 ";
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
                            $tituloQuestao =  $dadosA['numquestao'];
                            $imagemQuestao = $dadosA['imagem'];
                            echo $tituloQuestao;
                ?>  
                <script>
                                var idQuestao   = "<?php echo $dadosA['id'];?>";
                                var idPaciente  = "<?php echo $dadosA['idpaciente'];?>";
                                var idAvaliacao = "<?php echo $dadosA['idavaliacao'];?>";
                                var numQuestao  = "<?php echo $dadosA['numquestao'];?>";
                </script> 
    <br><br><br>
    </div>
    <div class="row justify-content-md-center">
        <div class="col"><br></div>
        <div class="col-md-auto"><?php echo '<img width="400" height="400" src="data:image/jpeg;charset=utf8;base64,'.base64_encode( $imagemQuestao).'"/>';  } ?> <br><br><br></div>
        <div class="col"> <br><br></div>
    </div>
    <div class="row justify-content-around" >
        <div class="col-4 "><button type="button"  onclick="qpA(); paginacaoAvaliacao()" id="botaoBA" value="1" name="pni" class="btn btn-success btn-danger">PROBLEMA<br>NÃO IMPORTANTE</button></div>
        <div class="col-4 "><button type="button"  onclick="qpB(); paginacaoAvaliacao()" id="botaoBB" value="2" name="pi"  class="btn btn-warning btn-danger">PROBLEMA<br>IMPORTANTE</button></div>
        <div class="col-4 "><button type="button"  onclick="qpC(); paginacaoAvaliacao()" id="botaoBC" value="3" name="pmi" class="btn btn-warning btn-danger">PROBLEMA<br> MUITO IMPORTANTE</button></div>
    </div>
    
    <script src="../../js/gameEladeb.js"></script>  
    <script>
        function qpA(){
            questoesProblemaBA(idQuestao, idPaciente, idAvaliacao, numQuestao);
        }

        function qpB(){
            questoesProblemaBB(idQuestao, idPaciente, idAvaliacao, numQuestao);        
        }

        function qpC(){
            questoesProblemaBC(idQuestao, idPaciente, idAvaliacao, numQuestao);
        }

        function paginacaoAvaliacao(){            
            window.open('<?php  echo "?pag=".($numeroQuestaoExibir + 1) ; ?>','_self');} 
    </script>
    </body>

</html>