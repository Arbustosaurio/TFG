<?php
    // Daniel Gaspar Candela
    
    include('cabecera.php');
    include('../modelo/conexion.php');

    if(isset($_GET['id'])){
        $historiaId = $_GET['id'];
    }

    $sql = "SELECT titulo, sinopsis, portada FROM historia WHERE id_historia = '$historiaId'";
    $historia = mysqli_query($conexion, $sql);
    $datosHistoria = $historia->fetch_assoc();
    $titulo = $datosHistoria['titulo'];
    $sinopsis = $datosHistoria['sinopsis'];
    $portada = $datosHistoria['portada'];
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
        <h2> <?php echo $titulo ?> </h2> <br>

        <?php echo "Portada   " . $portada ?> <br>

        <p>Sinopsis: <br>
        <?php echo $sinopsis ?>
        </p>

        <form action="verHistoria.php" method="post">                
            <input type="hidden" name="historiaId" value= <?php echo $historiaId ?> >
            <!-- Se le pasa una pagina porque la pagina verHistoria va a recibir la pagina de si misma al ir avanzando, y asi siempre recive un dato y evito problemas-->
            <input type="hidden" name="paginaId" value=0 >

            <?php
            // Comprobamos si se ha iniciado sesion, ya que si no, no aparece la opcion de usar personaje
            if (!isset($_SESSION['nombre'])) {
                echo "<input type=\"hidden\" name=\"personajeId\" value=1 >";
                echo "<label>Si desea usar personajes, inicie sesion</label><br>";
            }
            else{
                // Si el usuario esta iniciado mostramos un desplegable con sus personajes a elegir
                $usuario = $_SESSION['id_usuario'];
                $sql = "SELECT id_personaje, nombre FROM personaje WHERE id_creador='$usuario'";
                $personajes = mysqli_query($conexion, $sql);
                ?>

                <label for="personajeId">Selecciona un personaje:</label>
                <select name="personajeId" id="personajeId" required>
                    <option value=1>-- Ninguno --</option>
            <?php
            // Genera las opciones
            if ($personajes->num_rows > 0) {
                while($fila = $personajes->fetch_assoc()) {
                    echo '<option value='.$fila['id'].'>'.$fila['nombre'].'</option>';
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
