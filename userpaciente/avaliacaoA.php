<?php
//Metodo para iniciar a sessao
session_start();

//Avalia se a sessao tem valores, foi definida, caso nao retorna o user para o login
if(!isset($_SESSION["emailUsuario"]) AND !isset($_SESSION["idUsuarioLogin"])){
    header("Location: ../index.html");
    die();
}else{
    $emailUsuario = $_SESSION["emailUsuario"];
    $idUsuarioLogin = $_SESSION["idUsuarioLogin"];
}

//Recebe variaveis metodo GET
$idPaciente = $_GET['idpc'];
$idAvaliacao = $_GET['idav'];

$_SESSION["idpaciente"] = $idPaciente;
$_SESSION["idavaliacao"] = $idAvaliacao;

?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
         <!--Css Bootstrap5 Renderização --> 
         <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Css --> 
        <link rel="stylesheet" type="text/css" href="css/avaliacao.css">
       
        <!--Css Bootstrap5 --> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/eladeb.js"></script>  
       <script>
            /* var idfisioterapeuta_javascript = "<?php echo $idfisioterapeuta;?>";
            var idpaciente_javascript = "<?php echo $idpaciente;?>";
            var idavaliacao_javascript = "<?php echo $idavaliacao;?>"; */
       </script>
                      
    </head>
    <body>
    <script type="text/javascript">
        var gameEladeb;
        function participar(){
            gameEladeb = window.open("../userpaciente/avaliacaoB.php","avaliacao");
        }

        function sair(){
            window.close();
            gameEladeb.close();
        }
    </script>

    <div class="container-fluid container-md mt-3 border">
        <div>
            <h2 class="text-center">Instruções</h2>
        </div>
        <h2 style="color: white;">Carta Número: <h1 id="counter-label" class="text-left" style="color: white;"> 0 </h1> </h2><br>                   
        <img id="images" width="400" height="400" class="mx-auto d-block"></img><br>
        
        <div class="text-center">
            <button type="button" onclick="sair()" class="btn btn-danger  btn-lg ">SAIR  </button>
            <button type="button" onclick="participar()" class="btn btn-success btn-lg ">PARTICIPAR</button>            
            <br><br>
        </div>
    </div>
      

    </body>
</html>