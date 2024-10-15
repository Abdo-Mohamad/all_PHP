<?php
// Iniciar sesión
session_start();

define("TEMPSINACTIU", 3600); // Segundos máximos que puede estar la aplicación inactiva

// Verificar si la sesión está definida y gestionar el tiempo de inactividad
if (isset($_SESSION["ultimAcces"])) {
    $tempsTranscorregut = time() - $_SESSION["ultimAcces"];

    if ($tempsTranscorregut >= TEMPSINACTIU) { // Si la sesión ha caducado
        session_destroy(); // Destruir sesión
        header("Location: _5Caducitat.php"); // Redirigir a la página de caducidad
        exit(); // Asegurarse de que el script se detiene después de la redirección
    } else {
        $_SESSION["ultimAcces"] = time(); // Actualizar la fecha de último acceso
    }
} else {
    // Si la sesión es nueva, definir el tiempo de último acceso
    $_SESSION["ultimAcces"] = time();
}

// Verificar si las cookies existen


// Definir usuario y contraseña válidos



if (!isset($_COOKIE["PASSWORD"]) || !isset($_COOKIE["USUARI"])) {
    echo " No exstie los cookies guardada";
} else {
    echo "Cookie 'user' es " . $_COOKIE['USUARI'] . "<br>";
    echo "El valor de la cookie 'PASSWORD' es: " . $_COOKIE['PASSWORD'] . "<br>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Aplicació</title>
</head>

<body>
    <p>Benvinguda <strong><?php
                            // Verificar si el usuario de sesión está definido antes de mostrarlo
                            echo isset($_SESSION["usuari"]) ? $_SESSION["usuari"] : "";
                            ?></strong></p>

    <form method="post" action="_5eliminar.php">
        <input type="submit" name="eliminar" class="button" value="eliminar" />

    </form>

    <p><a href="_5Logout.php">Tanca la sessió</a></p>
    <p><a href="_5inici.php">Torna a l'inici</a></p>
</body>

</html>