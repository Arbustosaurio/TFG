<?php
    // Daniel Gaspar Candela

    include('conexion.php');

    // Acceder a la base de datos para obtener los datos a mostrar de las historias
    $usuario = $_SESSION['id_usuario'];
    $sql = "SELECT p.nombre as nombre_personaje, a.nombre as nombre_arquetipo FROM personaje p JOIN arquetipos a WHERE p.id_creador = '$usuario' AND a.id_arquetipos = p.arquetipo";
    $listado = mysqli_query($conexion, $sql);

    // Verificar si hubo algún error al ejecutar la consulta
    if ($listado === false){
        die("Error al ejecutar la consulta: " . mysqli_error($conexion));
    }
?>
    <table border="solid black 1px">
    <tr>
        <th>Nombre</th>
        <th>Arquetipo</th>
    </tr>
<?php
    while ($fila = $listado->fetch_assoc()){
        echo "<tr>";
        echo "<td> <a href=\"../vista\menuHistoria.php?id=" . $fila['nombre_personaje'] . "\">" . $fila['nombre_personaje'] . " </a> </td>";
        echo "<td> <a href=\"../vista\menuHistoria.php?id=" . $fila['nombre_arquetipo'] . "\">" . $fila['nombre_arquetipo'] . " </a> </td>";

        echo "</tr>";
    }

    echo "</table>";

?>
    <br> <br>
    <h3>Crear Nuevo Personaje<h3>
    <form action="anadirPersonaje.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br>
        <?php
        
            $sql = "SELECT id_arquetipos, nombre FROM arquetipos";
            $arquetipos = mysqli_query($conexion, $sql);
        ?>

        <label for="arquetipo">Selecciona un arquetipo:</label><br>
        <select name="arquetipo" id="arquetipo" required>
        <?php
        // Genera las opciones
        if ($arquetipos->num_rows > 0) {
            while($fila = $arquetipos->fetch_assoc()) {
                echo '<option value='.$fila['id_arquetipos'].'>'.$fila['nombre'].'</option>';
            }
        }
        ?>
            </select> <br> <br>

        <button type="submit"> Crear </button>
    </form> <br>
