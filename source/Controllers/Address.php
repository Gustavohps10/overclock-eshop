<?php

namespace Source\Controllers;
use Source\Models\Usuario;
use Source\Models\Endereco;

class Address extends Controller{
    private $user;

    public function __construct($router){
        parent::__construct($router);

        if(empty($_SESSION["user"]) || !$this->user = (new Usuario)->findById(intval($_SESSION["user"]))){
            $this->router->redirect("web.login");
        }
    }

    public function listAddresses(){
        $addresses = $this->user->allAddresses();
        echo $this->view->render("theme/app/listAddress", [
            "title" => "Meus Endereços",
            "enderecos" => $addresses
        ]);
    }
}
