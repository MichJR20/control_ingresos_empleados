<?php
include 'conexion.php';

extract($_POST);

    if (isset($_POST['typesend']) && isset($_POST['namesend']) && isset($_POST['documentsend']) ){

            $sql = "INSERT INTO register (type,name,document) values ('$typesend','$namesend','$documentsend')";

            $result = mysqli_query($con,$sql);
    }
?>