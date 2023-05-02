<?php

include("db.php");



if(isset($_POST['save'])){
    $nombre = $_POST['nombre'];
    $costo = $_POST['costo'];	
    $unidad = $_POST['unidad'];
    $cantidad = $_POST['cantidad'];


    $query = "INSERT INTO materias_primas(ingrediente, costo, unidad, cantidad) VALUES('$nombre','$costo','$unidad','$cantidad');";

    $respuesta = mysqli_query($conexion, $query);
    if(!$respuesta){
        die("Error");
    }

    header("Location: ingredientes.php");
}

?>