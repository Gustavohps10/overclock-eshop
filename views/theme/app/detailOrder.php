<?php $v->layout("theme/app/_base");?>

<section class="detail-order">
    <h1 class="title"><i class="fas fa-clipboard-list"></i> Meu Pedido</h1>
    <div class="details">
        <i class="fas fa-shopping-cart"></i>
        <div class="order-number">
            <span>N° do pedido</span>
            <p>#<?= $pedido->idPedido?></p>
        </div>
        <div class="ref">
            <span>ID de Referência:</span>
            <p>#<?= $pedido->referencia?></p>
        </div>
        <div class="date">
            <span>Data e Hora</span>
            <p><?= $pedido->dataPedido?></p>
        </div>
    </div>

    <div class="payment">
        <h1>INFORMAÇÕES DE PAGAMENTO</h1>
        <div class="content">
            <img id="qrcodeImg" src="<?= $pedido->qrcode?>" alt="qrcode">
            <div class="info">
                <p>Forma de pagamento escolhida: <b><?=$pedido->paymentMethod()->nome ?></b></p>
                <p>Situação: <b><?= $pedido->statusPedido?></b></p>
                <img id="methodImg" src="<?= asset("images/payment/".$pedido->paymentMethod()->imagem)?>">
                <a target="_blank" href="<?= $pedido->linkPagamento ?>" class="btn">PAGAR</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="client">
            <h1>DADOS DO CLIENTE</h1>
            <div class="content">
                <i class="fas fa-user"></i>
                <div class="data">
                    <h1 class="name"><?= $cliente->nome?></h1>
                    <p class="email"><?= $cliente->email?></p>
                    <p>USERNAME: @<?= $cliente->username?></p>
                    <p>CPF:</p>
                </div>
            </div>
        </div>
        <div class="client-address">
            <h1>ENDEREÇO</h1>
            <div class="content">
                <b>Nome: </b><span><?= $endereco->nome?></span>
                <br>
                <b>Estado: </b><span><?= $endereco->estado?></span>
                <br>
                <b>Cidade: </b><span><?= $endereco->cidade?></span>
                <br>
                <b>Bairro: </b><span><?= $endereco->bairro?></span>
                <br>
                <b>Rua: </b><span><?= $endereco->rua?>,</span>
                <span><?= $endereco->numeroCasa?></span>
            </div>
        </div>
    </div>

    <div class="items">
        <h1>ITENS DO PEDIDO</h1>
        <div class="content">
        <?php foreach($itensPedido as $item):
            $subtotal = 'R$ '.number_format($item->subtotal, 2, ',', '.')
        ?>
            <div class="item">
                <div class="product-info">
                    <div class="img-box">
                        <img src="<?= asset("/images/products/").$item->product()->imagem?>" alt="">
                    </div>
                    <h1 class="name"><?= $item->product()->nome?></h1>
                </div>
                <div class="purchase-info">
                    <div class="amount">
                        <span>QUANTIDADE</span>
                        <p><?= $item->quantidade?></p>
                    </div>
                    <div class="subtotal">
                        <span>SUBTOTAL</span>
                        <p><?= $subtotal?></p>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        </div>
        
    </div>

    <div class="total">
            <h1>TOTAL</h1>
            <div class="content">
                <div class="subtotal">
                    <span>Subtotal</span>
                    <p>R$ 00,00</p>
                </div>
                <div class="frete">
                    <span>Frete</span>
                    <p>R$ 00,00</p>
                </div>
                <div class="cupom">
                <span>Cupom de Desconto</span>
                    <p>R$ 00,00</p>
                </div>
                <div class="value">
                    <span>Total</span>
                    <p><?= 'R$ '.number_format($pedido->valor, 2, ',', '.')?></p>
                </div>
            </div>
        </div>
</section>