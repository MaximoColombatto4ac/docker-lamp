
            <?php
            $servername = "localhost";
            $database = "mydb";
            $username = "root";
            $password = "";

            $conexion = mysqli_connect($servername, $username, $password, $database);
            if (!$conexion) {
                die("Conexion fallida: " . mysqli_connect_error());
            }
            ?>