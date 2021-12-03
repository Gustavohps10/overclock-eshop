<?php

namespace Source\App;
use League\Plates\Engine;
//use Source\Models\Produto;

class Admin{
    private $view;

    public function __construct(){
        $this->view = Engine::create(__DIR__."/../../theme/admin", "php");
    }
    
    public function dashboard(){
        echo $this->view->render("dashboard", [
            "title" => "ADM | Dashboard",
        ]);
    }

    public function perfis($data){
        echo $this->view->render("perfis", [
            "title" => "ADM | Perfis",
        ]);
    }
}