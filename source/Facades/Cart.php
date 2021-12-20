<?php

namespace Source\Facades;
use Source\Models\Produto;

class Cart{
    public function __constructor(){
        if(!session_id()){
            session_start();
        }

        $_SESSION["cart"] = (!empty($_SESSION["cart"]) ? $_SESSION["cart"] : []);
    }

    public function cart(){
        return $_SESSION["cart"];
    }

    public function add(Produto $produto){
        $_SESSION["cart"]["total"] = ($_SESSION["cart"]["total"] ?? 0);
        $_SESSION["cart"]["total"] += $produto->valor;

        $_SESSION["cart"]["amount"] = ($_SESSION["cart"]["amount"] ?? 0);
        $_SESSION["cart"]["amount"] += 1;

        if(empty($_SESSION["cart"]["items"][$produto->idProduto])){
            $_SESSION["cart"]["items"][$produto->idProduto] = [
                "id" => $produto->idProduto,
                "productName" => $produto->nome,
                "price" => $produto->valor,
                "image" => $produto->imagem,
                "subtotal" => $produto->valor,
                "amount" => 1
            ];
            return $this;
        }

        $_SESSION["cart"]["items"][$produto->idProduto]["amount"] += 1;
        $_SESSION["cart"]["items"][$produto->idProduto]["subtotal"] += $produto->valor;
        return $this;
    }

    public function remove(Produto $produto){
        if(!empty($_SESSION["cart"]["items"][$produto->idProduto])){
            $_SESSION["cart"]["amount"] -= 1;
            $_SESSION["cart"]["total"] -= $produto->valor;

            if($_SESSION["cart"]["items"][$produto->idProduto]["amount"] > 1){
                $_SESSION["cart"]["items"][$produto->idProduto]["amount"] -= 1;
                $_SESSION["cart"]["items"][$produto->idProduto]["subtotal"] -= $produto->valor;
                return $this;
            }

            unset($_SESSION["cart"]["items"][$produto->idProduto]);
            return $this;
        }

        return $this;
    }

    public function clear(){
        $_SESSION["cart"] = [];
        return $this;
    }
}
