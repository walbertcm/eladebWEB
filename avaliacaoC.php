<?php
    $idfisioterapeuta = 88;//$_POST["id_paciente"];
    $idpaciente = $_POST["id_paciente"];
    $idavaliacao = 88;//$_POST["id_paciente"];

    setcookie("idfisioterapeuta", $idfisioterapeuta, time()+3600, "/","", 0);
    setcookie("idpaciente", $idpaciente, time()+3600, "/","", 0); 
    setcookie("idavaliacao", $idavaliacao, time()+3600, "/", "", 0); 
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
       <script>
            var idfisioterapeuta_javascript = "<?php echo $idfisioterapeuta;?>";
            var idpaciente_javascript = "<?php echo $idpaciente;?>";
            var idavaliacao_javascript = "<?php echo $idavaliacao;?>";
       </script> 
               
    </head>
    <body >   
    <div class="container-fluid container-md mt-3 border">
        <h2>Carta Número: <h1 id="counter-label" class="text-left"> 0 </h1> </h2><br>                   
        <img id="images" width="400" height="400" class="mx-auto d-block"></img><br>
        <div class="text-center">
            <button type="button" onclick="questoesProblemaA()" id="botaoA" value="0" name="problema" class="btn btn-success btn-lg ">NÃO PROBLEMA</button>
            <button type="button" onclick="questoesProblemaB()" id="botaoB" value="1" name="problema" class="btn btn-warning btn-lg ">PROBLEMA</button>            
            <br><br>
        </div>
    </div>
    <script src="js/eladeb.js"></script>  
    <script type="text/javascript">
        //localStorage.setItem('paciente',idpaciente_javascript);
        recebePaciente(idfisioterapeuta_javascript, idpaciente_javascript,idavaliacao_javascript);
        nextImage();
    </script>  
    </body>
</html>