<?php
    // Daniel Gaspar Candela
    
    include('cabecera.php');

    if(isset($_POST['historiaId'])){
        $historiaId = $_POST['historiaId'];
        $personajeId = $_POST['personajeId'];
        $paginaId = $_POST['paginaId'];
    }

    /*
    $nombreCookie = 'hist_' . $historiaId . '_pers_' . $personajeId;

    // Para saber la pagina en la que se encuentra creamos una cookie que guarda la ip de esta, si no esta ya creada
    if(!isset($_COOKIE[$nombreCookie])) {
        $paginaId = 1;
        setcookie($nombreCookie, $paginaId, time() + (86400 * 30), "/");

      } else {
        $paginaId = $_COOKIE[$nombreCookie];
      }*/

      // Al iniciar la lectura, creamos la entrada en la BBDD del progreso si no esta ya creada
      $sql = "SELECT id_pag_actual FROM progreso WHERE id_usuario='$_SESSION['id']' AND id_historia='$historiaId'";
      $paginaIdBBDD = mysqli_query($conexion, $sql);

      // Si no se encuentra una pagina con este progreso, se crea uno nuevo
      if(mysql_num_rows($paginaId) == 0){
        $sql = "INSERT INTO progreso (id_usuario, id_historia, id_personaje, id_pag_actual)
            VALUES ('$$_SESSION['id']', '$historiaId', '$personajeId', 1)";

        mysqli_query($conexion, $sql);
      } 
      // y si se encuentra el progreso, se saca la pagina para poder mostrarla
      else{
        $idBBDD = $paginaIdBBDD->fetch_assoc();
        $paginaId = $idBBDD['id_pag_actual'];
      }
?>
