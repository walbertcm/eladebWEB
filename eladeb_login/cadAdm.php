<?php

include('conexaoBancoDados.php');

$nome=$_POST['NomeAdmin'];
$email=$_POST['EmailAdmin'];
$senha=$_POST['Senha'];
$cpf=$_POST['CpfAdmin'];

$sql = "INSERT INTO `Admin` (`idterapeuta`, `nome`, `email`, `senha`, `cpf`, `dt_cadastro`) 
VALUES ('', '$nome', '$email', '$senha', '$cpf', NOW())";


if (mysqli_query($conn, $sql)) {
    echo "New record has been added successfully !";
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }
 mysqli_close($conn);
?>
<!DOCTYPE html>
<head></head>
<body>
    <br>
    <h3><a href="index.html">Inicio</a></h3>
    <br>

</body>
</html>
