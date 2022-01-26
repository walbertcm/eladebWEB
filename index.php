<?php 
     setcookie("idfisioterapeuta", "", time()-1800);
     setcookie("idpaciente", "", time()-1800); 
     setcookie("idavaliacao", "", time()-1800); 
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8"> 
    <title>Cadastro Fisioterapeuta</title>
    
</head>    
    <body>
        <h1>Terapeuta</h1>
        <br>
        <h3><a href="cadastrarFisioterapeuta.html">Cadastrar Terapeuta</a></h3>
        <br>
        <h3><a href="exibirFisioterapeuta.php">Exibir Terapeuta</a></h3>
        <br>
        <br>
        <h1>Paciente</h1>
        <br>
        <h3><a href="cadastrarPaciente.html">Cadastrar Paciente</a></h3>
        <br>
        <h3><a href="exibirPaciente.php">Exibir Paciente</a></h3>
        <br>
        <br>
        <h1>Avaliar</h1>
        <button onclick="novaJanela()">Realizar Avaliação</button>
        <script src="js/eladeb.js"></script>
        <br>
        <h1>Resultados</h1>
        <br>
        <h3><a href="resultadoA.php">Exibir Resultados</a></h3>
        <br>
        <br>
        <h1>Consultas</h1>
        <br>
        <h3><a href="cadConsulta.php">Cadastrar Consulta</a></h3>
        <br>
        <br>
        <h1>Perguntas</h1>
        <br>
        <h3><a href="cadastrarPerguntas.html">Cadastrar Perguntas</a></h3>
        <br>
        <h3><a href="exibirPerguntas.php">Exibir Perguntas</a></h3>
        <br>
        <h1>Cenários</h1>
        <br>
        <h3><a href="cadastrarCenario.php">Cadastrar Cenários</a></h3>
        <br>
        <h3><a href="exibirCenarioMid.php">Exibir Cenários</a></h3>
        <br>


    </body>
</html>