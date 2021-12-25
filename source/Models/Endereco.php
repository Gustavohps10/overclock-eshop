<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class Endereco extends DataLayer{
    public function __construct(){
        parent::__construct("endereco", [], "idEndereco", false);
    }

    public function user(){
        return (new Usuario)->findByid(intval($this->fk_idUsuario));   
    }
}