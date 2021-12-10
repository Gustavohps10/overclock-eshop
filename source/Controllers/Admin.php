<?php

namespace Source\Controllers;
use Source\Models\Usuario;
use Source\Models\Perfil;
use Source\Models\Produto;

class Admin extends Controller{
    protected $user;

    public function __construct($router){
        parent::__construct($router);

        if(!empty($_SESSION["user"]) && $this->user = (new Usuario())->findById($_SESSION["user"])){
            if($this->user->fk_idPerfil != 3){
                $this->router->redirect("app.denied");
            }
        }else{
            $this->router->redirect("web.login");
        }
    }
    
    public function dashboard(){
        echo $this->view->render("theme/admin/dashboard", [
            "title" => "ADM | Dashboard",
        ]);
    }

    public function profiles($data){
        $perfil = new Perfil();
        $perfis = $perfil->find()->fetch(true);
        echo $this->view->render("theme/admin/profiles", [
            "title" => "ADM | Perfis",
            "perfis" => $perfis
        ]);
    }

    public function addProfile(){
        echo $this->view->render("theme/admin/formProfile", [
            "title" => "ADM | Perfis",
            "buttonName" => "CADASTRAR",
            "formName" => "Adicionar Perfil"
        ]);
    }

    public function editProfile($data){
        $perfil = (new Perfil())->findById($data["id"]);

        echo $this->view->render("theme/admin/formProfile", [
            "title" => "ADM | Editar Perfil",
            "perfil" => $perfil,
            "buttonName" => "EDITAR",
            "formName" => "Editar Perfil"
        ]);
    }

    public function products(){
        $produto = new Produto();
        $produtos = $produto->find()->fetch(true);
        echo $this->view->render("theme/admin/products", [
            "title" => "ADM | Produtos",
            "produtos" => $produtos
        ]);
    }

    public function addProduct(){
        echo $this->view->render("theme/admin/formProduct", [
            "title" => "ADM | Produtos",
            "buttonName" => "CADASTRAR",
            "formName" => "Adicionar Produto"
        ]);
    }

    public function editProduct($data){
        $produto = (new Produto())->findById($data["id"]);

        echo $this->view->render("theme/admin/formProduct", [
            "title" => "ADM | Editar Produto",
            "produto" => $produto,
            "buttonName" => "EDITAR",
            "formName" => "Editar Produto"
        ]);
    }

    public function users(){
        $usuario = new Usuario();
        $usuarios = $usuario->find("fk_idPerfil = :p", "p=1")->fetch(true);
        echo $this->view->render("theme/admin/users", [
            "title" => "ADM | Usuarios",
            "usuarios" => $usuarios
        ]);
    }

}