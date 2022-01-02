<?php

include('conexaoBancoDados.php');

$nomeCenario = $_POST['nomeCenario'];
$paciente = $_POST['pacienteId'];
$questoes= count($_POST['users']);


for($i=0;$i<$questoes;$i++) {
    mysqli_query($conn, "INSERT INTO `cenario` (`idpaciente`,`idpergunta`, `nomecenario`, `dtcadastro`) 
    VALUES ('$paciente', '".$_POST['users'][$i]."', '$nomeCenario', NOW())");
    }
    header("Location:index.html");


//Fecha a conexão
mysqli_close($conn);

?>