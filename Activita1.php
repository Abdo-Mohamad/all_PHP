<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activitat Arrays i Bucles</title>
    <style>
        body {
            background-color: rgb(red, green, blue);
            text-align: center;
        }

        h1 {
            color: green;
        }

        p {
            background-color: pink;
            font-size: medium;
            color: white;
            border-radius: 10% 30% 50% 70%;
        }
    </style>
</head>

<body>

    <?php

    $edad = array("Justin" => "26", "Marc1" => "26", "Marc2" => 36, "Cris" => 27, "mario" => 19, "Alex" => 20, "Nico" => 20, "John" => 21, "Abdo" => 27, "Alicia" => 25);
    // This  is an array with names and ages of classmate
    $promedio = round(array_sum($edad) / count($edad));
    // this  is the average age of the classmate

    echo "<h1> El promedio es $promedio lo siento<h1/>";
    // show the average  age of the classmate in screen 

    foreach ($edad as $x => $y) {
        if ($promedio >  $y) { //  if the average age is greater than the age of the classmate

            echo "<p> L’estudiant $x és un bebé, té només $y anys </p>";
        } elseif ($promedio <  $y) { //  if the average age is less than the age of the classmate

            echo "<p> Has vist aquest dinosaure? El $x  ja té $y anys!! </p>";
        } else { //  if the average age is equal to the age of the classmate
            echo " <p>Ho has clavat, noi! El $x està en la mitja </p>";
        }
    } //  show the age of each classmate in screen and compare with the average age of the classmate
    ?>

</body>

</html>