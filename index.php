<?php

require __DIR__ ."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

/*
 *Controllers 
 */
$router->namespace("Source\App");

/*
 *Web
 */
$router->group(null);
$router->get("/", "Web:home");

/**
 * Admin
 */

$router->group("admin");
$router->get("/dashboard", "Admin:dashboard");
$router->get("/perfis", "Admin:perfis");


/*
 *Errors
 */

$router->group("ooops");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($router->error()){
    $router->redirect("/ooops/{$router->error()}");
}