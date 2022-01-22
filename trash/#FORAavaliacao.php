<?php       
    //Acessa o banco de dados    
    include('conexaoBancoDados.php');        
    
    //Instrução SQL selecionar Paciente
    $sqlA = "SELECT `pacienteid`,`NomePaciente`,`NomeResponsavel`,`Telefone`,`EmailPaciente`,`dt_cadastro` 
    FROM `paciente` ORDER BY `NomePaciente` ASC";

    //Executa a instrução SQLA  
    $queryA = mysqli_query($conn,$sqlA);
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Avaliação - Configurações </title>
        
        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
            <script type="text/javascript">
            $(document).ready(function()
            {
                $(".country").change(function()
            {
                var id=$(this).val();
                var dataString = 'id='+ id;
            
            $.ajax
            ({
            type: "POST",
            url: "get_state.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $(".state").html(html);
            } 
            });
            });
            
            
            $(".state").change(function()
            {
            var id=$(this).val();
            var dataString = 'id='+ id;
            
            
            });
            </script>
    </head>
    
    <body>
    <form method="POST" action="">
        <br><br>
    <!--Paciente -->
    <label>Selecione o paciente:</label>        
    <select id="id_paciente" name="id_paciente">
        <option value="">--Selecione o Paciente--</option><>
        <?php
            while($row_paciente = mysqli_fetch_assoc($queryA)) {
                echo '<option value="'.$row_paciente['pacienteid'].'">'.$row_paciente['pacienteid'].'</option>'; 
            } 
        ?>
    </select> <br><br>
    
    <!--Cenario -->
    <label>Selecione o cenario:</label> 
    <span class="carregando">Aguarde, carregando...</span>       
    <select id="id_cenario" name="id_cenario">
        <option value="">--Selecione o Cenario--</option>
    </select><br><br>

    <input type="submit" value="Cadastrar">
    
    
    </form>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
		  google.load("jquery", "1.4.2");
		</script>
    <script type="text/javascript">
		$(function(){
			$('#id_paciente').change(function(){
				if( $(this).val() ) {
					$('#id_cenario').hide();
					$('.carregando').show();
					$.getJSON('avaliacao_get.php?search=',{id_paciente: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Subcategoria</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nomecenario + '</option>';
						}	
						$('#id_cenario').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#id_cenario').html('<option value="">– Escolha Subcategoria –</option>');
				}
			});
		});
		</script>
    
    </body>
    
</html>