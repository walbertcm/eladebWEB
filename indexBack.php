<?php
 //Conexão do banco de dados online
 include('controller/conexaoDataBaseV2.php');

 //Metodo para iniciar a sessao
 session_start();

 //Recebe elementos POST
 $emailA = $_POST['email'];
 $pass = $_POST['pass'];



//Função para cadastrar o log de acesso
 function cadastraLogAcesso($emailB){
    include('controller/conexaoDataBaseV2.php');
    $sqlB = "INSERT INTO `loginLogger` (`id`, `datahora`, `email`, `horalogin`) VALUES (NULL, CURRENT_TIMESTAMP, '$emailB', CURRENT_TIMESTAMP); ";
    $queryB = mysqli_query($conn, $sqlB);
}

//Selecao no banco de dados tabela terapeuta
function selecionaIdTerapeuta($emailC){
    include('controller/conexaoDataBaseV2.php');
    $sqlC = "SELECT * FROM `terapeuta` WHERE `email` = '$emailC'";
    $queryC = mysqli_query($conn, $sqlC);
    while($dadosC=mysqli_fetch_array($queryC)){
       $terapeutaId = $dadosC["idterapeuta"];
       return $terapeutaId;
    }
}

//Selecao no banco de dados tabela paciente
function selecionaIdPaciente($emailD){
    include('controller/conexaoDataBaseV2.php');
    $sqlD = "SELECT * FROM `paciente` WHERE `EmailPaciente` = '$emailD'";
    $queryD = mysqli_query($conn, $sqlD);
    while($dadosD=mysqli_fetch_array($queryD)){
       $pacienteId = $dadosD["pacienteid"];
       return $pacienteId;
    }
}

//Selecao no banco de dados tabela administrador
function selecionaIdAdministrador($emailE){
    include('controller/conexaoDataBaseV2.php');
    $sqlE = "SELECT * FROM `administrador` WHERE `email` = '$emailE'";
    $queryE = mysqli_query($conn, $sqlE);
    while($dadosE=mysqli_fetch_array($queryE)){
       $administradorId = $dadosE["administradorid"];
       return $administradorId;
    }
}


//Seleção no banco de dados tabela loginSistema
$sqlA = "SELECT * FROM `loginSistema` WHERE `usuario` = '$emailA' AND `senha` = '$pass' ";
$queryA = mysqli_query($conn, $sqlA);

$permissaoAcesso = 0;
$tipoUsuario = 0;

 //Processamento das respostas
 while($dados = mysqli_fetch_assoc($queryA)){
    $idUsuarioLogin=$dados["id"];
    $emailBx=$dados["usuario"]; //usuario tem somente email nao é o nome --> Tab. loginSistemas
    $tipoUsuario=$dados['tipo'];
    $permissaoAcesso = $dados['permissao'];
 }
          
            switch(true){
                case ($tipoUsuario == 1): //Configura a sessao Administrador                    
                    $_SESSION["emailUsuario"] = $emailBx;
                    $_SESSION["idUsuarioLogin"] = $idUsuarioLogin;
                    //$_SESSION["administrador"] = selecionaIdAdministrador($emailA);
                    cadastraLogAcesso($emailBx); //Cadastro da hora do login
                    header("Location: useradministrador/principaladministrador.php?email=$emailBx");
                    break;
                case ($tipoUsuario == 2): //Configura a sessao Terapeuta                    
                    $_SESSION["emailUsuario"] = $emailBx;
                    $_SESSION["idUsuarioLogin"] = $idUsuarioLogin;
                    $_SESSION["idTerapeuta"] = selecionaIdTerapeuta($emailA);
                    cadastraLogAcesso($emailBx); //Cadastro da hora do login
                    header("Location: userterapeuta/principalterapeuta.php?email=$emailBx");
                    break;
                case ($tipoUsuario == 3): //Configura a sessao Paciente                    
                    $_SESSION["emailUsuario"] = $emailBx;
                    $_SESSION["idUsuarioLogin"] = $idUsuarioLogin;            
                    $_SESSION["idPaciente"] = selecionaIdPaciente($emailA);
                    cadastraLogAcesso($emailBx); //Cadastro da hora do login
                    header("Location: userpaciente/principalpaciente.php?email=$emailBx");
                    break;
                default:
                   // $script="<script>alert('Login/Senha Errados !');</script>";
                    //echo $script;
                    header("Location: index.html");
                    break;
            }
        
 
 ?>


