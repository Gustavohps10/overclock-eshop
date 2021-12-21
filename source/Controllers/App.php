<?php

namespace Source\Controllers;
use Source\Models\Usuario;
use Source\Models\Produto;
use Source\Facades\Cart;
use Source\Facades\Pedido;

class App extends Controller{
    protected $user;

    public function __construct($router){
        parent::__construct($router);

        if(!empty($_SESSION["user"]) && !$this->user = (new Usuario())->findById($_SESSION["user"])){
            unset($_SESSION["user"]);
            $this->router->redirect("web.login");
        }
    }

    public function home(){
        $novosProdutos = (new Produto)->find("ativo = 1 AND quantidade > 0")->order("idProduto DESC")->limit(12)->fetch(true);

        echo $this->view->render("theme/app/home", [
            "title" => "INICIO | ". "TESTE",
            "user" => $this->user,
            "novosProdutos" => $novosProdutos
        ]);
    }

    public function logoff(){
        if(empty($_SESSION["user"])){
            $this->router->redirect("web.login");
        }else{
            unset($_SESSION["user"]);
            $this->router->redirect("app.home");
        }
    }

    public function error(array $data){
        echo $this->view->render("theme/app/error", [
            "error" => "$data[errcode]",
            "title" => "ERRO | ". site("name"),
        ]);
    }

    public function denied(){
        echo $this->view->render("theme/app/denied", [
            "title" => "ACESSO NEGADO! | ". site("name"),
        ]);
    }

    public function search(){
        if(empty($_GET["str"])){
            $this->router->redirect("app.home");
        }else{
            $search = $_GET["str"];
        }
        $produtos = (new Produto())->find("nome LIKE '%$search%'")->order("ativo DESC")->fetch(true);
        echo $this->view->render("theme/app/search", [
            "title" => "Busca : " . $search . " - " . site("name"), 
            "produtos" => $produtos,
            "str" => $search
        ]);
    }

    public function productDetail($data){
        if(!filter_var($data["id"], FILTER_VALIDATE_INT) || !$produto = (new Produto())->findById($data["id"])){
            $this->router->redirect("app.error", ["errcode" => "404"]);
        }
        
        echo $this->view->render("theme/app/product", [
            "title" => "PRODUTO : ". site("name"),
            "produto" => $produto
        ]);
    }

    public function order(){
        $cart = (new Cart())->cart();

        if(!empty($cart["items"])){
            $items = json_encode($cart["items"], true);
            $total = $cart["total"];
        }else{
            $items = false;
            $total = false;
        }

        echo $this->view->render("theme/app/cart", [
            "title" => "Carrinho de Compras : " . site("name"),
            "produtosCarrinho" => json_decode($items),
            "total" => $total
        ]);
    }

    public function listOrders(){
        if(empty($_SESSION["user"])){
            $this->router->redirect("web.login");
        }

        $usuario = (new Usuario())->findById(intval($_SESSION["user"]));
        $pedidos = $usuario->orders();

        echo $this->view->render("theme/app/orders", [
            "title" => "Meus Pedidos : " . site("name"),
            "pedidos" => $pedidos,
        ]);
    }
}