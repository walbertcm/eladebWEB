<?php
 //Conexão do banco de dados online
 include('conexaoDataBaseV2.php');
//Seleção no banco de dados
 $sqlA = "SELECT * FROM `loginSistema`";
//Query
 $query = mysqli_query($conn, $sqlA);
 //Tratamento da resposta
 while($dados = mysqli_fetch_assoc($query)){
    $id=$dados["id"];
    $nome=$dados["usuario"];
    $tipo=$dados['senha'];
 
    switch($tipo!=0){
        case 1:
            header("Location: useradministrador/principaladministrador.php?email=$nome");
            break;
        case 2:
            header("Location: usererapeuta/principalterapeuta.php?email=$nome");
            break;
        case 3:
            header("Location: userpaciente/principaciente.php?email=$nome");
            break;
    }
    
    echo $id;
    echo $nome;
    echo $tipo;
 }




?>