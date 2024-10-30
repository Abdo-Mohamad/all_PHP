<?php
// Start session (commented out, so session is not started here)
// session_start();

if (!isset($_COOKIE["PASSWORD"]) || !isset($_COOKIE["USUARI"])) {
    echo "No saved cookies found <br>"; // Check if cookies "PASSWORD" and "USUARI" are not set
} else {
    echo "Your cookiees is saved " . $_COOKIE['USUARI'] . "<br>"; // Display the "USUARI" cookie value
    //echo "The value of the cookie 'PASSWORD' is: " . $_COOKIE['PASSWORD'] . "<br>"; // Display the "PASSWORD" cookie value
}

// Set the timezone to your location
date_default_timezone_set('Europe/Madrid'); // Change to your timezone if different

// Get the current date, hour, minute, and second
$fecha_actual = date('d-m-Y H:i:s');

// Display the current date and time
echo "The current date and time is: " . $fecha_actual . '<br>';
