<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class MetodoPagamento extends DataLayer{
    public function __construct(){
        parent::__construct("metodoPagamento", [], "idMetodoPagamento", false);
    }
}