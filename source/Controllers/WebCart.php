<?php

namespace Source\Controllers;
use Source\Facades\Cart;
use Source\Models\Produto;
use Source\Models\Pedido;
use Source\Models\PedidoProduto;
use Source\Models\Usuario;
use Source\Models\Endereco;
use Source\Models\MetodoPagamento;

use Source\Services\Payment;
use Source\Services\PaymentPlatform\PicPay;

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

    public function registerOrder($data){
        if(empty($_SESSION["user"])){
            $this->router->redirect("web.login");
        }

        $usuario = (new Usuario())->findByid(intval($_SESSION["user"]));
        $endereco = (new Endereco)->findById(intval($data["address"]));

        if(!filter_var($data["address"], FILTER_VALIDATE_INT) || !$endereco || $endereco->user()->idUsuario != $usuario->idUsuario){
            $this->router->redirect("app.checkout");
        }

        $carrinho = $this->cart->cart();

        if(empty($carrinho) || empty($carrinho["items"])){
            $this->router->redirect("app.order");
        }

        $data["service"] = 1;
        
        $metodoPagamento = (new MetodoPagamento)->findById($data["service"]);
        $pedido = new Pedido();
        $pedido->add($usuario, $endereco, $carrinho["total"], $metodoPagamento);
        $pedido->save();
        $pedido->generateReferenceCode();
        
        foreach ($carrinho["items"] as $item) {
            $produto = (new Produto())->findById(intval($item["id"]));

            $itemPedido = new PedidoProduto();
            $itemPedido->add($pedido, $produto, $item["amount"], $item["subtotal"]);
            $itemPedido->save();

            $produto->quantidade -= $item["amount"];
            $produto->save();
        }
       
        $service = $data["service"];
        switch ($service) {        
            default:
                $service = new PicPay();
                break;
        }

        $payment = new Payment($service);
        $paymentData = $payment->generatePaymentIntent($pedido->referencia, $carrinho["total"]);
        $pedido->qrcode = $paymentData->qrcode->base64;
        $pedido->linkPagamento = $paymentData->paymentUrl;
        $pedido->save();

        $this->cart->clear();
        $this->router->redirect("app.listOrders");
    }
}