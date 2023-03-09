<?php
include 'conexion.php';

extract($_POST);

if (isset($_POST['namesend']) && isset($_POST['startsend']) && isset($_POST['endsend'])) {
   $sql = "INSERT INTO income (start_date,end_date,cedula,motivo) values ('$startsend','$endsend','$namesend','$motivosend')";
   $result = mysqli_query($con,$sql);
}

?>

?>