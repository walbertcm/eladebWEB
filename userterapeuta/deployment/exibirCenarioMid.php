<?php
        
        include('conexaoBancoDados.php');

        $sql = "SELECT `pacienteid`, `NomePaciente`, `NomeResponsavel`, `Telefone`, `EmailPaciente`, `senha`, `dt_cadastro`
        FROM `paciente`";

        $query = mysqli_query($conn,$sql); 

?>

<!DOCTYPE html> 
  <html> 
    <head> 
      <meta charset="UTF-8"> 
      <title>Exibir Pacientes</title> 
    </head> 
    <body> 
      <table border="1"> 
        <tr> 
          <td>Nome do Paciente</td> 
          <!-- <td>Imagem</td> 
          <td>Data Cadastro</td> -->
          <td>Cenários</td> 
        </tr> 
       
        <?php 
        while($dado = mysqli_fetch_array($query)) { 
        echo "<tr>";
         echo "<td>".$dado['NomePaciente']."</td>";
         //echo "<td>".'<img width="100" height="100" src="data:image/jpeg;charset=utf8;base64,'.base64_encode( $dado['imagem'] ).'"/>'."</td>";
         //echo "<td>".date('d/m/Y H:i:s', strtotime($dado['dtcadastro']))."</td>";
         //echo "<td>".'<a href="cadCenario.php?id='.$dado['idperguntas'].'">Imagem '.$dado['idperguntas'] ."</td>";           
         echo "<td>".'<a href="exibirCenarios.php?id='.$dado['pacienteid'].'&nomePaciente='.$dado['NomePaciente'].'"> Exibir '."</td>";
         echo"</tr>";
        } 
        ?> 
      </table> 
      </br>
    <h3><a href="index.html">Inicio</a></h3>
    </body>
 
</html>