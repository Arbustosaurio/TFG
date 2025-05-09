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

        <form action="crearPagina.php" method="post">
            <label for="titulo">Titulo:</label><br>
            <input type="text" id="titulo" name="titulo"><br>
            <label for="sinopsis">Sinopsis:</label><br>
            <textarea id="sinopsis" name="sinopsis" rows="4" cols="50"> </textarea> <br>

            <input type="hidden" name="portada" value=0>

            <button type="submit"> Crear Historia y Comenzar a Escribir </button>
        </form>
    </main>

    <footer>

    </footer>
</body>
</html>
