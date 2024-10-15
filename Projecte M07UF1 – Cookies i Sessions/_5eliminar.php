<?php

// Función que maneja el botón
if (isset($_COOKIE['USUARI']) && isset($_COOKIE['PASSWORD'])) {
    // Configurar cookies por una hora (o eliminarlas si deseas)
    setcookie("PASSWORD", '', time() - 3600); // Elimina las cookies
    setcookie("USUARI", '', time() - 3600);
    
    // Evita cualquier salida antes de la redirección
    header("Location: _5Aplicacio.php"); // Redirigir a la página de caducidad
    exit();
} else {
    // Evita salida antes de header()
    header("Location: _5Aplicacio.php");
    exit();
}
