<?php
session_start();
if (!isset($_SESSION['log_now'])) {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LanBob - portal
    </title>
    <link rel="stylesheet" href="style-portal.css">
</head>

<body>
    <div class="wrap">

        <div class="left">
            <ul>
                <li><img src="img/logo.svg" alt=""></li>
                <li><a href="lesson1.php">Lekcja 1</a></li>
                <li><a href="lesson2.php">Lekcja 2</a></li>
                <li><a href="lesson3.php">Lekcja 3</a></li>

            </ul>
        </div>
        <div class="right">
            <button class="logout"><?php echo '<a href="logout.php">Wyloguj się</a>' ?></button>
            <div class="portal">
                <div class="avatar"><img src="img/avatar.jpg" alt=""></div>
                <div class="data">
                    <ul>
                        <li><?php echo "Login: " . $_SESSION['login']; ?></li>
                        <li><?php echo "Email: " . $_SESSION['email']; ?></li>
                        <li><?php echo "Imie: " . $_SESSION['name']; ?></li>
                        <li><?php echo "Nazwisko: " . $_SESSION['surname']; ?></li>
                        <li><?php echo "Ukończone lekcje: " . $_SESSION['login']; ?></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</body>

</html>