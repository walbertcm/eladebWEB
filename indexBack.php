<?php
 //Conexão do banco de dados online
 include('controller/conexaoDataBaseV2.php');

 //Metodo para iniciar a sessao
 session_start();

 //Recebe elementos POST
 $emailA = $_POST['email'];
 $pass = $_POST['pass'];

//Seleção no banco de dados
$sqlA = "SELECT * FROM `loginSistema` WHERE `usuario` = '$emailA' AND `senha` = '$pass' ";
$queryA = mysqli_query($conn, $sqlA);

//Função para cadastrar o Login
 function cadastraLogAcesso($email){
    include('controller/conexaoDataBaseV2.php');
    $sqlB = "INSERT INTO `loginLogger` (`id`, `datahora`, `email`, `horalogin`) VALUES (NULL, CURRENT_TIMESTAMP, '$email', CURRENT_TIMESTAMP); ";
    $queryB = mysqli_query($conn, $sqlB);
}

 //Tratamento da resposta
 while($dados = mysqli_fetch_assoc($queryA)){
    $idUsuarioLogin=$dados["id"];
    $emailB=$dados["usuario"]; //usuario tem somente email nao é o nome --> Tab. loginSistemas
    $tipoUsuario=$dados['tipo'];
    $permissaoAcesso = $dados['permissao'];

    if($permissaoAcesso == 1){
    switch($tipoUsuario){
        case 1:
            //Configura a sessao
            $_SESSION["emailUsuario"] = $emailB;
            $_SESSION["idUsuarioLogin"] = $idUsuarioLogin;
            header("Location: useradministrador/principaladministrador.php?email=$emailB");
            cadastraLogAcesso($emailB);
            break;
        case 2:
            //Configura a sessao
            $_SESSION["emailUsuario"] = $emailB;
            $_SESSION["idUsuarioLogin"] = $idUsuarioLogin;
            header("Location: userterapeuta/principalterapeuta.php?email=$emailB");
            cadastraLogAcesso($emailB);
            break;
        case 3:
            //Configura a sessao
            $_SESSION["emailUsuario"] = $emailB;
            $_SESSION["idUsuarioLogin"] = $idUsuarioLogin;
            header("Location: userpaciente/principalpaciente.php?email=$emailB");
            cadastraLogAcesso($emailB);
            break;
        default:
            header("Location: index.html");
    }
 }else {header("Location: index.html");}
}
 ?>


