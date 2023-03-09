<?php

include 'conexion.php';

$query = "SELECT COUNT(*) as cantidad_personas FROM employees e 
LEFT JOIN income i ON e.cedula = i.cedula AND i.start_date <= NOW() AND i.end_date >= NOW() 
LEFT JOIN register r ON e.cedula = r.document 
LEFT JOIN incomevop iv ON r.document = iv.document AND iv.star_date_v <= NOW() AND iv.end_date_v >= NOW() 
WHERE i.start_date IS NOT NULL OR iv.star_date_v IS NOT NULL";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$contar = '<br><br> <h1> Cantidad de personas dentro de las instalaciones: ' . $row['cantidad_personas'] . '</h1>';
echo $contar;


$table = '<br><br>
    <center><h1>Reporte cantidad de horas trabajas por empleados</h1><br>
    <table class="table" id="r1">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Número documento de identidad</th>
        <th scope="col">Nombre</th>
        <th scope="col">Cantidad de horas</th>
        <th scope="col">Cantidad de horas dentro de la instalaciones</th>
      </tr>
    </thead>';

    $sql="SELECT subq1.name as nombre, subq1.cedula as cedula,  subq1.lastname1 as apellido1, subq1.lastname2 as apellido2,
            SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(i1.end_date, i1.start_date)))) as tiempo_trabajado,
            SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(CASE WHEN TIME(i2.end_date) <= '16:00:00' 
                                                        THEN i2.end_date 
                                                        ELSE '16:00:00' 
                                                END, 
                                                CASE WHEN TIME(i2.start_date) >= '08:00:00' 
                                                        THEN i2.start_date 
                                                        ELSE '08:00:00' 
                                                END)))) as tiempo_dentro
            FROM (SELECT e.name, e.cedula, e.lastname1, e.lastname2 FROM income i 
            JOIN employees e ON i.cedula = e.cedula 
            GROUP BY e.cedula) subq1 
            JOIN income i1 ON subq1.cedula = i1.cedula 
            JOIN income i2 ON subq1.cedula = i2.cedula 
            WHERE (TIME(i1.start_date) >= '08:00:00' AND TIME(i1.start_date) <= '16:00:00' AND i1.end_date IS NOT NULL)
            GROUP BY subq1.cedula";

    $result=mysqli_query($con,$sql);

    while($row=mysqli_fetch_assoc($result)){
        $document=$row['cedula'];
        $name=$row['nombre'];
        $lastname1=$row['apellido1'];
        $lastname2=$row['apellido2'];
        $nombre_completo = $name . " " . $lastname1 . " " .$lastname2;
        $cant=$row['tiempo_trabajado'];
        $cant1=$row['tiempo_dentro'];


        $table .= ' <tr>
        <td>'.$document.'</td>
        <td>'.$nombre_completo.'</td> 
        <td>'.$cant.'</td>   
        <td>'.$cant1.'</td>   

      </tr>';
    }

    $table.= '</table>';
    echo $table;

    $table1 = '<br><br>
    <center><h1>Reporte cantidad de horas trabajas por areas</h1><br>
    <table class="table" id="r2">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre area</th>
        <th scope="col">Cantidad de horas trabajadas</th>
        


      </tr>
    </thead>';

    $sql="(SELECT a.name AS area, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(i.end_date, i.start_date)))) AS total_horas 
            FROM income i INNER JOIN employees e ON i.cedula = e.cedula INNER JOIN area a ON e.id = a.id GROUP BY a.name)";
    $result=mysqli_query($con,$sql);

    while($row=mysqli_fetch_assoc($result)){
        $name=$row['area'];
        $cant=$row['total_horas'];

        $table1 .= ' <tr>
        <td>'.$name.'</td>
        <td>'.$cant.'</td>
  
      </tr>';
    }

    $table1.= '</table>';
    echo $table1;
?>

<script>
  $(document).ready(function () {
    $('#r1').DataTable();
    $('#r2').DataTable();
});
</script>