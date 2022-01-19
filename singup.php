<?php
session_start();

if (isset($_POST['login'])) {

    $validation = true;

    $login = $_POST['login'];
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    //walidacja loginu
    if ((strlen($login) < 3) || (strlen($login) > 20)) {
        $validation = false;
        $_SESSION['e_login'] = "Login musi się składać z 3 do 20 znaków";
    }

    if (ctype_alnum($login) == false) {
        $validation = false;
        $_SESSION['e_login'] = "Login może składać się tylko z liter i cyfr (bez polskich znaków)";
    }


    // walidacja maila
    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
        $validation = false;
        $_SESSION['e_email'] = "Podaj poprawny adres e-mail!";
    }

    //walidacja hasła
    if ((strlen($password1) < 6) || (strlen($password1) > 20)) {
        $validation = false;
        $_SESSION['e_password'] = "Hasło musi posiadać od 6 do 20 znaków";
    }

    if ($password1 != $password2) {
        $validation = false;
        $_SESSION['e_password'] = "Podane hasła nie są takie same";
    }

    $password_hash = password_hash($password1, PASSWORD_DEFAULT);

    //walidacja regulaminu
    if (!isset($_POST['regulations'])) {
        $validation = false;
        $_SESSION['e_regulations'] = "Zaakceptuj regulamin";
    }

    require_once "connect.php";

    mysqli_report(MYSQLI_REPORT_STRICT);

    try {

        $connect_mysql = new mysqli($host, $db_user, $db_password, $db_name);
        if ($connect_mysql->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {

            $result = $connect_mysql->query("SELECT `id` FROM `login-test` WHERE email='$email'");

            if (!$result) throw new Exception($connect_mysql->error);


            //sprawdzanie czy istnieje taki email
            $who_email = $result->num_rows;
            if ($who_email > 0) {
                $validation = false;
                $_SESSION['e_email'] = "Konto z takim adresem email już istnieje!";
            }
            //sprawdzanie czy istnieje taki login 
            $result = $connect_mysql->query("SELECT `id` FROM `login-test` WHERE login='$login'");

            if (!$result) throw new Exception($connect_mysql->error);
            $who_login = $result->num_rows;
            if ($who_login > 0) {
                $validation = false;
                $_SESSION['e_login'] = "Konto z takim loginem już istnieje!";
            }

            // dodawanie uzytkownika do bazy - bład dodawania - problem z dodaniem do mojej bazy do użytkowników dodaje normalnie

            if ($validation == true) {

                if ($connect_mysql->query("INSERT INTO `login-test` VALUES (NULL, '$login', '$password_hash','$email','$name','$surname' )")) {

                    $_SESSION['good'] = true;
                    header('Location: welcome.php');
                } else {
                    throw new Exception($connect_mysql->error);
                }
            }

            $connect_mysql->close();
        }
    } catch (Exception $e) {
        echo 'Błąd serwera!';
        echo '<br />Informacja developerska: ' . $e;
    }
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1266e58313.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="jq.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-singup.css">


    <style>
        .error {
            color: red;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        p {
            color: red;
        }
    </style>

</head>

<body>
    <section class="home-header">
        <div class="reg-wrap">
            <div class="reg-head">
                <div class="reg-top">
                    <h4>Regulamin</h4>
                </div>
                <div class="reg-text">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem earum unde nostrum. Temporibus
                    doloribus explicabo soluta reiciendis ducimus eius. Harum illo blanditiis, placeat molestias
                    architecto officia numquam quam tempora ex!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus architecto perferendis adipisci
                    sit odio laboriosam dolorem placeat corporis quibusdam illum hic praesentium, nemo sapiente vero
                    consequatur vitae error omnis nesciunt.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis aliquid consequatur neque veritatis
                    voluptates placeat quas ullam dignissimos provident, doloribus accusantium explicabo aut sit ratione
                    aliquam velit eaque sint totam.
                </div>
                <span class="exit"><i class="fas fa-times-circle"></i></span>
            </div>
        </div>
        <div class="container">

            <div class="row-singup">

                <a href="index.php" class="return">Powrót</a>
                <div class="singup-form">
                    <div class="title-box">
                        <h4>Utwórz nowe konto</h4>
                    </div>
                    <div class="e-message">
                        <?php

                        if (isset($_SESSION['e_login'])) {
                            echo '<div class="error">' . $_SESSION['e_login'] . '</div>';
                            unset($_SESSION['e_login']);
                        } elseif (isset($_SESSION['e_email'])) {
                            echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
                            unset($_SESSION['e_email']);
                        } elseif (isset($_SESSION['e_password'])) {
                            echo '<div class="error">' . $_SESSION['e_password'] . '</div>';
                            unset($_SESSION['e_password']);
                        } elseif (isset($_SESSION['e_regulations'])) {
                            echo '<div class="error">' . $_SESSION['e_regulations'] . '</div>';
                            unset($_SESSION['e_regulations']);
                        } elseif (isset($_SESSION['e_recaptcha'])) {
                            echo '<div class="error">' . $_SESSION['e_recaptcha'] . '</div>';
                            unset($_SESSION['e_recaptcha']);
                        }
                        ?>
                    </div>
                    <form method="post" class="singup" action="">
                        <input type="text" placeholder="Twój login" class="input-box-singup" name="login">
                        <input type="text" placeholder="Twój Email" class="input-box-singup" name="email">
                        <input type="password" placeholder="Twoje hasło" class="input-box-singup" name="password1">
                        <input type="password" placeholder="Powtórz hasło" class="input-box-singup" name="password2">
                        <input type="text" placeholder="Imię" class="input-box-singup" name="name">
                        <input type="text" placeholder="Nazwisko" class="input-box-singup" name="surname"><br>
                        <input type="checkbox" name="regulations" class="regulations"><a class="regulamin" href="#">Akceptuję
                            regulamin</a><br>
                        <input type="submit" value="Stwórz!" class="submit-btn">
                    </form>
                </div>
            </div>
        </div>
        </div>

        <div class="bear">
            <div class="character">
                <img src="img/mis.svg" alt="">
            </div>
            <div class="cloud">
                <img src="img/comic.svg" alt="">
                <p style="color: black;">Załóż konto i zacznij zabawe z nami!</p>
            </div>
        </div>
    </section>

    <script src="popup-reg.js"></script>
</body>

</html>