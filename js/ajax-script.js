$(document).on('change','#pacienteid', function(){
    var countryID = $(this).val();
    if(countryID){
        $.ajax({
            type:'POST',
            url:'get_cenario.php',
            data:{'paciente_id':countryID},
            success:function(result){
                $('#cenario').html(result);
               
            }
        }); 
    }else{
        $('#paciente').html('<option value="">Paciente</option>');
        $('#cenario').html('<option value="">Cenario</option>'); 
    }
});