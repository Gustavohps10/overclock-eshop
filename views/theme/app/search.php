<?php $v->layout("theme/app/_base");?>

<section class="products">
    <div class="products-filters">
        <div class="search-result">
            <span>BUSCA</span>
            <br>
            <h1>RESULTADO DA BUSCA POR:</h1>
            <span class="search-str"><?=$str?></span>
        </div>
    </div>
    <?php
    if(!empty($produtos)):
    ?>
        <div class="list-products">
            <?php
            foreach($produtos as $produto):
                $valorProduto = 'R$'.number_format($produto->valor, 2, ',', '.');
            ?>
            <div class="product">
                <a href="<?=$router->route("app.productDetail", ["id" => $produto->idProduto])?>">
                    <img src="<?=asset("images/products/".$produto->imagem)?>" alt="">
                </a>
                <h3><?=$produto->nome?></h3>

                <?php
                if($produto->ativo && $produto->quantidade > 0):
                ?>
                <span class="price"><?= $valorProduto?></span><br>
                <span class="installment-price">10x de 00,00 sem juros</span>
                <a href="" data-action="<?= $router->route("cart.add", ["id" => $produto->idProduto])?>" class="btn">Comprar <i class="fas fa-shopping-cart"></i></a>
                <?php
                else:
                ?>
                <br>
                <span class="sold-off">ESGOTADO <i class="fas fa-minus-circle"></i></span>
                <?php
                endif;            
                ?> 
            </div>
            <?php
            endforeach;
            ?>
        </div>
    <?php
    else:
    ?>
    <span class="not-found">Nenhum produto encontrado.</span>
    <?php
    endif;
    ?>
</section>

<?php $v->start("scripts");?>
    <script>
        $('[data-action]').on("click",function(e) {
            e.preventDefault();
            $.ajax({
                method: 'post',
                url: $(this).data('action'),
                success: function (){
                    window.location.href = "<?= $router->route("app.order"); ?>";
                }
            });
        });
    </script>
<?php $v->end();?>