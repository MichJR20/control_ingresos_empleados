<?php

include 'conexion.php';

if (isset($_POST['deletesend'])){
    $unique=$_POST['deletesend'];

    $sql = "DELETE FROM register where id=$unique";
    $result=mysqli_query($con,$sql);
}

?>