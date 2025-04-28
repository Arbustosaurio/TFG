<?php
    // Daniel Gaspar Candela

    include('conexion.php');

    // Consultar la base de datos para obtener el hash de la contraseña asociada al usuario
    $sql = "SELECT titulo, sinopsis, imagen FROM historias";
    $listado = mysqli_query($conexion, $sql);

    // Verificar si hubo algún error al ejecutar la consulta
    if ($listado === false){
        die("Error al ejecutar la consulta: " . mysqli_error($conexion));
    }
?>
    <table border="solid black 1px">
    <tr>
        <th>Titulo</th>
        <th>Genero</th>
        <th>Año</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
<?php
    while ($fila = $listado->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $fila['titulo'] . "</td>";
        echo "<td>" . $fila['sinopsis'] . "</td>";
        echo "<td>" . $fila['imagen'] . "</td>";
        
       /* if($tipoUsuario == 1){
            echo "<td> <a href=\"gestPeliAdmin.php?id=" . $fila['id'] . "\"> Gestionar </a> </td>";
        }
        if($tipoUsuario == 2 && $fila['estado'] == "Disponible"){
            echo "<td> <a href=\"gestPeliUsu.php?idPeli=" . $fila['id'] . "\"> Gestionar </a> </td>";
        } */
        echo "</tr>";
    }

    echo "</table>";

?>
