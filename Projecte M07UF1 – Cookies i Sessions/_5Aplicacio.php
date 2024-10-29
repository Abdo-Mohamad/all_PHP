<?php
// Start a session
session_start();

define("TEMPSINACTIU", 3600); // Maximum inactivity time allowed in seconds

// Check if the session is set and manage inactivity time
if (isset($_SESSION["ultimAcces"])) {
    $tempsTranscorregut = time() - $_SESSION["ultimAcces"]; // Calculate elapsed time since last access

    if ($tempsTranscorregut >= TEMPSINACTIU) { // If the session has expired
        session_destroy(); // Destroy the session
        header("Location: _5Caducitat.php"); // Redirect to the expiration page
        exit(); // Ensure the script stops after redirection
    } else {
        $_SESSION["ultimAcces"] = time(); // Update the last access time
    }
} else {
    // If this is a new session, set the last access time
    $_SESSION["ultimAcces"] = time();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Application</title>
</head>

<body>
    <?php include '_5Cabecera.php'; // Include the header file 
    ?>
    <p>Welcome <strong><?php
                        // Check if the session user is defined before displaying it
                        echo isset($_SESSION["usuari"]) ? $_SESSION["usuari"] : "";
                        ?></strong></p>

    <form method="post" action="_5eliminar.php">
        <input type="submit" name="eliminar" class="button" value="Delete cookies" />
    </form>

    <p><a href="_5Logout.php">Logout</a></p>
    <p><a href="_5inici.php">Return to home</a></p>
    <a href="./_5add_surfboard.php"> View product</a>
    <form method="post" action="_5formularioAdicional.php">
        <input type="submit" name="formulario" class="button" value="View data" />
    </form>
</body>

</html>