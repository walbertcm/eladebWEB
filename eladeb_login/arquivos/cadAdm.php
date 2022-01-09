<?php

include('conexaoBancoDados.php');

$nome=$_POST['NomeAdmin'];
$email=$_POST['EmailAdmin'];
$senha=$_POST['Senha'];
$cpf=$_POST['CpfAdmin'];

$sql = "INSERT INTO `admin` (`idadmin`, `nome`, `email`, `senha`, `cpf`, `dt_cadastro`) 
VALUES ('', '$nome', '$email', '$senha', '$cpf', NOW())";


if (mysqli_query($conn, $sql)) {
    echo "\n Informações Conferidas com Sucesso! \n";
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }
 mysqli_close($conn);
?>
<!DOCTYPE html>
<head></head>
<body>
    <br>

    <meta http-equiv="refresh" content="1; URL='index.html'"/>

    <br>

</body>
</html>
