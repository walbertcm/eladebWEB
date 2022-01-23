<?php       
    //Acessa o banco de dados    
    include('conexaoBancoDados.php');        
    
    //Instrução SQL selecionar Paciente
    $sqlA = "SELECT `pacienteid`,`NomePaciente`,`NomeResponsavel`,`Telefone`,`EmailPaciente`,`dt_cadastro` 
    FROM `paciente` ORDER BY `NomePaciente` ASC";

    //Executa a instrução SQLA  
    $queryA = mysqli_query($conn,$sqlA);
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Avaliação - Seleção do Paciente </title>
    <link rel="stylesheet" type="text/css" href="css/avaliacao.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        

</head>    
<body>
<div class="container-fluid container-md mt-3 border">
    <form method="POST" action="avaliacaoC.php"><br><br>        
        <div class="panel">
            <label>Selecione o paciente:</label>        
            <select id="id_paciente" name="id_paciente">
                <option >--Selecione o Paciente--</option><>
                <?php
                    while($row_paciente = mysqli_fetch_assoc($queryA)) {
                        echo '<option value="'.$row_paciente['pacienteid'].'">'.$row_paciente['NomePaciente'].'</option>'; 
                    } 
                ?>
            </select> <br><br>           
        </div>
        <div class="text-center">
        <!--<button type="button" value="Prosseguir" class="btn bt-sucess btn-lg">PROSSEGUIR</button> -->
        <input type="submit" name="enviar" value="PROSSEGUIR">
        </div>

    </form>
</div> 
    
    

</body>
</html>