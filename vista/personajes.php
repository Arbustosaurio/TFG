<?php
    // Daniel Gaspar Candela
    
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
        <h2>Personajes</h2>

    <?php
    if(isset($_SESSION['nombre'])){
        include('../modelo/listadoPersonajes.php');
    } else{
        ?>
            <p>Para poder crear y usar personajes debes <a href="login.php">Iniciar Sesion</a></p>
        <?php
    }
        
    ?>
    </main>

    <footer>

    </footer>
</body>
</html>
