<?php $v->layout("theme/app/_base");?>

<?php $v->start("head")?>
<link rel="stylesheet" href="<?= asset('css/icheck-material.min.css')?>">
<?php $v->end()?>

<section class="checkout">
    <h1 class="title"><i class="fas fa-clipboard-check"></i> CHECKOUT</h1>
    <!--<div class="frete">
        <label for="frete-input">Calcular Frete</label>
        <br>
        <input type="text" id="frete-input" placeholder="Ex: 12345-678">
        <button class="btn">Calcular</button>
    </div>-->
    <form action="<?= $router->route("cart.registerOrder")?>" method="post">
        <h1>Endereço</h1>
        <div class="user-address">
            <?php if(!empty($enderecos)): ?>
                
                    <select id="address" name="address" required>
                        <option value="">Selecione um endereço</option>
                        <?php foreach($enderecos as $endereco):?>
                        <option value="<?= $endereco->idEndereco?>" data-action="<?= $router->route("address.getAddress", ["id" => $endereco->idEndereco]);?>"><?= $endereco->nome?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="address-info hide">
                        <b>Nome: </b><span class="name"></span>
                        <br>
                        <b>Estado: </b><span class="state"></span>
                        <br>
                        <b>Cidade: </b><span class="city"></span>
                        <br>
                        <b>Bairro: </b><span class="district"></span>
                        <br>
                        <b>Rua: </b><span class="street"></span>
                        <span class="house-number"></span>
                    </div>
            <?php else:?> 
                <h1>Você não possui endereços cadastrados</h1>
                <a href="<?= $router->route("address.register")?>" class="btn"><i class="fas fa-plus"></i> Novo Endereço</a>
            <?php endif;?> 
        </div>

        <h1>Escolha uma forma de pagamento</h1>
        <div class="paymentMethods">
            <?php foreach($metodosPagamento as $metodo):?>
                <div class="method">
                    <img src="<?= asset("images/payment/$metodo->imagem")?>" alt="">
                    <div class="icheck-material-blue">
                        <input checked type="radio" id="<?= $metodo->nome?>" name="service" value="<?= $metodo->idMetodoPagamento?>"/>
                        <label for="<?= $metodo->nome?>"><?= $metodo->nome?></label>
                    </div>
                </div>
            <?php endforeach?>
        </div>

        <div class="order-items">
            <h1>No Seu Carrinho <i class="fas fa-shopping-cart"></i></h1>
            <?php foreach($produtosCarrinho as $item):?>
                <div class="item">
                    <div class="img-box">
                        <img src="<?= asset("/images/products/{$item->image}")?>" alt="">
                    </div>
                    <h1 class="product-name"><?= $item->productName?></h1>
                    <span class="amount"><b>Quantidade:</b> <?= $item->amount?></span>
                    <span class="subtotal"><b>Subtotal:</b> <?= 'R$ '.number_format($item->subtotal, 2, ',', '.')?></span>
                </div>
            <?php endforeach;?>
        
        </div>
        <button type="submit" class="btn">CONFIRMAR PEDIDO <i class="fas fa-check"></i></button>
    </form>

   
</section>

<?php $v->start("scripts")?>
<script>
    $('#address').on("change",function() {
        let address = $(".address-info");
        $.ajax({
            method: 'post',
            dataType: 'json',
            url: $(this).find('option:selected').data('action'),
            success: function ($address){
                address.children(".name").text($address.nome);
                address.children(".state").text($address.estado);
                address.children(".city").text($address.cidade);
                address.children(".district").text($address.bairro);
                address.children(".street").text($address.rua + ",");
                address.children(".house-number").text( $address.numeroCasa);
                address.fadeIn();
            },
            error(){
                address.hide();
            }
        });
    });
</script>
<?php $v->end()?>