<?php $v->layout("theme/admin/_base");?>

<?php $v->start("head")?>
    <link rel="stylesheet" href="<?= asset("/css/crud.css");?>">
<?php $v->end()?>

<section>
    <?php
        if(!empty($produto)):
            $id = $produto->idProduto;
            $nome = $produto->nome;
            $valor = $produto->valor;
            $quantidade = $produto->quantidade;
            $descricao = $produto->descricao;
            if($produto->ativo):
                $checked = 'checked';
            else:
                $checked = '';
            endif;
            $url = "crud.editProduct";
        else:
            $id = '';
            $nome = '';
            $valor = '';
            $quantidade = '';
            $descricao = '';
            $checked = 'checked';
            $url = "crud.addProduct";
        endif;
    ?>
    <a href="<?= $router->route("admin.products")?>" class="back"><i class="fas fa-arrow-left"></i>Produtos</a>
    <form action="<?= $router->route($url)?>" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="form-header">
            <h1><i class="far fa-address-card"></i> <?= $formName?></h1>
        </div>
        <div class="form-content">
            <div class="image-container">
                <label for="image">Imagem do Produto</label>
                <input type="file" name="image" id="image">
                <span id="file-name"></span>
            </div>
            <br><br>
            <label for="name">Nome do Produto</label>
            <div class="input-field">
                <i class="fas fa-box-open"></i>
                <input type="text" name="name" id="name" placeholder="Nome do produto" value='<?= $nome?>'>
            </div>
            <div class="double-input-field">
                <div class="input-box">
                    <label for="price">Valor</label>
                    <div class="input-field">
                        <i class="fas fa-dollar-sign"></i>
                        <input type="number" step="0.01" min="0" name="price" id="price" placeholder="Preço do produto" value='<?= $valor?>'>
                    </div>
                </div>
                <div class="input-box">
                    <label for="amount">Quantidade</label>
                    <div class="input-field">
                        <i class="fas fa-boxes"></i>
                        <input type="number" name="amount" id="amount" min="0" placeholder="Quantidade no estoque" value='<?= $quantidade?>'>
                    </div>
                </div>
            </div>
            <div class="checkbox-container">
                <label for="active">ATIVO</label>
                <input type="checkbox" id="active" name="active" <?= $checked?>>
            </div>
            <br>
            <label for="description">DESCRIÇÃO</label>
            <textarea name="description" id="description" cols="30" rows="10"><?=$descricao?></textarea>
            <input type="hidden" name="id" value=<?=$id?>>
            <input type="submit" value="<?= $buttonName?>">
        </div>
    </form>
</section>

<?php $v->start("scripts");?>
    <script>
        let imageInput = document.getElementById('image');
        let fileName = document.getElementById('file-name');

        imageInput.addEventListener('change', function(){
            fileName.textContent = this.files[0].name;
        });
    </script>
<?php $v->end();?>