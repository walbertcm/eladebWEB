<?php

//Metodo para iniciar a sessao
session_start();

$emailUsuario = $_SESSION["emailUsuario"];
$idUsuarioLogin = $_SESSION["idUsuarioLogin"];

 
//Função para cadastrar o Login
function efetuaLogOff($idLoggerA, $emailLoggerA){
    include('controller/conexaoDataBaseV2.php');
    $sqlB = "UPDATE `loginLogger` SET `horalogoff`= NOW() WHERE `id`='$idLoggerA' AND  `email`= '$emailLoggerA' ; ";
    $queryB = mysqli_query($conn, $sqlB);
    //Remove todas as sessões dasa variaveis
    session_unset();
    //Destroi as sessões
    session_destroy();
    //Redirecionamento
    header("Location: index.html");
}

//Conexão do banco de dados online
include('controller/conexaoDataBaseV2.php');

 //Seleção do ultimo registro do usuario, provavel login do usuario atual
$sqlA = "SELECT MAX(`id`) as idLogger, `email`  FROM `loginLogger` where `email`= '$emailUsuario' ";
$queryA = mysqli_query($conn, $sqlA);
    while($dados = mysqli_fetch_assoc($queryA)){
        $loginLogger = $dados["idLogger"];
        $emailLogger = $dados["email"];
        efetuaLogOff($loginLogger, $emailLogger);
    }

 
?>