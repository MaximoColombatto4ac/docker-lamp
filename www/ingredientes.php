<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<div class="section__tabla">
    <form class="search" action="" method="GET">
        <div class="form__container">
            <div class="form__group">
                <input type="text" name="ingrediente" placeholder="Buscar ingrediente">
            </div>
            <button type="submit" name="search" value="search" class="btn"><i class="ri-search-line"></i></button>
        </div>
    </form>
    <div class="downsection">
        <div class="article formulario">
            <form action="save_ingredientes.php" method="post">
                <div class="form__container">
                    <div class="form__group">
                        <input type="text" name="nombre" placeholder="name">
                    </div>
                    <div class="form__group">
                        <input type="text" name="costo" placeholder="price">
                    </div>
                    <div class="form__group">
                        <input type="text" name="unidad" placeholder="unit">
                    </div>
                    <div class="form__group">
                        <input type="text" name="cantidad" placeholder="cantidad">
                    </div>
                    <input type="submit" name="save" value="save" class="btn">
                </div>
            </form>

        </div>
        <div class="article tabla">
            <table class="blueTable">
                <thead class="tabla__row">
                    <tr class="tabla__lista">
                        <th class="tabla__items">ingrediente</th>
                        <th class="tabla__items">costo</th>
                        <th class="tabla__items">unidad</th>
                        <th class="tabla__items">cantidad</th>
                        <th class="tabla__items actions">
                            acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="tabla__row">

                    <?php
                    if (isset($_GET['search'])) {
                        $busqueda = $_GET['ingrediente'];
                        $query = "SELECT * FROM materias_primas WHERE ingrediente LIKE '$busqueda%';";
                    } else {
                        $query = "SELECT * FROM materias_primas;";
                    }
                    $resultado = mysqli_query($conexion, $query);
                    while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                        <tr class="tabla__lista">
                            <td class="tabla__items">
                                <?php echo $fila['ingrediente'] ?>
                            </td>
                            <td class="tabla__items">
                                <?php echo $fila['costo'] ?>
                            </td>
                            <td class="tabla__items">
                                <?php echo $fila['unidad'] ?>
                            </td>
                            <td class="tabla__items">
                                <?php echo $fila['cantidad'] ?>
                            </td>
                            <td class="tabla__items actions">
                                <a href="edit.php?id=<?php echo $fila['id'] ?>" class="button">
                                    edit
                                </a>
                                <a href="delete.php?id=<?php echo $fila['id'] ?>" class="button">
                                    delete
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