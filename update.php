<?php
include 'conexion.php';

if(isset($_POST['updateid'])){
    $user_id=$_POST['updateid'];
    
    $sql="(SELECT * FROM register WHERE id=$user_id)";
    $result=mysqli_query($con,$sql);
    $response=array();
    while($row=mysqli_fetch_assoc($result)){
        $response=$row;
    }

    echo json_encode($response);

}else {
    $response['status']=200;
    $response['message']="invalido";
}

/*if(isset($_POST['hiddendata'])){
    $uniqueid = $_POST['hiddendata'];
    $type = $_POST['updatetype'];
    $name = $_POST['updatename'];
    $document = $_POST['updatedocument'];

    
    $sql="UPDATE register set type='$type', name = '$name', document = '$document' WHERE id=$uniqueid"
    $result=mysqli_query($con,$sql);

}*/
   
?>