<?php
    // Daniel Gaspar Candela

    include('conexion.php');

    if(isset($_POST['arquetipo'])){
        $arquetipo = $_POST['arquetipo'];
        $nombre = $_POST['nombre'];
    
        session_start();
        $usuario = $_SESSION['id_usuario'];

        $sql = "SELECT nombre FROM personaje WHERE id_creador = '$usuario'";
        $repetido = mysqli_query($conexion, $sql);

        $rep = 0;

        if ($repetido->num_rows > 0) {
            while($fila = $repetido->fetch_assoc()) {
                if($fila['nombre']==$nombre){
                    $rep++;
                }
            }
        }

        if($rep>0){
            header("Location: ../vista/personajes.php?error=error");
            exit();

        } else {
            // Añadir personaje
            $sql = "INSERT INTO personaje (id_creador, nombre, arquetipo) VALUES ('$usuario', '$nombre', '$arquetipo')";
            $listado = mysqli_query($conexion, $sql);

            // Verificar si hubo algún error al ejecutar la consulta
            if ($listado === false){
                die("Error al ejecutar la consulta: " . mysqli_error($conexion));
            }

            header("Location: ../vista/personajes.php");
            exit();
        }
    }
?>
