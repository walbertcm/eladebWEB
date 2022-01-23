<?php
     include('conexaoBancoDados.php');

     //include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
     
    $query = "SELECT DISTINCT avaliacao.idavaliacao, paciente.NomePaciente, DATE_FORMAT(avaliacao.datahora,'%d/%m/%Y') as dataa 
    FROM paciente RIGHT JOIN avaliacao ON paciente.pacienteid = avaliacao.idpaciente;" or die("Error:" . mysqli_error());

    $result = mysqli_query($conn, $query);

    echo ' <table class="table table-hover">';

    echo "
      <tr>
        <td>Nome do Paciente</td>
        <td>Avaliação Numero</td>
        <td>Data</td>
        <td></td>
        <td></td>                 
      </tr>";
                
    while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" .$row["NomePaciente"] .  "</td> ";
    echo "<td>" .$row["idavaliacao"]."</td> ";
    echo "<td>" .$row["dataa"] .  "</td> ";        
    echo "<td><a href='member.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";  
    echo "<td><a href='admin_form_delete_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
    echo "</tr>";
    }
    echo "</table>";
                //5. close connection
    mysqli_close($conn);
?>