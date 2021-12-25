<?php

include('conexaoBancoDados.php');

$txtnome=$_POST['NomeFisioterapeuta'];
$txtemail=$_POST['EmailFisioterapeuta'];
$txtsenha=$_POST['Senha'];
$txtregistro_profissional=$_POST['RegistroFisioterapeuta'];

$sql = "INSERT INTO `fisioterapeuta` (`idterapeuta`, `nome`, `email`, `senha`, `registro_profissional`, `dt_cadastro`) 
VALUES ('', '$txtnome', '$txtemail', '$txtsenha', '$txtregistro_profissional', NOW())";


if (mysqli_query($conn, $sql)) {
    echo "New record has been added successfully !";
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }
 mysqli_close($conn);


?>