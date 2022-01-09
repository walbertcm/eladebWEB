<?php

include('conexaoBancoDados.php');

$nomepaciente=$_POST['NomePaciente'];
$nomeresponsavel=$_POST['NomeResponsavel'];
$email=$_POST['EmailPaciente'];
$cpf=$_POST['CpfPaciente'];
$senha=$_POST['Senha'];


$sql = "INSERT INTO `paciente`(  `NomePaciente`, `NomeResponsavel`, `cpf`, `EmailPaciente`, `senha`) 
VALUES ('$nomepaciente','$nomeresponsavel','$cpf','$email','$senha')";


if (mysqli_query($conn, $sql)) {
    echo "New record has been added successfully !";
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }
 mysqli_close($conn);
?>
</br>
    <h3>
       <a href="index.html">Inicio</a>
   </h3>