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

$nomePaciente = $_POST['idNome'];
$nomeResponsavel = $_POST['idRespopnsavel'];
$telefonePaciente = $_POST['idTelefone'];
$emailPaciente = $_POST['idEmail'];

$sql = "INSERT INTO `paciente` (`NomePaciente`, `NomeResponsavel`, `Telefone`, `EmailPaciente`, `dt_cadastro`) VALUES ('$nomePaciente', '$nomeResponsavel', '$telefonePaciente', '$emailPaciente', CURRENT_TIMESTAMP)";
$query=mysqli_query($conn, $sql);

if($query==true){
    header("Location: ../useradministrador/pacienteExibir.php");
}else{
    echo"Erro no cadastro do paciente -> contate o dev.";
}


?>