<?php

include('conexaoBancoDados.php');

$nome=$_POST['NomeTerapeuta'];
$email=$_POST['EmailTerapeuta'];
$senha=$_POST['Senha'];
$registro_profissional=$_POST['RegistroTerapeuta'];

$sql = "INSERT INTO `terapeuta` (`idterapeuta`, `nome`, `email`, `senha`, `registro_profissional`, `dt_cadastro`) 
VALUES ('', '$nome', '$email', '$senha', '$registro_profissional', NOW())";


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
