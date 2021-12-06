<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $v->section("head")?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="<?= asset("css/style.css")?>">
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <a href="#logo" class="logo"><i class="fas fa-utensils"></i>REST</a>
        <nav class="navbar">
            <a href="#home" class="active">Home</a>
            <a href="#dishes">Dishes</a>
            <a href="#about">About</a>
            <a href="#menu">Menu</a>
            <a href="#review">Review</a>
        </nav>

        <div class="icons">
            <i class="item fas fa-bars" id="menu-bars"></i>
            <i class="item fas fa-search" id="search-icon"></i>
            <a href="#" class="item fas fa-shopping-cart"></a>
            <i href="#" class="item fas fa-user"></i>
            <nav class="nav-user">
                <i class="fas fa-caret-up arrow"></i>
                <ul>
                    <li><a href="<?= $router->route('web.login')?>"><i class="fas fa-sign-in-alt"></i>Login / Registrar</a></li>
                    <li><a href="#"><i class="fas fa-heart"></i>Meus Favoritos</a></li>
                    <li><a href="#"><i class="fas fa-question-circle"></i>Suporte</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <form action="#" method="get" id="search-form">
        <input type="search" placeholder="search" name="search" id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close"></i>
    </form>
    <?= $v->section("content");?>

    <footer class="footer">
        <div class="box-container">
            <div class="box">
                <h3>locations</h3>
                <a href="#">São Paulo</a>
                <a href="#">Paraná</a>
                <a href="#">Rio de Janeiro</a>
                <a href="#">Espirito Santo</a>
                <a href="#">Mato Grosso</a>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a href="#">dishes</a>
                <a href="#">about</a>
                <a href="#">menu</a>
                <a href="#">review</a>
            </div>
            <div class="box">
                <h3>contact info</h3>
                <a href="#">(44)91234-5678</a>
                <a href="#">(44)91111-2222</a>
                <a href="#">lorem-ipsum@gmail.com</a>
                <a href="#">example@hotmail.com</a>
                <a href="#">country, state, street-name - 12345</a>
            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="#">Facebook<i class="fab fa-facebook"></i></a>
                <a href="#">Instagram<i class="fab fa-instagram"></i></a>
                <a href="#">Twitter<i class="fab fa-twitter"></i></a>
                <a href="#">Linkedin<i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        <div class="credit">Copyright @ 2021 by <span>Gustavo Henrique</span></div>
    </footer>

    <?= $v->section("scripts");?>
    <script src="<?= asset("/js/script.js")?>"></script>
</body>
</html>