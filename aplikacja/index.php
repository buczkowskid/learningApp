<?php

session_start();

if ((isset($_SESSION['log_now'])) && ($_SESSION['log_now'] == true)) {
    header("Location: appka.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praca inżynierska LanBob</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1266e58313.js" crossorigin="anonymous"></script>
</head>

<body>

    <section class="home-header">


        <img class="one" src="img/mon.svg" alt="">
        <img class="two" src="img/treebig.svg" alt="">

        <img class="three" src="img/treegreen.svg" alt="">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="promo-text-box">
                        <img class="logo" src="img/logo.svg" alt="">
                        <p>Nauka języka angielskiego dla najmłodszych! </p>
                        <p>Sam się przekonaj!</p>
                        <p>Załóż konto lub zaloguj się</p>
                        <a href="singup.php"><button type="button" class="submit-btn add-btn">Dołącz do
                                nas</button></a>

                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="lead-form">
                        <div class="title-box">
                            <h4>Zaloguj sie na swoje konto</h4>
                        </div>
                        <form action="zalogowany.php" method="POST">
                            <label for="">Twój login</label>
                            <input type="text" name="login" placeholder="Twój login" class="input-box" required>
                            <label for="">Hasło</label>
                            <input type="password" name="password" placeholder="Twoje hasło" class="input-box" required>
                            <?php if (isset($_SESSION['bad_login'])) {
                                echo $_SESSION['bad_login'];
                            } ?>

                            <input type="submit" value="Zaloguj" class="submit-btn">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>


    </section>
    <section class="services">
        <div class="container">

            <div class="services-detail">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="services-section">
                            <div class="services-icon">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                            <div class="services-description">
                                <p>Prosta nauka</p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus provident
                                    repudiandae reiciendis in fuga at velit necessitatibus porro suscipit, minima sit,
                                    fugiat quod quam cupiditate enim ipsa rerum dicta saepe.</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="services-section">
                            <div class="services-icon">
                                <i class="fas fa-reply-all"></i>
                            </div>
                            <div class="services-description">
                                <p>System powtórek</p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus provident
                                    repudiandae reiciendis in fuga at velit necessitatibus porro suscipit, minima sit,
                                    fugiat quod quam cupiditate enim ipsa rerum dicta saepe.</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="services-section">
                            <div class="services-icon">
                                <i class="fas fa-play"></i>
                            </div>
                            <div class="services-description">
                                <p>Ucz się kiedy tylko chcesz</p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus provident
                                    repudiandae reiciendis in fuga at velit necessitatibus porro suscipit, minima sit,
                                    fugiat quod quam cupiditate enim ipsa rerum dicta saepe.</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="services-section">
                            <div class="services-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="services-description">
                                <p>Aplikacja na smartfon</p>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus provident
                                    repudiandae reiciendis in fuga at velit necessitatibus porro suscipit, minima sit,
                                    fugiat quod quam cupiditate enim ipsa rerum dicta saepe.</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
    </section>
    <section class="language">
        <div class="container">
            <h1>Wybierz język którego chcesz się nauczyć</h1>
            <div class="row">
                <div class="col-sm">

                    <div class="our-team">

                        <div class="pic">
                            <img src="img/svg/051-united-kingdom.svg" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Angielski</h3>
                            <span>Już dostępny</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="our-team">
                        <div class="pic">
                            <img src="img/svg/048-germany.svg" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Niemiecki</h3>
                            <span>Już dostępny</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="our-team">
                        <div class="pic">
                            <img src="img/svg/017-spain.svg" alt="">
                        </div>
                        <div class="team-content">
                            <h3 class="title">Hiszpański</h3>
                            <span>Już dostępny</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="our-team">
                        <div class="pic">
                            <img src="img/svg/065-france.svg" alt="">
                        </div>
                        <div class=" team-content">
                            <h3 class="title">Francuski</h3>
                            <span>Wkrótce dostępny</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-title">

                        <h2>O nas</h2>
                    </div>
                    <div class="footer-section">

                        <a href="#">Blog</a>
                        <a href="#">Regulamin</a>
                        <a href="#">Kontakt</a>
                        <a href="#">Praca</a>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-title">
                        <h2>Znajdziesz nas</h2>
                    </div>
                    <div class="footer-section">
                        <a href="#">Facebook</a>
                        <a href="#">Instagram</a>
                        <a href="#">Twitter</a>
                        <a href="#">Youtube</a>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-title">
                        <h2>Newsletter</h2>
                    </div>
                    <div class="footer-section">
                        <input type="email" placeholder="email">
                        <button type="submit">Wyślij</button>
                    </div>
                </div>
                <div class="footer-bottom">
                    <h4> &copy; Projekt wykonany jako praca dyplomowa </h4>
                </div>
            </div>
        </div>


    </footer>
</body>

</html>