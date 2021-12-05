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
        echo "<h1>TESTE</h1>";
    }

    public function home(){
        echo $this->view->render("theme/app/home", [
            "title" => "INICIO | ". "TESTE",
        ]);
    }
    
    public function error(array $data){
        echo $this->view->render("theme/app/error", [
            "error" => "$data[errcode]",
            "title" => "ERRO | ". site("name"),
        ]);
    }
}