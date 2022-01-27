<?php            
    $idfisioterapeuta = $_COOKIE["idfisioterapeuta"];     
    $idpaciente = $_COOKIE["idpaciente"];    
    $idavaliacao = $_COOKIE["idavaliacao"]; 

     //print_r($_COOKIE);
?>  

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--Css --> 
        <link rel="stylesheet" type="text/css" href="css/avaliacao.css">
        <!--Css Bootstrap5 Renderização --> 
        
        <!--Css Bootstrap5 --> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <script>       
            var idfisioterapeuta_javascript = "<?php echo $idfisioterapeuta;?>";
            var idpaciente_javascript = "<?php echo $idpaciente;?>";
            var idavaliacao_javascript = "<?php echo $idavaliacao;?>";
    </script>  
        <div class="container-fluid container-md mt-3 border">
            <h2 style="color: white;">Carta Número: <h1 id="counter-labelA" class="text-left" style="color: white;">0</h1> </h2><br>             
            <img id="images" width="400" height="400" class="mx-auto d-block"></img><br>
        <div class="text-center">
            <button type="button" onclick="questoesNecessidadeA()" id="botaoAA" value="0" name="necessidade" class="btn btn-warning btn-lg">NÃO HÁ NECESSIDADE <br> AJUDA ADICIONAL</button>
            <button type="button" onclick="questoesNecessidadeB()" id="botaoBB" value="1" name="necessidade" class="btn btn-warning btn-lg">PRECISO DE AJUDA <br> ADICIONAL</button>            
            <br><br>
        </div>
    </div>
    <script src="js/eladeb.js"></script>     
    <script>
        recebePaciente(idfisioterapeuta_javascript, idpaciente_javascript,idavaliacao_javascript);  
        necessidadeNextImage();
    </script>          
    </body>
</html>