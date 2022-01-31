<?php
//Metodo para iniciar a sessao
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

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v6/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">
</head>
<body>
    <?php include "../userterapeuta/include/navbarTerapeuta.html"?>

<main role="main" class="container">
    <form class="was-validated" action="cenarioCadastrarBack.php" method="POST" >
    <h2>Cadastrar Cenário</h2>
    <label>Digite um nome para o cenário e selecione as perguntas.</label>   
            <div class="mb-3 pb-1">
                <div class="form-outline">
                <input class="form-control is-valid" id="validationTextarea" placeholder="Campo obrigatorio" name="nomeCenario" required></input>
                <!--<label for="validationTextarea" class="form-label">Textarea</label>-->
                <div class="invalid-feedback">Digite um nome para o cenário.</div>
                </div>
            </div>
            <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                  <h2>Perguntas Cadastradas</h2>  
                  <thead>
                    <tr>
                      <th scope="col" class="text-left">Pergunta</th>
                      <th scope="col" class="text-left">Imagem</th>
                      <th scope="col" class="text-left">Selecione as perguntas</th>
                    </tr>
                    </thead>
                    <!-- Corpo da Tabela-->
                    <!--https://bootsnipp.com/snippets/2P90-- Exemplo parcial>-->
                    <tbody>
                    <?php 
                        while($dado = mysqli_fetch_assoc($query)) {
                            echo "<tr>";
                            echo "<td class="."text-left"." name="."pergunta".">".$dado['pergunta']."</td>";
                            echo "<td>".'<img width="100" height="100" src="data:image/jpeg;charset=utf8;base64,'.base64_encode( $dado['imagem'] ).'"/>'."</td>";    
                            echo "<td class="."text-center".">".'<input class="form-check-input" type="checkbox" name="perguntasArray[]" id="perguntasArray" value=" '.$dado['idperguntas'].' "/>'."</td>";
                            echo"</tr>";  
                        } 
                    ?> 
                    </tbody>
                </table>
            </div>
        </div>
     </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="submit"  value="submit" >Cadastrar Cenário</button>
            </div>
     </form>
    </main>
</body>
</html>