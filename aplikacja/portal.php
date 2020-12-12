<?php

session_start();

require_once "connect.php";

if ((!isset($_POST['login'])) || (!isset($_POST['password']))) {

    header("Location: index.php");
    exit();
}


$connect_mysql = new mysqli($host, $db_user, $db_password, $db_name);

if ($connect_mysql->connect_errno != 0) {
    echo "Error:" . $connnect_mysql->connect_errno;
} else {

    $login = $_POST['login'];
    $password = $_POST['password'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");

    $sql = "SELECT `id`, `login`, `password`, `email` FROM `login-test` WHERE login='$login' AND password='$password' ";

    if ($result = $connect_mysql->query(sprintf("SELECT `id`, `login`, `password`, `email` FROM `login-test` WHERE login='%s'", mysqli_real_escape_string($connect_mysql, $login)))) {
        $how_users = $result->num_rows;
        if ($how_users > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['log_now'] = true;

                $_SESSION['id'] = $row['id'];
                $_SESSION['login'] = $row['login'];
                $_SESSION['email'] = $row['email'];

                $result->close();
                unset($_SESSION['bad_login']);
                header('Location: portal.php');
            } else {
                $_SESSION['bad_login'] = '<p style="color:red;">Nieprawidłowy login i hasło</p>';
                header("Location: index.php");
            }
        } else {

            $_SESSION['bad_login'] = '<p style="color:red;">Nieprawidłowy login i hasło</p>';
            header("Location: index.php");
        }
    }

    $connect_mysql->close();
}
?>


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
                <li><a href="#">Lekcja 1</a></li>
                <li><a href="#">Lekcja 2</a></li>
                <li><a href="#">Lekcja 3</a></li>
            </ul>
        </div>
        <div class="right">
            <button class="logout">Wyloguj</button>
            <div class="portal">
                <div class="avatar"><img src="img/avatar.jpg" alt=""></div>
                <div class="data">
                    <ul>
                        <li><?php echo "Login: " . $login; ?></li>
                        <li><?php echo "Email: " . $login; ?></li>
                        <li><?php echo "Imie: " . $login; ?></li>
                        <li><?php echo "Nazwisko: " . $login; ?></li>
                        <li><?php echo "Ukończone lekcje: " ?></li>


                    </ul>
                </div>

            </div>
        </div>
    </div>
</body>

</html>