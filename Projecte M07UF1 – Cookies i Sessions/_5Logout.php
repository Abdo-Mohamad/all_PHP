<?php
// Close session
session_start();
session_destroy();
$_SESSION = array(); // This is the same as unset($_SESSION) or session_unset()
session_unset();
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>End Session</title>
</head>

<body>
    <h3>Session ended</h3>
    <p> <a href="_5inici.php" class="link-button">Return to the start</a></p>
</body>

</html>