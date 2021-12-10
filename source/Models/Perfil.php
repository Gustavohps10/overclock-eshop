<?php

namespace Source\Models;
use CoffeeCode\DataLayer\DataLayer;

class Perfil extends DataLayer{
    public function __construct(){
        parent::__construct("perfil", [], "idPerfil", false);
    }
}