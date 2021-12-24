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

    public function allAddresses(){
        return (new Endereco)->find("fk_idUsuario = :uid", "uid={$this->idUsuario}")->order("principal DESC")->fetch(true);
    }

    public function mainAddresses(){
        return (new Endereco)->find("fk_idUsuario = :uid AND principal = 1", "uid={$this->idUsuario}")->fetch(true);
    }
}