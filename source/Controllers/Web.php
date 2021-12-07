<?php

namespace Source\Controllers;

class Web extends Controller{
    public function __construct($router){
        parent::__construct($router);

        if(!empty($_SESSION["user"])){
            $this->router->redirect("app.home");
        }
    }

    public function login(){
        echo $this->view->render("theme/app/login", [
            "title" => "LOGIN | ". site("name"),
        ]);
    }

    public function register(){
        echo $this->view->render("theme/app/register", [
            "title" => site("name")." | CADASTRAR",
        ]);
    }
}