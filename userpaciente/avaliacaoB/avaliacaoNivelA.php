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

function calculaNumQuestoesNaoRespondidas($idPacienteD, $idAvaliacaoD){
    include('../../controller/conexaoDataBaseV2.php');
    $sqlD = "SELECT `idavaliacao` FROM `avaliacao` where `idpaciente` = '$idPacienteD' AND `idavaliacao` = '$idAvaliacaoD' AND  `avaliacaoRealizada` = 0 ";
    $queryD = mysqli_query($conn, $sqlD);
    $numQuestoesNaoResolvidas = mysqli_num_rows($queryD);
    return $numQuestoesNaoResolvidas;
}

//Calcula o total de paginas
$totalPaginasNaoResp = calculaNumQuestoesNaoRespondidas($idPaciente, $idAvaliacao);

if($totalPaginasNaoResp == 0){
    header("Location: www.google.com");
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

echo $totalPaginasNaoResp;
echo $numeroQuestaoExibir;

//Seleciona as perguntas do paciente para um determinado cenario
include('../../controller/conexaoDataBaseV2.php');
$sqlA = "SELECT * FROM `avaliacao` a RIGHT JOIN perguntas p ON a.`numquestao` = p.idperguntas where `idpaciente` = '$idPaciente' AND `idavaliacao` = '$idAvaliacao' AND `avaliacaoRealizada` = 0  ORDER BY id LIMIT 0, 1 ";
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
                            //$idPacienteD = $idPacienteE = $dadosA['idpaciente'];
                            //$idAvaliacaoD = $idAvaliacaoE = $dadosA['idavaliacao'];
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
                          echo "<tr>";                          
                            echo "<th>".'<button type="button"  onclick="qnp(); paginacaoAvaliacao()" id="botaoA" value="0" name="nproblema" class="btn btn-success btn-lg ">NÃO PROBLEMA</button>'."</th>";
                            echo "<th>".'<button type="button"  onclick="qp(); paginacaoAvaliacao()" id="botaoB" value="1" name="problema" class="btn btn-warning btn-lg ">PROBLEMA</button> '."</th>";
                          echo"</tr>";                      
                        }
                    ?> 
                    </tbody>
                </table>               
            </div>
        </div>
     </div>
</main>
    <script src="../../js/gameEladeb.js"></script>  
  
    <script>
        function qnp(){
        questoesNaoProblemaA(idQuestao, idPaciente, idAvaliacao, numQuestao);
        }

        function qp(){
        questoesProblemaA(idQuestao, idPaciente, idAvaliacao, numQuestao);
        }

        function paginacaoAvaliacao(){            
                      window.open('<?php  echo "?pag=".($numeroQuestaoExibir + 1) ; ?>','_self');} 
    </script>  
    
    </body>
</html>



