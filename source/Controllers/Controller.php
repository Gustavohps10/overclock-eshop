<?php

namespace Source\Controllers;

use CoffeeCode\Optimizer\Optimizer;
use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class Controller{
    protected $view;
    protected $router;
    protected $seo;

    public function __construct($router){
        $this->router = $router;
        $this->view = Engine::create(dirname(__DIR__, 2) . "/views", "php");
        $this->view->addData(["router" => $this->router]);

       /* $this->seo = new Optimizer();
        $this->seo->openGraph(site("name"), site("locale"), "article");*/
    }

    public function ajaxResponse(string $param, array $values){
        return json_encode([$param => $values]);
    }
}