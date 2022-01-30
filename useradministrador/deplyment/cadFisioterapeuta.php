<?php

include('conexaoBancoDados.php');

$nome=$_POST['NomeFisioterapeuta'];
$email=$_POST['EmailFisioterapeuta'];
$senha=$_POST['Senha'];
$registro_profissional=$_POST['RegistroFisioterapeuta'];

$sql = "INSERT INTO `fisioterapeuta` (`idterapeuta`, `nome`, `email`, `senha`, `registro_profissional`, `dt_cadastro`) 
VALUES ('', '$nome', '$email', '$senha', '$registro_profissional', NOW())";


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
    <h3><a href="index.php">Inicio</a></h3>
    <br>

</body>
</html>
