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

//Seleção dos pacientes para exibição
//Conexão com o banco de dados
include('../controller/conexaoDataBaseV2.php');

//Seleciona o numero de pacientes
$sql = "SELECT `pacienteid`, `NomePaciente`, `NomeResponsavel`, `Telefone`, `EmailPaciente`, `dt_cadastro` FROM `paciente` ORDER BY `NomePaciente` ";
$query = mysqli_query($conn,$sql);

//Função para calcular o numero de avaliações, retorna o maximo ID da avaliação
function calcularNumeroAvaliacoes($idPacienteA){
    include('../controller/conexaoDataBaseV2.php');
    $sqlN = "SELECT MAX(`idavaliacao`) as numero FROM `avaliacao` WHERE `idpaciente` = '$idPacienteA'"; 
    $queryA = mysqli_query($conn,$sqlN);
    while($avaliacaoes = mysqli_fetch_array($queryA)) { 
        $resultado = $avaliacaoes["numero"];
        return $resultado; 
    }        
}
?>
<!--Template-->
<!--view-source:https://getbootstrap.com/docs/4.0/examples/starter-template/-->

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
<?php include("../userterapeuta/include/navbarTerapeuta.html");?>

<main role="main" class="container">
     <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
            <h2>Lista de pacientes</h2>  
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                    <th scope="col" class="text-center">Nome do paciente</th>
                    <th scope="col" class="text-center">Responsável do paciente</th>
                    <th scope="col" class="text-center">Email do paciente</th>
                    <th scope="col" class="text-center">Telefone do paciente</th>
                    <th scope="col" class="text-center">Quant. de<br> avaliações do paciente</th>
                    <th scope="col" class="text-center">Resultados das avaliaçoes</th>
                    </thead>
                    <!-- Corpo da Tabela-->
                    <!--https://bootsnipp.com/snippets/2P90-- Exemplo parcial>-->
                    <tbody>

                    <?php 
                        while($dado = mysqli_fetch_array($query)) {
                            $aaa = $dado['pacienteid'];
                            echo "<tr>";
                            echo "<td class="."text-left".">".$dado['NomePaciente']."</td>";
                            echo "<td class="."text-left".">".$dado['NomeResponsavel']."</td>";
                            echo "<td class="."text-center".">".$dado['EmailPaciente']."</td>";
                            echo "<td class="."text-center".">".$dado['Telefone']."</td>";
                            echo "<td class="."text-center".">".calcularNumeroAvaliacoes($aaa)."</td>";
                            echo "<td class="."text-center".">".'<a href="resultadoExibir.php?id='.$dado['pacienteid'].'&email='.$dado['EmailPaciente'].' " class="btn btn-primary btn-md" role="button" aria-pressed="true">Acessar</a>'."</td>";                            
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