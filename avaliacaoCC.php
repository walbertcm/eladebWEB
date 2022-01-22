<?php
    include('conexaoBancoDados.php');

    $sqlA = "SELECT `numquestao`
            FROM `avaliacao` WHERE `resultado`= 1 AND `idpaciente`= 1 AND `idfisioterapeuta`= 1 AND `etapa` = 3;";

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
        <?php
        while ($dado = mysqli_fetch_array($query)) {
            //echo "<p>" .$dado['numquestao']."</p> <br>" ;
            $outA[] = $dado['numquestao'];
            $js_arrayA = json_encode($outA);
            echo "var javascript_arrayA = " . $js_arrayA . ";\n";
        }
        ?>
    </script>
    <!--Css Conteiner de largura total -->
    <div class="container-fluid container-md mt-3 border">
        <h2>Carta Número: <h1 id="counter-label" class="text-left">0</h1>
        </h2>
        <br>
        <img id="images" width="400" height="400" class="mx-auto d-block"></img>
        <br>
        <center>
            <div>
                <button type="button" onclick="questoesNecessidadeC()" id="botaoCC" value="1" name="necessidadeA" class="btn btn-success btn-danger">PRECISO DE AJUDA NÃO URGENTE <br>MAIS DE 03 MESES</button>
                <button type="button" onclick="questoesNecessidadeD()" id="botaoDD" value="2" name="necessidadeA" class="btn btn-warning btn-danger ">PRECISO DE AJUDA MODERADAMENTE URGENTE <br>ENTRE 01 E 03 MESES</button>
                <button type="button" onclick="questoesNecessidadeE()" id="botaoEE" value="3" name="necessidadeA" class="btn btn-warning btn-danger ">PRECISO DE AJUDA URGENTE <br>DENTRO DE 30 DIAS</button>
                <br><br>
            </div>
        </center>
    </div>
    <script src="js/eladeb.js"></script>
    <script src="js/cenario.js"></script>
    <script>
        numQuestaoFase03(javascript_arrayA); //Recebe o array do php e repassa para o javascript
    </script>

</body>

</html>