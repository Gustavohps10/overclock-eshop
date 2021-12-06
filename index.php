<?php

require __DIR__ ."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(site());
$router->namespace("Source\Controllers");

/*
 *Web
 */
$router->group(null);
$router->get("/", "Web:home", "web.home");
$router->get("/login", "Web:login", "web.login");
$router->get("/cadastrar", "Web:register", "web.register");


/**
 * Auth
 */
$router->group(null);
$router->post("/auth", "Auth:login", "auth.login");
$router->post("/register", "Auth:register", "auth.register");


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