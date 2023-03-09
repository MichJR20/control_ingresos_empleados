<?php
include 'conexion.php';

    $table = '<br><br>
    <h1>Registro de proveedores e invitados</h1><br>
    <table class="table" id="p1">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Tipo</th>
        <th scope="col">Nombre</th>
        <th scope="col">Número documento de identidad</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>';

    $sql="(SELECT * FROM register)";
    $result=mysqli_query($con,$sql);

    while($row=mysqli_fetch_assoc($result)){
      $id = $row['id'];
        $type=$row['type'];
        $name=$row['name'];
        $document=$row['document'];
        $table .= ' <tr>
        <td>'.$type.'</td>
        <td>'.$name.'</td> 
        <td>'.$document.'</td>   
        <td>
        <button class="btn btn-dark" onclick="getdetails('.$id.')">Actualizar</button>
        <button class="btn btn-danger" onclick="deleteu('.$id.')">Eliminar</button>
      </td>
      </tr>';
    }

    $table.= '</table>';
    echo $table;

    $table1 = '<br><br>
    <h1>Registro de hora de ingreso y salida de los proveedores e invitados</h1><br>
    <table class="table" id="p2">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Fecha de ingreso</th>
        <th scope="col">Fecha de salida</th>
        <th scope="col">Número documento de identidad</th>
        <th scope="col">Nombre</th>
        <th scope="col">tipo</th>


      </tr>
    </thead>';

    $sql="(SELECT * FROM incomevop p inner join register r on p.document=r.document)";
    $result=mysqli_query($con,$sql);

    while($row=mysqli_fetch_assoc($result)){
        $start=$row['star_date_v'];
        $end=$row['end_date_v'];
        $document=$row['document'];
        $name=$row['name'];
        $type=$row['type'];

        $table1 .= ' <tr>
        <td>'.$start.'</td>
        <td>'.$end.'</td> 
        <td>'.$document.'</td>  
        <td>'.$name.'</td> 
        <td>'.$type.'</td>   
  
      </tr>';
    }

    $table1.= '</table>';
    echo $table1;
    ?>

<script>
$(document).ready(function () {
    $('#p1').DataTable();
    $('#p2').DataTable();
});
</script>
