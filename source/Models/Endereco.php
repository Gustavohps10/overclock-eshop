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

    public function add(Usuario $user, array $data){
        $this->nome = $data["name"];
        $this->cep = $data["cep"];
        $this->bairro = $data["district"];
        $this->rua = $data["street"];
        $this->numeroCasa = $data["house-number"];
        $this->cidade = $data["city"];
        $this->estado = $data["state"];
        $this->principal = $data["mainAddress"];
        $this->fk_idUsuario = $user->idUsuario;
    }
}