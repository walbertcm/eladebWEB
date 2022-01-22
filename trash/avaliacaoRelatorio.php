<?php
require_once("avaliacaoDbController.php");

$nomecenario = $_POST['state'];
$idpaciente = $_POST['country']; 

$db_handle = new DBController();

//echo "Paciente: $idpaciente <br> Nome do Cenario: $nomecenario ";
 
if(!empty($idpaciente)){
    $query = "SELECT  * FROM `cenario` 
    WHERE `idpaciente` = '" .$idpaciente. "' and `nomecenario` = '" .$nomecenario. "' ";
   
   $results = $db_handle->runQuery($query);

   foreach($results as $resultados){
    echo $resultados['idpaciente'] ;
    echo $resultados['nomecenario'] ; 
   }
}


?>