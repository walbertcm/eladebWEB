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

    function calculaNumQuestoesNaoRespondidasNivelD($idPacienteD, $idAvaliacaoD){
        include('../../controller/conexaoDataBaseV2.php');
        $numQuestoesNaoResolvidas = 0;
        $sqlD = "SELECT `idavaliacao` FROM `avaliacao` where `idpaciente` = '$idPacienteD' AND `idavaliacao` = '$idAvaliacaoD' AND `etapa` = 4 AND `avaliacaoRealizada` = 0 ";
        $queryD = mysqli_query($conn, $sqlD);
        $numQuestoesNaoResolvidas = mysqli_num_rows($queryD);
        return $numQuestoesNaoResolvidas;
    }

//Calcula o total de paginas
    $totalPaginasNaoRespNivelD = calculaNumQuestoesNaoRespondidasNivelD($idPaciente, $idAvaliacao);

    if($totalPaginasNaoRespNivelD == 0){
        header("Location: ../avaliacaoB/resultadoPrevioAvaliacao.php");
    }

//Obter o valor da paginação por GET
    if(isset($_GET['pag'])){
        $numeroQuestaoExibir = $_GET['pag'];
    }else{
        $numeroQuestaoExibir = 1;
    }

$numeroQuestoesPagina = 1; 

$numeroQuestaoExibir  = ($numeroQuestaoExibir-1) * $numeroQuestoesPagina;


//Seleciona as perguntas do paciente para a etapa 02
include('../../controller/conexaoDataBaseV2.php');
    $sqlA   = "SELECT * FROM `avaliacao` a RIGHT JOIN perguntas p ON a.`numquestao` = p.idperguntas where `idpaciente` = '$idPaciente' AND `idavaliacao` = '$idAvaliacao' AND `avaliacaoRealizada` = 0 AND `etapa` = 4   ORDER BY id LIMIT 0, 1 ";
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
        <div class="col-6 col-md-3"><button type="button"  onclick="qpA(); paginacaoAvaliacao()" id="botaoDA" value="1" name="pni" class="btn btn-success btn-danger">PRECISO DE AJUDA <br>NÃO URGENTE <br>( MAIS DE 03 MESES )</button></div>
        <div class="col-6 col-md-3"><button type="button"  onclick="qpB(); paginacaoAvaliacao()" id="botaoDB" value="2" name="pi"  class="btn btn-warning btn-danger">PRECISO DE AJUDA <br> MODERADAMENTE URGENTE <br>( ENTRE 01 E 03 MESES )</button></div>
        <div class="col-6 col-md-3"><button type="button"  onclick="qpC(); paginacaoAvaliacao()" id="botaoDC" value="3" name="pmi" class="btn btn-warning btn-danger">PRECISO DE AJUDA <br>URGENTE <br>( DENTRO DE 30 DIAS )</button></div>
    </div>
    </div>
    <script src="../../js/gameEladeb.js"></script>  
  
    <script>
        function qpA(){
            questoesProblemaDA(idQuestao, idPaciente, idAvaliacao, numQuestao);
        }

        function qpB(){
            questoesProblemaDB(idQuestao, idPaciente, idAvaliacao, numQuestao);        
        }

        function qpC(){
            questoesProblemaDC(idQuestao, idPaciente, idAvaliacao, numQuestao);
        }

        function paginacaoAvaliacao(){            
            window.open('<?php  echo "?pag=".($numeroQuestaoExibir + 1) ; ?>','_self');} 
    </script>
   

    </body>

</html>