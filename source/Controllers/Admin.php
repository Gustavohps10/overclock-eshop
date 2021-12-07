<?php

namespace Source\Controllers;
use Source\Models\Usuario;

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

    public function perfis($data){
        echo $this->view->render("perfis", [
            "title" => "ADM | Perfis",
        ]);
    }

}