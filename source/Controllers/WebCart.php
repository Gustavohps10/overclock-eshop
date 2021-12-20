<?php

namespace Source\Controllers;
use Source\Facades\Cart;
use Source\Models\Produto;

class WebCart extends Controller{
    private $cart;

    public function __construct($router){
        parent::__construct($router);
        $this->cart = new Cart();
    }

    public function cart(){
        echo json_encode($this->cart->cart());
    }

    public function add($data){
        $id = filter_var($data["id"], FILTER_VALIDATE_INT);
        $produto = (new Produto())->findById($id);
        if(!$id || !$produto || !$produto->ativo || $produto->quantidade < 1){
            //Error
            return;
        }

        $this->cart->add($produto);
        echo json_encode($this->cart->cart());
    }

    public function remove($data){
        $id = filter_var($data["id"], FILTER_VALIDATE_INT);
        $produto = (new Produto())->findById($id);
        if(!$id || !$produto){
            //Error
        }

        $this->cart->remove($produto);
        echo json_encode($this->cart->cart());
        
    }

    public function clear(){
        $this->cart->clear();
        echo json_encode($this->cart->cart());
    }
}