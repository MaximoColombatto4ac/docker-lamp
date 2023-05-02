<?php
include("db.php");


if (isset($_GET['id'])){
    
    $id = $_GET['id'];

    $nombre = $_POST['nombre'];
    $costo = $_POST['costo'];	
    $unidad = $_POST['unidad'];
    $cantidad = $_POST['cantidad'];

    $query = "UPDATE materias_primas SET ingrediente = '$nombre', costo = '$costo', unidad = '$unidad', cantidad = '$cantidad' WHERE id = '$id'";

    $respuesta = mysqli_query($conexion, $query);
    if(!$respuesta){
        die("Error");
    }

    header("Location: ingredientes.php");
 }
?>