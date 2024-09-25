<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activiat1.1</title>
</head>

<body>
    <?php
    $datosDelJuego = array(
        array(
            "nombre" => "Juego 1 A",
            "foto" => "url_juego1",
            "edad" => "12",
            "openipn" => "ipn_juego1"
        ),
        array(
            "nombre" => "Juego 2",
            "foto" => "url_juego2",
            "edad" => "18",
            "openipn" => "ipn_juego2"
        ),
        array(
            "nombre" => "Juego 3",
            "foto" => "url_juego3",
            "edad" => "10",
            "openipn" => "ipn_juego3"
        ),
        array(
            "nombre" => "Juego 4",
            "foto" => "url_juego4",
            "edad" => "16",
            "openipn" => "ipn_juego4"
        ),
        array(
            "nombre" => "Juego 5",
            "foto" => "url_juego5",
            "edad" => "13",
            "openipn" => "ipn_juego5"
        )
    );
    echo "<h1>Top videojocs preferits</h1>";
    /*   foreach ($datosDelJuego as $juego) {
        echo "Nombre: " . $juego['nombre'] . "<br>";
        echo "Foto: " . $juego['foto'] . "<br>";
        echo "Edad: " . $juego['edad'] . "<br>";
        echo "OpenIPN: " . $juego['openipn'] . "<br><br>";
    } */
    foreach ($datosDelJuego as $juegos) {
        echo $juegos['nombre'] . " <br/>";
        foreach ($juegos as $juego => $value) {
            echo "$juego : $value <br/>";
        }
    }
    ?>
</body>

</html>