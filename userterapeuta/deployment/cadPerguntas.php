<?php

   include('conexaoBancoDados.php');
   
   $perguntas=$_POST['Perguntas'];
   $imagem = $_FILES["imagem"]["tmp_name"];
   $tamanho = $_FILES["imagem"]["size"];
   $tipo = $_FILES["imagem"]["type"];
   $extensao = strtolower(substr($_FILES["imagem"]["name"],-3));

   if($imagem !="none"){
       $fp = fopen($imagem, "rb");
       $conteudo = fread($fp, $tamanho);
       $conteudo = addslashes($conteudo);
       fclose($fp);

      $sql = "INSERT INTO `perguntas` ( `pergunta`, `imagem`, `tipo`, `dtcadastro`) 
               VALUES ( '$perguntas', '$conteudo', '$extensao', current_timestamp())";

if (mysqli_query($conn, $sql)) {
    echo "Novo registro adicionado com sucesso !";
    echo " " ;
 } else {
    echo "Erro: " . $sql . ":-" . mysqli_error($conn);
 }
 
 mysqli_close($conn);

   } else { echo "Erro "; }
   
?>

<!DOCTYPE html>
<head></head>
<body>
    <br>
    <h3><a href="index.php">Inicio</a></h3>
    <br>

</body>
</html>