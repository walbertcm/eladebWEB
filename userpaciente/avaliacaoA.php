<?php
//Metodo para iniciar a sessao
    session_start();

//Avalia se a sessao tem valores, foi definida, caso nao retorna o user para o login
    if(!isset($_SESSION["emailUsuario"]) AND !isset($_SESSION["idUsuarioLogin"])){
        header("Location: ../index.html");
        die();
    }else{
        $emailUsuario   = $_SESSION["emailUsuario"];
        $idUsuarioLogin = $_SESSION["idUsuarioLogin"];
    }

//Recebe variaveis metodo GET
    $idPaciente  = $_GET['idpc'];
    $idAvaliacao = $_GET['idav'];

//Box
    $_SESSION["idpaciente"]  = $idPaciente;
    $_SESSION["idavaliacao"] = $idAvaliacao;
?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/avaliacao.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>                      
    </head>
    <body>
    <script type="text/javascript">
        var gameEladeb;
        function participar(){
            gameEladeb = window.open("../userpaciente/avaliacaoB/avaliacaoNivelA.php","avaliacao");
        }
        function sair(){
            window.close();
            gameEladeb.close();
        }
    </script>

    <div class="container-fluid container-md mt-3 ">
        <div>
            <h2 class="text-center">Instruções</h2>
        </div>

        <img id="images" width="400" height="400" class="mx-auto d-block"></img><br>
        
        <div class="text-center">
            <button type="button" onclick="sair()"       class="btn btn-danger  btn-lg ">SAIR  </button>
            <button type="button" onclick="participar()" class="btn btn-success btn-lg ">PARTICIPAR</button>            
            <br><br>
        </div>
    </div>
      
    </body>
</html>