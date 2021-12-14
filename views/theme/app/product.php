<?php $v->layout("theme/app/_base");?>

<section class="product-detail">
    <div class="product-image">
        <img src="<?= asset("/images/products/{$produto->imagem}")?>" alt="">
    </div>
    <div class="product-info">
        <h1><?=$produto->nome?></h1>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <div class="credit-card">
            <i class="fas fa-credit-card"></i>
            <div class="price">
                <span class="total">R$ 000,00</span>
                <br>
                <span class="installment-price">10x de 00,00 sem juros</span>
            </div>
            
        </div>
        <div class="cash-price">
            <i class="fas fa-barcode"></i>
            <div class="price">
                <span class="total"><?='R$ '.number_format($produto->valor, 2, ',', '.');?></span>
                <br>
                <span class="description">à vista com 0% de desconto no boleto ou pix</span>
            </div>
        </div>
        <?php
        if($produto->ativo && $produto->quantidade > 0):
        ?>
        <a href="#">COMPRAR <i class="fas fa-shopping-cart"></i></a>
        <?php
        else:
        ?>
        <span class="sold-off">ESGOTADO <i class="fas fa-minus-circle"></i></span>
        <?php
        endif;
        ?>
    </div>
</section>
<section class="product-description">
    <h1>DESCRIÇÃO</h1>
    <p><?=nl2br($produto->descricao)?></p>
</section>