<?php
        
        include('conexaoBancoDados.php');

        $sql = "SELECT `idterapeuta`, `nome`, `email`, `senha`, `registro_profissional`, `dt_cadastro` 
        FROM `fisioterapeuta`";

        $query = mysqli_query($conn,$sql); ?>

<!DOCTYPE html> 
  <html> 
    <head> 
      <meta charset="UTF-8"> 
      <title>Exibir Fisioterapeuta</title> 
    </head> 
    <body> 
      <table border="1"> 
        <tr> 
          <td>Nome</td> 
          <td>Email</td> 
          <td>Registro</td> 
          <td>Senha</td> 
          <td>Data Cadastro</td> 
        </tr> 
       
        <?php 
        while($dado = mysqli_fetch_assoc($query)) { 

        echo "<tr>";
         echo "<td>".$dado['nome']."</td>";
         echo "<td>".$dado['email']."</td>";
         echo "<td>".$dado['registro_profissional']."</td>";
         echo "<td>".$dado['senha']."</td>";
         echo "<td>".date('d/m/Y H:i:s', strtotime($dado['dt_cadastro']))."</td>";           
        echo"</tr>";
        } 
        ?> 
      </table> 
      </br>
    <h3><a href="index.php">Inicio</a></h3>
    </body>
 
</html>