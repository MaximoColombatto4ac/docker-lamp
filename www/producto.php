<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<div class="section__tabla">
    <div class="downsection">
        <div class="article tabla">
            <table class="blueTable">
                <thead class="tabla__row">
                    <tr class="tabla__lista">
                        <th class="tabla__items">ingrediente</th>
                        <th class="tabla__items">costo/ingrediente</th>
                        <th class="tabla__items">cantidad</th>
                        <th class="tabla__items">unidad</th>
                        <th class="tabla__items">margen</th>
                        <th class="tabla__items">packaging</th>
                        <th class="tabla__items actions">
                            acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="tabla__row">
                    <?php
                    if (isset($_GET['id'])) {

                        $id = $_GET['id'];
                        $query = "SELECT productos.margen, productos.packaging, materias_primas.ingrediente, materias_primas.id, materias_primas.unidad, materias_primas.cantidad as cantidadCosto, materias_primas.costo, infoingredientes.cantidad as cantidad FROM infoingredientes JOIN materias_primas ON materias_primas_id = id JOIN productos ON productos_id = productos.id WHERE productos_id = '$id';";
                        $resultado = mysqli_query($conexion, $query);
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            ?>
                            <tr class="tabla__lista">
                                <td class="tabla__items">
                                    <?php echo $fila['ingrediente'] ?>
                                </td>
                                <td class="tabla__items">
                                    <?php echo $fila['costo'] * $fila['cantidad'] / $fila['cantidadCosto'] ?>
                                </td>
                                <td class="tabla__items">
                                    <?php echo $fila['cantidad'] ?>
                                </td>
                                <td class="tabla__items">
                                    <?php echo $fila['unidad'] ?>
                                </td>
                                <td class="tabla__items">
                                    <?php echo $fila['margen'] ?>
                                </td>
                                <td class="tabla__items">
                                    <?php echo $fila['packaging'] ?>
                                </td>
                                <td class="tabla__items actions">
                                    <a href="edit_producto.php?id=<?php echo $fila['id'] ?>" class="button">
                                        edit
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>