<?php       
    //Acessa o banco de dados    
    include('conexaoBancoDados.php');
    
    ///Recebe os valores metodos POST
    $idfisioterapeuta = 1;//$_GET['id_fisioterapeuta'];
   
    //Instrução SQL
    $sqlB = "SELECT paciente.pacienteid, paciente.NomePaciente FROM fisioterapeutapaciente RIGHT JOIN paciente 
    ON paciente.pacienteid = fisioterapeutapaciente.idpaciente 
    WHERE fisioterapeutapaciente.idfisioterapeuta ='$idfisioterapeuta'
    ORDER BY fisioterapeutapaciente.idpaciente ;";

    //Executa a instrução SQLA  
    $queryB = mysqli_query($conn,$sqlB);

    //echo $idpaciente;

    // Gera HTML da lista de opções de estado 
        //echo '<option value="">Selecione o cenário </option>' ;         
        while($rowB = mysqli_fetch_assoc($queryB)){
            $avaliacaoAget[] = array(
            'pacienteid' => $rowB['pacienteid'], 
            'nomepaciente'=>utf8_encode($rowB['NomePaciente']),);
          //echo "<option value='".$rowB['idcenario']."'>".$rowB['nomecenario']."</option>";
        }
        
        echo(json_encode($avaliacaoAget));
?>