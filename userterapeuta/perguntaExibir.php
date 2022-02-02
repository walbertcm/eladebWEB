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

//Seleção dos cenarios existentes
//Conexão com o banco de dados
include('../controller/conexaoDataBaseV2.php');

//Seleciona os  cenarios numero de pacientes
$sql = "SELECT * FROM `perguntas`";
$query = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>...::: Terapeuta :::... </title>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">
</head>
<body>
    <!--Carrega a barrade navegação-->
    <?php include("../userterapeuta/include/navbarTerapeuta.html");?>
    <!--Inicia a tabela-->
    <main role="main" class="container">
     <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                  <h2>Perguntas cadastradas</h2>  
                  <thead>
                    <tr>
                      <th scope="col" class="text-left">Pergunta</th>
                      <th scope="col" class="text-left">Imagem</th>
                    </tr>
                    </thead>
                    <!-- Corpo da Tabela-->
                    <!--https://bootsnipp.com/snippets/2P90-- Exemplo parcial>-->
                    <tbody>
                    <?php 
                        while($dado = mysqli_fetch_assoc($query)) {
                            echo "<tr>";
                            echo "<td class="."text-left".">".$dado['pergunta']."</td>";
                            echo "<td>".'<img width="100" height="100" src="data:image/jpeg;charset=utf8;base64,'.base64_encode( $dado['imagem'] ).'"/>'."</td>";    
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