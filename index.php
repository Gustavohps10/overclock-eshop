<?php
ob_start();
session_start();
require __DIR__ ."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(site());
$router->namespace("Source\Controllers");

/**
 * App
 */
$router->group(null);
$router->get("/", "App:home", "app.home");
$router->get("/sair", "App:logoff", "app.logoff");

/*
 *Web
 */
$router->group(null);
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
$router->get("/{errcode}", "App:error");
$router->get("/denied", "App:denied", "app.denied");

$router->dispatch();

if($router->error()){
    $router->redirect("/ooops/{$router->error()}");
}

ob_end_flush();