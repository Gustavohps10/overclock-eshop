<?php

namespace Source\App;
use League\Plates\Engine;
//use Source\Models\Produto;

class Web{
    private $view;

    public function __construct(){
        $this->view = Engine::create(__DIR__."/../../theme/app", "php");
    }
    
    public function home(){
        //$produtos = (new Produto())->find()->fetch(true);
        echo $this->view->render("home", [
            "title" => "INICIO | ".SITE,
        ]);
    }
    
    public function error(array $data){
        echo $this->view->render("error", [
            "error" => "$data[errcode]"
        ]);
    }

}