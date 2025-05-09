<?php
    // Daniel Gaspar Candela
    
    include('cabecera.php');
    include('../modelo/conexion.php');
    if (!isset($_SESSION)){
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing.css">
    <title>TFG</title>
</head>
<body>

    <main>
        <h2>Personajes</h2>

    <?php
    if(isset($_SESSION['nombre'])){
        include('../modelo/listadoPersonajes.php');

        if(isset($_GET['error'])){
            echo "<br> <h2 style=\"color: red;\">No puedes crear personajes con un nombres repetidos</h2>";
        }

        // Tenia esta parte en listadoPersonajes, pero no redirige bien
        ?>
        <br>
        <h3>Crear Nuevo Personaje<h3>
        <form action="../modelo/anadirPersonaje.php" method="post">
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

        <?php
    } else{
            echo "<p>Para poder crear y usar personajes debes <a href=\"login.php\">Iniciar Sesion</a></p>";

    }
        
    ?>
    </main>

    <footer>

    </footer>
</body>
</html>
