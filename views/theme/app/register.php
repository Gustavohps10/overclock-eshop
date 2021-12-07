<?php $v->layout("theme/app/_base");?>

<? $v->start("head")?>
    <link rel="stylesheet" href="<?= asset("/css/register.css")?>">
<? $v->end();?>

<section class="register">
    <a href="<?= $router->route("web.login")?>" class="back"><i class="fas fa-arrow-left"></i>Login</a>
    <form action="<?= $router->route("auth.register")?>" method="post" autocomplete="off">
        <div class="form-header">
            <h1>Realize seu cadastro!</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, sequi.</p>
        </div>
        <div class="form-content">
            <label for="name">Nome</label>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="name" id="name" placeholder="Nome">
            </div>
            <div class="double-input-field">
                <div class="input-box">
                    <label for="username">Username</label>
                    <div class="input-field">
                        <i class="fas fa-at"></i>
                        <input type="text" name="username" id="username" placeholder="Username">
                    </div>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="double-input-field">
                <div class="input-box">
                    <label for="passwd">Senha</label>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="passwd" id="passwd" placeholder="Senha">
                    </div>
                </div>
                <div class="input-box">
                    <label for="confirm-passwd">Confimar senha</label>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="confirm-passwd" id="confirm-passwd" placeholder="Confirmar Senha">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-footer">
           <div class="captcha">
               teste
           </div>
           <div>
               <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore, tempora deserunt sequi velit ex enim praesentium voluptatibus aliquam fugiat provident?</p>
           </div>
            <input class="btn" type="submit" value="Cadastrar">
        </div>
    </form>
</section>