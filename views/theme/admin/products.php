<?php $v->layout("theme/admin/_base");?>

<?php $v->start("head")?>
    <link rel="stylesheet" href="<?= asset("/css/crud.css");?>">
<?php $v->end()?>

<?php $v->start("modal");?>
    <div class="modal">
        <div class="modal-container">
            <i class="fas fa-times modal-close"></i>
            <div class="modal-header">
                <h1 class="modal-title">Confirmar Exclusão</h1>
            </div>
            <div class="modal-content">
                <p>Certeza que deseja excluir o produto <span id="span-id"></span>?</p>
                <form action="<?= $router->route("crud.deleteProduct")?>" method="post">
                    <input id="btn-confirm" class="btn" type="submit" value="CONFIRMAR">
                    <input type="hidden" name="id" id="hidden-id">
                </form>
            </div>
        </div>
    </div>
<?php $v->end()?>

        
<section>
    <h1 id="table-title"><i class="fas fa-box-open"></i>PRODUTOS</h1>
    <table id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>IMAGEM</th>
                <th>NOME</th>
                <th>VALOR</th>
                <th>QTD</th>
                <th>ATIVO</th>
                <th>EDITAR</th>
                <th>DELETAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($produtos as $produto) :
                if($produto->ativo){
                    $ativo = "ATIVO";
                }else{
                    $ativo = "INATIVO";
                }
                $valor = 'R$'.number_format($produto->valor, 2, ',', '.');
            ?>
            <tr>
                <td><?= $produto->idProduto?></td>
                <td><div class="image-box">
                    <img src="<?= asset("/images/products/{$produto->imagem}")?>" alt="">
                </div></td>
                <td><?= $produto->nome?></td>
                <td><?= $valor?></td>
                <td><?= $produto->quantidade?></td>
                <td><?= $ativo?></td>
                <td><a href="<?= $router->route("admin.editProduct", ["id" => $produto->idProduto])?>"><i class="fas fa-edit"></i></a></td>
                <td><i class="fas fa-trash-alt btn-delete" id="<?=$produto->idProduto?>"></i></td>
            </tr>
            <?php
            endforeach;
            ?>
            
        </tbody>
    </table>
</section>
    
   
<?php $v->start("scripts");?>
    <script src="https://cdn.jsdelivr.net/gh/Rakhmadi/RdataTB@master/dist/index.js"></script>
    <script src="<?= asset("/js/crud.js")?>"></script>
<?php $v->end()?>