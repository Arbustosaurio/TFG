<?php
    // Daniel Gaspar Candela
    
    include('cabecera.php');

    if(isset($_POST['historiaId'])){
        $historiaId = $_POST['historiaId'];
        $personajeId = $_POST['personajeId'];
    }

    $nombreCookie = 'hist_' . $historiaId . '_pers_' . $personajeId;

    // Para saber la pagina en la que se encuentra creamos una cookie que guarda la ip de esta, si no esta ya creada
    if(!isset($_COOKIE[$nombreCookie])) {
        $paginaId = 1;
        setcookie($nombreCookie, $paginaId, time() + (86400 * 30), "/");

      } else {
        $paginaId = $_COOKIE[$nombreCookie];
      }

      
?>
