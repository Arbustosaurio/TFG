<?php
    // Daniel Gaspar Candela
    
    include('cabecera.php');
    include('../modelo/conexion.php')

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $sql = "SELECT titulo, sinopsis, imagen, id FROM historias WHERE id = '$id'";
    $historia = mysqli_query($conexion, $sql);
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
        <h2> <?php echo $historia["titulo"] ?> </h2>

        <?php echo $historia["imagen"] ?>

        <p>Sinopsis: <br>
        <?php echo $historia["sinopsis"] ?>
        </p>

        <form action="verHistoria.php" method="post">                
            <input type="hidden" name="id" value= <?php echo $id ?> >

        <?php
        // Comprobamos si se ha iniciado sesion, ya que si no, no aparece la opcion de usar personaje
        if (session_id() === '') {
            echo "<input type=\"hidden\" name=\"personajeId\" value=0 >"
        }
        else{
            // Si el usuario esta iniciado mostramos un desplegable con sus personajes a elegir
            $sql = "SELECT id, nombre FROM personajes WHERE idUsuario='$_SESSION['id']'";
            $personajes = mysqli_query($conexion, $sql);
            ?>

            <label for="personajes">Selecciona un personaje:</label>
            <select name="personajeId" id="personajes" required>
            <option value="0">-- Ninguno --</option>
        <?php
        // Genera las opciones
        if ($personajes->num_rows > 0) {
            while($fila = $personajes->fetch_assoc()) {
                echo '<option value="'.$fila['id'].'">'.$fila['nombre'].'</option>';
            }
        }
        ?>
    </select>
            <?php
        }
        ?>
            <button type="submit">Comenzar lectura</button>
        </form>

    </main>

    <footer>

    </footer>
</body>
</html>
