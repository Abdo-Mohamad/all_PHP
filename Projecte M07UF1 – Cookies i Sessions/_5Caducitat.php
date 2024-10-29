<?php
// Start the session to check the contents of $_SESSION.
session_start();

// Display $_SESSION. The $_SESSION variable has no content because the session was destroyed
// in the script that called this one.
print_r($_SESSION);

// Destroy the session again
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Close Session</title>
</head>

<body>
    <h3>The session has expired!!!</h3>
    <a href="_5inici.php">Return to the homepage</a>
</body>

</html>