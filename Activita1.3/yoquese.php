<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $dni = $_POST["dni"];
    $sexo = $_POST["sexo"];
    $comment = $_POST["comment"];
    $email = $_POST["email"];
    $correcto = false;
    

    if (empty($nombre) || empty($apellido)) {
        echo "El nombre y apellido son obligatorios <br><br> ";
        echo  "<button><a href='index.html'> Intenta de nuevo</a></button>";
    } else {

        if ($edad > 150) {
            echo "La edad no puede ser mayor a 150 <br>";
            echo  "<button><a href='index.html'> Intenta de nuevo</a></button>";
        } else {
            if (strlen($dni) != 9) {
                echo "La dni no puede ser mayor mas de 9 character <br>";
                echo  "<button><a href='index.html'> Intenta de nuevo</a></button>";
            } else {

                echo "Felicitats" . $nombre . 't’has inscrit correctament a l’INFERN!!! <br>';
                echo "Les teves dades són:<br>";
                echo "Nom: " . $nombre . "<br>";
                echo "Cognom: " . $apellido . "<br>";
                echo "Edat: " . $edad . "<br>";
                echo "DNI: " . $dni . "<br>";
                echo "Sexe: " . $sexo . "<br>";
                echo "Comentari: " . $comment . "<br>";
                echo "Correu electrònic: " . $email . "<br>";
            }
        }
    }
    ?>

</body>

</html>