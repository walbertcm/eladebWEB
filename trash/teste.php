<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    $etapaF1 = 2;
    $etapaG1 = 1;
    ?>

<form action="" method="post">
<select id="tipoAjudaF1" name="tipoAjudaF1" >
        <option value="0" <?php if($etapaF1 == '0') {echo ("selected");}?>>Paciente</option>
        <option value="1" <?php if($etapaF1 == '1') {echo ("selected");}?>>Terapeuta</option>  
        <option value="2" <?php if($etapaF1 == '2') {echo ("selected");}?>>Ajuda Espec.</option>  
</select>
    <br>
    <select id="configAjudaG1" name="configAjudaG1">
        <option value="0" <?php if($etapaG1 == '0') {echo ("selected");}?>>Paciente</option>
        <option value="1" <?php if($etapaG1 == '1') {echo ("selected");}?>>Terapeuta</option>                                                                   
</select>

    <input type="submit" name="submit" value="Choose options">
</form>

<?php
      if(isset($_POST['submit'])){
        if(!empty($_POST['tipoAjudaF1'])) {
          $selected = $_POST['tipoAjudaF1'];
          $selectedA = $_POST['configAjudaG1'];
          echo 'You have chosen: ' . $selected."  ".$selectedA;
        } else {
          echo 'Please select the value.';
        }
      }
    ?>

</body>
</html>