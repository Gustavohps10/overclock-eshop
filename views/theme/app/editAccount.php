<?php $v->layout("theme/app/_base");?>

<?php $v->start("head")?>
    <link rel="stylesheet" href="<?= asset("/css/register.css")?>">
<?php $v->end();?>

<section class="register">
    <a href="<?= $router->route("app.account")?>" class="back"><i class="fas fa-arrow-left"></i>Minha Conta</a>
    <form action="<?= $router->route("auth.edit")?>" method="post" autocomplete="off">
        <div class="form-header">
            <h1>Editar Dados</h1>
        </div>
        <div class="form-content">
            <label for="name">Nome</label>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="name" id="name" placeholder="Nome" value="<?= $usuario->nome?>">
            </div>
            <div class="double-input-field">
                <div class="input-box">
                    <label for="username">Username</label>
                    <div class="input-field">
                        <i class="fas fa-at"></i>
                        <input type="text" name="username" id="username" placeholder="Username" value="<?= $usuario->username?>">
                    </div>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Email" value="<?= $usuario->email?>">
                    </div>
                </div>
            </div>
            <span class="show-passwd">Alterar Senha <i class="fas fa-sort-down"></i></span>
            <span class="hide-passwd hide">Não alterar senha <i class="fas fa-sort-up"></i></span>
            <div class="passwd-container hide">
                <label for="current-passwd">Senha Atual</label>
                <div class="input-field">
                    <i class="fas fa-user-lock"></i>
                    <input type="text" name="current-passwd" id="current-passwd" placeholder="Senha Atual" >
                </div>
                <div id="passwd-input" class="double-input-field">
                    <div class="input-box">
                        <label for="passwd">Nova Senha</label>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="passwd" id="passwd" placeholder="Senha">
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="confirm-passwd">Confimar Nova senha</label>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="confirm-passwd" id="confirm-passwd" placeholder="Confirmar Senha">
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <div class="form-footer">
            <input class="btn" type="submit" value="Editar">
        </div>
    </form>
</section>

<?php $v->start("scripts")?>
    <script>
        $(".show-passwd").on("click", function(){
            $(".passwd-container").show();
            $(".show-passwd").hide();
            $(".hide-passwd").show();
        });

        $(".hide-passwd").on("click", function(){
            $(".passwd-container").hide();
            $(".show-passwd").show();
            $(".hide-passwd").hide();
            $("#current-passwd").val("");
            $("#passwd").val("")
            $("#confirm-passwd").val("")

        });
    </script>
<?php $v->end();?>