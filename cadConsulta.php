<?php       
        include('conexaoBancoDados.php');
        $sql = "SELECT `pacienteid`, `NomePaciente`, `NomeResponsavel`, `Telefone`, `EmailPaciente`, `senha`, `dt_cadastro`
        FROM `paciente`";
        $query = mysqli_query($conn,$sql);
    ?>

<!doctype html> 
<html> <head> 
    <meta charset="utf-8"> 
    <title>PHP Insert Drop Down List selected value in MySQL database</title> 
</head> 
<body>

<label >Produto:</label> 
echo '<select name="whatever">';
while($row = mysqli_fetch_array($query)) {
    if ($row['choice'] === $choice) {
        echo '<option value="' . $choice . '" selected="selected" />';
    } else {
        echo '<option value="' . $choice . '" />';
    }
}
echo '</select>';

</body> 
</html>