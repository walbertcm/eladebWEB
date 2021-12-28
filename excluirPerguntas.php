<?php 
        include('conexaoBancoDados.php');

        $codigo = $_GET["id"];
//        echo $codigo;

        $sql = " DELETE FROM `perguntas` WHERE `perguntas`.`idperguntas` = ' ". $codigo." ' " ;

        $query = mysqli_query($conn,$sql) or
        die("Algo deu errado ao excluir a pergunta. Tente novamente.");
        echo 'Pergunta excluída com sucesso!';
        header('Location: exibirPerguntas.php');  
?>