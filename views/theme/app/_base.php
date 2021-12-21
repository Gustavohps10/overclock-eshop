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
        <a href="#logo" class="logo">
            <img src="<?= asset("/images/logo.png")?>" alt="">
        </a>
        <nav class="navbar">
            <a href="#home" class="active">Home</a>
            <a href="#new-products">Novos</a>
            <a href="#pc-categories">PCs</a>
            <a href="#about">Sobre</a>
            <a href="#review">Comentários</a>
        </nav>

        <div class="icons">
            <i class="item fas fa-bars" id="menu-bars"></i>
            <i class="item fas fa-search" id="search-icon"></i>
            <a href="<?= $router->route("app.order")?>" class="item fas fa-shopping-cart"></a>
            <i href="#" class="item fas fa-user"></i>
            <nav class="nav-user">
                <i class="fas fa-caret-up arrow"></i>
                <ul>
                    <?php 
                        if(empty($_SESSION["user"])):
                    ?>
                    <li><a href="<?= $router->route('web.login')?>"><i class="fas fa-sign-in-alt"></i>Login / Registrar</a></li>
                    <li><a href="#"><i class="fas fa-heart"></i>Meus Favoritos</a></li>
                    <li><a href="#"><i class="fas fa-question-circle"></i>Suporte</a></li>
                    <?php 
                        else:
                    ?>
                    <li><a href="<?= '#'?>"><i class="far fa-user-circle"></i>Minha Conta</a></li>
                    <li><a href="<?= $router->route("app.listOrders")?>"><i class="fas fa-clipboard-list"></i>Meus Pedidos</a></li>
                    <li><a href="#"><i class="fas fa-heart"></i>Meus Favoritos</a></li>
                    <li><a href="#"><i class="fas fa-question-circle"></i>Suporte</a></li>  
                    <li><a href="<?= $router->route("app.logoff")?>"><i class="fas fa-door-open"></i>Sair</a></li>
                    <?php 
                        endif;
                    ?>
                </ul>
            </nav>
        </div>
    </header>

    <form action="<?= $router->route("app.search")?>" method="get" id="search-form">
        <input type="search" placeholder="Procurar" name="str" id="search-box">
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
                <a href="#home" class="active">Home</a>
                <a href="#new-products">Novos</a>
                <a href="#pc-categories">PCs</a>
                <a href="#about">Sobre</a>
                <a href="#review">Comentários</a>
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?= $v->section("scripts");?>
    <script src="<?= asset("/js/script.js")?>"></script>
</body>
</html>