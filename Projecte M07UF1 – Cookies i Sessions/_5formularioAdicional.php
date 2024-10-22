<?php
session_start();
// Inicializamos la variable para controlar si el formulario se muestra o no
$mostrarFormulario = false;

// Si el usuario ha enviado el formulario o ha solicitado mostrar el formulario
if (isset($_POST['modificar_formulario'])) {
    $mostrarFormulario = true;
}
  include '_5Cabecera.php';

/* if (isset($_SESSION["email"])){
    echo "Formulario enviado. Nombre: ". $_SESSION["genero"];
}
 */
// Si el formulario ha sido enviado
if (isset($_POST['enviar_formulario'])) {
    // Procesar el formulario aquí
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["fecha"] = $_POST["fecha"];
    $_SESSION["tel"] = $_POST["tel"];
    $_SESSION["genero"] = $_POST["genero"];

    echo "Formulario enviado. Email: " . (isset($_SESSION["email"]) ? $_SESSION["email"] : "No  hay datos").'<br>';
    echo "Formulario enviado. Telefono: " . (isset($_SESSION["tel"]) ? $_SESSION["tel"] : "No  hay datos").'<br>';
    echo "Formulario enviado. Edada: " . (isset($_SESSION["fecha"]) ? $_SESSION["fecha"] : "No  hay datos").'<br>';
} elseif (!$mostrarFormulario) {
   
    echo "Formulario enviado. Email: " . (isset($_SESSION["email"]) ? $_SESSION["email"] : "No  hay datos").'<br>';
    echo "Formulario enviado. Telefono: " . (isset($_SESSION["tel"]) ? $_SESSION["tel"] : "No  hay datos").'<br>';
    echo "Formulario enviado. Edada: " . (isset($_SESSION["fecha"]) ? $_SESSION["fecha"] : "No  hay datos").'<br>';
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar/Ocultar Formulario con PHP</title>
</head>

<body>

    <!-- Botón para mostrar el formulario -->
    <form method="post" action="">
        <input type="submit" name="modificar_formulario" value="Modificar datos">
    </form>
    <form method="post" action="_5Aplicacio.php">
        <input type="submit" name="Aplicacio" class="button" value="Aplicacio" />
    </form>
    <!-- Formulario que se muestra u oculta basado en la variable PHP -->
    <?php if ($mostrarFormulario): ?>
        <form method="post" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required value='<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "" ?>'><br><br>
            <label for="tel">Telefon</label>
            <input type="tel" name="tel" id="tel" required value='<?php echo isset($_SESSION["tel"]) ? $_SESSION["tel"] : "" ?>'><br><br>

            <label for="fecha">Edad</label>
            <input type="date" id="fecha" name="fecha" required value='<?php echo isset($_SESSION["fecha"]) ? $_SESSION["fecha"] : "" ?>'><br>

            <p>¿Cuál es tu género?</p>

            <input type="radio" id="hombre" name="genero" value="hombre" required
                <?php echo (isset($_SESSION["genero"]) && $_SESSION["genero"] == "hombre") ? "checked" : ""; ?>>
            <label for="hombre">Hombre</label><br>
            <input type="radio" id="mujer" name="genero" value="mujer"
                <?php echo (isset($_SESSION["genero"]) && $_SESSION["genero"] == "mujer") ? "checked" : ""; ?>>
            <label for="mujer">Mujer</label><br>
            <input type="radio" id="otro" name="genero" value="otro"
                <?php echo (isset($_SESSION["genero"]) && $_SESSION["genero"] == "otro") ? "checked" : ""; ?>>
            <label for="otro">Otro</label><br><br>
            <br>
            <input type="submit" name="enviar_formulario" value="Enviar">
        </form>
    <?php endif; ?>


</body>

</html>