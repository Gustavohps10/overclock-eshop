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

    public function edit($data){
        $address = (new Endereco)->findById(intval($data["id"]));
    
        if(!filter_var($data["id"], FILTER_VALIDATE_INT) || !$address || $this->user->idUsuario != $address->user()->idUsuario){
            $this->router->redirect("app.error", ["errcode" => "404"]);
        }

        $address->principal = $address->principal ? "checked": "";
       
        echo $this->view->render("theme/app/formAddress", [
            "title" => "Editar endereço",
            "endereco" => $address,
            "formName" => "Editar Endereço",
            "btnName" => "Editar",
            "formUrl" =>  $this->router->route("webAddress.edit")
        ]);
    }

    public function register(){
        $address = new \stdClass();
        $address->nome = "";
        $address->principal = "";
        $address->rua = "";
        $address->estado = "";
        $address->cidade = "";
        $address->cep = "";
        $address->bairro = "";
        $address->numeroCasa = "";
        $address->idEndereco = "";

        echo $this->view->render("theme/app/formAddress", [
            "title" => "Cadastrar endereço",
            "endereco" => $address,
            "formName" => "Cadastrar Endereço",
            "btnName" => "Cadastrar",
            "formUrl" =>  $this->router->route("webAddress.register")
        ]);
    }
}
