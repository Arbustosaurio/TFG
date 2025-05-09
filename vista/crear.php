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
        <h2>Crear</h2>

    <?php
        if(isset($_SESSION['nombre'])){
            include('../modelo/menuCrear.php');

        } else{
            echo "<p>Para poder crear historias propias debes <a href=\"login.php\">Iniciar Sesion</a></p>";
        }
    ?>

    <br>
    <form action="crearHistoria.php" method="post">
        <button type="submit"> Crear Nueva Historia </button>
    </form>
    </main>

    <footer>

    </footer>
</body>
</html>
