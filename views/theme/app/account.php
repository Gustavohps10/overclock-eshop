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
        <a class="btn" href="#"><i class="fas fa-user-edit"></i> Alterar Dados</a>
    </div>
    <h1 class="subtitle">Endereços</h1>
    <div class="address">
    <a href="#" class="btn"><i class="fas fa-map-marker-alt"></i><i class="fas fa-plus"></i> Novo Endereço</a>
    </div>
</section>