<?php
include("db.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM materias_primas WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $query);

    if (!$resultado){
        die("error");
    }
    header("Location: ingredientes.php");
}
?>