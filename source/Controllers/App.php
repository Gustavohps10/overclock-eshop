<?php

namespace Source\Controllers;
use Source\Models\Usuario;

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
        echo $this->view->render("theme/app/home", [
            "title" => "INICIO | ". "TESTE",
            "user" => $this->user
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
}