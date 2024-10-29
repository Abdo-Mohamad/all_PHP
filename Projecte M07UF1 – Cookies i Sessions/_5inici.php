<?php
// Start a session
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <title>Home</title>
</head>

<body>
  <form method="POST" action="_5autenticacio.php">
    <label for="usuari">User: </label>
    <input type="text" name="usuari" id="usuari" value='<?php echo isset($_COOKIE["USUARI"]) ? $_COOKIE["USUARI"] : "" ?>' /><br /><br />
    <label for="contrasenya">Password: </label>
    <input type="password" name="contrasenya" id="contrasenya" value='<?php echo isset($_COOKIE["PASSWORD"]) ? $_COOKIE["PASSWORD"] : "" ?>' /><br /><br />
    <label for="checkbox"> Save cookies</label>
    <input type="checkbox" name="checkbox" id="checkbox" /> <br /><br />
    <input type="submit" name="enviar" value="Log in" />
    <a href="./_5add_surfboard.php"> View product</a>
  </form>
</body>

</html>