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
    <link rel="stylesheet" href="style-lesson.css">
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
                <div class="language">
                    <h1>Lekcja 1</h1>
                    <h2>Wybierz język którego chesz się uczyć</h2>

                    <a href="lesson1/english1.php"><img src="img/svg/051-united-kingdom.svg" alt=""></a>
                    <a href="lesson1/german1.php"><img src="img/svg/048-germany.svg" alt=""></a>
                    <a href="lesson1/spain1.php"><img src="img/svg/017-spain.svg" alt=""></a>
                    <a href="lesson1/french1.php"><img src="img/svg/065-france.svg" alt=""></a>


                </div>

            </div>
        </div>
    </div>
</body>

</html>