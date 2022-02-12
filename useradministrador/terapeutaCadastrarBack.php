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
}

include('../controller/conexaoDataBaseV2.php');

$nomeTerapeuta = $_POST['idNomet'];
$registroTerapeuta = $_POST['idRegistrot'];
$emailTerapeuta = $_POST['idEmailt'];
$senhaTerapeuta = $_POST['idSenhat'];

$sql = "INSERT INTO `terapeuta` (`nome`, `email`, `registro_profissional`, `senha`, `dt_cadastro`) VALUES ('$nomeTerapeuta', '$emailTerapeuta', '$registroTerapeuta', '$senhaTerapeuta', CURRENT_TIMESTAMP)";
$query=mysqli_query($conn, $sql);

if($query==true){
    header("Location: ../useradministrador/terapeutaExibir.php");
}else{
    echo"Erro no cadastro do paciente -> contate o dev.";
}


?>