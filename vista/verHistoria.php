<?php
    // Daniel Gaspar Candela
    
    include('cabecera.php');

    if(isset($_POST['historiaId'])){
        $historiaId = $_POST['historiaId'];
        $personajeId = $_POST['personajeId'];
        $paginaId = $_POST['paginaId'];
    }
      // Obtenemos titulo para mostrarlo
      $sql = "SELECT titulo FROM historia WHERE id_historia = '$historiaId'";
      $historia = mysqli_query($conexion, $sql)->fetch_assoc();
      $titulo = $historia['titulo'];

      // Al iniciar la lectura, crearemos la entrada en la BBDD del progreso si no esta ya creada
      $sql = "SELECT id_pag_actual FROM progreso WHERE id_usuario='$_SESSION['id']' AND id_historia='$historiaId'";
      $paginaIdBBDD = mysqli_query($conexion, $sql);

      // Si no se encuentra una pagina con este progreso, se crea uno nuevo
      if(mysql_num_rows($paginaId) == 0){
        $sql = "INSERT INTO progreso (id_usuario, id_historia, id_personaje, id_pag_actual)
            VALUES ('$_SESSION['id']', '$historiaId', '$personajeId', 1)";

        mysqli_query($conexion, $sql);
      } 
      // y si se encuentra el progreso, se saca la pagina para poder mostrarla
      else{
        /* Aqui se puede llegar en dos casos, si se entra desde el menu, recibiendo una id=0 pero si teniendo progreso, o tras avanzar una pagina 
          En el segundo caso, hay que actualizar la pagina del progreso antes de continuar, de ahi el if    */
          if($paginaId === 0){
            $idBBDD = $paginaIdBBDD->fetch_assoc();
            $paginaId = $idBBDD['id_pag_actual'];
          } else {
            $sql = "UPDATE progreso SET id_pag_actual = '$paginaId' WHERE id_usuario='$_SESSION['id']' AND id_historia='$historiaId'";
            mysqli_query($conexion, $sql);
          }
      }



      $sql = "SELECT contenido, imagen FROM pagina WHERE id_pagina='$paginaId' AND id_historia='$historiaId'";
      $pagina = mysqli_query($conexion, $sql)->fetch_assoc();
      $texto = $pagina['contenido'];
      $imagen = $pagina['imagen'];

      $sql = "SELECT texto, id_pag_destino, requisito FROM opcion WHERE id_pag_origen='$paginaId'";
      $opciones = mysqli_query($conexion, $sql);

      $sql = "SELECT arquetipo FROM personaje WHERE id_creador='$_SESSION['id']' AND id_personaje='$personajeId'";
      $personaje = mysqli_query($conexion, $sql)->fetch_assoc();
      $arquetipo = $personaje['arquetipo'];
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
        <h2> Titulo: <?php echo $titulo ?> </h2> <br>

        <?php if ($imagen !== 0) {echo $imagen} ?> <br>

        <p> <?php echo $texto ?> </p>

        <?php
          // Genera tantos fosmularios como opciones, y al seleccionar un boton, se vuelve a esta web, pero con la paginaId del destino de la eleccion
          if ($opciones->num_rows > 0) {
              while($fila = $opciones->fetch_assoc()) {
                ?>
                <form action="verHistoria.php" method="post">                
                  <input type="hidden" name="historiaId" value= <?php echo $historiaId ?> >
                  <input type="hidden" name="personajeId" value= <?php echo $personajeId ?> >
                  <input type="hidden" name="paginaId" value= <?php echo $fila['id_pag_destino'] ?> >

                  <?php
                    if($fila['requisito'] !== 0 && $fila['requisito'] !== $arquetipo){
                        ?> <button type="submit" disabled> <?php echo $fila['texto'] . "( se necesita el arquetipo )"?> </button> <?php
                    }
                  ?>
                  <button type="submit"> <?php echo $fila['texto'] ?> </button>
                </form>
                <?php
              }
          }
        ?>

    </main>

    <footer>

    </footer>
</body>
</html>

