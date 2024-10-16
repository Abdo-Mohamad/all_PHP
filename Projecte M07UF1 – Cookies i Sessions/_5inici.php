<?php
// Iniciar sesión
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <title>Inici</title>
</head>

<body>
  <form method="POST" action="_5autenticacio.php">
    <label for="usuari">Usuari: </label>
    <input type="text" name="usuari" id="usuari" value='<?php echo isset($_COOKIE["USUARI"]) ? $_COOKIE["USUARI"] : "" ?>' /><br /><br />
    <label for="contrasenya">Contrasenya: </label>
    <input type="password" name="contrasenya" id="contrasenya" value='<?php echo isset($_COOKIE["PASSWORD"]) ? $_COOKIE["PASSWORD"] : "" ?>' /><br /><br />


    <!--   <label for="email">Email:</label>
    <input type="email" name="email" id="email" value='<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "" ?>'><br><br>
    <label for="tel">Telefon</label>
    <input type="tel" name="tel" id="tel" value='<?php echo isset($_SESSION["tel"]) ? $_SESSION["tel"] : "" ?>'><br><br>

    <label for="fecha">Edad</label>
    <input type="date" id="fecha" name="fecha" value='<?php echo isset($_SESSION["fecha"]) ? $_SESSION["fecha"] : "" ?>'><br>

    <p>¿Cuál es tu género?</p>

    <input type="radio" id="hombre" name="genero" value="hombre"
      <?php echo (isset($_SESSION["genero"]) && $_SESSION["genero"] == "hombre") ? "checked" : ""; ?>>
    <label for="hombre">Hombre</label><br>
    <input type="radio" id="mujer" name="genero" value="mujer"
      <?php echo (isset($_SESSION["genero"]) && $_SESSION["genero"] == "mujer") ? "checked" : ""; ?>>
    <label for="mujer">Mujer</label><br>
    <input type="radio" id="otro" name="genero" value="otro"
      <?php echo (isset($_SESSION["genero"]) && $_SESSION["genero"] == "otro") ? "checked" : ""; ?>>
    <label for="otro">Otro</label><br><br> -->

    <label for="checkbox"> Guardar cookies</label>
    <input type="checkbox" name="checkbox" id="checkbox" /> <br /><br />
    <input type="submit" name="enviar" value="Accedir" />
  </form>
</body>

</html>


<!-- 

      /* define("USUARI", "abdo"); //Definim nom d'usuari vàlid
define("PASSWORD", "1234"); //Definim contrsenya vàlida
if (isset($_COOKIE['USUARI']) && isset($_COOKIE['PASSWORD'])) {
  if ($_COOKIE['USUARI'] == USUARI && $_COOKIE['PASSWORD'] == PASSWORD) {
    header("Location: _5Aplicacio.php");
  }
}  */

-->