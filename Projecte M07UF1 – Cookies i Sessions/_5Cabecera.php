<?php
// Iniciar sesión
//session_start();

if (!isset($_COOKIE["PASSWORD"]) || !isset($_COOKIE["USUARI"])) {
    echo " No exstie los cookies guardada";
} else {
    echo "Cookie 'user' es " . $_COOKIE['USUARI'] . "<br>";
    echo "El valor de la cookie 'PASSWORD' es: " . $_COOKIE['PASSWORD'] . "<br>";
}

// Establece la zona horaria de tu ubicación
date_default_timezone_set('Europe/Madrid'); // Cambia a tu zona horaria si es diferente

// Obtiene el día, la hora, minutos y segundos actuales
$fecha_actual = date('d-m-Y H:i:s');

// Muestra la fecha y hora actual
echo "La fecha y hora actual es: " . $fecha_actual . '<br>';
