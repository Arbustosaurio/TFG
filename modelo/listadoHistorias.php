<?php
    // Daniel Gaspar Candela

    include('conexion.php');

    // Acceder a la base de datos para obtener los datos a mostrar de las historias
    $sql = "SELECT titulo, sinopsis, portada, id_historia FROM historia";
    $listado = mysqli_query($conexion, $sql);

    // Verificar si hubo algún error al ejecutar la consulta
    if ($listado === false){
        die("Error al ejecutar la consulta: " . mysqli_error($conexion));
    }
?>
    <table border="solid black 1px">
    <tr>
        <th>Titulo</th>
        <th>Sinopsis</th>
        <th>Portada</th>
    </tr>
<?php
    while ($fila = $listado->fetch_assoc()){
        echo "<tr>";
        echo "<td> <a href=\"../vista\menuHistoria.php?id=" . $fila['id_historia'] . "\">" . $fila['titulo'] . " </a> </td>";
        echo "<td> <a href=\"../vista\menuHistoria.php?id=" . $fila['id_historia'] . "\">" . $fila['sinopsis'] . " </a> </td>";
        echo "<td> <a href=\"../vista\menuHistoria.php?id=" . $fila['id_historia'] . "\">" . $fila['portada'] . " </a> </td>";

        echo "</tr>";
    }

    echo "</table>";

?>
