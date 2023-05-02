<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<div class="section__tabla">
    <form class="search" action="" method="GET">
        <div class="form__container">
            <div class="form__group">
                <input type="text" name="producto" placeholder="Buscar producto">
            </div>
            <button type="submit" name="search" value="search" class="btn"><i class="ri-search-line"></i></button>
        </div>
    </form>
    <div class="downsection">
        <div class="article tabla">
            <table class="blueTable">
                <thead class="tabla__row">
                    <tr class="tabla__lista">
                        <th class="tabla__items">producto</th>
                        <th class="tabla__items">costo</th>
                        <th class="tabla__items actions">acciones</th>
                    </tr>
                </thead>
                <tbody class="tabla__row">

                    <?php
                    if (isset($_GET['search'])) {
                        $busqueda = $_GET['producto'];
                        $query = "SELECT * FROM productos WHERE producto LIKE '$busqueda%';";
                    } else {
                        $query = "SELECT * FROM productos;";
                    }
                    $resultado = mysqli_query($conexion, $query);
                    while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                        <tr class="tabla__lista">
                            <td class="tabla__items">
                                <?php echo $fila['producto'] ?>
                            </td>
                            <td class="tabla__items">
                                en proceso...
                            </td>
                            <td class="tabla__items actions">
                                <a href="producto.php?id=<?php echo $fila['id'] ?>" class="button">
                                    edit
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>