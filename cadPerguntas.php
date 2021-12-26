<?php

   include('conexaoBancoDados.php');
   
   $perguntas=$_POST['Perguntas'];
   $imagem = $_FILES["imagem"]["tmp_name"];
   $tamanho = $_FILES["imagem"]["size"];
   $tipo = $_FILES["imagem"]["type"];
   $extensao = strtolower(substr($_FILES["imagem"]["name"],-4));

   if($imagem !="none"){
       $fp = fopen($imagem, "rb");
       $conteudo = fread($fp, $tamanho);
       $conteudo = addslashes($conteudo);
       fclose($fp);

        $sql = "INSERT INTO `perguntas`(`idperguntas`, `pergunta`, `imagem`, `tipo`, `dtcadastro`)
                VALUES (NULL, '$perguntas','$imagem', '$extensao', NOW())";

if (mysqli_query($conn, $sql)) {
    echo "Novo registro adicionado com sucesso !";
 } else {
    echo "Erro: " . $sql . ":-" . mysqli_error($conn);
 }
 
 mysqli_close($conn);

   } else { echo "Erro "; }
   
?>