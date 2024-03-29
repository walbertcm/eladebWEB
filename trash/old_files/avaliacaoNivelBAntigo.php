<?php
//Metodo para iniciar a sessao
session_start();

//Avalia se a sessao tem valores, foi definida, caso nao retorna o user para o login
if(!isset($_SESSION["emailUsuario"]) AND !isset($_SESSION["idUsuarioLogin"]) ){
    header("Location: ../index.html");
    die();
}else{
    $emailUsuario = $_SESSION["emailUsuario"];
    $idUsuarioLogin = $_SESSION["idUsuarioLogin"];
    //
    $idPaciente =  $_SESSION["idpaciente"];
    $idAvaliacao = $_SESSION["idavaliacao"];
}

function calculaNumQuestoesNaoRespondidasNivelB($idPacienteD, $idAvaliacaoD){
    include('../../controller/conexaoDataBaseV2.php');
    $sqlD = "SELECT `idavaliacao` FROM `avaliacao` where `idpaciente` = '$idPacienteD' AND `idavaliacao` = '$idAvaliacaoD' AND `etapa` = 2 AND `avaliacaoRealizada` = 0 ";
    $queryD = mysqli_query($conn, $sqlD);
    $numQuestoesNaoResolvidas = mysqli_num_rows($queryD);
    return $numQuestoesNaoResolvidas;
}

//Calcula o total de paginas
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

//Paginacao, é uma forma de exibir 1 elemento por vez, trata direto no SQL LIMIT
$numeroQuestoesPagina = 1; //Numero de questões por pagina
//Formula da paginação //// LIMIT 0,1 /// LIMIT $numeroQuestaoExibir , $numeroQuestoesPagina
$numeroQuestaoExibir  = ($numeroQuestaoExibir-1) * $numeroQuestoesPagina;


//Seleciona as perguntas do paciente para a etapa 02
include('../../controller/conexaoDataBaseV2.php');
$sqlA = "SELECT * FROM `avaliacao` a RIGHT JOIN perguntas p ON a.`numquestao` = p.idperguntas where `idpaciente` = '$idPaciente' AND `idavaliacao` = '$idAvaliacao' AND `avaliacaoRealizada` = 0 AND `etapa` = 2   ORDER BY id LIMIT 0, 1 ";
$queryA = mysqli_query($conn, $sqlA);


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

    </head>
    
    <body>
    <div class="container-fluid container-md mt-3 border">
    <main role="main" class="container">
     <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred"> 
                    <tbody>
                    <?php 
                        while($dadosA=mysqli_fetch_array($queryA)){ 
                            $tituloQuestao =  $dadosA['numquestao'];
                    ?>
                             <script>
                                var idQuestao =   "<?php echo $dadosA['id'];?>";
                                var idPaciente =  "<?php echo $dadosA['idpaciente'];?>";
                                var idAvaliacao = "<?php echo $dadosA['idavaliacao'];?>";
                                var numQuestao =  "<?php echo $dadosA['numquestao'];?>";
                            </script> 

                    <?php
                        $imagemQuestao = $dadosA['imagem'];                                                                  
                          echo "<tr>";
                            echo "<td class="."text-center".">".$tituloQuestao."</td>";
                          echo"</tr>"; 
                          echo "<tr>";
                            echo "<td class="."text-center".">".'<img width="400" height="400" src="data:image/jpeg;charset=utf8;base64,'.base64_encode( $imagemQuestao).'"/>'."</td>";
                          echo"</tr>"; 
                          echo "<tr class="."text-center".">";                         
                            echo "<th>".'<button type="button"  onclick="qpA(); paginacaoAvaliacao()" id="botaoBA" value="1" name="pni" class="btn btn-success btn-danger">PROBLEMA<br>NÃO IMPORTANTE</button>'."</th>";
                            echo "<th>".'<button type="button"  onclick="qpB(); paginacaoAvaliacao()" id="botaoBB" value="2" name="pi"  class="btn btn-warning btn-danger">PROBLEMA<br>IMPORTANTE</button> '."</th>";
                            echo "<th>".'<button type="button"  onclick="qpC(); paginacaoAvaliacao()" id="botaoBC" value="3" name="pmi" class="btn btn-warning btn-danger">PROBLEMA<br> MUITO IMPORTANTE</button> '."</th>";
                          echo"</tr>";                      
                        }
                    ?> 
                    </tbody>
                </table>               
            </div>
        </div>
     </div>
    </main>
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