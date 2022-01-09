<?php

include('conexaoBancoDados.php');

//Sql para selecionar o paciente e construir o listbox
$sqlA = "SELECT `pacienteid`, `NomePaciente`, `NomeResponsavel`, `Telefone`, `EmailPaciente`, `senha`, `dt_cadastro`
               FROM `paciente`";
//Sql para selecionar as perguntas existentes na base de dados
$sqlB = " SELECT `idperguntas`, `pergunta`, `imagem`, `tipo`, `dtcadastro` FROM `perguntas` ";

//Associa Sql com a conexão - SQLA
$querySelectPaciente = mysqli_query($conn,$sqlA);

//Associa Sql com a conexão SQLB
$querySelectQuestoes = mysqli_query($conn,$sqlB);

//Fecha a conexão
mysqli_close($conn);

?>

<!DOCTYPE html>
   <head>
      <meta charset="UTF-8">
      <title></title>
      <script>
         function setCadastrarAction() {
            document.cadCenario.action = "cadCenario.php";
            document.cadCenario.submit ();
            }
      </script>
   </head>

   <body>
      <br><br> 
      <label>Fisioterapeuta: Fisioterapeuta01</label> 
      <br><br>

      <form name="cadCenario" method="post" acion="">

      <label>Nome do Cenário: </label>
        <br>
        <input type="text" name="nomeCenario" size="60">
        <br><br>
        <label>Selecione o Paciente</label> 
         <br>
         <select multiple name="pacienteId">
            <?php
               $i=0;
               while($paciente = mysqli_fetch_array($querySelectPaciente)) {
            ?>
         <option value="<?=$paciente["pacienteid"];?>"><?=$paciente["NomePaciente"];?></option>
         <?php
            $i++;
            }
         ?>
         </select>
      <br><br>
      <label>Selecionar Questões</label> 
      <br><br>   
   <table border="1"> 
        <tr> 
          <td>Pergunta</td> 
          <td>Imagem</td> 
          <td>Data Cadastro</td>
          <td></td>  
        </tr> 
       
        <?php 
        while($questoes = mysqli_fetch_array($querySelectQuestoes)) { 
        echo "<tr>";
            echo "<td>".$questoes['pergunta']."</td>";
            echo "<td>".'<img width="100" height="100" src="data:image/jpeg;charset=utf8;base64,'.base64_encode( $questoes['imagem'] ).'"/>'."</td>";
            echo "<td>".date('d/m/Y H:i:s', strtotime($questoes['dtcadastro']))."</td>";
            echo "<td>".'<input type="checkbox" name="users[]" value='.$questoes["idperguntas"].' />'."</td>";         
         echo"</tr>";
        } 
        ?> 

<tr class="listheader">
<td colspan="4"><input type="submit" name="submit" value="Cadastrar" onClick = "setCadastrarAction();"/> </td>
</tr>

</table> 
</br>

</body>
</html>