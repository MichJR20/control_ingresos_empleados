<?php
include 'conexion.php';

    $table = '<table class="table" id="emploo">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Hora de ingreso</th>
        <th scope="col">Hora de salida</th>
        <th scope="col">Motivo</th>

      </tr>
    </thead>';

    $sql="(SELECT *, CONCAT(name, ' ', lastname1, ' ', lastname2) AS name FROM employees e JOIN income i ON e.cedula = i.cedula)";
    $result=mysqli_query($con,$sql);

    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $start=$row['start_date'];
        $end=$row['end_date'];
        $name=$row['name'];
        $motivo=$row['motivo'];

        $table .= ' <tr>
        <td scope="row">'.$id.'</td>
        <td>'.$name.'</td>
        <td>'.$start.'</td>
        <td>'.$end.'</td>
        <td>'.$motivo.'</td>
      </tr>';
    }

    $table.= '</table>';
    echo $table;
?>

<script>
$(document).ready(function () {
    $('#emploo').DataTable();
});
</script>