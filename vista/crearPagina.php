<?php
    // Daniel Gaspar Candela
    
    include('cabecera.php');

    /*
    
        Hacer que al recibir la id de pagina, se cargue lo que contiene en el form, para asi poder modificarlo. Aplicable a la opcion de Editar
            Quizas con un value= $valor="" de base, y que si hay id se rellene el $valor




            añadir lista con las paginas creadas para poder ir y modificarlas
    */
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

        <form action="../modelo/anadirPagina.php" method="post">
            <label for="contenido">Contenido:</label><br>
            <textarea id="contenido" name="contenido" rows="6" cols="70"> </textarea> <br>

            <label for="num_opciones">Número de opciones:</label>
            <select id="num_opciones" name="num_opciones" onchange="generarCampos()" required>
                <option value="">Seleccione...</option>
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php endfor; ?>
            </select>

            <button type="submit"> Añadir Pagina </button>
        </form>
    </main>

    <footer>

    </footer>
</body>
</html>
