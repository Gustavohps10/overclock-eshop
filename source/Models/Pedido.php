<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class Pedido extends DataLayer{
    public function __construct(){
        parent::__construct("pedido", [], "idPedido", false);
    }

    public function add(Usuario $usuario, $valor){
        $this->fk_idUsuario = $usuario->idUsuario;
        $this->fk_idEndereco = 1; //----------------
        $this->statusPedido = "EM ANDAMENTO";
        $this->valor = $valor;
        $this->dataPedido = (new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')))->format('Y-m-d H:i:s');
        return $this;
    }

    public function products(){
        return (new PedidoProduto())->find("fk_idPedido = :pid", "pid={$this->idPedido}")->fetch(true);
    }

}