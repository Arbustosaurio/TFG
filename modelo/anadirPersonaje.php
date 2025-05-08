<?php
    // Daniel Gaspar Candela

    include('conexion.php');

    if(isset($_POST['arquetipo'])){
        $arquetipo = $_POST['arquetipo'];
        $nombre = $_POST['nombre'];
    

        $usuario = $_SESSION['id_usuario'];

        // Añadir personaje
        $sql = "INSERT INTO personaje (id_creador, nombre, arquetipo) VALUES ('$usuario', '$nombre', '$arquetipo')";
        $listado = mysqli_query($conexion, $sql);

        // Verificar si hubo algún error al ejecutar la consulta
        if ($listado === false){
            die("Error al ejecutar la consulta: " . mysqli_error($conexion));
        }
    }
?>
