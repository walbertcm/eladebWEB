<?php

include('conexaoBancoDados.php');

$txtnomepaciente=$_POST['NomePaciente'];
$txtnomeresponsavel=$_POST['NomeResponsavel'];
$txtemail=$_POST['EmailPaciente'];
$txttelefone=$_POST['Telefone'];
$txtsenha=$_POST['Senha'];


$sql = "INSERT INTO `paciente`(  `NomePaciente`, `NomeResponsavel`, `Telefone`, `EmailPaciente`, `senha`) 
VALUES ('$txtnomepaciente','$txtnomeresponsavel','$txttelefone','$txtemail','$txtsenha')";


if (mysqli_query($conn, $sql)) {
    echo "New record has been added successfully !";
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }
 mysqli_close($conn);


?>