<?php

namespace Source\Controllers;
use Source\Models\Usuario;

class Auth extends Controller{

    public function __construct($router){
        parent::__construct($router);
    }

    public function login(array $data){
        $email = filter_var($data["email"], FILTER_VALIDATE_EMAIL);
        $passwd = filter_var($data["passwd"], FILTER_DEFAULT);

        // if(!$email || !$passwd){
        //     $router->redirect("web.login");
        // }
        
        $user = (new Usuario())->find("email = :e AND senha = :s", "e={$email}&s={$passwd}")->fetch();
        
        if($user){
            $_SESSION["user"] = $user->idUsuario;
            $this->router->redirect("app.home");
        }else{
            $this->router->redirect('web.login');
        }
       
    }

    public function register($data){
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        
        $usuario = new Usuario();
        $usuario->nome = $data['name'];
        $usuario->username = $data['username'];
        $usuario->email = $data['email'];
        $usuario->senha = $data['passwd'];
        $usuario->fk_idPerfil = 1;
        $usuario->save();
        $_SESSION["user"] = $usuario->idUsuario;

        $this->router->redirect("app.home");
    }
    
    public function edit($data){
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        $usuario = (new Usuario)->findById(intval($_SESSION["user"]));
        $usuario->nome = $data['name'];
        $usuario->username = $data['username'];
        $usuario->email = $data['email'];
        $usuario->save();
        $this->router->redirect("app.account");
    }
}