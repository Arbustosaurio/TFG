<!-- Daniel Gaspar Candela -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
<header>
    Menu de inicio de sesion
</header>

<form action='../modelo/verificarLogin.php' method='post'>
  <fieldset>
    <legend>Login</legend>
        
    <table align="center">
      <tr>
        <td><label for='usuario'>Usuario:</label></td>
        <td><input type='text' name='inputUsuario' id='usuario' maxlength="50" /></td>
      </tr>
      <tr>
        <td><label for='password'>Contraseña:</label></td>
        <td><input type='password' name='inputPassword' id='password' maxlength="50" /></td>
      </tr>
      <tr>
        <td></td>
        <td><input type='submit' name='enviar' value='Enviar' /></td>
      </tr>
    </table>

    <?php
    // Verificar si hay un mensaje de error
    if (isset($_GET['error'])){
        echo '<p style="color: red;">' . $_GET['error'] . '</p>';
    }
    echo '<br><a href="registroUsu.php">Registro nuevo usuario</a>';
    ?>
  </fieldset>
</form>
