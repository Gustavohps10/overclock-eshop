<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class Pedido extends DataLayer{
    public function __construct(){
        parent::__construct("pedido", [], "idPedido", false);
    }

    public function add(Usuario $usuario, Endereco $endereco, $valor, $metodoPagamento){
        $this->fk_idUsuario = $usuario->idUsuario;
        $this->fk_idEndereco = $endereco->idEndereco;
        $this->fk_idMetodoPagamento = $metodoPagamento->idMetodoPagamento;
        $this->statusPedido = "Pendente";
        $this->valor = $valor;
        $this->dataPedido = (new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')))->format('Y-m-d H:i:s');
        return $this;
    }

    public function items(){
        return (new PedidoProduto())->find("fk_idPedido = :pid", "pid={$this->idPedido}")->fetch(true);
    }

    public function user(){
        return (new Usuario())->findById($this->fk_idUsuario);
    }

    public function address(){
        return (new Endereco())->findById($this->fk_idEndereco);
    }

    public function paymentMethod(){
        return (new MetodoPagamento())->findById($this->fk_idMetodoPagamento);
    }

    public function generateReferenceCode(){
        $referenceId = $this->idPedido . (new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')))->getTimestamp();
        $this->referencia = $referenceId;
        $this->save();
    }

}