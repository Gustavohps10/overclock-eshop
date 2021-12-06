<?php

namespace Source\Controllers;
use Source\Models\Usuario;

class Auth extends Controller{

    public function __construct($router){
        parent::__construct($router);
    }

    public function register($data){
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        
        $usuario = new Usuario();
        $usuario->email = $data['email'];
        $usuario->senha = $data['password'];
        $usuario->fk_idPerfil = 1;
        $usuario->save();

        $this->router->redirect("web.register");
    }

    public function login($data){
        echo "DADOS RECEBIDOS";
        //$data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        echo json_encode($data);
    }
}