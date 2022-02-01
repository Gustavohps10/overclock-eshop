<?php $v->layout("theme/app/_base");?>

<?php $v->start("head")?>
<link rel="stylesheet" href="<?= asset("/css/login.css")?>">
<?php $v->end()?>

<section class="login">
    <div id=right-ball></div>
    <img class="loginImg" src="<?= asset("/images/login.svg")?>" alt="">
    <form action="<?= $router->route("auth.login");?>" method="post" autocomplete = "off">
        <h1>Sign In</h1>
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" name="email" id="email" placeholder="Digite seu email">
        </div>
        <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="passwd" id="passwd" placeholder="Digite sua senha">
        </div>
        <input type="submit" class="btn" value="LOGIN">
        <p>Não tem uma conta? <a href="<?= $router->route("web.register");?>">Crie uma!</a></p>
    </form>
</section>
