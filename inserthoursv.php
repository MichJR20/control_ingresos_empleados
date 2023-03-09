<?php
include 'conexion.php';

extract($_POST);

    if (isset($_POST['povsend']) && isset($_POST['startsend']) && isset($_POST['endsend']) ){

            $sql = "INSERT INTO incomevop (star_date_v,end_date_v,document) values ('$startsend','$endsend','$povsend')";
            $result = mysqli_query($con,$sql);
    }
?>