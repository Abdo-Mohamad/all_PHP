<?php
session_start();
// Initialize a variable to control whether to show the form or not
$mostrarFormulario = false;

// If the user has submitted the form or requested to display it
if (isset($_POST['modificar_formulario'])) {
    $mostrarFormulario = true;
}
include '_5Cabecera.php';
// If the form has been submitted
if (isset($_POST['enviar_formulario'])) {
    // Process the form here
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["fecha"] = $_POST["fecha"];
    $_SESSION["tel"] = $_POST["tel"];
    $_SESSION["genero"] = $_POST["genero"];

    echo "Your Email is: " . (isset($_SESSION["email"]) ? $_SESSION["email"] : "No data available") . ' <br><br>';
    echo "Your Phone Number is : " . (isset($_SESSION["tel"]) ? $_SESSION["tel"] : "No data available") . '<br><br>';
    echo "You birthday : " . (isset($_SESSION["fecha"]) ? $_SESSION["fecha"] : "No data available") . '<br><br>';
} elseif (!$mostrarFormulario) {
    // Display previously submitted data if the form is not shown
    echo "Your Email is: " . (isset($_SESSION["email"]) ? $_SESSION["email"] : "No data available") . '<br><br>';
    echo "Your Phone Number is : " . (isset($_SESSION["tel"]) ? $_SESSION["tel"] : "No data available") . '<br><br>';
    echo "You birthday : " . (isset($_SESSION["fecha"]) ? $_SESSION["fecha"] : "No data available") . '<br><br>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>Show/Hide Form with PHP</title>
</head>

<body>

    <!-- Button to display the form -->
    <form method="post" action="">
        <input type="submit" name="modificar_formulario" value="Modify Data">
    </form>
    <form method="post" action="_5Aplicacio.php">
        <input type="submit" name="Aplicacio" class="button" value="Application" />
    </form>

    <!-- Form displayed or hidden based on the PHP variable -->
    <?php if ($mostrarFormulario): ?>
        <form method="post" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required value='<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "" ?>'><br><br>
            <label for="tel">Phone</label>
            <input type="tel" name="tel" id="tel" required value='<?php echo isset($_SESSION["tel"]) ? $_SESSION["tel"] : "" ?>'><br><br>

            <label for="fecha">Age</label>
            <input type="date" id="fecha" name="fecha" required value='<?php echo isset($_SESSION["fecha"]) ? $_SESSION["fecha"] : "" ?>'><br>

            <p>What is your gender?</p>

            <input type="radio" id="hombre" name="genero" value="hombre" required
                <?php echo (isset($_SESSION["genero"]) && $_SESSION["genero"] == "hombre") ? "checked" : ""; ?>>
            <label for="hombre">Male</label><br>
            <input type="radio" id="mujer" name="genero" value="mujer"
                <?php echo (isset($_SESSION["genero"]) && $_SESSION["genero"] == "mujer") ? "checked" : ""; ?>>
            <label for="mujer">Female</label><br>
            <input type="radio" id="otro" name="genero" value="otro"
                <?php echo (isset($_SESSION["genero"]) && $_SESSION["genero"] == "otro") ? "checked" : ""; ?>>
            <label for="otro">Other</label><br><br>
            <br>
            <input type="submit" name="enviar_formulario" value="Submit">
        </form>
    <?php endif; ?>

</body>

</html>
