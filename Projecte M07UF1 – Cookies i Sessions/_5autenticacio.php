<?php
define("USUARI", "abdo"); //Definim nom d'usuari vàlid
define("PASSWORD", "1234"); //Definim contrsenya vàlida


if ($_POST["usuari"] == USUARI && $_POST["contrasenya"] == PASSWORD) { //Si l'autenticació és correcte...
    session_start(); //Iniciem sessió.
    if (isset($_POST["checkbox"])) {
        setcookie("PASSWORD", $_POST["contrasenya"], time() + (3600));
        setcookie("USUARI", $_POST["usuari"], time() + (3600));
    }

    $_SESSION["ultimAcces"] = time(); //Inicialitzem la data d'inici de sessió

    //Guardem les dades de l'usuari autenticat en la sessió
    $_SESSION["usuari"] = $_POST["usuari"];
    $_SESSION["contrasenya"] = $_POST["contrasenya"];

    //Mostrem la pàgina de l'aplicació
    header("Location: _5Aplicacio.php");
} else { //Si l'autenticació no és correcte...
    header("location:_5inici.php"); //Retornem a la pàgina inicial.
}


/* else {
    setcookie("PASSWORD", $_POST["contrasenya"], time() - (3600));
    setcookie("USUARI", $_POST["usuari"], time() - (3600));
} */