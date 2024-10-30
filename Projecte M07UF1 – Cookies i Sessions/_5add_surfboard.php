<?php
session_start(); // Start the session

// Include the header
include '_5Cabecera.php';

// Initialize the product list if it doesn't exist
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

// Function to add or update a product
function agregarOActualizarProducto($nombreTablaSurf, $fotoTablaSurf, $cantidad)
{
    $productoExistente = false;

    // Iterate through the product list to see if the product already exists
    foreach ($_SESSION['productos'] as &$producto) {
        if ($producto['nombre'] === $nombreTablaSurf) {
            // If the product exists, update its quantity
            $producto['cantidad'] = $cantidad;
            $productoExistente = true;
            break;
        }
    }

    // If the product doesn't exist, add it as new
    if (!$productoExistente) {
        $nuevaTabla = [
            'nombre' => $nombreTablaSurf,
            'foto' => $fotoTablaSurf,
            'cantidad' => $cantidad
        ];
        array_push($_SESSION['productos'], $nuevaTabla);
    }
}

// Function to reduce a product’s quantity or remove it if it reaches 0
function reducirProducto($index)
{
    if (isset($_SESSION['productos'][$index])) {
        // Decrease the quantity if it’s greater than 0
        if ($_SESSION['productos'][$index]['cantidad'] > 1) {
            $_SESSION['productos'][$index]['cantidad'] -= 1;
        } else {
            // Remove the product if the quantity reaches 0
            unset($_SESSION['productos'][$index]);
            // Reorganize array indexes
            $_SESSION['productos'] = array_values($_SESSION['productos']);
        }
    }
}

// If the add product form is submitted, add or update the product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $foto = $_POST['foto'];
    $cantidad = $_POST['cantidad'];
    agregarOActualizarProducto($nombre, $foto, $cantidad);
}

// If the reduce quantity form is submitted, call the function
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reducir'])) {
    $index = $_POST['producto_index'];
    reducirProducto($index);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Surfboard Products</title>
</head>

<body>
    <?php if (isset($_COOKIE["PASSWORD"]) && isset($_COOKIE["USUARI"])) { ?>
        <h1>Add Surfboard Product</h1>

        <!-- Form to add a product -->
        <form method="POST" action="">
            <label for="nombre">Surfboard Name:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="foto">URL of Surfboard Photo:</label>
            <input type="text" id="foto" name="foto" value="https://liquidshredder.com/wp-content/uploads/2020/04/Yellow-Pro-300x300.jpg"><br>

            <label for="cantidad">Quantity:</label>
            <input type="number" id="cantidad" name="cantidad"  required><br>

            <input type="submit" value="Add Product"> <br>
            <p> <a class="link-button" href="./_5Aplicacio.php">Application</a></p>
        </form>
    <?php } ?>

    <h2>Available Products</h2>

    <!-- List of added products -->
    <ul>
        <?php if (!empty($_SESSION['productos'])): ?>
            <?php foreach ($_SESSION['productos'] as $index => $producto): ?>
                <li>

                    <img src="<?php echo $producto['foto']; ?>" alt="<?php echo $producto['nombre']; ?>">
                    <p> <?php echo $producto['nombre']; ?></p> &nbsp;&nbsp;&nbsp;&nbsp;
                    <p> <?php echo "Quantity:" . $producto['cantidad']; ?></p>

                    <!-- Button to reduce the quantity -->

                    <form method="POST" action="" class="container">
                        <input type="hidden" name="producto_index" value="<?php echo $index; ?>">
                        <input type="hidden" name="reducir" value="1">
                        <input type="submit" value="-1" id="descount">
                    </form>

                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No products have been added yet.</li>
        <?php endif; ?>
    </ul>

    <p> <a href="./_5inici.php" class="link-button">Return to login</a>
    <p>
</body>

</html>