<?php
session_start();
//Avalia se a sessao tem valores, foi definida, caso nao retorna o user para o login
if(!isset($_SESSION["emailUsuario"]) AND !isset($_SESSION["idUsuarioLogin"]) AND !isset($_SESSION["idTerapeuta"])){
    header("Location: ../index.html");
    die();
}else{
    $emailUsuario = $_SESSION["emailUsuario"];
    $idUsuarioLogin = $_SESSION["idUsuarioLogin"];
    $idTerapeuta = $_SESSION["idTerapeuta"];
}

$idpaciente = $_GET["id"];

include('../controller/conexaoDataBaseV2.php');

$sql = "SELECT t.nome, p.NomePaciente,a.`idpaciente`, a.idterapeuta,a.`resultado`, DATE_FORMAT(a.`datahora`,'%d/%m/%Y %T') as dataa,a.`idavaliacao` FROM `avaliacao` as a RIGHT JOIN paciente as p ON a.`idpaciente` = p.pacienteid RIGHT JOIN terapeuta as t ON a.`idterapeuta`=t.idterapeuta WHERE a.`idpaciente`='$idpaciente' group by a.`idpaciente`, a.`idavaliacao`;";
    
$query = mysqli_query($conn, $sql);

function statusAvaliacao($statusAvaliacao){
  if($statusAvaliacao == 0){
    $statusAvaliacaoTexto = "Incompleta";
    return $statusAvaliacaoTexto;
  }else {
    $statusAvaliacaoTexto = "Completa";
    return $statusAvaliacaoTexto;
  }
  }
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>...::: Terapeuta :::... </title>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">
</head>
<body>
<?php include "../userterapeuta/include/navbarTerapeuta.html"?>

<main role="main" class="container">
     <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                  <h2>Resultados do Paciente</h2>  
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">Terapeuta</th>
                      <th scope="col" class="text-center">Paciente</th>
                      <th scope="col" class="text-center">Status da avaliação</th>
                      <th scope="col" class="text-center">Data/Hora</th>
                      <th scope="col" class="text-center">Tabela de pontuação</th>
                    </tr>
                    </thead>
                    <!-- Corpo da Tabela-->
                    <!--https://bootsnipp.com/snippets/2P90-- Exemplo parcial>-->
                    <tbody>
                    <?php 
                        while($dado = mysqli_fetch_assoc($query)) {
                            $aaa = $dado['resultado'];
                            echo "<tr>";
                            echo "<td class="."text-left".">".$dado['nome']."</td>";
                            echo "<td class="."text-left".">".$dado['NomePaciente']."</td>";
                            echo "<td class="."text-center".">".statusAvaliacao($aaa)."</td>";
                            echo "<td class="."text-center".">".$dado['dataa']."</td>";    
                            echo "<td class="."text-center".">".'<a href="resultadoTabelaPontos.php?idav='.$dado['idavaliacao'].'&idpc='.$dado['idpaciente'].'&idt='.$dado['idterapeuta'].' " class="btn btn-primary btn-md" role="button" aria-pressed="true">Verificar</a>'."</td>";                            
                            echo"</tr>";
                            
                        } 
                    ?> 
                    </tbody>
                </table>
            </div>
        </div>
     </div>
</main>

    <!--Bootstrap e JS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>