<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class Usuario extends DataLayer{
    public function __construct(){
        parent::__construct("usuario", [], "idUsuario", false);
    }

    public function orders(){
        return (new Pedido())->find("fk_idUsuario = :uid", "uid={$this->idUsuario}")->order("idPedido DESC")->fetch(true);
    }
}