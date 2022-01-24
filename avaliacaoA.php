<?php       
    //Acessa o banco de dados    
    include('conexaoBancoDados.php');        
    
    //Instrução para selecionar o Fisioterapeurta
    $sqlA = "SELECT `idterapeuta`,`nome`,`email` FROM `fisioterapeuta`;";

    //Instrução SQL selecionar Paciente
   // $sqlB = "SELECT `pacienteid`,`NomePaciente`,`NomeResponsavel`,`Telefone`,`EmailPaciente`,`dt_cadastro` 
    //FROM `paciente` ORDER BY `NomePaciente` ASC";

    //Executa a instrução SQLA  
    $queryA = mysqli_query($conn,$sqlA);
    //$queryB = mysqli_query($conn,$sqlB);
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Avaliação - Seleção do Paciente para Nova Avaliação</title>
    <link rel="stylesheet" type="text/css" href="css/avaliacao.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <style type="text/css">
        .carregando{
            color: #ff0000;
            display: none;
        }
    </style>
    
</head>    
<body>
<div class="container-fluid container-md mt-3 border">
   
<form method="POST" action="avaliacaoC.php"><br><br>        
        <div class="panel">
            <label>Selecione o Fisioterapeuta:<?php ?></label>
            <select id="id_fisioterapeuta" name="id_fisioterapeuta">
                <option value="">--Fisioterapeuta--</option><>
                <?php
                    while($row_paciente = mysqli_fetch_assoc($queryA)) {
                        echo '<option value="'.$row_paciente['idterapeuta'].'">'.$row_paciente['nome'].'</option>'; 
                    } 
                ?>
            </select> <br><br>

            <!--Cenario -->
            <label>Selecione o Paciente:</label> 
            <span class="carregando">Aguarde, carregando...</span>       
            <select id="id_paciente" name="id_paciente">
                <option value="">--Paciente--</option>
            </select><br><br>

            <input type="submit" value="Nova Avaliação">
            
        </div>
        <div class="text-center">
        <!--<button type="button" value="Prosseguir" class="btn bt-sucess btn-lg">PROSSEGUIR</button> -->
        <!--<input type="submit" name="enviar" value="PROSSEGUIR">-->
        </div>

</form>
</div> 
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
		  google.load("jquery", "1.4.2");
	</script>
    <!--Função responsavel por carregar o paciente e popular o listbox-->
    <script type="text/javascript">
		$(function(){
			$('#id_fisioterapeuta').change(function(){
				if( $(this).val() ) {
					$('#id_paciente').hide();
					$('.carregando').show();
					$.getJSON('avaliacaoAget.php?search=',{id_fisioterapeuta: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Paciente</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].pacienteid + '">' + j[i].nomepaciente + '</option>';
						}	
						$('#id_paciente').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#id_paciente').html('<option value="">– Escolha Subcategoria –</option>');
				}
			});
		});
	</script>
    

</body>
</html>