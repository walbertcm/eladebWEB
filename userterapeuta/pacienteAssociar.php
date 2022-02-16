<?php
//Metodo para iniciar a sessao
    session_start();

//Avalia se a sessao tem valores, foi definida, caso nao retorna o user para o login
    if(!isset($_SESSION["emailUsuario"]) AND !isset($_SESSION["idUsuarioLogin"]) AND !isset($_SESSION["idTerapeuta"])){
        header("Location: ../index.html");
        die();
    }else{
        $emailUsuario   = $_SESSION["emailUsuario"];
        $idUsuarioLogin = $_SESSION["idUsuarioLogin"];
        $idTerapeuta    = $_SESSION["idTerapeuta"];
    }

//Recebe o id do cenário para associar ao paciente
    $idCenario = $_GET['idce'];

//SQl -> Exibe todos os pacientes. Permitindo ao terapeuta selecionar o paciente em questão
    include('../controller/conexaoDataBaseV2.php');
    $sql = "SELECT * FROM `paciente`;";
    $query = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>...::: Terapeuta :::... </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">
</head>
<body>
    <?php include("../userterapeuta/include/navbarTerapeuta.html");?>
    
<main role="main" class="container">
     <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                  <h2>Associar paciente</h2>  
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">Nome dos pacientes</th>
                      <th scope="col" class="text-center">Associar com paciente</th>
                    </tr>
                    </thead>
                    <!-- Corpo da Tabela-->
                    <!--https://bootsnipp.com/snippets/2P90-- Exemplo parcial>-->
                    <tbody>
                    <?php 
                        while($dado = mysqli_fetch_array($query)){
                            echo "<tr>";
                            echo "<td class="."text-left".">".$dado['NomePaciente']."</td>";                         
                            echo "<td class="."text-center".">".'<a href="pacienteAssociarBack.php?idcen='.$idCenario.'&idpc='.$dado['pacienteid'].'&idt='.$idTerapeuta.' " class="btn btn-primary btn-md" role="button" aria-pressed="true">Associar</a>'."</td>";
                            echo"</tr>";                        
                        } 
                    ?> 
                    </tbody>
                </table>
            </div>
        </div>
     </div>
</main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>