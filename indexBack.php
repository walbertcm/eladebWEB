<?php
 //Conexão do banco de dados online
 include('conexaoDataBaseV2.php');

 //Recebe elementos POST
 $email = "administrador01@mail.com";//$_POST['email'];
 $pass = "123456";//$_POST['pass'];

//Seleção no banco de dados
$sqlA = "SELECT * FROM `loginSistema` WHERE `usuario` = '$email' AND `senha` = '$pass' ";

//Query
 $query = mysqli_query($conn, $sqlA);

 //Tratamento da resposta
 while($dados = mysqli_fetch_assoc($query)){
    $id=$dados["id"];
    $nome=$dados["usuario"];
    $tipo=$dados['tipo'];
            echo $id;
            echo $nome;
            echo $tipo;
    switch($tipo){
        case 1:
            header("Location: useradministrador/principaladministrador.php?email=$nome");
            echo $id;
            echo $nome;
            echo $tipo;
            break;
        case 2:
            header("Location: userterapeuta/principalterapeuta.php?email=$nome");
            echo $id;
            echo $nome;
            echo $tipo;
            break;
        case 3:
            header("Location: userpaciente/principalpaciente.php?email=$nome");
            echo $id;
            echo $nome;
            echo $tipo;
            break;
    }
    
    
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?
    while($dados = mysqli_fetch_assoc($query)){
        $id=$dados["id"];
        $nome=$dados["usuario"];
        $tipo=$dados['tipo'];
                echo $id;
                echo $nome;
                echo $tipo;
    }
    ?>
</body>
</html>



