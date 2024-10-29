<?php
define("USUARI", "abdo"); // Define valid username
define("PASSWORD", "1234"); // Define valid password

if ($_POST["usuari"] == USUARI && $_POST["contrasenya"] == PASSWORD) { // If authentication is correct...
    session_start(); // Start session.

    if (isset($_POST["checkbox"])) { // If the "Remember me" checkbox is checked
        setcookie("PASSWORD", $_POST["contrasenya"], time() + 3600); // Set a cookie for the password, valid for one hour
        setcookie("USUARI", $_POST["usuari"], time() + 3600); // Set a cookie for the username, also valid for one hour
    }

    $_SESSION["ultimAcces"] = time(); // Initialize session start time

    // Store authenticated user data in the session
    $_SESSION["usuari"] = $_POST["usuari"];
    $_SESSION["contrasenya"] = $_POST["contrasenya"];

    // Display the application page
    header("Location: _5Aplicacio.php");
} else { // If authentication is incorrect...
    header("Location: _5inici.php"); // Return to the initial page.
}
