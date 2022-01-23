<?php
require_once("avaliacaoDbController.php");

$idpaciente = $_POST["countryId"];
echo $_POST["countryId"];

$db_handle = new DBController();
if(!empty($idpaciente)){
    $query = "SELECT  `nomecenario`, `idpaciente` 
    FROM `cenario` WHERE `idpaciente` = '".$idpaciente."' GROUP BY `nomecenario` ASC";
   
   $results = $db_handle->runQuery($query);
?>
    <option value=""> Selecione o Cenario</option>
<?php
    foreach($results as $state){
        ?>
    <option value="<?php echo $state["nomecenario"]; ?>"><?php echo $state["nomecenario"]; ?></option>
    <?php
    }
}
?>
