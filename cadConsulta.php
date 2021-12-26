<?php       
        include('conexaoBancoDados.php');
        
        $sql = "SELECT `pacienteid`, `NomePaciente`, `NomeResponsavel`, `Telefone`, `EmailPaciente`, `senha`, `dt_cadastro`
        FROM `paciente`";
        
        $query = mysqli_query($conn,$sql);
?>

<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="utf-8"> 
    <title>Cadastrar Consultas</title> 
</head> 
<body>
</br>
</br>
<label >Marcar Consultas</label> 
</br>
</br>
<label >Selecione o Paciente</label> 
</br>
<select multiple>
    <?php
        $i=0;
        while($row = mysqli_fetch_array($query)) {
    ?>
<option value="<?=$row["NomePaciente"];?>"><?=$row["NomePaciente"];?></option>
<?php
    $i++;
    }
?>
</select>
</br>
</br>
</br>
<label >Selecione o Fisioterapeuta</label> 
</br>


</body> 

</html>