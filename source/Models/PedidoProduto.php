<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class PedidoProduto extends DataLayer{
    public function __construct(){
        parent::__construct("pedido_produto", [], false, false);
    }

    public function add(Pedido $pedido, Produto $produto, $quantidade, $subtotal){
        $this->fk_idPedido = $pedido->idPedido;
        $this->fk_idProduto = $produto->idProduto;
        $this->quantidade = $quantidade;
        $this->subtotal = $subtotal;
        return $this;
    }

    public function product(){
        return (new Produto())->findById($this->fk_idProduto);
    }
}