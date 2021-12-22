<?php $v->layout("theme/app/_base");?>

<section class="orders">
    <h1 class="title"><i class="fas fa-clipboard-list"></i> Meus Pedidos</h1>
    <div class="items">
        <?php foreach ($pedidos as $pedido):
            $data = date("d/m/Y H:i:s", strtotime($pedido->dataPedido));
        ?>
            <div class="item">
                <div class="header">
                    <h1>PEDIDO: <span>#<?= $pedido->idPedido?></span></h1>
                </div>
                <div class="content">
                    <div class="date">
                        <span>Data e Hora</span>
                        <p><?= $data ?></p>
                    </div>
                    <div class="total">
                        <span>Valor Total</span>
                        <p><?= 'R$ '.number_format($pedido->valor, 2, ',', '.')?></p>
                    </div>
                    <div class="status">
                        <span>Status</span>
                        <p><?= $pedido->statusPedido?></p>
                    </div>
                </div>
                <div class="footer">
                    <a href="<?= $router->route("app.detailOrder", ["id" => $pedido->idPedido])?>">Ver Detalhes</a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</section>