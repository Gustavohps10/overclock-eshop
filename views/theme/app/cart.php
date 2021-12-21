<?php $v->layout("theme/app/_base");?>

<?php if(!empty($produtosCarrinho)):?>
<section class="cart">
    <h1 class="title-cart">CARRINHO <i class="fas fa-shopping-cart"></i></h1>
    <div class="content">
        <div class="items">
            <ul>
                <?php 
                    $total = 'R$ '.number_format($total, 2, ',', '.');
                    foreach($produtosCarrinho as $produto): 
                    $valorProduto = 'R$ '.number_format($produto->price, 2, ',', '.');
                    $subtotalProduto = 'R$ '.number_format($produto->subtotal, 2, ',', '.');
                    
                ?>
                <li class="item" id="<?=$produto->id?>">
                    <i class="fas fa-times remove-item"></i>
                    <div class="content">
                        <div class="product-info">
                            <div class="image-box">
                                <img src="<?= asset("/images/products/{$produto->image}")?>" alt="">
                            </div>
                            <h1 class="name"><?= $produto->productName?></h1>
                        </div>       
                        <div class="updater">
                            <i data-action="<?= $router->route("cart.remove", ["id" => $produto->id])?>" class="fas fa-minus"></i>
                            <span class="amount"><?= $produto->amount?></span>
                            <i data-action="<?= $router->route("cart.add", ["id" => $produto->id])?>" class="fas fa-plus"></i>
                        </div>
                        <div class="value">
                            <b>Valor Ún.: </b><span class="price"><?= $valorProduto?></span>
                            <br>
                            <b>Subtotal:</b><span class="subtotal"><?= $subtotalProduto?></span>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
            
            </ul>
            <span data-action="<?=$router->route("cart.clear")?>" class="clear">Limpar carrinho <i class="fas fa-times"></i></span>
        </div>
        <div class="pay">  
            <div class="frete">
                <h1>Subtotal</h1><span>R$ 10,00</span>
                <br>
                <h1>Frete</h1><span>R$ 00,00</span>
            </div>
            <div class="cupom">
                <h1>Desconto Cupom</h1><span>-R$ 00,00</span>
            </div>
            <div class="installment">
                <i class="fas fa-credit-card"></i>
                <span>R$ 000</span>
                <p>12x de R$ 00,00 s/juros</p>
            </div>
            <div class="total">
                <i class="fas fa-barcode"></i>
                <span><?= $total?></span>
                <p>à vista</p>
            </div>
            <a href="<?= $router->route("cart.registerOrder")?>">FINALIZAR</a>
        </div>
    </div>
</section>
<?php endif;?>
<section class="error <?php if(!empty($produtosCarrinho)): echo "hide"; endif;?>">
    <h1><i class="fas fa-shopping-cart"></i> Carrinho vazio!</h1>
</section>

<?php $v->start("scripts");?>
<script>
    $('[data-action]').on("click",function(e) {
        e.preventDefault();
        let productContainer = $(this).closest(".item");
        let id = productContainer.attr("id");
        let amount = $(this).siblings('.amount');
        let productSubtotal = $(this).closest(".updater").siblings('.value').find(".subtotal");

        $.ajax({
            method: 'post',
            url: $(this).data('action'),
            dataType: 'json',
            success: function (cart){
                if(cart.length === 0 || cart.items.length === 0){
                    $(".cart").remove();
                    $(".error").fadeIn();
                }else{
                    if(id){
                        let item = cart.items[id];
                        if(item){
                            amount.html(item.amount);
                            productSubtotal.html(item.subtotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                        }else{
                            productContainer.remove();
                        }
                        $(".pay .total span").html(cart.total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
                    }else{
                        document.location.reload();
                    }
                    
                }
            }
        });
    });
</script>
<?php $v->end();?>