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
}

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
    <?php include("../useradministrador/include/navbarAdministrador.html");?>

<main role="main" class="container">
    <form class="was-validated" action="terapeutaCadastrarBack.php" method="POST" >
    <h2>Cadastrar um novo terapeuta</h2>
            <div class="mb-3 pb-1">
                <div class="form-outline">
                <label>Digite um nome para o terapeuta.</label> 
                    <input class="form-control is-valid" name="idNomet" placeholder="Campo obrigatorio"  required></input>
                    <div class="invalid-feedback">Digite um nome para o terapeuta.</div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                <label>Digite um email.</label>     
                    <input class="form-control is-valid" name="idEmailt" placeholder="Campo obrigatorio"  required></input>
                    <div class="invalid-feedback">Digite um email.</div>
                </div>
                <div class="col-md-4 mb-3">
                <label>Digite o registro profissional.</label>     
                    <input class="form-control is-valid" name="idRegistrot" placeholder="Campo obrigatorio"  required></input>
                    <div class="invalid-feedback">Digite o registro profissional.</div>
                </div>
                <div class="col-md-4 mb-3">
                <label>Digite uma senha.</label>     
                    <input class="form-control is-valid" name="idSenhat" placeholder="Campo obrigatorio"  required></input>
                    <div class="invalid-feedback">Digite uma senha.</div>
                </div>
            </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit"  value="submit" >Cadastrar terapeuta</button>
            </div>
     </form>
    </main>
    <!--Bootstrap e JS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>