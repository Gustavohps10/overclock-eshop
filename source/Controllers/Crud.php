<?php

namespace Source\Controllers;
use Source\Models\Perfil;
use Source\Models\Produto;

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

    function addProduct($data){
        $produto = new Produto();
        if(!empty($data['active'])){
            $active = 1;
        }else{
            $active = 0;
        }

        $files = $_FILES;
        
        if(!empty($files["image"]["type"])){
            $file = $files['image'];
            $allowed = array("png", "jpeg", "jpg");
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if(in_array($extension, $allowed)){
                $path = dirname(__DIR__, 2)."/views/assets/images/products/";;
                $temporary = $file['tmp_name'];
                
                $date = new \DateTime();
                $timestamp = $date->getTimestamp();
                $newName = md5($timestamp).'.'.$extension;
                
                if(move_uploaded_file($temporary, $path.$newName)){
                    $produto->imagem = $newName;
                }else{
                    //Error
                }
            }else{
                //Error
            }
        }
       
        $produto->nome = $data['name'];
        $produto->descricao = $data['description'];
        $produto->ativo = $active;
        
        $produto->quantidade = $data['amount'];
        $produto->valor = $data['price'];
        $produto->save();
        
        $this->router->redirect("admin.products");

    }

    function editProduct($data){
        $produto = (new Produto())->findById(intval($data["id"]));
        if(!empty($data['active'])){
            $active = 1;
        }else{
            $active = 0;
        }

        $files = $_FILES;
        
        if(!empty($files["image"]["type"])){
            $file = $files['image'];
            $allowed = array("png", "jpeg", "jpg");
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if(in_array($extension, $allowed)){
                $path = dirname(__DIR__, 2)."/views/assets/images/products/";
                $temporary = $file['tmp_name'];
                
                $date = new \DateTime();
                $timestamp = $date->getTimestamp();
                $newName = md5($timestamp).'.'.$extension;
                
                if(move_uploaded_file($temporary, $path.$newName)){
                    if(file_exists($path.$produto->imagem)){
                        unlink($path.$produto->imagem);
                    }
                    $produto->imagem = $newName;
                    
                }else{
                    //Error
                }
            }else{
                //Error
            }
        }
       
        $produto->nome = $data['name'];
        $produto->descricao = $data['description'];
        $produto->ativo = $active;
        $produto->quantidade = $data['amount'];
        $produto->valor = $data['price'];
        $produto->save();
        
        $this->router->redirect("admin.products");
       
    }

    function deleteProduct($data){
        $produto = (new Produto())->findById(intval($data["id"]));
        $path = dirname(__DIR__, 2)."/views/assets/images/products/";
        if(file_exists($path.$produto->imagem)){
            unlink($path.$produto->imagem);
        }
        $produto->destroy();
        $this->router->redirect("admin.products");
    }
}