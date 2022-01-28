<?php

//Metodo para iniciar a sessao
session_start();
$email = $_SESSION["email"];
$id = $_SESSION["id"];

 
//Função para cadastrar o Login
function efetuaLogOff($idA, $emailA){
    include('controller/conexaoDataBaseV2.php');
    $sqlB = "UPDATE `loginLogger` SET `horalogoff`= NOW() WHERE `id`='$idA' AND  `email`= '$emailA' ; ";
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
$sqlA = "SELECT MAX(`id`) as id, `email`  FROM `loginLogger` where `email`= '$email' ";
$queryA = mysqli_query($conn, $sqlA);
    while($dados = mysqli_fetch_assoc($queryA)){
        $id = $dados["id"];
        $emailC = $dados["email"];
        efetuaLogOff($id, $emailC);
    }

 
?>