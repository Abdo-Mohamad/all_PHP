<?php

define("USUARI", "abdo"); //Definim nom d'usuari vàlid
define("PASSWORD", "1234"); //Definim contrsenya vàlida
if (isset($_COOKIE['USUARI']) && isset($_COOKIE['PASSWORD'])) {
  if ($_COOKIE['USUARI'] == USUARI && $_COOKIE['PASSWORD'] == PASSWORD) {
    header("Location: _5Aplicacio.php");
  } else echo '<!DOCTYPE html>
    <html>
      <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>Inici</title>
      </head>
      <body>
        <form method="POST" action="_5autenticacio.php">
          <label for="usuari">Usuari: </label>
          <input type="text" name="usuari" id="usuari" /><br /><br />
          <label for="contrasenya">Contrasenya: </label>
          <input type="password" name="contrasenya" id="contrasenya" /><br /><br />
          <label for="checkbox"> Guardar cookies</label>
          <input type="checkbox" name="checkbox" id="checkbox" /> <br /><br />
          <input type="submit" name="enviar" value="Accedir" />
        </form>
      </body>
    </html>';
}
