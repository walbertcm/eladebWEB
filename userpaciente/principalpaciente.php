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

function selecionaAvaliacoespaciente($idPaciente){
  include('../controller/conexaoDataBaseV2.php');
  $sqlA = "SELECT `idavaliacao` FROM `avaliacao` where `idpaciente` = '$idPaciente' GROUP BY `idavaliacao`";
  $queryA = mysqli_query($conn, $sqlA);
  while($dadosA=mysqli_fetch_array($queryA)){
    return $avaliacaoId = $dadosA['idavaliacao'];
  } 
}

function verificaStatusAvaliacao($idPacienteA, $idAvaliacaoA){
  include('../controller/conexaoDataBaseV2.php');
  $sqlE = "SELECT SUM(`avaliacaoRealizada`) as soma, COUNT(`avaliacaoRealizada`) as contagem FROM `avaliacao` WHERE `idpaciente` = '$idPacienteA' AND  `idavaliacao`='$idAvaliacaoA'";
  $queryE = mysqli_query($conn, $sqlE);
  while($dadosE=mysqli_fetch_array($queryE)){
     $somaE = $dadosE['soma'];
     $contagemE = $dadosE['contagem'];

    if($somaE == $contagemE){
      return $statusAvaliação =  "Completa";        
    }else{
      return $statusAvaliação =  "Incompleta";
    }
  }
}

include('../controller/conexaoDataBaseV2.php');

//1 - Selecionar as avaliacoes do paciente
//2 - Verificar se as avaliações estao completas ou incompletas (verificaStatusAvaliacao)


//$sql = "SELECT * FROM `avaliacao` a RIGHT JOIN paciente p ON a.idpaciente = p.pacienteid RIGHT JOIN terapeuta t on a.idterapeuta = t.idterapeuta WHERE p.EmailPaciente = '$emailUsuario' GROUP BY a.`idavaliacao`";
$sql = "SELECT * FROM `avaliacao` a RIGHT JOIN paciente p ON a.idpaciente = p.pacienteid RIGHT JOIN terapeuta t on a.idterapeuta = t.idterapeuta RIGHT JOIN cenario c ON a.idcenario = c.idcenario WHERE p.EmailPaciente = '$emailUsuario' GROUP BY a.`idavaliacao`";
$query = mysqli_query($conn, $sql);

?>
 <!--Template-->
<!--view-source:https://getbootstrap.com/docs/4.0/examples/starter-template/-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>...::: Paciente :::... </title>

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">

</head>
<body>
    <?php include("../userpaciente/include/navbarPaciente.html");?>

    <main role="main" class="container">
     <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                  <h2>Minhas avaliações</h2>  
                  <thead>
                    <tr>
                      <th scope="col" class="text-center">Terapeuta responsável</th>
                      <th scope="col" class="text-center">Nome do paciente</th>
                      <th scope="col" class="text-center">Identificador da avaliação</th>
                      <th scope="col" class="text-center">Nome do Cenário</th>
                      <th scope="col" class="text-center">Status da avaliação</th>                      
                      <th scope="col" class="text-center"></th>
                    </tr>
                    </thead>
                    <!-- Corpo da Tabela-->
                    <!--https://bootsnipp.com/snippets/2P90-- Exemplo parcial>-->
                    <tbody>
                    <?php 
                    while($dados=mysqli_fetch_array($query)){
                          $idAvaliacaoA = $dados['idavaliacao'];
                          $idPacienteA = $dados['idpaciente'];

                          $statusAvaliacao = verificaStatusAvaliacao($dados['idpaciente'], $dados['idavaliacao']); 
                          //Funcão para habilitar o botao
                          if($statusAvaliacao == "Completa"){ 
                            $classButton = "btn btn-primary btn-md disabled"; 
                          }else{$classButton = "btn btn-primary btn-md ";}                                               

                          echo "<tr>";
                            echo "<td class="."text-left".">".$dados['nome']."</td>";
                            echo "<td class="."text-left".">".$dados['NomePaciente']."</td>";
                            echo "<td class="."text-center".">".$dados['idavaliacao']."</td>";
                            echo "<td class="."text-center".">".$dados['nomecenario']."</td>";                            
                            echo "<td class="."text-center".">".$statusAvaliacao."</td>";                            
                            echo "<td class="."text-center".">".'<a href="" class="'.$classButton.'" role="button" aria-pressed="true" onclick="abreBotao(\''.$idAvaliacaoA.'\',\''.$idPacienteA.'\')" >Realizar</a>'."</td>";
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
    <script>
      //Função apara abrir uma nova janela com tamanho e largura definidos ... inicia avaliacao... função em JS captada pelo metodo onclick (botao)
            function abreBotao(idavaliacao, idpaciente){
              novaJanela = window.open ("../userpaciente/avaliacaoA.php?idav="+idavaliacao+"&idpc="+1,"avaliacao","menubar=1,resizable=1,width=1072,height=685");
            }
      </script>
  </body>
</html>