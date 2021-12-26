<?php
        
        include('conexaoBancoDados.php');

        $sql = "SELECT `pacienteid`, `NomePaciente`, `NomeResponsavel`, `Telefone`, `EmailPaciente`, `senha`, `dt_cadastro`
        FROM `paciente`";

        $query = mysqli_query($conn,$sql); ?>

<!DOCTYPE html> 
  <html> 
    <head> 
      <meta charset="UTF-8"> 
      <title>Exibir Paciente</title> 
    </head> 
    <body> 
      <table border="1"> 
        <tr> 
          <td>Nome Paciente</td>
          <td>Responsável Paciente</td>  
          <td>Telefone Paciente</td> 
          <td>Email Paciente</td> 
          <td>Senha</td> 
          <td>Data Cadastro</td> 
        </tr> 
       
        <?php 
        while($dado = mysqli_fetch_assoc($query)) { 

        echo "<tr>";
         echo "<td>".$dado['NomePaciente']."</td>";
         echo "<td>".$dado['NomeResponsavel']."</td>";
         echo "<td>".$dado['Telefone']."</td>";
         echo "<td>".$dado['EmailPaciente']."</td>";
         echo "<td>".$dado['senha']."</td>";
         echo "<td>".date('d/m/Y H:i:s', strtotime($dado['dt_cadastro']))."</td>";           
        echo"</tr>";
        } 
        ?> 
      </table> 
      </br>
    <h3><a href="index.html">Inicio</a></h3>
    </body>


</html>