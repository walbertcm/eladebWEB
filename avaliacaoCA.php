<?php
    include('conexaoBancoDados.php');
    
    //$db_handle = new DBController();

    $sqlA = "SELECT `numquestao`
    FROM `avaliacao` WHERE `resultado`= 1 AND `idpaciente`= 1 AND `idfisioterapeuta`= 1 AND `etapa` = 1;";

    $query = mysqli_query($conn,$sqlA);
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
       while($dado = mysqli_fetch_array($query)) {
            //echo "<p>" .$dado['numquestao']."</p> <br>" ;
            $out[] = $dado['numquestao'];
            $js_array = json_encode($out);
            echo "var javascript_array = ". $js_array. ";\n";
        }             
        ?>
        </script>
        <!--Css Conteiner de largura total --> 
        <div class="container-fluid container-md mt-3 border">
            <h2>Carta Número: <h1 id="counter-label" class="text-left">0</h1> </h2>
            <br>             
            <img id="images" width="400" height="400" class="mx-auto d-block"></img>
            <br>
      <center>
       <div>
        <button type="button" onclick="questoesProblemaC()" id="botaoC" value="1" class="btn btn-success btn-danger">PROBLEMA NÃO <br>IMPORTANTE</button>
        <button type="button" onclick="questoesProblemaD()" id="botaoD" value="2" class="btn btn-warning btn-danger ">PROBLEMA <br>IMPORTANTE</button>
        <button type="button" onclick="questoesProblemaE()" id="botaoE" value="3" class="btn btn-warning btn-danger ">PROBLEMA MUITO <br>IMPORTANTE</button>
            <br><br>
        </div>
    </center>
    </div>
        <script src="js/eladeb.js"></script>
        <script src="js/cenario.js"></script>
        <script>
            numQuestaoFase02(javascript_array); //Recebe o array do php e repassa para o javascript
        </script>

    </body>

</html>