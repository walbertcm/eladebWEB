<?php
    $idfisioterapeuta = $_COOKIE["idfisioterapeuta"];     
    $idpaciente = $_COOKIE["idpaciente"];    
    $idavaliacao = $_COOKIE["idavaliacao"]; 

    include('conexaoBancoDados.php');

    $sqlA = "SELECT `numquestao` FROM `avaliacao` 
    WHERE `idfisioterapeuta`='$idfisioterapeuta' AND `idpaciente`='$idpaciente' AND `idavaliacao` = '$idavaliacao' AND `resultado`=1 AND `etapa`=3;";

    $query = mysqli_query($conn, $sqlA);
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
    <script type='text/javascript'>
        var javascript_arrayQuestoesA = 0;
        var idfisioterapeuta_javascript = "<?php echo $idfisioterapeuta;?>";
        var idpaciente_javascript = "<?php echo $idpaciente;?>";
        var idavaliacao_javascript = "<?php echo $idavaliacao;?>";          

        <?php
        while ($dado = mysqli_fetch_array($query)) {
            //echo "<p>" .$dado['numquestao']."</p> <br>" ;
            $outA[] = $dado['numquestao'];
            $arrayQuestoesA = json_encode($outA);
            echo "var javascript_arrayQuestoesA = " . $arrayQuestoesA . ";\n";
        }
        ?>
        
        if(javascript_arrayQuestoesA==0){
            alert("Etapa 04 não necessaria. \n Fim do Teste !");
            window.location.href = '../eladeb/index.html';
        }
    </script>
    <!--Css Conteiner de largura total -->
    <div class="container-fluid container-md mt-3 border">
        <h2>Carta Número: <h1 id="counter-label" class="text-left">0</h1></h2><br>
        <img id="images" width="400" height="400" class="mx-auto d-block"></img><br>
        <div class="text-center">
            <button type="button" onclick="questoesNecessidadeC()" id="botaoCC" value="1" name="necessidadeA" class="btn btn-success btn-danger">PRECISO DE AJUDA NÃO URGENTE <br>( MAIS DE 03 MESES )</button>
            <button type="button" onclick="questoesNecessidadeD()" id="botaoDD" value="2" name="necessidadeA" class="btn btn-warning btn-danger ">PRECISO DE AJUDA MODERADAMENTE URGENTE <br>( ENTRE 01 E 03 MESES )</button>
            <button type="button" onclick="questoesNecessidadeE()" id="botaoEE" value="3" name="necessidadeA" class="btn btn-warning btn-danger ">PRECISO DE AJUDA URGENTE <br>( DENTRO DE 30 DIAS )</button>
        <br><br>
        </div>
    </div>
    <script src="js/eladeb.js"></script>
    <script>
            recebePaciente(idfisioterapeuta_javascript, idpaciente_javascript,idavaliacao_javascript);                      
            recebeQuestoesProblemaFase04(javascript_arrayQuestoesA); //Recebe o array do php e repassa para o javascript
            reavaliacaoNecessidadeNextImage();
    </script>        
</body>

</html>