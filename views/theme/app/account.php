<?php $v->layout("theme/app/_base");?>

<section class="user">
    <h1 class="title"><i class="far fa-id-card"></i> MINHA CONTA</h1>
    <h1 class="subtitle">Meus Dados</h1>
    <div class="content">
        <div class="name">
            <i class="fas fa-user-circle"></i> 
            <span>Nome: </span> 
            <p><?= $usuario->nome?></p>
        </div>
        <div class="email">
            <i class="fas fa-envelope"></i>
            <span> Email: </span>
            <p><?= $usuario->email?></p>
        </div>
        <div class="username">
            <i class="fas fa-at"></i>
            <span> Username: </span>
            <p>@<?= $usuario->username?></p>
        </div>
        <a class="btn" href="<?= $router->route("app.editAccount")?>"><i class="fas fa-user-edit"></i> Alterar Dados</a>
    </div>
    <h1 class="subtitle">Principais Endereços</h1>
    <div class="main-addresses">
        <?php if(!empty($enderecos)): foreach($enderecos as $endereco):?>
            <div class="address-container">
                <h1><i class="fas fa-map-marker-alt"></i> <?= $endereco->nome?></h1>
                <p><span>Rua: </span><?= $endereco->rua?></p>
                <p><span>N° da Casa: </span><?= $endereco->numeroCasa?></p>
                <p><span>Bairro: </span><?= $endereco->bairro?></p>
                <p><span>Cidade: </span><?= $endereco->cidade?></p>
                <p><span>Estado: </span><?= $endereco->estado?></p>
            </div>
        <?php endforeach; else: ?>
            <h2>Você ainda não possui endereços cadastrados</h2>
        <?php endif?>
        
        <a class="btn" href="<?= $router->route("address.listAddresses")?>">
            <i class="fas fa-map-marker"></i>
            <i class="fas fa-map-marker-alt"></i>
            <i class="fas fa-map-marker"></i>
            Ver todos
        </a>
        <a href="<?= $router->route("address.register")?>" class="btn"><i class="fas fa-map-marker-alt"></i><i class="fas fa-plus"></i> Novo Endereço</a>
    </div>
</section>