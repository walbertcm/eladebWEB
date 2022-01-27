<?php
    include('../conexaoBancoDados.php');
    include('../avaliacao/Avaliacao.php');

    $sqlA = "SELECT `id`,`idavaliacao`,`idcenario`,`idfisioterapeuta`,`idpaciente`,`etapa`,`numquestao`,`resultado`,`grupopontuacao`,`datahora` 
    FROM `avaliacao`  WHERE `idpaciente`=3 and `idavaliacao`=2";

    $query=mysqli_query($conn,$sqlA); 


$arrayQuestoes = new Avaliacao();

function construirArrayQuestoes($a){
    $arrayQuestoes = $a;
    return $arrayQuestoes;
}

    while($dado = mysqli_fetch_assoc($query)) { 
        $id = $dado['id'];
        $etapa = $dado['etapa'];
        $numquestoes = $dado['numquestao'];
        echo $numquestoes."<br>";

        $resposta =" ";

        if($etapa==1 and $numquestoes<19){
            //$resposta = construirArrayQuestoes($numquestoes);  //"Etapa 01 incompleta";
            $arrayQuestoes->setId($id);            
            //echo $resposta;
            echo $arrayQuestoes->getId();
        }
    }    
?>

<html>

<body>
    <?php echo $resposta; ?>
</body>
</html>