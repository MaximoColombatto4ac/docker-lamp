<?php include("db.php"); ?>
<?php include("./includes/header.php"); ?>
<table class="blueTable">
    <thead class="tabla__row">
        <tr class="tabla__lista">
            <th class="tabla__items">ingrediente</th>
            <th class="tabla__items">cantidad</th>
            <th class="tabla__items">unidad</th>
            <th class="tabla__items">margen</th>
            <th class="tabla__items">packaging</th>
        </tr>
    </thead>
    <tbody class="tabla__row">
        <?php if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $query = "SELECT productos.margen, productos.packaging, materias_primas.ingrediente, materias_primas.unidad, infoingredientes.cantidad FROM productos JOIN infoingredientes ON productos.id = productos_id JOIN materias_primas ON materias_primas.id = materias_primas_id WHERE materias_primas_id = 14 AND productos.id = 1;";
            $resultado = mysqli_query($conexion, $query);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>
                <form action="" method="post">
                    <tr class="tabla__lista">
                        <td class="tabla__items">
                            <?php echo $fila['ingrediente'] ?>
                        </td>
                        <td class="tabla__items">
                            <input type="text" name="cantidad" id="cantidad" placeholder="<?php echo $fila['cantidad'] ?>">
                        </td>
                        <td class="tabla__items">
                            <input type="text" name="unidad" id="unidad" placeholder="<?php echo $fila['unidad'] ?>">
                        </td>
                        <td class="tabla__items">
                            <input type="text" name="margen" id="margen" placeholder="<?php echo $fila['margen'] ?>">
                        </td>
                        <td class="tabla__items">
                            <input type="text" name="packaging" id="packaging" placeholder="<?php echo $fila['packaging'] ?>">
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
        <?php
            }
        }
        ?>
<?php
include("./includes/footer.php");
?>