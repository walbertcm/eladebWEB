<?php
//Recebe as informações do formulario presente em exibirCenarioMid.php
//consulta o banco de dados exibe as informações

    //Conexão com banco de dados    
    include('conexaoBancoDados.php');

    $pacienteid = $_GET['id'];
    $pacientenome = $_GET['nomePaciente'];
 
    //Sql para selecionar os cenarios
    $sql = " SELECT p.pacienteid, p.NomePaciente, c.nomecenario, c.idcenario, pp.pergunta, pp.imagem from cenario c 
        JOIN paciente p on (p.pacienteid = c.idpaciente) JOIN perguntas pp on (pp.idperguntas = c.idpergunta) 
        WHERE c.idpaciente = ' ". $pacienteid." ' ";

    //Execução no banco de dados
    $query = mysqli_query($conn,$sql); 

?>

<!DOCTYPE html> 
  <html> 
    <head> 
      <meta charset="UTF-8"> 
      <title>Exibir Cenário</title> 
    </head> 
    <body>
        <br><br>
        <label>Nome do Paciente : <?php echo $pacientenome ?> </label>
        <br>
        <!-- <label>Nome do Cenário : <?php $nomeCenario ?> </label> -->
        <br>

      <table border="1"> 
        <tr> 
          <td>Perguntas</td>
          <td>Imagem</td>  
        </tr> 
       
        <?php 
        while($dado = mysqli_fetch_array($query)) { 
        echo "<tr>";
         echo "<td>".$dado['pergunta']."</td>";
         echo "<td>".'<img width="100" height="100" src="data:image/jpeg;charset=utf8;base64,'.base64_encode( $dado['imagem'] ).'"/>'."</td>";
         echo"</tr>";
        } 
        ?> 
      </table> 
      </br>
    <h3><a href="index.php">Inicio</a></h3>
    </body>
 
</html>