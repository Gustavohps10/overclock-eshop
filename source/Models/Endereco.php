<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class Endereco extends DataLayer{
    public function __construct(){
        parent::__construct("endereco", [], "idEndereco", false);
    }
}