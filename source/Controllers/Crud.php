<?php

namespace Source\Controllers;
use Source\Models\Perfil;

class Crud extends Controller{

    public function __construct($router){
        parent::__construct($router);
    }

    function addProfile($data){
        $perfil = new Perfil();
        $perfil->nome = $data["name"];
        $perfil->save();
        $this->router->redirect("admin.profiles");
    }

    function editProfile($data){
        $perfil = (new Perfil())->findById(intval($data["id"]));
        $perfil->nome = $data["name"];
        $perfil->save();
        $this->router->redirect("admin.profiles");
    }

    function deleteProfile($data){
        $perfil = (new Perfil())->findById(intval($data["id"]));
        $perfil->destroy();
        $this->router->redirect("admin.profiles");
    }
}