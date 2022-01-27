<?php
     include('conexaoBancoDados.php');
     
     $sql = "SELECT DISTINCT avaliacao.idavaliacao, paciente.NomePaciente,avaliacao.idfisioterapeuta, avaliacao.idpaciente, fisioterapeuta.nome, DATE_FORMAT(avaliacao.datahora,'%d/%m/%Y  ') as dataa FROM paciente RIGHT JOIN avaliacao ON paciente.pacienteid = avaliacao.idpaciente RIGHT JOIN fisioterapeutapaciente ON avaliacao.idfisioterapeuta = fisioterapeutapaciente.idpaciente RIGHT JOIN fisioterapeuta ON fisioterapeutapaciente.idfisioterapeuta = fisioterapeuta.idterapeuta ORDER BY NomePaciente, idavaliacao;";
    
     //$sql = "SELECT DISTINCT avaliacao.idavaliacao, paciente.NomePaciente, avaliacao.idpaciente, DATE_FORMAT(avaliacao.datahora,'%d/%m/%Y') as dataa 
    //FROM paciente RIGHT JOIN avaliacao ON paciente.pacienteid = avaliacao.idpaciente ORDER BY NomePaciente, idavaliacao;";

    $query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html> 
  <html> 
    <head> 
      <meta charset="UTF-8"> 
      <title>Exibir Perguntas</title> 
    </head> 
    <body> 
    <h2>Resultado das Avaliações</h2>
      <table border="1"> 
      <tr>
        <td>Nome do Terapeuta</td>
        <td>Nome do Paciente</td>
        <td>Avaliação Numero</td>
        <td>Data</td>
        <td>Detalhes</td>
      </tr>
       
        <?php 
        while($dado = mysqli_fetch_array($query)) { 
        echo "<tr>";
         echo "<td>".$dado['nome']."</td>";
         echo "<td>".$dado['NomePaciente']."</td>";
         echo "<td>".$dado['idavaliacao']."</td>";
         echo "<td>".$dado['dataa']."</td>";           
         echo "<td>".'<a  href="resultadoRelatorio.php?id='.$dado['idavaliacao'].'&idpc='.$dado['idpaciente'].'">Resultados'."</a></td>";
         echo"</tr>";
        } 
        ?> 
      </table> 
      </br>
    <h3><a href="index.php">Inicio</a></h3>
    </body>
 
</html>
