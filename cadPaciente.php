<?php

include('conexaoBancoDados.php');

$nomepaciente=$_POST['NomePaciente'];
$nomeresponsavel=$_POST['NomeResponsavel'];
$email=$_POST['EmailPaciente'];
$telefone=$_POST['Telefone'];
$senha=$_POST['Senha'];


$sql = "INSERT INTO `paciente`(  `NomePaciente`, `NomeResponsavel`, `Telefone`, `EmailPaciente`, `senha`) 
VALUES ('$nomepaciente','$nomeresponsavel','$telefone','$email','$senha')";


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