<?php
session_start(); // Iniciar la sesión

// Incluir la cabecera
include '_5Cabecera.php';

// Inicializar la lista de productos si no existe
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

// Función para agregar o actualizar un producto
function agregarOActualizarProducto($nombreTablaSurf, $fotoTablaSurf, $cantidad) {
    $productoExistente = false;

    // Recorrer la lista de productos para buscar si el producto ya existe
    foreach ($_SESSION['productos'] as &$producto) {
        if ($producto['nombre'] === $nombreTablaSurf) {
            // Si el producto existe, actualizamos su cantidad
            $producto['cantidad'] += $cantidad;
            $productoExistente = true;
            break;
        }
    }

    // Si el producto no existe, lo agregamos como nuevo
    if (!$productoExistente) {
        $nuevaTabla = [
            'nombre' => $nombreTablaSurf,
            'foto' => $fotoTablaSurf,
            'cantidad' => $cantidad
        ];
        array_push($_SESSION['productos'], $nuevaTabla);
    }
}

// Función para reducir la cantidad de un producto o eliminarlo si llega a 0
function reducirProducto($index) {
    if (isset($_SESSION['productos'][$index])) {
        // Disminuir la cantidad si es mayor que 0
        if ($_SESSION['productos'][$index]['cantidad'] > 1) {
            $_SESSION['productos'][$index]['cantidad'] -= 1;
        } else {
            // Eliminar el producto si la cantidad llega a 0
            unset($_SESSION['productos'][$index]);
            // Reorganizar los índices del array
            $_SESSION['productos'] = array_values($_SESSION['productos']);
        }
    }
}

// Si se envía el formulario de añadir producto, agregar o actualizar el producto
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $foto = $_POST['foto'];
    $cantidad = $_POST['cantidad'];
    agregarOActualizarProducto($nombre, $foto, $cantidad);
}

// Si se envía el formulario para reducir la cantidad, llamar a la función
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reducir'])) {
    $index = $_POST['producto_index'];
    reducirProducto($index);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Productos de Tablas de Surf</title>
</head>

<body>
    <?php if (isset($_COOKIE["PASSWORD"]) && isset($_COOKIE["USUARI"])) { ?>
        <h1>Añadir Producto de Tabla de Surf</h1>

        <!-- Formulario para añadir un producto -->
        <form method="POST" action="">
            <label for="nombre">Nombre de la tabla de surf:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="foto">URL de la foto de la tabla:</label>
            <input type="text" id="foto" name="foto"><br>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" min="1" required><br>

            <input type="submit" value="Añadir Producto">
        </form>
    <?php } ?>

    <h2>Productos Disponibles</h2>

    <!-- Lista de productos añadidos -->
    <ul>
        <?php if (!empty($_SESSION['productos'])): ?>
            <?php foreach ($_SESSION['productos'] as $index => $producto): ?>
                <li>
                    <img src="<?php echo $producto['foto']; ?>" alt="<?php echo $producto['nombre']; ?>" width="100">
                    <strong><?php echo $producto['nombre']; ?></strong> - Cantidad: <?php echo $producto['cantidad']; ?>
                    <!-- Botón para reducir la cantidad -->
                    <form method="POST" action="" style="display:inline;">
                        <input type="hidden" name="producto_index" value="<?php echo $index; ?>">
                        <input type="hidden" name="reducir" value="1">
                        <input type="submit" value="-1">
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No hay productos añadidos todavía.</li>
        <?php endif; ?>
    </ul>

    <a href="./_5inici.php">volver a login</a>

</body>

</html>
