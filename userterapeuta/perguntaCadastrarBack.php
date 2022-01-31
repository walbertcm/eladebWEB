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

include('../controller/conexaoDataBaseV2.php');

//Seleção dos cenarios existentes 
   $pergunta=$_POST['pergunta'];
   $imagem = $_FILES["imagem"]["tmp_name"];
   $tamanho = $_FILES["imagem"]["size"];
   $tipo = $_FILES["imagem"]["type"];
   $extensao = strtolower(substr($_FILES["imagem"]["name"],-3));

   if($imagem !="none"){
       $fp = fopen($imagem, "rb");
       $conteudo = fread($fp, $tamanho);
       $conteudo = addslashes($conteudo);
       fclose($fp);

      $sql = "INSERT INTO `perguntas` ( `pergunta`, `imagem`, `status`, `dtcadastro`) 
               VALUES ( '$pergunta', '$conteudo', '$extensao', current_timestamp())";

        if (mysqli_query($conn, $sql)) {
            header("Location: perguntaExibir.php");
        } else {
            echo "Erro: " . $sql . ":-" . mysqli_error($conn);
            echo "Chame o suporte !";
        }

        mysqli_close($conn);

   }else { 
       echo "Erro - chame o suporte "; }
   
?>