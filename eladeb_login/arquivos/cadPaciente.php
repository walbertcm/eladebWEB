<?php

include('conexaoBancoDados.php');

$nomepaciente=$_POST['NomePaciente'];
$nomeresponsavel=$_POST['NomeResponsavel'];
$email=$_POST['EmailPaciente'];
$telefone=$_POST['TelefonePaciente'];
$senha=$_POST['Senha'];


$sql = "INSERT INTO `paciente`( `idpaciente`, `nome`, `responsavel`, `telefone`, `email`, `senha`, `dt_cadastro`) 
VALUES ('', '$nomepaciente','$nomeresponsavel','$telefone','$email','$senha', NOW())";


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