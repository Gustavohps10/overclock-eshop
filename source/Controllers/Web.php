<?php

namespace Source\Controllers;

class Web extends Controller{
    public function __construct($router){
        parent::__construct($router);

        if(!empty($_SESSION["user"])){
            $this->router->redirect("web.login");
        }
    }

    public function login(){
        echo $this->view->render("theme/app/login", [
            "title" => "LOGIN | ". site("name"),
        ]);
    }

    public function home(){
        echo $this->view->render("theme/app/home", [
            "title" => "INICIO | ". "TESTE",
        ]);
    }

    public function register(){
        echo $this->view->render("theme/app/register", [
            "title" => site("name")." | CADASTRAR",
        ]);
    }
    
    public function error(array $data){
        echo $this->view->render("theme/app/error", [
            "error" => "$data[errcode]",
            "title" => "ERRO | ". site("name"),
        ]);
    }
}