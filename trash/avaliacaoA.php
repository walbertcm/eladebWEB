<?php
require_once("avaliacaoDbController.php");
$db_handle = new DBController();
$query = "SELECT `pacienteid`,`NomePaciente`,`NomeResponsavel`,`Telefone`,`EmailPaciente`,`dt_cadastro` 
FROM `paciente` ORDER BY `pacienteid` ASC";
$results = $db_handle->runQuery($query);

?>

<!DOCTYPE html>
<head>
    <title>Configuração da Avaliação</title>
<style type="text/css">
    body{
        width:800px;
        font-family: Arial, Helvetica, sans-serif;
        padding: 0;
        margin: 0 auto;
    }
    .frm{
        border: 1px solid;
        background-color: aqua;
        margin: 0px auto;
        padding: 40px;
        border-radius: 4px;
    }
    .InputBox{
        padding: 10px;
        border: #bdbdbd 1px solid;
        border-radius: 4px;
        background-color: #FFF;
        width: 50%;
    }
    .row{
        padding-bottom: 15px;
        padding-left: 150px;
    }
</style>
<script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
   $(document).ready(function(){
    // Country dependent ajax
    $("#country-list").on("change",function(){
      var countryId = $(this).val();
      $.ajax({
        url :"avaliacaoController.php",
        type:"POST",
        cache:false,
        data:{countryId:countryId},
        success:function(data){
          $("#state-list").html(data);
        }
      });
    });
});
</script>
</head>
<body>
    <form name="Relatorio" action="avaliacaoRelatorio.php" method="POST">
    <div class="frm">
        <h1>Seleção de Avaliação</h1>    
        <div class="row">
            <select name="country" id="country-list" class="InputBox" >
                <option value disabled selected>Selecione o Paciente</option>
                <?php
                    foreach($results as $paciente){                        
                ?>
                <option value="<?php echo $paciente["pacienteid"]; ?>"><?php echo $paciente["NomePaciente"]; ?></option>
                <?php 
                    }
                ?>
            </select>

        </div>
    
        <div class="row">
            <select name="state" id="state-list" class="InputBox" >
                <option value="">Selecione o Cenario</option>
            </select>
        </div>        
        </div>
        <input type="button" name="Relatorio" value="Relatorio">
    </form>
        
       
</body>


</html>