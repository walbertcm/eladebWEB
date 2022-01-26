<?php            
    $idfisioterapeuta = $_COOKIE["idfisioterapeuta"];     
    $idpaciente = $_COOKIE["idpaciente"];    
    $idavaliacao = $_COOKIE["idavaliacao"]; 
    
    include('conexaoBancoDados.php');
    
    $sqlA  = "SELECT numquestao FROM avaliacao WHERE resultado= 1 AND idpaciente= '$idpaciente' AND idfisioterapeuta= '$idfisioterapeuta' AND etapa = 1 AND idavaliacao= '$idavaliacao';";
    //"SELECT `numquestao` FROM `avaliacao` WHERE `idpaciente` = '$idpaciente' AND `idfisioterapeuta` = '$idfisioterapeuta' AND `resultado` = 1;";
    
    $query = mysqli_query($conn,$sqlA);

     print_r($_COOKIE);
?>  
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <!--Css --> 
        <link rel="stylesheet" type="text/css" href="css/avaliacao.css">
        <!--Css Bootstrap5 Renderização --> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Css Bootstrap5 --> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>  
    </head>
    
    <body>
    <script>       
            var javascript_arrayQuestoes = 0;
            var idfisioterapeuta_javascript = "<?php echo $idfisioterapeuta;?>";
            var idpaciente_javascript = "<?php echo $idpaciente;?>";
            var idavaliacao_javascript = "<?php echo $idavaliacao;?>";          
    <?php
    while($dado = mysqli_fetch_array($query)) {
        //echo "<p>" .$dado['numquestao']."</p> <br>" ;
            //$dado = mysqli_fetch_array($query);
            $out[] = $dado['numquestao'];
            $arrayQuestoes = json_encode($out);
            echo "var javascript_arrayQuestoes = ". $arrayQuestoes. ";\n";            
        }             
    ?>
    if(javascript_arrayQuestoes==0){
        alert("Etapa 02 não necessaria !");
        window.location.href = 'avaliacaoCB.php';
    }
    </script>


        <div class="container-fluid container-md mt-3 border">
            <h2 style="color: white;">Carta Número: <h1 id="counter-label" class="text-left" style="color: white;">0</h1> </h2><br>             
            <img id="images" width="400" height="400" class="mx-auto d-block"></img><br>
        <div class="text-center">
            <button type="button" onclick="questoesProblemaC()" id="botaoC" value="1" class="btn btn-success btn-danger">PROBLEMA<br>NÃO IMPORTANTE</button>
            <button type="button" onclick="questoesProblemaD()" id="botaoD" value="2" class="btn btn-warning btn-danger">PROBLEMA<br>IMPORTANTE</button>
            <button type="button" onclick="questoesProblemaE()" id="botaoE" value="3" class="btn btn-warning btn-danger">PROBLEMA<br> MUITO IMPORTANTE</button>
            <br><br>
        </div>
    </div>
        <script src="js/eladeb.js"></script> 
    
        <script>
            recebePaciente(idfisioterapeuta_javascript, idpaciente_javascript,idavaliacao_javascript);           
            recebeQuestoesProblemaFase02(javascript_arrayQuestoes); //Recebe o array do php e repassa para o javascript            
            reavaliacaoNextImage();
        </script>

    </body>

</html>