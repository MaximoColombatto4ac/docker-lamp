<?php
include("db.php");
include("./includes/header.php");




    if (isset($_GET['id'])){
        
        $id = $_GET['id'];
        $query = "SELECT * from materias_primas where id = '$id'";
        $respuesta = mysqli_query($conexion, $query);

        if (mysqli_num_rows($respuesta) == 1){
            $row = mysqli_fetch_array($respuesta);
            $ingrediente = $row[1];
            $costo = $row[2];
            $unidad = $row[3];
            $cantidad = $row[4];
        }
    }
?>

<div class="edit__article">
        <form action="save_edit.php?id=<?php echo $id;?>" method="post" class="edit__form">
            <div class="form__container">
                <div class="form__group">
                    <input type="text" name="nombre" value="<?php echo $ingrediente;?>">
                </div>
                <div class="form__group">
                    <input type="text" name="costo" value="<?php echo $costo;?>">
                </div>
                <div class="form__group">
                    <input type="text" name="unidad" value="<?php echo $unidad;?>">
                </div>
                <div class="form__group">
                    <input type="text" name="cantidad" value="<?php echo $cantidad;?>">
                </div>
                <input type="submit" name="edit" value="edit" class="btn">
            </div>
        </form>
    </div>

<?php
include("./includes/footer.php");
?>