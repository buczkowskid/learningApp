<?php
session_start();

require_once "connect.php";

if (!isset($_SESSION['good'])) {

    header("Location: index.php");
    exit();
} else {
    unset($_SESSION['good']);
}

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-welcome.css">
</head>

<body>

    <p>Hurra! Jesteś z nami!</p>

    <div class="bear">
        <img src="img/mis.svg" alt=""></div>
    <a href="index.php">Wroć na stronę główną, aby zalogować się do konta</a>
</body>

</html>