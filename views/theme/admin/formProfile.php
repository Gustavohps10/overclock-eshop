<?php $v->layout("theme/admin/_base");?>

<?php $v->start("head")?>
    <link rel="stylesheet" href="<?= asset("/css/crud.css");?>">
<?php $v->end()?>

<section>
    <?php
        if(!empty($perfil)):
            $url = "crud.editProfile";
        else:
            $url = "crud.addProfile";
        endif;
    ?>
    <a href="<?= $router->route("admin.profiles")?>" class="back"><i class="fas fa-arrow-left"></i>Perfis</a>
    <form action="<?= $router->route($url)?>" method="post" autocomplete="off">
        <div class="form-header">
            <h1><i class="far fa-address-card"></i> <?= $formName?></h1>
        </div>
        <div class="form-content">
            <label for="name">Nome do Perfil</label>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="name" id="name" placeholder="Nome do perfil" value='<?php if(!empty($perfil)): echo $perfil->nome; endif;?>'>
            </div>
            <input type="hidden" name="id" value=<?php if(!empty($perfil)): echo $perfil->idPerfil; endif;?>>
            <input type="submit" value="<?= $buttonName?>">
        </div>
    </form>
</section>