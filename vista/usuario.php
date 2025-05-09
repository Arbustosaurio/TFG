<?php
    // Daniel Gaspar Candela

    // Recuperamos la información de la sesión
    if(!isset($_SESSION))
    {
        session_start();
    }

    // Y comprobamos si hay un usuario iniciado
    if (!isset($_SESSION['nombre']))
    {
        // Si no, reenviamos a la pagina de login
        header("Location: login.php");
        exit();
    }

    $nombre=$_SESSION['nombre'];
    $tipo_usuario=$_SESSION['rol_id'];
    $id=$_SESSION['id_usuario'];
    
    include('cabecera.php');
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
        <h2>Usuario: <?php echo $nombre ?></h2>
    </main>

    <footer>

    </footer>
</body>
</html>
