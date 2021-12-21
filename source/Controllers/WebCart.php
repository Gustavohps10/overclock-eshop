<?php

namespace Source\Controllers;
use Source\Facades\Cart;
use Source\Models\Produto;
use Source\Models\Pedido;
use Source\Models\PedidoProduto;
use Source\Models\Usuario;

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

    public function registerOrder(){
        if(empty($_SESSION["user"])){
            $this->router->redirect("web.login");
            return;
        }

        $usuario = (new Usuario())->findByid(intval($_SESSION["user"]));
        $carrinho = $this->cart->cart();

        if(!empty($carrinho) || !empty($carrinho["items"])){
            $pedido = new Pedido();
            $pedido->add($usuario, $carrinho["total"]);
            $pedido->save();
            
            foreach ($carrinho["items"] as $item) {
                $produto = (new Produto())->findById(intval($item["id"]));

                $itemPedido = new PedidoProduto();
                $itemPedido->add($pedido, $produto, $item["amount"], $item["subtotal"]);
                $itemPedido->save();

                $produto->quantidade -= $item["amount"];
                $produto->save();
            }
            $this->cart->clear();
            $this->router->redirect("app.home");
        }else{
            $this->router->redirect("app.order");
        }
    }
}