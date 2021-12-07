<?php

namespace Source\Controllers;
//use Source\Models\Produto;

class Admin extends Controller{
    public function __construct($router){
        parent::__construct($router);

        if(!empty($_SESSION["user"])){
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