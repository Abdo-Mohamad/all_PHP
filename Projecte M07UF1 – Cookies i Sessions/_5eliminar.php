<?php

// Function that handles the button
if (isset($_COOKIE['USUARI']) && isset($_COOKIE['PASSWORD'])) {
    // Set cookies for one hour (or delete them if desired)
    setcookie("PASSWORD", '', time() - 3600); // Delete the cookies
    setcookie("USUARI", '', time() - 3600);
    
    // Prevent any output before the redirect
    header("Location: _5Aplicacio.php"); // Redirect to the expiration page
    exit();
} else {
    // Prevent output before header()
    header("Location: _5Aplicacio.php");
    exit();
}
