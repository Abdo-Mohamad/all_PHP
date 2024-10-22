<?php
session_start(); // Iniciar la sesión

// Incluir la cabecera
include '_5Cabecera.php';

$count = 0;

// Inicializar la lista de productos si no existe
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

// Función para agregar un producto
function agregarProducto($nombreTablaSurf, $fotoTablaSurf, $cantidad)
{
    $nuevaTabla = [
        'nombre' => $nombreTablaSurf,
        'foto' => $fotoTablaSurf,
        'cantidad' => $cantidad
    ];

    // Agregar la nueva tabla de surf a la sesión
    array_push($_SESSION['productos'], $nuevaTabla);
}

// Si se envía el formulario, agregar el producto
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $foto = $_POST['foto'];
    $cantidad = $_POST['cantidad'];
    agregarProducto($nombre, $foto, $cantidad);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Productos de Tablas de Surf</title>
</head>

<body>
    <h1>Añadir Producto de Tabla de Surf</h1>

    <!-- Formulario para añadir un producto -->
    <form method="POST" action="">
        <label for="nombre">Nombre de la tabla de surf:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="foto">URL de la foto de la tabla:</label>
        <input type="text" id="foto" name="foto" required><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" min="1" required><br>

        <input type="submit" value="Añadir Producto">
    </form>

    <h2>Productos Disponibles</h2>

    <!-- Lista de productos añadidos -->
    <ul>
        <?php if (!empty($_SESSION['productos'])): ?>
            <?php foreach ($_SESSION['productos'] as $producto): ?>
                <li>
                    <img src="<?php echo $producto['foto']; ?>" alt="<?php echo $producto['nombre']; ?>" width="100">
                    <strong><?php echo $producto['nombre']; ?></strong> - Cantidad: <?php echo $producto['cantidad']; ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No hay productos añadidos todavía.</li>
        <?php endif; ?>
    </ul>
</body>

</html>
