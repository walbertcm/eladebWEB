<?php
//Metodo para iniciar a sessao


echo $idterapeuta = $_GET["idt"];
echo $idpaciente = $_GET["idpc"];
echo $idavaliacao = $_GET["idav"];

echo " ";
echo $tipoAjuda = $_GET["tipoAjuda"];
echo " ";
echo $configAjuda = $_GET["configAjuda"];


/* function updateAvaliacao($idpaciente,$idAvaliacao,$resultadoAvaliacao){
    include('../controller/conexaoDataBaseV2.php');
    $sqlB = "SELECT `idcenario`, `nomecenario`, `idterapeuta` FROM `cenario` WHERE `nomecenario` = '$cenarioNomeA';  ";
    $queryB=mysqli_query($conn,$sqlB);
    while($dado = mysqli_fetch_array($queryB)){
        $idcenarioX = $dado['idcenario'];
        return  $idcenarioX;
    } */



?>