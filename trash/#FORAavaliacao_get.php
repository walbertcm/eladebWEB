<?php       
    //Acessa o banco de dados    
    include('conexaoBancoDados.php');
    
    ///Recebe os valores metodos POST
    $idpaciente = $_GET['id_paciente'];
   
    //Instrução SQL
    $sqlB = "SELECT * FROM `cenario` WHERE `idpaciente` = '$idpaciente' GROUP BY `idcenario`, `nomecenario` ASC";

    //Executa a instrução SQLA  
    $queryB = mysqli_query($conn,$sqlB);

    //echo $idpaciente;

    // Gera HTML da lista de opções de estado 
        //echo '<option value="">Selecione o cenário </option>' ;         
        while($rowB = mysqli_fetch_assoc($queryB)){
            $sub_cenarios[] = array(
            'id' => $rowB['idpaciente'], 
            'nomecenario'=>utf8_encode($rowB['nomecenario']),);
          //echo "<option value='".$rowB['idcenario']."'>".$rowB['nomecenario']."</option>";
        }
        
        echo(json_encode($sub_cenarios));
?>