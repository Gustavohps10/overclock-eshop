<?php

namespace Source\Controllers;
use Source\Models\Usuario;
use Source\Models\Perfil;

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


}