<?php

session_start();

//Avalia se a sessao tem valores, foi definida, caso nao retorna o user para o login
if(!isset($_SESSION["emailUsuario"]) AND !isset($_SESSION["idUsuarioLogin"]) AND !isset($_SESSION["idTerapeuta"])){
    header("Location: ../index.html");
    die();
}else{
    $emailUsuario = $_SESSION["emailUsuario"];
    $idUsuarioLogin = $_SESSION["idUsuarioLogin"];
    $idTerapeuta = $_SESSION["idTerapeuta"];
}

$idterapeuta = $_GET["idt"];
$idpaciente = $_GET["idpc"];
$idavaliacao = $_GET["idav"];


function recebeNomePaciente($idpacienteA){
    include('../controller/conexaoDataBaseV2.php');
    $sqlN = "SELECT * FROM `paciente` where `pacienteid` = '$idpacienteA'"; 
    $queryA = mysqli_query($conn,$sqlN);
    while($avaliacaoes = mysqli_fetch_array($queryA)) { 
        $resultado = $avaliacaoes["NomePaciente"];
        return $resultado; 
    }           
}

//ajustar
function selecionaResultadoAvaliacao($idavaliacaoB, $idpacienteB, $idterapeutaB){
    include('../controller/conexaoDataBaseV2.php');
    //$sqlN = "SELECT * FROM `paciente` where `pacienteid` = '$idpacienteA'"; 
    $sqlM = "SELECT * FROM `resultadoAvaliacao` where `idAvaliacao` = '$idavaliacaoB' and `idPaciente`='$idpacienteB' and `idTerapeuta`= '$idterapeutaB' ;";
    $queryM = mysqli_query($conn,$sqlM);
    while($resultadoM = mysqli_fetch_array($queryM)) { 
        $resultadoavaliacaoM = $resultadoM["resultadoAvaliacao"];
        return $resultadoavaliacaoM; 
    }           
}


include('../controller/conexaoDataBaseV2.php');

$sqlA="SELECT * FROM `avaliacao` WHERE `idterapeuta` = '$idterapeuta' AND `idpaciente`='$idpaciente' AND `idavaliacao`=$idavaliacao ORDER BY etapa, numquestao;";

    //Variaveis
    $etapaA1=0;
    $etapaA2=0;
    $etapaA3=0;
    $etapaA4=0;
    $etapaA5=0;
    $etapaA6=0;
    $etapaA7=0;
    $etapaA8=0;
    $etapaA9=0;
    $etapaA10=0;
    $etapaA11=0;
    $etapaA12=0;
    $etapaA13=0;
    $etapaA14=0;
    $etapaA15=0;
    $etapaA16=0;
    $etapaA17=0;
    $etapaA18=0;
    $etapaA19=0;
    $etapaA20=0;

    $etapaB1=0;
    $etapaB2=0;
    $etapaB3=0;
    $etapaB4=0;
    $etapaB5=0;
    $etapaB6=0;
    $etapaB7=0;
    $etapaB8=0;
    $etapaB9=0;
    $etapaB10=0;
    $etapaB11=0;
    $etapaB12=0;
    $etapaB13=0;
    $etapaB14=0;
    $etapaB15=0;
    $etapaB16=0;
    $etapaB17=0;
    $etapaB18=0;
    $etapaB19=0;
    $etapaB20=0;

    $etapaC1=0;
    $etapaC2=0;
    $etapaC3=0;
    $etapaC4=0;
    $etapaC5=0;
    $etapaC6=0;
    $etapaC7=0;
    $etapaC8=0;
    $etapaC9=0;
    $etapaC10=0;
    $etapaC11=0;
    $etapaC12=0;
    $etapaC13=0;
    $etapaC14=0;
    $etapaC15=0;
    $etapaC16=0;
    $etapaC17=0;
    $etapaC18=0;
    $etapaC19=0;
    $etapaC20=0;

    $etapaD1=0;
    $etapaD2=0;
    $etapaD3=0;
    $etapaD4=0;
    $etapaD5=0;
    $etapaD6=0;
    $etapaD7=0;
    $etapaD8=0;
    $etapaD9=0;
    $etapaD10=0;
    $etapaD11=0;
    $etapaD12=0;
    $etapaD13=0;
    $etapaD14=0;
    $etapaD15=0;
    $etapaD16=0;
    $etapaD17=0;
    $etapaD18=0;
    $etapaD19=0;
    $etapaD20=0;
        
    $etapaE1=0;
    $etapaE2=0;
    $etapaE3=0;
    $etapaE4=0;
    $etapaE5=0;
    $etapaE6=0;
    $etapaE7=0;
    $etapaE8=0;
    $etapaE9=0;
    $etapaE10=0;
    $etapaE11=0;
    $etapaE12=0;
    $etapaE13=0;
    $etapaE14=0;
    $etapaE15=0;
    $etapaE16=0;
    $etapaE17=0;
    $etapaE18=0;
    $etapaE19=0;
    $etapaE20=0;
    
    $etapaF1=0;
    $etapaF2=0;
    $etapaF3=0;
    $etapaF4=0;
    $etapaF5=0;
    $etapaF6=0;
    $etapaF7=0;
    $etapaF8=0;
    $etapaF9=0;
    $etapaF10=0;
    $etapaF11=0;
    $etapaF12=0;
    $etapaF13=0;
    $etapaF14=0;
    $etapaF15=0;
    $etapaF16=0;
    $etapaF17=0;
    $etapaF18=0;
    $etapaF19=0;
    $etapaF20=0;
    
    $etapaG1=0;
    $etapaG2=0;
    $etapaG3=0;
    $etapaG4=0;
    $etapaG5=0;
    $etapaG6=0;
    $etapaG7=0;
    $etapaG8=0;
    $etapaG9=0;
    $etapaG10=0;
    $etapaG11=0;
    $etapaG12=0;
    $etapaG13=0;
    $etapaG14=0;
    $etapaG15=0;
    $etapaG16=0;
    $etapaG17=0;
    $etapaG18=0;
    $etapaG19=0;
    $etapaG20=0;
            
    $subtotalA1=0;
    $subtotalA2=0;
    $subtotalA3=0;
    $subtotalA4=0;
    $subtotalA5=0;
    $subtotalB1=0;
    $subtotalB2=0;
    $subtotalB3=0;
    $subtotalB4=0;
    $subtotalB5=0;
    $subtotalC1=0;
    $subtotalC2=0;
    $subtotalC3=0;
    $subtotalC4=0;
    $subtotalC5=0;
    $subtotalD1=0;
    $subtotalD2=0;
    $subtotalD3=0;
    $subtotalD4=0;
    $subtotalD5=0;
    $subtotalE1=0;
    $subtotalE2=0;
    $subtotalE3=0;
    $subtotalE4=0;
    $subtotalE5=0;
    
    $totalA1=0;
    $totalB1=0;
    $totalC1=0;
    $totalD1=0;
    $totalE1=0;

//Terminam as variaveis
    $queryA = mysqli_query($conn, $sqlA);
    while($dados= mysqli_fetch_array($queryA)){
        $etapa = $dados['etapa'];
        $numquestao = $dados['numquestao'];
        $resultado = $dados['resultado'];
        $grupopontuacao = $dados['grupopontuacao'];
        $tipoajuda = $dados['tipoajuda'];
        $configajuda = $dados['configAjuda'];
        //$textoAvaliação = $dados['texto'];

//Decisao        
        if ($numquestao ==1  and  $etapa==1) {
            $etapaA1 = $resultado;
            $etapaF1 = $tipoajuda;
            $etapaG1 = $configajuda;
        }elseif  ($numquestao ==2  and  $etapa==1){
            $etapaA2 = $resultado;
            $etapaF2 = $tipoajuda;
            $etapaG2 = $configajuda;
        }elseif  ($numquestao ==3  and  $etapa==1){
            $etapaA3 = $resultado;
            $etapaF3 = $tipoajuda;
            $etapaG3 = $configajuda;
        }elseif  ($numquestao ==4  and  $etapa==1){
            $etapaA4 = $resultado;
            $etapaF4 = $tipoajuda;
            $etapaG4 = $configajuda;
        }elseif  ($numquestao ==5  and  $etapa==1){
            $etapaA5 = $resultado;
            $etapaF5 = $tipoajuda;
            $etapaG5 = $configajuda;
        }elseif  ($numquestao ==6  and  $etapa==1){
            $etapaA6 = $resultado;
            $etapaF6 = $tipoajuda;
            $etapaG6 = $configajuda;
        }elseif  ($numquestao ==7  and  $etapa==1){
            $etapaA7 = $resultado;
            $etapaF7 = $tipoajuda;
            $etapaG7 = $configajuda;
        }elseif  ($numquestao ==8  and  $etapa==1){
            $etapaA8 = $resultado;
            $etapaF8 = $tipoajuda;
            $etapaG8 = $configajuda;
        }elseif  ($numquestao ==9  and  $etapa==1){
            $etapaA9 = $resultado;
            $etapaF9 = $tipoajuda;
            $etapaG9 = $configajuda;
        }elseif  ($numquestao ==10  and  $etapa==1){
            $etapaA10 = $resultado;
            $etapaF10 = $tipoajuda;
            $etapaG10 = $configajuda;
        }elseif  ($numquestao ==11  and  $etapa==1){
            $etapaA11 = $resultado;
            $etapaF11 = $tipoajuda;
            $etapaG11 = $configajuda;
        }elseif  ($numquestao ==12  and  $etapa==1){
            $etapaA12 = $resultado;
            $etapaF12 = $tipoajuda;
            $etapaG12 = $configajuda;
        }elseif  ($numquestao ==13  and  $etapa==1){
            $etapaA13 = $resultado;
            $etapaF13 = $tipoajuda;
            $etapaG13 = $configajuda;
        }elseif  ($numquestao ==14  and  $etapa==1){
            $etapaA14 = $resultado;
            $etapaF14 = $tipoajuda;
            $etapaG14 = $configajuda;
        }elseif  ($numquestao ==15  and  $etapa==1){
            $etapaA15 = $resultado;
            $etapaF15 = $tipoajuda;
            $etapaG15 = $configajuda;
        }elseif  ($numquestao ==16  and  $etapa==1){
            $etapaA16 = $resultado;
            $etapaF16 = $tipoajuda;
            $etapaG16 = $configajuda;
        }elseif  ($numquestao ==17  and  $etapa==1){
            $etapaA17 = $resultado;
            $etapaF17 = $tipoajuda;
            $etapaG17 = $configajuda;
        }elseif  ($numquestao ==18  and  $etapa==1){
            $etapaA18 = $resultado;
            $etapaF18 = $tipoajuda;
            $etapaG18 = $configajuda;
        }elseif  ($numquestao ==19  and  $etapa==1){
            $etapaA19 = $resultado;
            $etapaF19 = $tipoajuda;
            $etapaG19 = $configajuda;
        }elseif  ($numquestao ==20  and  $etapa==1){
            $etapaA20= $resultado;
            $etapaF20 = $tipoajuda;
            $etapaG20 = $configajuda;
        }

        if ($numquestao ==1  and  $etapa==2) {
            $etapaB1 = $resultado;
        }elseif  ($numquestao ==2  and  $etapa==2){
            $etapaB2 = $resultado;
        }elseif  ($numquestao ==3  and  $etapa==2){
            $etapaB3 = $resultado;
        }elseif  ($numquestao ==4  and  $etapa==2){
            $etapaB4 = $resultado;
        }elseif  ($numquestao ==5  and  $etapa==2){
            $etapaB5 = $resultado;
        }elseif  ($numquestao ==6  and  $etapa==2){
            $etapaB6 = $resultado;
        }elseif  ($numquestao ==7  and  $etapa==2){
            $etapaB7 = $resultado;
        }elseif  ($numquestao ==8  and  $etapa==2){
            $etapaB8 = $resultado;
        }elseif  ($numquestao ==9  and  $etapa==2){
            $etapaB9 = $resultado;
        }elseif  ($numquestao ==10  and  $etapa==2){
            $etapaB10 = $resultado;
        }elseif  ($numquestao ==11  and  $etapa==2){
            $etapaB11 = $resultado;
        }elseif  ($numquestao ==12  and  $etapa==2){
            $etapaB12 = $resultado;
        }elseif  ($numquestao ==13  and  $etapa==2){
            $etapaB13 = $resultado;
        }elseif  ($numquestao ==14  and  $etapa==2){
            $etapaB14 = $resultado;
        }elseif  ($numquestao ==15  and  $etapa==2){
            $etapaB15 = $resultado;
        }elseif  ($numquestao ==16  and  $etapa==2){
            $etapaB16 = $resultado;
        }elseif  ($numquestao ==17  and  $etapa==2){
            $etapaB17 = $resultado;
        }elseif  ($numquestao ==18  and  $etapa==2){
            $etapaB18 = $resultado;
        }elseif  ($numquestao ==19  and  $etapa==2){
            $etapaB19 = $resultado;
        }elseif  ($numquestao ==20  and  $etapa==2){
            $etapaB20= $resultado;
        }

        if ($numquestao ==1  and  $etapa==3) {
            $etapaC1 = $resultado;
        }elseif  ($numquestao ==2  and  $etapa==3){
            $etapaC2 = $resultado;
        }elseif  ($numquestao ==3  and  $etapa==3){
            $etapaC3 = $resultado;
        }elseif  ($numquestao ==4  and  $etapa==3){
            $etapaC4 = $resultado;
        }elseif  ($numquestao ==5  and  $etapa==3){
            $etapaC5 = $resultado;
        }elseif  ($numquestao ==6  and  $etapa==3){
            $etapaC6 = $resultado;
        }elseif  ($numquestao ==7  and  $etapa==3){
            $etapaC7 = $resultado;
        }elseif  ($numquestao ==8  and  $etapa==3){
            $etapaC8 = $resultado;
        }elseif  ($numquestao ==9  and  $etapa==3){
            $etapaC9 = $resultado;
        }elseif  ($numquestao ==10  and  $etapa==3){
            $etapaC10 = $resultado;
        }elseif  ($numquestao ==11  and  $etapa==3){
            $etapaC11 = $resultado;
        }elseif  ($numquestao ==12  and  $etapa==3){
            $etapaC12 = $resultado;
        }elseif  ($numquestao ==13  and  $etapa==3){
            $etapaC13 = $resultado;
        }elseif  ($numquestao ==14  and  $etapa==3){
            $etapaC14 = $resultado;
        }elseif  ($numquestao ==15  and  $etapa==3){
            $etapaC15 = $resultado;
        }elseif  ($numquestao ==16  and  $etapa==3){
            $etapaC16 = $resultado;
        }elseif  ($numquestao ==17  and  $etapa==3){
            $etapaC17 = $resultado;
        }elseif  ($numquestao ==18  and  $etapa==3){
            $etapaC18 = $resultado;
        }elseif  ($numquestao ==19  and  $etapa==3){
            $etapaC19 = $resultado;
        }elseif  ($numquestao ==20  and  $etapa==3){
            $etapaC20= $resultado;
        }

        if ($numquestao ==1  and  $etapa==4) {
            $etapaD1 = $resultado;
        }elseif  ($numquestao ==2  and  $etapa==4){
            $etapaD2 = $resultado;
        }elseif  ($numquestao ==3  and  $etapa==4){
            $etapaD3 = $resultado;
        }elseif  ($numquestao ==4  and  $etapa==4){
            $etapaD4 = $resultado;
        }elseif  ($numquestao ==5  and  $etapa==4){
            $etapaD5 = $resultado;
        }elseif  ($numquestao ==6  and  $etapa==4){
            $etapaD6 = $resultado;
        }elseif  ($numquestao ==7  and  $etapa==4){
            $etapaD7 = $resultado;
        }elseif  ($numquestao ==8  and  $etapa==4){
            $etapaD8 = $resultado;
        }elseif  ($numquestao ==9  and  $etapa==4){
            $etapaD9 = $resultado;
        }elseif  ($numquestao ==10  and  $etapa==4){
            $etapaD10 = $resultado;
        }elseif  ($numquestao ==11  and  $etapa==4){
            $etapaD11 = $resultado;
        }elseif  ($numquestao ==12  and  $etapa==4){
            $etapaD12 = $resultado;
        }elseif  ($numquestao ==13  and  $etapa==4){
            $etapaD13 = $resultado;
        }elseif  ($numquestao ==14  and  $etapa==4){
            $etapaD14 = $resultado;
        }elseif  ($numquestao ==15  and  $etapa==4){
            $etapaD15 = $resultado;
        }elseif  ($numquestao ==16  and  $etapa==4){
            $etapaD16 = $resultado;
        }elseif  ($numquestao ==17  and  $etapa==4){
            $etapaD17 = $resultado;
        }elseif  ($numquestao ==18  and  $etapa==4){
            $etapaD18 = $resultado;
        }elseif  ($numquestao ==19  and  $etapa==4){
            $etapaD19 = $resultado;
        }elseif ($numquestao  ==20  and  $etapa==4){
            $etapaD20= $resultado;
        }
        //Subtotais - A
         //Pratica Diaria -Presença
         if($etapa==1 and $grupopontuacao==1){
            $subtotalA1 = $etapaA1+$etapaA2+$etapaA3+$etapaA4;
        };

        //Pratica Diaria -Presença
        if($etapa==1 and $grupopontuacao==2){
            $subtotalA2 = $etapaA5+$etapaA6+$etapaA7+$etapaA8+$etapaA9;
        };

        //Relacionamento -Presença
        if($etapa==1 and $grupopontuacao==3){
            $subtotalA3 = $etapaA10+$etapaA11+$etapaA12+$etapaA13;
         };
        
        //Saude -Presença
        if($etapa==1 and $grupopontuacao==4){
            $subtotalA4 = $etapaA14+$etapaA15+$etapaA16+$etapaA17+$etapaA18+$etapaA19+$etapaA20;
         };

//Subtotais - B
         //Pratica Diaria -Presença
         if($etapa==2 and $grupopontuacao==1){
            $subtotalB1 = $etapaB1+$etapaB2+$etapaB3+$etapaB4;
        };

        //Pratica Diaria -Presença
        if($etapa==2 and $grupopontuacao==2){
            $subtotalB2 = $etapaB5+$etapaB6+$etapaB7+$etapaB8+$etapaB9;
        };

        //Relacionamento -Presença
        if($etapa==2 and $grupopontuacao==3){
            $subtotalB3 = $etapaB10+$etapaB11+$etapaB12+$etapaB13;
         };
        
        //Saude -Presença
        if($etapa==2 and $grupopontuacao==4){
            $subtotalB4 = $etapaB14+$etapaB15+$etapaB16+$etapaB17+$etapaB18+$etapaB19+$etapaB20;
         };

//Subtotais - C
         //Pratica Diaria -Presença
         if($etapa==3 and $grupopontuacao==1){
            $subtotalC1 = $etapaC1+$etapaC2+$etapaC3+$etapaC4;
        };

        //Pratica Diaria -Presença
        if($etapa==3 and $grupopontuacao==2){
            $subtotalC2 = $etapaC5+$etapaC6+$etapaC7+$etapaC8+$etapaC9;
        };

        //Relacionamento -Presença
        if($etapa==3 and $grupopontuacao==3){
            $subtotalC3 = $etapaC10+$etapaC11+$etapaC12+$etapaC13;
         };
        
        //Saude -Presença
        if($etapa==3 and $grupopontuacao==4){
            $subtotalC4 = $etapaC14+$etapaC15+$etapaC16+$etapaC17+$etapaC18+$etapaC19+$etapaC20;
         };

//Subtotais - C
         //Pratica Diaria -Presença
         if($etapa==4 and $grupopontuacao==1){
            $subtotalD1 = $etapaD1+$etapaD2+$etapaD3+$etapaD4;
        };

        //Pratica Diaria -Presença
        if($etapa==4 and $grupopontuacao==2){
            $subtotalD2 = $etapaD5+$etapaD6+$etapaD7+$etapaD8+$etapaD9;
        };

        //Relacionamento -Presença
        if($etapa==4 and $grupopontuacao==3){
            $subtotalD3 = $etapaD10+$etapaD11+$etapaD12+$etapaD13;
         };
        
        //Saude -Presença
        if($etapa==4 and $grupopontuacao==4){
            $subtotalD4 = $etapaD14+$etapaD15+$etapaD16+$etapaD17+$etapaD18+$etapaD19+$etapaD20;
         };


         //Totais
         $totalA1 = $subtotalA1+$subtotalA2+$subtotalA3+$subtotalA4;
         $totalB1 = $subtotalB1+$subtotalB2+$subtotalB3+$subtotalB4;
         $totalC1 = $subtotalC1+$subtotalC2+$subtotalC3+$subtotalC4;
         $totalD1 = $subtotalD1+$subtotalD2+$subtotalD3+$subtotalD4;

    }; //--> Fim do While

//Termina a decisao
    //Subtotal GrupoA - Presença
    
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>...::: Terapeuta :::... </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css" rel="stylesheet">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://cdn.tiny.cloud/1/epehnnmlf5zbvcsafsiwpoc8u5vucadw7a8ckon7q72eh46v/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
       
       <script>
        tinymce.init({
            selector: 'textarea#editor',
            menubar: false,
            width : "1040px",

            spellchecker_language: 'en',
            spellchecker_dialog: true,

            save_onsavecallback: function () {  
            var content = tinymce.activeEditor.getContent();
            //console.log(content);
  }
        });
        </script>
</head>

<body>

    <style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
    font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-2b7s{text-align:left;vertical-align:bottom}
    .tg .tg-7zrl text-center{text-align:center;vertical-align:bottom}
    .tg .tg-8d8j{text-align:center;vertical-align:bottom}
    .tg .tg-0lax{text-align:center;vertical-align:top}
    .tg .tg-u4qn{background-color:#D9D9D9;text-align:center;vertical-align:bottom;font-weight: bold}
    .rotate{transform-origin: 80% 10%; transform: rotate(-90deg);}
    </style>

<?php include "../userterapeuta/include/navbarTerapeuta.html"?>

<main role="main" class="container">
<div class="col-md-12">
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped">
    <h2 class="text-center">Tabela da avaliação <?php echo $idavaliacao?> <br>para o paciente: <?php echo recebeNomePaciente($idpaciente)?></h2>
<thead>
  <tr>
    <th class="tg-7zrl text-center"></th>
    <th class="tg-7zrl text-center"></th>
    <th class="tg-8d8j text-center" colspan="2">Dificuldades</th>
    <th class="tg-8d8j text-center" colspan="3">Necessidade de ajuda</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-7zrl text-center"></td>
    <td class="tg-7zrl text-center"></td>
    <td class="tg-8d8j font-weight-bold text-center">Presença</td>
    <td class="tg-8d8j font-weight-bold text-center">Intensidade</td>
    <td class="tg-8d8j font-weight-bold text-center">Presença</td>
    <td class="tg-8d8j font-weight-bold text-center">Grau de urgência</td>
    <td class="tg-8d8j font-weight-bold text-center">Auxiliador</td>
    <td class="tg-8d8j font-weight-bold text-center">Indicação</td>

  </tr>
<form action="../userterapeuta/resultadoUpdateBack.php" method="GET">
  <tr>
    <td class="tg-0lax rotate" rowspan="4">Condições de vida</td>
    <td class="tg-2b7s">1. Lugar de Vida</td>
    <td class="tg-7zrl text-center text-center"><?php  echo $etapaA1?></td>
    <td class="tg-7zrl text-center text-center"><?php  echo $etapaB1?></td>
    <td class="tg-7zrl text-center text-center"><?php  echo $etapaC1?></td>
    <td class="tg-7zrl text-center text-center"><?php  echo $etapaD1?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF1" name="tipoAjudaF1" >
                                                         <option value="0" <?php if($etapaF1 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF1 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF1 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG1" name="configAjudaG1">
                                                        <option value="0" <?php if($etapaG1 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG1 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>

  </tr>
  <tr>
    <td class="tg-2b7s">2. Finanças</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA2?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB2?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC2?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD2?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF2" name="tipoAjudaF2" >
                                                         <option value="0" <?php if($etapaF2 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF2 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF2 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG2" name="configAjudaG2">
                                                        <option value="0" <?php if($etapaG2 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG2 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>                 
  </tr>
  <tr>
    <td class="tg-2b7s">3. Trabalho</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA3?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB3?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC3?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD3?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF3" name="tipoAjudaF3" >
                                                         <option value="0" <?php if($etapaF3 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF3 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF3 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG3" name="configAjudaG3">
                                                        <option value="0" <?php if($etapaG3 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG3 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">4. Lei e justiça</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA4?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB4?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC4?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD4?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF4" name="tipoAjudaF4" >
                                                         <option value="0" <?php if($etapaF4 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF4 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF4 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG4" name="configAjudaG4">
                                                        <option value="0" <?php if($etapaG4 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG4 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-7zrl text-center font-weight-bold"></td>
    <td class="tg-7zrl text-center font-weight-bold">Subtotal</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalA1?>/4</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalB1?>/12</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalC1?>/4</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalD1?>/12</td>
    <td ><?php  //echo $subtotalE1?></td>
  </tr>
  <tr>
    <td class="tg-0lax rotate" rowspan="5">Prática diária</td>
    <td class="tg-2b7s">5. Tempo livre</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA5?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB5?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC5?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD5?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF5" name="tipoAjudaF5" >
                                                         <option value="0" <?php if($etapaF5 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF5 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF5 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG5" name="configAjudaG5">
                                                        <option value="0" <?php if($etapaG5 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG5 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">6. Tarefas administrativas</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA6?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB6?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC6?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD6?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF6" name="tipoAjudaF6" >
                                                         <option value="0" <?php if($etapaF6 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF6 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF6 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG6" name="configAjuda6">
                                                        <option value="0" <?php if($etapaG6 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG6 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">7. Tarefas domésticas</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA7?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB7?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC7?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD7?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF7" name="tipoAjudaF7" >
                                                         <option value="0" <?php if($etapaF7 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF7 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF7 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG7" name="configAjudaG7">
                                                        <option value="0" <?php if($etapaG7 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG7 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">8. Viagem</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA8?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB8?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC8?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD8?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF8" name="tipoAjudaF8" >
                                                         <option value="0" <?php if($etapaF8 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF8 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF8 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG8" name="configAjudaG8">
                                                        <option value="0" <?php if($etapaG8 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG8 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">9. Presença de locais públicos</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA9?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB9?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC9?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD9?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF9" name="tipoAjudaF9" >
                                                         <option value="0" <?php if($etapaF9 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF9 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF9 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG9" name="configAjudaG9">
                                                        <option value="0" <?php if($etapaG9 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG9 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-7zrl text-center"></td>
    <td class="tg-7zrl text-center font-weight-bold">Subtotal</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalA2?>/5</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalB2?>/15</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalC2?>/5</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalD2?>/15</td>
    <td ><?php  //echo $subtotalE2?></td>
  </tr>
  <tr>
    <td class="tg-0lax rotate" rowspan="4">Relacionamentos</td>
    <td class="tg-2b7s">10. Amizades</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA10?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB10?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC10?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD10?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF10" name="tipoAjudaF10" >
                                                         <option value="0" <?php if($etapaF10 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF10 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF10 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG10" name="configAjudaG10">
                                                        <option value="0" <?php if($etapaG10 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG10 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">11. Família</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA11?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB11?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC11?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD11?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF11" name="tipoAjudaF11" >
                                                         <option value="0" <?php if($etapaF11 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF11 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF11 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG11" name="configAjudaG11">
                                                        <option value="0" <?php if($etapaG11 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG11 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">12. Filhos</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA12?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB12?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC12?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD12?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF12" name="tipoAjudaF12" >
                                                         <option value="0" <?php if($etapaF12 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF12 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF12 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG12" name="configAjudaG12">
                                                        <option value="0" <?php if($etapaG12 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG12 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">13. Relacionamentos românticos</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA13?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB13?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC13?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD13?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF13" name="tipoAjudaF13" >
                                                         <option value="0" <?php if($etapaF13 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF13 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF13 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG13" name="configAjudaG13">
                                                        <option value="0" <?php if($etapaG13 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG13 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-7zrl text-center"></td>
    <td class="tg-7zrl text-center font-weight-bold">Subtotal</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalA3?>/4</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalB3?>/12</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalC3?>/4</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalD3?>/12</td>
    <td ><?php  //echo $subtotalE3?></td>
  </tr>
  <tr>
    <td class="tg-0lax rotate" rowspan="7">Saúde</td>
    <td class="tg-2b7s">14. Alimentos</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA14?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB14?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC14?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD14?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF14" name="tipoAjudaF14" >
                                                         <option value="0" <?php if($etapaF14 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF14 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF14 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG14" name="configAjudaG14">
                                                        <option value="0" <?php if($etapaG14 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG14 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">15. Higiene pessoal</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA15?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB15?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC15?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD15?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF15" name="tipoAjudaF15" >
                                                         <option value="0" <?php if($etapaF15 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF15 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF15 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG15" name="configAjudaG15">
                                                        <option value="0" <?php if($etapaG15 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG15 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">16. Saúde física</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA16?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB16?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC16?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD16?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF16" name="tipoAjudaF16" >
                                                         <option value="0" <?php if($etapaF16 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF16 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF16 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG16" name="configAjudaG16">
                                                        <option value="0" <?php if($etapaG16 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG16 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">17. Saúde mental</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA17?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB17?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC17?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD17?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF17" name="tipoAjudaF17" >
                                                         <option value="0" <?php if($etapaF17 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF17 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF17 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG17" name="configAjudaG17">
                                                        <option value="0" <?php if($etapaG17 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG17 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">18. Vício</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA18?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB18?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC18?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD18?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF18" name="tipoAjudaF18" >
                                                         <option value="0" <?php if($etapaF18 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF18 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF18 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG18" name="configAjudaG18">
                                                        <option value="0" <?php if($etapaG18 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG18 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">19. Tratamento</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA19?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB19?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC19?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD19?></td>
    <td class="tg-7zrl text-center text-center"><select id="tipoAjudaF19" name="tipoAjudaF19" >
                                                         <option value="0" <?php if($etapaF19 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF19 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF19 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select id="configAjudaG19" name="configAjudaG19">
                                                        <option value="0" <?php if($etapaG19 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG19 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-2b7s">20. Espiritualidade e crenças</td>
    <td class="tg-7zrl text-center"><?php  echo $etapaA20?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaB20?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaC20?></td>
    <td class="tg-7zrl text-center"><?php  echo $etapaD20?></td>
    <td class="tg-7zrl text-center text-center"><select name="tipoAjudaF20" id="tipoAjudaF20" >
                                                         <option value="0" <?php if($etapaF20 == '0') {echo ("selected");}?>>Paciente</option>
                                                         <option value="1" <?php if($etapaF20 == '1') {echo ("selected");}?>>Terapeuta</option>  
                                                         <option value="2" <?php if($etapaF20 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
                                                </select>
    </td>
    <td class="tg-7zrl text-center text-center"><select name="configAjudaG20" id="configAjudaG20">
                                                        <option value="0" <?php if($etapaG20 == '0') {echo ("selected");}?>>Paciente</option>
                                                        <option value="1" <?php if($etapaG20 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
                                                </select>
    </td>
  </tr>
  <tr>
    <td class="tg-7zrl text-center"></td>
    <td class="tg-7zrl text-center font-weight-bold">Subtotal</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalA4?>/7</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalB4?>/21</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalC4?>/7</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $subtotalD4?>/21</td>
    <td ><?php  //echo $subtotalE4?></td>
  </tr>
  <tr>
    <td class="tg-7zrl text-center"></td>
    <td class="tg-7zrl text-center font-weight-bold">Total</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $totalA1?>/20</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $totalB1?>/60</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $totalC1?>/20</td>
    <td class="tg-7zrl text-center font-weight-bold"><?php  echo $totalD1?>/60</td>
    <td ><?php  //echo $totalE1?></td>
  </tr>
</tbody>
</table>
    </div>
    </div>

    <div class="mb-3">

    <a class="button" href=<?php echo ("../userterapeuta/resultadoUpdateBack.php?idt='$idterapeuta'&idpc='$idpaciente'&idav='$idavaliacao' "); ?> class="btn btn-primary">Salvar</a>
                
    </div>
</form>
</main>

<?php $textoAvaliação =  selecionaResultadoAvaliacao($idavaliacao, $idpaciente, $idterapeuta); ?>

<div class="container mt-4 mb-4">
  <div class="row justify-content-md-center">
        <h1 class="h2 mb-4">Relatório Avaliativo</h1>
        <label></label>
        <div class="form-group">
            <textarea id="editor"><?php echo $textoAvaliação?></textarea>
        </div>
  </div>
  
     
</div>


 <!--Bootstrap e JS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
