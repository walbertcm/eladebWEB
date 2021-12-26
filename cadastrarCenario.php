<?php

include('conexaoBancoDados.php');

$idpergunta=$_GET['id'];

$sql = "INSERT INTO `cenario` (`idcenario`, `idpergunta`, `nome`, `dtcadastro`) 
VALUES (NULL, '$idpergunta', 'cenário 01', NOW())";


if (mysqli_query($conn, $sql)) {
    echo "New record has been added successfully !";
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }
 mysqli_close($conn);
?>