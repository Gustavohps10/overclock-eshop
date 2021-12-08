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
$router->get("/dashboard", "Admin:dashboard", "admin.dashboard");
$router->get("/perfil", "Admin:profiles",  "admin.profiles");
$router->get("/perfil/cadastrar", "Admin:addProfile",  "admin.addProfile");
$router->get("/perfil/editar/{id}", "Admin:editProfile",  "admin.editProfile");

/**
 * Admin - Crud 
 */
$router->post("/perfil/addProfile", "Crud:addProfile", "crud.addProfile");
$router->post("/perfil/editProfile", "Crud:editProfile", "crud.editProfile");
$router->post("/perfil/deleteProfile", "Crud:deleteProfile", "crud.deleteProfile");

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