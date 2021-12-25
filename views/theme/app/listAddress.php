<?php $v->layout("theme/app/_base");?>

<section class="addresses">
    <h1 class="title"><i class="fas fa-map-marker-alt"></i> MEUS ENDEREÇOS</h1>
    <a href="<?= $router->route("address.register")?>" class="btn"><i class="fas fa-plus"></i> Novo</a>
    <div class="items"> 
        <?php if(!empty($enderecos)): foreach($enderecos as $endereco):?>
            <div class="item">
                <div class="header">
                    <h1><i class="fas fa-map-marker-alt"></i> <?= $endereco->nome?></h1>
                </div>
                <div class="content">
                    <p><span>Rua: </span><?= $endereco->rua?></p>
                    <p><span>N° da Casa: </span><?= $endereco->numeroCasa?></p>
                    <p><span>Bairro: </span><?= $endereco->bairro?></p>
                    <p><span>Cidade: </span><?= $endereco->cidade?></p>
                    <p><span>Estado: </span><?= $endereco->estado?></p>
                </div>
                <div class="footer">
                    <a href="<?= $router->route("address.edit", ["id" => $endereco->idEndereco])?>" class="btn"><i class="far fa-edit"></i> EDITAR</a>
                    <a href="#" class="btn"><i class="far fa-trash-alt"></i> DELETAR</a>
                </div>    
            </div>
        <?php endforeach; else: ?>
            <h2>Você ainda não possui endereços cadastrados</h2>
        <?php endif?>
    </div>
</section>
